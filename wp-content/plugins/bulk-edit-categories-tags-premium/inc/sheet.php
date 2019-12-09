<?php
if (!class_exists('WPSE_Taxonomy_Terms_Sheet')) {

	class WPSE_Taxonomy_Terms_Sheet extends WPSE_Sheet_Factory {

		function __construct() {
			$allowed_columns = array();

			// @todo Add allowed columns for free version
			if (!wpsett_fs()->can_use_premium_code__premium_only()) {
				$allowed_columns = array(
				);
			}

			parent::__construct(array(
				'fs_object' => wpsett_fs(),
				'post_type' => array($this, 'get_taxonomies_and_labels'),
				'post_type_label' => '',
				'serialized_columns' => array(), // column keys
				'register_default_taxonomy_columns' => false,
				'bootstrap_class' => 'WPSE_Taxonomy_Terms_Spreadsheet_Bootstrap',
				'columns' => array($this, 'get_columns'),
				'allowed_columns' => $allowed_columns,
				'remove_columns' => array(
				), // column keys
			));

			add_filter('vg_sheet_editor/provider/default_provider_key', array($this, 'set_default_provider_for_taxonomies'), 10, 2);

			add_filter('vg_sheet_editor/provider/term/update_item_meta', array($this, 'filter_cell_data_for_saving'), 10, 3);
			add_filter('vg_sheet_editor/provider/term/get_item_meta', array($this, 'filter_cell_data_for_readings'), 10, 5);
			add_filter('vg_sheet_editor/provider/term/get_item_data', array($this, 'filter_cell_data_for_readings'), 10, 6);
			add_filter('vg_sheet_editor/handsontable/custom_args', array($this, 'enable_row_sorting'), 10, 2);
			add_action('vg_sheet_editor/after_enqueue_assets', array($this, 'register_assets'));
			add_action('wp_ajax_woocommerce_term_ordering', array($this, 'woocommerce_term_ordering'), 1);
			add_filter('vg_sheet_editor/columns/blacklisted_columns', array($this, 'blacklist_private_columns'), 10, 2);
			add_filter('vg_sheet_editor/import/find_post_id', array($this, 'find_existing_term_by_slug_for_import'), 10, 6);
			add_action('vg_sheet_editor/import/before_existing_wp_check_message', array($this, 'add_wp_check_message_for_import'));
			add_filter('vg_sheet_editor/import/wp_check/available_columns_options', array($this, 'filter_wp_check_options_for_import'), 10, 2);
			add_filter('vg_sheet_editor/welcome_url', array($this, 'filter_welcome_url'));
			add_action('vg_sheet_editor/filters/after_fields', array($this, 'add_filters_fields'), 10, 2);
			add_filter('vg_sheet_editor/load_rows/wp_query_args', array($this, 'filter_posts'), 10, 2);
			add_filter('terms_clauses', array($this, 'search_by_multiple_parents'), 10, 3);
		}

		function search_by_multiple_parents($pieces, $taxonomies, $args) {

			// Check if our custom argument, 'wpse_term_parents' is set, if not, bail
			if (!isset($args['wpse_term_parents']) || !is_array($args['wpse_term_parents'])
			) {
				return $pieces;
			}

			// If  'wpse_term_parents' is set, make sure that 'parent' and 'child_of' is not set
			if ($args['parent'] || $args['child_of']
			) {
				return $pieces;
			}

			// Validate the array as an array of integers
			$parents = array_map('intval', $args['wpse_term_parents']);

			// Loop through $parents and set the WHERE clause accordingly
			$where = [];
			foreach ($parents as $parent) {
				// Make sure $parent is not 0, if so, skip and continue
				if (0 === $parent) {
					continue;
				}

				$where[] = " tt.parent = '$parent'";
			}

			if (!$where) {
				return $pieces;
			}

			$where_string = implode(' OR ', $where);
			$pieces['where'] .= " AND ( $where_string ) ";

			return $pieces;
		}

		/**
		 * Apply filters to wp-query args
		 * @param array $query_args
		 * @param array $data
		 * @return array
		 */
		function filter_posts($query_args, $data) {
			if (!empty($data['filters'])) {
				$filters = WP_Sheet_Editor_Filters::get_instance()->get_raw_filters($data);

				if (!empty($filters['parent_term_keyword'])) {
					$terms_by_keyword = get_terms(array(
						'hide_empty' => false,
						'update_term_meta_cache' => false,
						'name__like' => $filters['parent_term_keyword'],
						'fields' => 'ids'
					));
					$query_args['wpse_term_parents'] = $terms_by_keyword;
				}
			}

			return $query_args;
		}

		function add_filters_fields($current_post_type, $filters) {
			if (!taxonomy_exists($current_post_type)) {
				return;
			}
			if (is_taxonomy_hierarchical($current_post_type)) {
				?>
				<li>
					<label><?php _e('Parent keyword', VGSE()->textname); ?> <a href="#" class="tipso" data-tipso="<?php _e('We will display all the categories below parent that contains this keyword', VGSE()->textname); ?>">( ? )</a></label>
					<input type="text" name="parent_term_keyword" />							
				</li>
				<?php
			}
		}

		function filter_welcome_url($url) {
			$url = admin_url('admin.php?page=wpsett_welcome_page');
			return $url;
		}

		function filter_wp_check_options_for_import($columns, $taxonomy) {

			if (!taxonomy_exists($taxonomy)) {
				return $columns;
			}
			$columns = array(
				'ID' => $columns['ID'],
				'slug' => $columns['slug']
			);
			return $columns;
		}

		function add_wp_check_message_for_import($taxonomy) {

			if (!taxonomy_exists($taxonomy)) {
				return;
			}
			?>
			<style>.field-find-existing-columns .wp-check-message { display: none; }</style>
			<p class="wp-custom-check-message"><?php _e('We find items that have the same SLUG in the CSV and the WP Field.<br>Please select the CSV column that contains the slug.<br>You must import the slug column if you want to update existing categories, items without slug will be created as new.', vgse_taxonomy_terms()->textname); ?></p>
			<?php
		}

		function find_existing_term_by_slug_for_import($term_id, $row, $taxonomy, $meta_query, $writing_type, $check_wp_fields) {
			if (taxonomy_exists($taxonomy)) {
				$default_term_id = PHP_INT_MAX;
				if (!empty($row['ID']) && in_array('ID', $check_wp_fields)) {
					$term_id = ( term_exists((int) $row['ID'], $taxonomy) ) ? (int) $row['ID'] : null;
				} else {
					if (!empty($row['old_slug']) && in_array('old_slug', $check_wp_fields)) {
						$slug = $row['old_slug'];
					} elseif (!empty($row['slug']) && in_array('slug', $check_wp_fields)) {
						$slug = $row['slug'];
					}
					
					if (!empty($slug)) {
						$term = get_term_by('slug', $slug, $taxonomy);

						if ($term && !is_wp_error($term)) {
							$term_id = $term->term_id;
						}
					}
				}
				if (!$term_id) {
					$term_id = $default_term_id;
				}
			}
			return $term_id;
		}

		function blacklist_private_columns($blacklisted_fields, $provider) {
			if (!in_array($provider, $this->post_type)) {
				return $blacklisted_fields;
			}
			$blacklisted_fields[] = '^product_count_';
			return $blacklisted_fields;
		}

		// WooCommerce returns 0 even on success, so we must return 
		// something to avoid showing the automatic ajax error notification
		// that sheet editor shows
		function woocommerce_term_ordering() {
			echo 1;
		}

		/**
		 * Register frontend assets
		 */
		function register_assets() {
			wp_enqueue_script('wpse-taxonomy-terms-js', plugins_url('/assets/js/init.js', vgse_taxonomy_terms()->args['main_plugin_file']), array(), VGSE()->version, false);
			wp_localize_script('wpse-taxonomy-terms-js', 'wpse_tt_data', array(
				'sort_icon_url' => plugins_url('/assets/imgs/sort-icon.png', vgse_taxonomy_terms()->args['main_plugin_file'])
			));
		}

		function enable_row_sorting($handsontable_args, $provider) {
			if (function_exists('WC') && ( strstr($provider, 'pa_') || in_array($provider, apply_filters('woocommerce_sortable_taxonomies', array('product_cat'))) )) {
				$handsontable_args['manualRowMove'] = true;
			}
			return $handsontable_args;
		}

		function get_taxonomies_and_labels() {

			if (wpsett_fs()->can_use_premium_code__premium_only()) {
				$taxonomies = array_merge(get_taxonomies(array(
					'public' => true,
					'show_ui' => true,
					'_builtin' => true,
								), 'objects'), get_taxonomies(array(
					'show_ui' => true,
					'_builtin' => false,
								), 'objects'));
				$out = array(
					'post_types' => array_values(wp_list_pluck($taxonomies, 'name')),
					'labels' => array_values(wp_list_pluck($taxonomies, 'label')),
				);
			} else {
				$out = array(
					'post_types' => array('category', 'post_tag'),
					'labels' => array('Blog categories', 'Blog tags'),
				);
			}

			return $out;
		}

		function set_default_provider_for_taxonomies($provider_class_key, $provider) {
			if (taxonomy_exists($provider)) {
				$provider_class_key = 'term';
			}
			return $provider_class_key;
		}

		function filter_cell_data_for_readings($value, $id, $key, $single, $context, $item = null) {
			if ($context !== 'read' || ( $item && !in_array($item->taxonomy, $this->post_type))) {
				return $value;
			}
			if ($key === 'parent' && $value) {
				$term = VGSE()->helpers->get_current_provider()->get_item($value);
				$value = $term->name;
			}
			if ($key === 'count') {
				$value = (int) $value;
			}

			return $value;
		}

		function filter_cell_data_for_saving($new_value, $id, $key) {
			if (get_post_type($id) !== $this->post_type) {
				return $new_value;
			}

			if ($key === 'taxonomy_term_files' && is_array($new_value)) {
				$new_value = $new_value;
			}

			return $new_value;
		}

		function get_columns() {
			
		}

	}

	$GLOBALS['wpse_taxonomy_terms_sheet'] = new WPSE_Taxonomy_Terms_Sheet();
}