<?php

defined('ABSPATH') OR exit;

use GT3\PhotoVideoGalleryPro\Assets;
use GT3\PhotoVideoGalleryPro\Settings;

require_once __DIR__.'/trait-settings.php';

if(!class_exists('GT3_Post_Type_Gallery')) {
	class GT3_Post_Type_Gallery {
		use Settings_Trait;
		private static $instance = null;
		const post_type = 'gt3_gallery';
		const taxonomy = 'gt3_gallery_category';
		const VERSION = '1.1.0';

		private $settings = array(
			'capability' => 'edit_posts',
		);

		/** @return self */
		public static function instance(){
			if(is_null(static::$instance)) {
				static::$instance = new static();
			}

			return static::$instance;
		}

		private function __construct(){
			if(post_type_exists(self::post_type)) {
				return;
			}
			$this->initDefaultsSettings();
			$this->load_settings();

			add_shortcode('gt3-gallery', array( $this, 'render_shortcode' ));

			add_action('init', array( $this, 'init' ));
			add_filter('parent_file', array( $this, 'fix_current_screen' ));

			add_action('admin_menu', array( $this, 'admin_menu' ));
			add_action('manage_'.self::post_type.'_posts_custom_column', array( $this, 'manage_posts_custom_column' ), 10, 2);

			add_filter('manage_'.self::post_type.'_posts_columns', array( $this, 'manage_posts_columns' ));
			add_action('add_meta_boxes', array( $this, 'add_meta_boxes' ));
			add_action('save_post', array( $this, 'save_post' ));
			add_action('admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ));
			add_filter('post_updated_messages', array( $this, 'post_updated_messages' ));
			add_filter('the_content', array( $this, 'the_content' ), 10);
			add_filter('single_template_hierarchy', array( $this, 'get_template' ));
		}

		private function getCapability(){
			return $this->settings['capability'];
		}

		public function get_slug(){
			$slug = $this->getSettings('gt3_gallery');

			return key_exists('slug', $slug) ? $slug['slug'] : self::post_type;
		}

		public function get_taxonomy_slug(){
			$slug = $this->getSettings('gt3_gallery');

			return key_exists('taxonomySlug', $slug) ? $slug['taxonomySlug'] : self::taxonomy;
		}

		private function getCPTLabels(){
			return array(
				'name'                  => __('Galleries', 'gt3pg_pro'),
				'singular_name'         => sprintf(__('%1$s Gallery', 'gt3pg_pro'), 'GT3'),
				'add_new'               => __('New Gallery', 'gt3pg_pro'),
				'add_new_item'          => __('New Gallery', 'gt3pg_pro'),
				'edit_item'             => sprintf(__('Edit %1$s Gallery', 'gt3pg_pro'), 'GT3'),
				'new_item'              => __('New Gallery', 'gt3pg_pro'),
				'view_item'             => __('View Gallery', 'gt3pg_pro'),
				'search_items'          => __('Search Gallery', 'gt3pg_pro'),
				'not_found'             => __('No Galleries Found', 'gt3pg_pro'),
				'not_found_in_trash'    => __('No Galleries Found in Trash', 'gt3pg_pro'),
				'parent_item_colon'     => __('Parent Gallery', 'gt3pg_pro'),
				'menu_name'             => __('All Galleries', 'gt3pg_pro'),
				'filter_items_list'     => __('Filter Galleries list', 'gt3pg_pro'),
				'items_list_navigation' => __('Galleries list navigation', 'gt3pg_pro'),
				'items_list'            => __('Galleries list', 'gt3pg_pro')
			);
		}

		private function getTaxonomyLabels(){
			return array(
				'name'              => __('Categories', 'gt3pg_pro'),
				'singular_name'     => __('Category', 'gt3pg_pro'),
				'search_items'      => __('Search Categories', 'gt3pg_pro'),
				'all_items'         => __('All Categories', 'gt3pg_pro'),
				'view_item '        => __('View Category', 'gt3pg_pro'),
				'parent_item'       => __('Parent Category', 'gt3pg_pro'),
				'parent_item_colon' => __('Parent Category:', 'gt3pg_pro'),
				'edit_item'         => __('Edit Category', 'gt3pg_pro'),
				'update_item'       => __('Update Category', 'gt3pg_pro'),
				'add_new_item'      => __('Add New Category', 'gt3pg_pro'),
				'new_item_name'     => __('New Category Name', 'gt3pg_pro'),
				'menu_name'         => __('Categories', 'gt3pg_pro'),
			);
		}

		public function post_updated_messages($messages){
			global $post, $typenow, $post_type_object;
			if($typenow === self::post_type) {
				$post_ID   = $post->ID;
				$permalink = get_permalink($post_ID);

				if(!$permalink) {
					$permalink = '';
				}
				$preview_post_link_html = $scheduled_post_link_html = $view_post_link_html = '';

				$preview_url = get_preview_post_link($post);
				$viewable    = is_post_type_viewable($post_type_object);

				if($viewable) {

					// Preview post link.
					$preview_post_link_html = sprintf(
						' <a target="_blank" href="%1$s">%2$s</a>',
						esc_url($preview_url),
						__('Preview Gallery', 'gt3pg_pro')
					);

					// Scheduled post preview link.
					$scheduled_post_link_html = sprintf(
						' <a target="_blank" href="%1$s">%2$s</a>',
						esc_url($permalink),
						__('Preview Gallery', 'gt3pg_pro')
					);

					// View post link.
					$view_post_link_html = sprintf(
						' <a href="%1$s">%2$s</a>',
						esc_url($permalink),
						__('View Gallery', 'gt3pg_pro')
					);
				}

				/* translators: Publish box date format, see https://secure.php.net/date */
				$scheduled_date            = date_i18n(__('M j, Y @ H:i'), strtotime($post->post_date));
				$messages[self::post_type] = array(
					0  => '', // Unused. Messages start at index 1.
					1  => __('Gallery updated.', 'gt3pg_pro').$view_post_link_html,
					2  => __('Custom field updated.', 'gt3pg_pro'),
					3  => __('Custom field deleted.', 'gt3pg_pro'),
					4  => __('Gallery updated.', 'gt3pg_pro'),
					/* translators: %s: date and time of the revision */
					5  => isset($_GET['revision']) ? sprintf(__('Gallery restored to revision from %s.', 'gt3pg_pro'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
					6  => __('Gallery published.', 'gt3pg_pro').$view_post_link_html,
					7  => __('Gallery saved.', 'gt3pg_pro'),
					8  => __('Gallery submitted.', 'gt3pg_pro').$preview_post_link_html,
					9  => sprintf(__('Gallery scheduled for: %s.', 'gt3pg_pro'), '<strong>'.$scheduled_date.'</strong>').$scheduled_post_link_html,
					10 => __('Gallery draft updated.', 'gt3pg_pro').$preview_post_link_html,
				);
			}

			return $messages;
		}

		public function init(){
			register_post_type(
				self::post_type,
				array(
					'label'               => sprintf(__('%1$s Galleries', 'gt3pg_pro'), 'GT3'),
					'labels'              => $this->getCPTLabels(),
					'rewrite'             => array(
						'slug'       => $this->get_slug(),
						'with_front' => true
					),
					'with_front'          => true,
					'hierarchical'        => true,
					'show_in_menu'        => self::post_type,
					'menu_position'       => 11,
					'publicly_queryable'  => true,
					'public'              => true,
					'show_ui'             => true,
					'show_in_rest'        => true,
					'show_in_nav_menus'   => true,
					'capability_type'     => 'page',
					'supports'            => array(
						'title',
						'thumbnail',
						'editor',
						'custom-fields',
					),
					'exclude_from_search' => true,
					'has_archive'         => false,
					'query_var'           => true,
					'can_export'          => true,
					'show_in_admin_bar'   => true,

					'menu_icon'  => 'dashicons-format-gallery',
					'taxonomies' => array( self::taxonomy )
				)
			);
			$taxonomy_labels = $this->getTaxonomyLabels();
			register_taxonomy(
				self::taxonomy,
				self::post_type,
				array(
					'hierarchical'      => true,
					'label'             => $taxonomy_labels['name'],
					'singular_name'     => $taxonomy_labels['name'],
					'labels'            => $this->getTaxonomyLabels(),
					'rewrite'           => array(
						'slug'       => $this->get_taxonomy_slug(),
						'with_front' => true
					),
					'show_in_rest'      => true,
					'public'            => true,
					'show_ui'           => true,
					'show_admin_column' => true,
					'show_in_nav_menus' => true,
					'show_tagcloud'     => false,
				)
			);

			if(is_admin()) {
				add_action('load-post.php', array( $this, 'initTinyMCE' ));
				add_action('load-post-new.php', array( $this, 'initTinyMCE' ));
			}

			/*register_post_meta(self::post_type, '_cpt_gt3_gallery_type', array(
				'type'              => 'string',
				'show_in_rest'      => true,
				'single'            => true,
				'sanitize_callback' => 'sanitize_text_field',
				'auth_callback'     => function(){
					return current_user_can('edit_posts');
				}
			));
			register_post_meta(self::post_type, '_cpt_gt3_gallery_images', array(
				'type'              => 'string',
				'show_in_rest'      => true,
				'single'            => true,
				'sanitize_callback' => 'sanitize_text_field',
				'auth_callback'     => function(){
					return current_user_can('edit_posts');
				}
			));*/
		}

		public function admin_menu(){
			$labels = $this->getCPTLabels();

			// Main menu
			add_menu_page(
				sprintf(__('%1$s Galleries', 'gt3pg_pro'), 'GT3'),
				sprintf(__('%1$s Galleries', 'gt3pg_pro'), 'GT3'),
				$this->getCapability(),
				self::post_type,
				'',
				'dashicons-format-gallery',
				10
			);

			// Add new
			add_submenu_page(
				self::post_type,
				$labels['add_new'],
				$labels['add_new'],
				$this->getCapability(),
				'post-new.php?post_type='.self::post_type
			);

			// Categories
			$taxonomy_labels = $this->getTaxonomyLabels();
			add_submenu_page(
				self::post_type,
				$taxonomy_labels['name'],
				$taxonomy_labels['name'],
				$this->getCapability(),
				'edit-tags.php?taxonomy='.self::taxonomy.'&post_type='.self::post_type
			);

			// Settings
			add_submenu_page(
				self::post_type,
				__('Settings', 'gt3pg_pro'),
				__('Settings', 'gt3pg_pro'),
				$this->getCapability(),
				'gt3_gallery-settings',
				array( $this, 'settings_page' )
			);
		}

		function fix_current_screen($parent_file){
			global $submenu_file, $current_screen, $pagenow;

			# Set the submenu as active/current while anywhere in your Custom Post Type
			if($current_screen->post_type === self::post_type) {
				if($pagenow === 'post.php') {
					$submenu_file = 'edit.php?post_type='.self::post_type;
				}

				if($pagenow === 'edit-tags.php') {
					$submenu_file = 'edit-tags.php?taxonomy='.self::taxonomy.'&post_type='.self::post_type;
				}

				$parent_file = self::post_type;

				if($pagenow === 'term.php') {
					$submenu_file = 'edit-tags.php?taxonomy='.self::taxonomy.'&post_type='.self::post_type;
				}
			}

			return $parent_file;
		}


		public function add_meta_boxes(){
			add_meta_box(
				'cpt-'.self::post_type.'_type_section',
				esc_html__('Gallery Settings', 'gt3pg_pro'),
				array( $this, 'render_meta_box_type' ),
				self::post_type,
				'normal',
				'high',
				array(
//					'__block_editor_compatible_meta_box' => true,
//					'__back_compat_meta_box'             => true,
				)
			);

			add_meta_box(
				'cpt-'.self::post_type.'_section',
				esc_html__('Gallery Images', 'gt3pg_pro'),
				array( $this, 'render_meta_box_images' ),
				self::post_type,
				'normal',
				'high'
			);
		}

		public function render_meta_box_images($post){
			if(get_post_type() === self::post_type) {
				printf(
					'<input class="gt3-image_advanced" name="_cpt_%1$s_images" type="hidden" value="%2$s">
			<div class="gt3-media-view" data-mime-type="%3$s" data-max-files="%4$s" data-force-delete="%5$s" data-show-status="%6$s"></div>',
					self::post_type,
					esc_attr(get_post_meta($post->ID, sprintf('_cpt_%s_images', self::post_type), true)),
					'image',
					false,
					false,
					1
				);
				echo '<input type="hidden" id="cpt_gt3_gallery_images_count" name="_cpt_gt3_gallery_images_count" value="'.esc_attr(get_post_meta($post->ID, '_cpt_gt3_gallery_images_count', true)).'"/>';
			}
		}

		public function render_meta_box_type($post){
			if(get_post_type() === self::post_type) {
				$type = get_post_meta($post->ID, sprintf('_cpt_%s_type', self::post_type), true);
				if(!is_string($type)) {
					$type = '';
				}

				?>
				<p><?php esc_html_e('Gallery Type', 'gt3pg_pro'); ?></p>
				<select name="_cpt_gt3_gallery_type" style="width: 100%; max-width: 250px">
					<?php
					$types = array(
						''        => esc_html__('Defaults', 'gt3pg_pro'),
						'grid'    => esc_html__('Grid', 'gt3pg_pro'),
						'masonry' => esc_html__('Masonry', 'gt3pg_pro'),
						'packery' => esc_html__('Packery', 'gt3pg_pro'),
					);
					foreach($types as $key => $name) {
						echo '<option value="'.$key.'" '.($type === $key ? 'selected' : '').'>'.$name.'</option>';
					}
					?>
				</select><br />
				<p>Shortcode <span href="javascript:void(0)" style="display: none;" class="tooltip" title="<?php echo esc_attr('Shortcode') ?>">[?]</span></p>
				<input type="text" style="width: 100%; text-align: center; max-width: 250px" readonly="readonly"
				       value="<?php echo esc_attr(sprintf('[gt3-gallery id="%s"]', $post->ID)); ?>"
				       title="Click to copy" onclick="copy_shortcode_<?php echo $post->ID ?>(this)" />
				<script>
					function copy_shortcode_<?php echo $post->ID?>(input) {
						input.select();
						try {
							document.execCommand('copy');
							wp && wp.data && wp.data.dispatch
							&& wp.data.dispatch('core/notices').createNotice
							&& wp.data.dispatch('core/notices').createNotice('error', 'Shortcode Copied', {type: 'snackbar'})
						} catch (e) {

						}
					}

					jQuery(function ($) {
						jQuery('.tooltip').tooltip({
							position: {
								my: "center bottom-20",
								at: "center top",
								using: function (position, feedback) {
									$(this).css(position);
									$("<div>")
									// .addClass("arrow")
										.appendTo(this);
								}
							}
						})
					})
				</script>
				<?php
			}
		}

		public function manage_posts_columns(){
			return array(
				'cb'           => '<input type="checkbox" />',
				'thumbnail'    => esc_html__('Image', 'gt3pg_pro'),
				'title'        => esc_html__('Title', 'gt3pg_pro'),
				self::taxonomy => esc_html__('Category', 'gt3pg_pro'),
				'date'         => esc_html__('Date', 'gt3pg_pro'),
				'count'        => esc_html__('Count', 'gt3pg_pro'),
			);
		}

		public function manage_posts_custom_column($column, $post_id){
			$this_url = $_SERVER['REQUEST_URI'];
			switch($column) {
				case 'thumbnail':
					if(get_post_thumbnail_id($post_id)) {
						$img_src = wp_get_attachment_image_src(get_post_thumbnail_id($post_id));
						echo '<img width="50" height="50" src="'.$img_src[0].'" />';
					} else {
						$gallery = self::get_gallery_images($post_id);
						$echo    = '';
						if(is_array($gallery) && count($gallery)) {
							foreach($gallery as $image) {
								$image_id = $image;
								if(is_array($image)) {
									$image_id = $image['id'];
								} else if(is_string($image) || is_numeric($image)) {
									$image_id = intval($image);
								}
								$img_src = wp_get_attachment_image_src($image_id);
								$echo    = '<img width="50" height="50" src="'.$img_src[0].'" />';
								if(!empty($echo)) {
									break;
								}
							}
						}
						if(empty($echo)) {
							$echo = '<img width="50" height="50" src="'.plugins_url('/static/img/add-images.jpg', __FILE__).'" alt="'.esc_attr__('No Image Selected', 'gt3pg_pro').'"/>';
						}
						echo $echo;
					}
					echo '</div>';
					break;

				case self::taxonomy:
					$this_url  = remove_query_arg($column, $this_url);
					$post_cats = wp_get_post_terms($post_id, self::taxonomy);
					$cats      = array();
					foreach($post_cats as $post_cat_term) {
						if(!empty($_GET[$column]) && $_GET[$column] == $post_cat_term->slug) {
							$cats[] = '<b><a href="'.$this_url.'">'.$post_cat_term->name.'</a></b>';
						} else {
							$cats[] = '<a href="'.add_query_arg(array( $column => $post_cat_term->slug ), $this_url).'">'.$post_cat_term->name.'</a>';
						}
					}
					if(count($cats)) {
						echo implode(', ', $cats);
					}
					break;
				case 'count':
					$count = get_post_meta($post_id, sprintf('_cpt_%s_count_images', self::post_type), true);
					if($count === '') {
						// Try count from images
						$gallery = self::get_gallery_images($post_id);
						if(is_array($gallery) && count($gallery)) {
							$count = count($gallery);
						} else {
							$count = 0;
						}
					}
					echo $count;
					break;
			}
		}

		public function save_post($post_id){
			if((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			   || !current_user_can('edit_post', $post_id)
			   || get_post_type() !== self::post_type
//			   || get_current_screen()->is_block_editor()
			) {
				return;
			}
			$field     = '_cpt_gt3_gallery_images';
			$save_data = (!isset($_POST[$field]) || empty($_POST[$field])) ? '' : $_POST[$field];
			$count     = 0;
			try {
				$gallery = stripslashes($save_data);
				if(!empty($gallery)) {
					$temp_gallery = json_decode($gallery, true);
					if(!json_last_error()) {
						$gallery = $temp_gallery;
					}

					if(!is_array($gallery) && (is_string($gallery) || is_numeric($gallery))) {
						$gallery = explode(',', (string) $gallery);
					}
				}
				if(!is_array($gallery)) {
					$gallery = array();
				}
				$count = count($gallery);
			} catch(\Exception $ex) {

			}
			update_post_meta($post_id, $field, $save_data);
			update_post_meta($post_id, '_cpt_gt3_gallery_images_count', $count);

			$field     = '_cpt_gt3_gallery_type';
			$save_data = (!isset($_POST[$field]) || empty($_POST[$field])) ? '' : $_POST[$field];
			update_post_meta($post_id, $field, $save_data);
		}


		public static function get_gallery_images($post_id, $with_id = false){
			$gallery = get_post_meta($post_id, '_cpt_gt3_gallery_images', true);

			if(!empty($gallery)) {
				try {
					$temp_gallery = json_decode($gallery, true);
					if(!json_last_error()) {
						$gallery = $temp_gallery;
					}
				} catch(Exception $ex) {

				}

				if(!is_array($gallery) && (is_string($gallery) || is_numeric($gallery))) {
					$gallery = explode(',', (string) $gallery);
				}
			}
			if(!is_array($gallery)) {
				$gallery = array();
			}
			if($with_id !== false && count($gallery)) {
				$gallery_temp = array();
				foreach($gallery as $image) {
					$gallery_temp[] = array(
						'id' => $image,
					);
				}
				$gallery = $gallery_temp;
			}

			return $gallery;
		}

		public static function get_galleries(){
			static $galleries = false;
			if($galleries) {
				return $galleries;
			}
			$galleries = array();
			$args      = array(
				'post_status'    => 'publish',
				'post_type'      => self::post_type,
				'posts_per_page' => -1,
			);

			$posts = new \WP_Query($args);
			if($posts->post_count > 0) {
				/* @var \WP_Post $gallery */
				foreach($posts->posts as $gallery) {
					$count                   = count(self::get_gallery_images($gallery->ID));
					$galleries[$gallery->ID] = (!empty($gallery->post_title) ? $gallery->post_title : esc_html__('(No Title)', 'gt3pg_pro')).(' ('.$count.' '._n('image', 'images', $count, 'gt3pg_pro').')');
				}
			}
			wp_reset_postdata();

			return $galleries;
		}

		public static function get_galleries_categories(){
			static $categories = false;
			if($categories) {
				return $categories;
			}
			$categories = array();

			$terms = get_terms(array(
				'taxonomy'   => self::taxonomy,
				'hide_empty' => true,
			));
			if(is_array($terms) && count($terms)) {
				/* @var \WP_Term $term */
				foreach($terms as $term) {
					$categories[$term->slug] = $term->name.' ('.$term->slug.')';
				}
			}

			return $categories;
		}

		public function admin_enqueue_scripts(){
			global $typenow, $pagenow, $action;
			if($typenow === self::post_type
			   && (($pagenow === 'post.php' && $action === 'edit') || $pagenow === 'post-new.php')) {

				wp_enqueue_style(
					'gt3-cpt-gallery-media',
					GT3PG_PRO_CSSURL.'admin/cpt-gallery-page.css',
					array(),
					filemtime(GT3PG_PRO_CSSPATH.'admin/cpt-gallery-page.css')
				);

				wp_enqueue_media();
				wp_enqueue_script('media-grid');
				wp_enqueue_script('media');

//				wp_enqueue_style('gt3-cpt-gallery', plugins_url('/static/cpt-gallery.css', __FILE__), array(), self::VERSION);

				wp_enqueue_script('block-library');
				wp_enqueue_script('editor');
				wp_enqueue_script('wp-editor');
				wp_enqueue_script('wp-components');
				wp_enqueue_script('jquery-ui-tooltip');

				wp_enqueue_style('wp-components');
				wp_enqueue_style('wp-element');
				wp_enqueue_style('wp-blocks-library');

				wp_enqueue_script(
					'gt3-cpt-gallery-media',
					GT3PG_PRO_JSURL.'admin/cpt-gallery-page.js',
					array(
						'jquery-ui-tabs',
						'jquery-ui-accordion',
						'wp-i18n',
						'imagesloaded',
					),
					filemtime(GT3PG_PRO_JSPATH.'admin/cpt-gallery-page.js'),
					true
				);
			}
		}

		public function initTinyMCE(){
			global $typenow;

			if(!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
				return;
			}

			// verify the post type that the user will work with
			if(!in_array($typenow, array( 'gt3_gallery' ))) {
				return;
			}

			// check if WYSIWYG is enabled
			add_filter('mce_external_plugins', array( $this, 'add_mce_external_plugins' ));
			add_filter('mce_buttons_4', array( $this, 'add_mcs_buttons' ));
		}

		public function add_mce_external_plugins($plugin_array){
			$plugin_array['gt3_cpt_buttons'] = plugins_url('/static/tiny-mce.js', __FILE__);

			return $plugin_array;
		}

		public function add_mcs_buttons($buttons){
			array_push($buttons, 'gt3_cpt_add_gallery');

			return $buttons;
		}

		function the_content($content){
			global $post;

			if($post->post_type === self::post_type) {
				if(!has_shortcode($content, 'gt3-gallery')) {
					$content = '[gt3-gallery]'.$content;
				}
			}

			return $content;
		}

		public function render_shortcode($atts, $content, $tag){
			global $post;
			static $rendered = false;
			$atts = shortcode_atts(array(
				'id'   => $post->ID,
				'type' => '',
			), $atts);
			if(($post->post_type === self::post_type && $rendered) || !did_action('wp_print_scripts')) {
				return '';
			}

			$rendered = true;

			$settings = $this->getSettings('gt3_gallery');
			if(empty($atts['type'])) {
				$atts['type'] = get_post_meta($atts['id'], '_cpt_gt3_gallery_type', true);
			}
			if($atts['type'] === '') {
				$atts['type'] = $settings['defaultType'];
			}
			if(!in_array($atts['type'], array( 'grid', 'masonry', 'packery' ))) {
				$atts['type'] = 'grid';
			}
			$gallery = sprintf('GT3\PhotoVideoGalleryPro\Block\%1$s', ucfirst($atts['type']));

			if(class_exists($gallery)) {
				/* @var GT3\PhotoVideoGalleryPro\Block\Basic $gallery */
				$gallery                  = $gallery::instance();
				$gallery->defaultSettings = $this->getSettings();

				$settings = array_merge(
					$settings,
					array(
						'_uid'           => substr(md5($atts['id'].$post->post_type), 0, 8),
						'_blockName'     => $atts['type'],
						'fromElementor'  => true,
						'className'      => '',
						'blockAlignment' => '',
						'ids'            => self::get_gallery_images($atts['id']),
					), $atts);

				$content = $gallery->render_block($settings);

				return $content;
			}

			return '';

		}

		public function get_template($templates){
			$object = get_queried_object();
			if($object->post_type === self::post_type) {
				if(is_array($templates) && count($templates)) {
					foreach($templates as &$template) {
						$template = str_replace('single', 'page', $template);
					}
				}
			}

			return $templates;
		}


	}

	\GT3_Post_Type_Gallery::instance();

}


