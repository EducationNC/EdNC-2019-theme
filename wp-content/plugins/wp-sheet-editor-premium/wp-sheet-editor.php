<?php
/*
  Plugin Name: WP Sheet Editor (Premium)
  Description: Bulk edit posts and pages easily using a beautiful spreadsheet inside WordPress.
  Version: 2.16.0
  Author: WP Sheet Editor
  Author URI: https://wpsheeteditor.com/?utm_source=wp-admin&utm_medium=plugins-list&utm_campaign=posts
  Plugin URI: https://wpsheeteditor.com/extensions/posts-pages-post-types-spreadsheet/?utm_source=wp-admin&utm_medium=plugins-list&utm_campaign=posts
  License:     GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Text Domain: vg_sheet_editor_posts
  Domain Path: /lang
  @fs_premium_only /modules/user-path/send-user-path.php, /modules/acf/, /modules/advanced-filters/, /modules/columns-renaming/, /modules/custom-post-types/, /modules/formulas/, /modules/custom-columns/, /modules/spreadsheet-setup/, /modules/woocommerce/, /modules/universal-sheet/, /modules/yoast-seo/, /modules/posts-templates/, /whats-new/
 */

if (!defined('ABSPATH')) {
	exit;
}
if (function_exists('vgse_freemius')) {
	vgse_freemius()->set_basename(true, __FILE__);
}


if (!defined('VGSE_MAIN_FILE')) {
	define('VGSE_MAIN_FILE', __FILE__);
}
if (!defined('VGSE_DIST_DIR')) {
	define('VGSE_DIST_DIR', __DIR__);
}
require_once 'inc/freemius-init.php';

