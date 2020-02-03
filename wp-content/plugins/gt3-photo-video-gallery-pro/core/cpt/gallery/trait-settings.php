<?php

use \GT3\PhotoVideoGalleryPro\Settings;
use \GT3\PhotoVideoGalleryPro\Assets;

trait Settings_Trait {

	private static $settings_option_key = 'gt3_cpt_settings';
	private $settings_options = array();
	private $defaultsSettings = array();

	function load_settings(){
		$options = get_option(self::$settings_option_key, '');
		try {
			if(!is_array($options) && is_string($options)) {
				$options = json_decode($options, true);
				if(json_last_error() || !is_array($options) || !count($options)) {
					$options = array();
				}
			}
		} catch(\Exception $exception) {
			$options = array();
		}

		$options                = array_replace_recursive($this->defaultsSettings, $options);
		$this->settings_options = $options;
	}

	private function initDefaultsSettings(){
		$settings         = Settings::instance();
		$defaultsSettings = $settings->getDefaultsSettings();

		$defaultsSettings['gt3_gallery'] = array(
			'slug'         => 'gt3_gallery',
			'taxonomySlug' => 'gt3_categories',
			'defaultType'  => 'grid',
		);
		$this->defaultsSettings          = $defaultsSettings;

		if(is_admin()) {
			add_action('wp_ajax_cpt-gt3_gallery--save_settings', array( $this, 'ajax_save_settings' ));
			add_action('wp_ajax_cpt-gt3_gallery--flush_rewrite', array( $this, 'ajax_reset_permalinks' ));
		}
	}

	public function ajax_save_settings(){
		header('Content-Type: application/json');

		if(!is_admin() || !current_user_can('manage_options')) {
			wp_die(wp_json_encode(array(
				'saved' => false,
				'error' => 'Auth failed',
			)));
		}

		if (key_exists('reset', $_POST) && true === $_POST['reset']) {
			$this->setSettings($this->getDefaultsSettings());
			wp_die(wp_json_encode(array(
				'saved'           => true,
				'resetPermalinks' => true,
			)));
		}

		if(!key_exists('newSettings', $_POST) || !is_array($_POST['newSettings'])) {
			wp_die(wp_json_encode(array(
				'saved' => false,
				'error' => 'New settings not found',
			)));
		}

		$newSettings = $_POST['newSettings'];

		$oldSettings  = $this->settings_options;
		$changed_slug = false;
		if(
			($oldSettings['gt3_gallery']['slug'] !== $newSettings['gt3_gallery']['slug'])
			|| ($oldSettings['gt3_gallery']['taxonomySlug'] !== $newSettings['gt3_gallery']['taxonomySlug'])
		) {
			$changed_slug = true;
		}
		$this->setSettings($newSettings);

		wp_die(wp_json_encode(array(
			'saved'           => true,
			'resetPermalinks' => $changed_slug,
		)));
	}

	public function ajax_reset_permalinks(){
		header('Content-Type: application/json');

		if(!is_admin() || !current_user_can('manage_options')) {
			wp_die(wp_json_encode(array(
				'saved' => false,
				'error' => 'Auth failed',
			)));
		}

		if(!key_exists('flush', $_POST) || true === $_POST['flush']) {
			wp_die(wp_json_encode(array(
				'saved' => false,
			)));
		}

		flush_rewrite_rules(true);

		wp_die(wp_json_encode(array(
			'saved'           => true,
		)));
	}

	function getSettings($module = false){
		if($module && key_exists($module, $this->settings_options)) {
			return $this->settings_options[$module];
		}

		return $this->settings_options;
	}

	function setSettings($settings){
		if(!is_array($settings) || !count($settings)) {
			return false;
		}
		$this->settings_options = $settings;
		update_option(self::$settings_option_key, wp_json_encode($settings));

		return true;
	}

	function resetSettings(){
		$this->setSettings($this->getDefaultsSettings());
	}

	function getDefaultsSettings(){
		return $this->defaultsSettings;
	}

	public function settings_page(){
		?>
		<div class="gt3pg_admin_wrap">
			<div class="gt3pg_inner_wrap">
				<form action="" method="post" class="gt3pg_page_settings">
					<?php
					if(function_exists('register_block_type')) {
						wp_enqueue_script('block-library');
						wp_enqueue_script('editor');
						wp_enqueue_script('wp-editor');
						wp_enqueue_script('wp-components');

						wp_enqueue_style('wp-components');
						wp_enqueue_style('wp-element');
						wp_enqueue_style('wp-blocks-library');

						wp_enqueue_script('gt3pg_cpt-settings', GT3PG_PRO_JSURL.'admin/cpt-settings.js');

						$settings = Settings::instance();
						$assets   = Assets::instance();

						wp_localize_script(
							'gt3pg_cpt-settings',
							'gt3pg_pro',
							array(
								'defaults' => $this->getSettings(),
								'blocks'   => array_map('strtolower', $settings->getBlocks()),
								'plugins'  => $assets->getPlugins(),
							)
						);
						wp_enqueue_style('gt3pg_cpt-settings', GT3PG_PRO_CSSURL.'admin/cpt-settings.css');
						?>
						<div class="edit-post-layout">
							<div class="edit-post-sidebar">
								<div id="gt3_editor"></div>
							</div>
						</div>
					<?php } ?>
				</form>
			</div>
		</div>
		<?php

	}

}