if (!class_exists('WP_Sheet_Editor_Dist')) {

	class WP_Sheet_Editor_Dist {

		static private $instance = false;
		var $modules_controller = null;
		var $textname = 'vg_sheet_editor_posts';
		var $sheets_bootstrap = null;

		private function __construct() {
			
		}

		/**
		 * Creates or returns an instance of this class.
		 */
		static function get_instance() {
			if (null == WP_Sheet_Editor_Dist::$instance) {
				WP_Sheet_Editor_Dist::$instance = new WP_Sheet_Editor_Dist();
				WP_Sheet_Editor_Dist::$instance->init();
			}
			return WP_Sheet_Editor_Dist::$instance;
		}

		function notify_wrong_core_version() {
			$plugin_data = get_plugin_data(__FILE__, false, false);
			?>
			<div class="notice notice-error">
				<p><?php _e('Please update the WP Sheet Editor plugin and all its extensions to the latest version, the CORE plugin should be version 2.5.2 or higher. The plugin "' . $plugin_data['Name'] . '" requires that version.', WP_Sheet_Editor_Dist::get_instance()->textname); ?></p>
			</div>
			<?php
		}

		function init() {
			require_once __DIR__ . '/modules/init.php';
			$this->modules_controller = new WP_Sheet_Editor_CORE_Modules_Init(__DIR__, vgse_freemius());
			add_action('plugins_loaded', array($this, 'late_init'));
			// After core has initialized
			add_filter('vg_sheet_editor/after_init', array($this, 'after_core_init'));
			add_action('init', array($this, 'after_init'));
		}

		function after_init() {
			load_plugin_textdomain($this->textname, false, basename(dirname(__FILE__)) . '/lang/');
		}

		/**
		 * Redirect to welcome page after plugin activation
		 */
		function redirect_to_welcome_page() {
			// Bail if no activation redirect
			$flag_key = 'vgse_welcome_redirect';
			$flag = get_option($flag_key, '');

			if ($flag === 'no') {
				return;
			}
			update_option($flag_key, 'no');

			// Disable "whats new" redirect
			update_option('vgse_hide_whats_new_' . VGSE()->version, 'yes');

			// Bail if activating from network, or bulk			
			if (is_network_admin() || isset($_GET['activate-multi'])) {
				return;
			}

			$welcome_url = esc_url(add_query_arg(array('page' => 'vg_sheet_editor_setup'), admin_url('admin.php')));
			wp_redirect($welcome_url);
			exit();
		}

		function after_core_init() {
			if (version_compare(VGSE()->version, '2.5.2') < 0) {
				$this->notify_wrong_core_version();
				return;
			}
			add_action('admin_init', array($this, 'redirect_to_welcome_page'));
			// Enable admin pages in case "frontend sheets" addon disabled them
			add_filter('vg_sheet_editor/register_admin_pages', '__return_true', 11);
			
			// We register early. So plugins for specific post types can overwrite the toolbar item.
			add_action('vg_sheet_editor/editor/before_init', array($this, 'register_toolbar_items'), 9);

			// Set up posts editor.
			// Allow to bootstrap editor manually, later.
			if (!apply_filters('vg_sheet_editor/bootstrap/manual_init', false)) {
				$this->sheets_bootstrap = new WP_Sheet_Editor_Bootstrap();
			}
			add_action('admin_init', array($this, 'disable_free_plugins_when_premium_active'), 1);
		}

		function register_toolbar_items($editor) {
			if (!$editor->provider->is_post_type) {
				return;
			}
			if (!current_user_can('manage_options')) {
				return;
			}
			$editor->args['toolbars']->register_item('wpse_license', array(
				'type' => 'button',
				'content' => __('My license', WP_Sheet_Editor_Dist::get_instance()->textname),
				'extra_html_attributes' => ' target="_blank" ',
				'url' => vgse_freemius()->get_account_url(),
				'toolbar_key' => 'secondary',
				'allow_in_frontend' => false,
					), $editor->args['provider']);
		}

		function disable_free_plugins_when_premium_active() {
			$free_plugins_path = array(
				'wp-sheet-editor-bulk-spreadsheet-editor-for-posts-and-pages/wp-sheet-editor.php',
				'wp-sheet-editor-woocommerce-inventory/woocommerce-inventory.php'
			);
			$premium_plugins_path = array(
				'wp-sheet-editor-bulk-spreadsheet-editor-for-posts-and-pages-premium/wp-sheet-editor.php',
				'wp-sheet-editor-premium/wp-sheet-editor.php',
			);
			$is_premium_active = false;

			foreach ($premium_plugins_path as $relative_path) {
				if (is_plugin_active($relative_path)) {
					$is_premium_active = true;
					break;
				}
			}
			if ($is_premium_active) {
				foreach ($free_plugins_path as $relative_path) {
					$path = wp_normalize_path(WP_PLUGIN_DIR . '/' . $relative_path);
					if (is_plugin_active($relative_path)) {
						deactivate_plugins(plugin_basename($path));
					}
				}
			}
		}

		function late_init() {
			if (function_exists('vgse_freemius')) {
				if (vgse_freemius()->can_use_premium_code__premium_only()) {
					add_filter('vg_sheet_editor/whats_new_page/items', array($this, 'add_whats_new_items__premium_only'));
					add_filter('redux/options/' . VGSE()->options_key . '/sections', array($this, 'allow_to_disable_extension_offerings__premium_only'));
					if (!empty(VGSE()->options['be_disable_extension_offerings'])) {
						add_filter('vg_sheet_editor/extensions/is_toolbar_allowed', '__return_false');
						add_filter('vg_sheet_editor/extensions/is_page_allowed', '__return_false');
					}
				}
			}

			add_filter('vg_sheet_editor/allowed_post_types', array($this, 'enable_basic_post_types'));
		}

		function enable_basic_post_types($post_types) {
			if (!isset($post_types['post'])) {
				$post_types['post'] = 'Posts';
			}
			if (!isset($post_types['page'])) {
				$post_types['page'] = 'Page';
			}
			return $post_types;
		}

		function allow_to_disable_extension_offerings__premium_only($sections) {
			$sections[1]['fields'][] = array(
				'id' => 'be_disable_extension_offerings',
				'type' => 'switch',
				'title' => __('Disable extension offerings?', WP_Sheet_Editor_Dist::get_instance()->textname),
				'default' => false,
			);
			return $sections;
		}

		function add_whats_new_items__premium_only($items) {
			$path = __DIR__ . '/whats-new/' . VGSE()->version . '.php';

			if (!file_exists($path)) {
				return $items;
			}
			include $path;

			return array_merge($items, $pro_items);
		}

		function __set($name, $value) {
			$this->$name = $value;
		}

		function __get($name) {
			return $this->$name;
		}

	}

}
WP_Sheet_Editor_Dist::get_instance();
