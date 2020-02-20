<?php

if (!class_exists('WPSE_Terms_WPML')) {

	class WPSE_Terms_WPML {

		static private $instance = false;

		private function __construct() {
			
		}

		function init() {
			if (!defined('ICL_SITEPRESS_VERSION')) {
				return;
			}
			add_action('vg_sheet_editor/terms/taxonomy_edited', array($this, 'after_taxonomy_edited'), 10, 4);
		}

		function after_taxonomy_edited($term_id, $old_taxonomy, $new_taxonomy, $term) {
			global $wpdb;
			$wpdb->update(
					$wpdb->prefix . 'icl_translations', array(
				'element_type' => 'tax_' . $new_taxonomy
					), array(
				'element_id' => $term['term_taxonomy_id'],
				'element_type' => 'tax_' . $old_taxonomy
					), array('%s'), array('%d')
			);
		}

		/**
		 * Creates or returns an instance of this class.
		 */
		static function get_instance() {
			if (null == WPSE_Terms_WPML::$instance) {
				WPSE_Terms_WPML::$instance = new WPSE_Terms_WPML();
				WPSE_Terms_WPML::$instance->init();
			}
			return WPSE_Terms_WPML::$instance;
		}

		function __set($name, $value) {
			$this->$name = $value;
		}

		function __get($name) {
			return $this->$name;
		}

	}

}

if (!function_exists('WPSE_Terms_WPML_Obj')) {

	function WPSE_Terms_WPML_Obj() {
		return WPSE_Terms_WPML::get_instance();
	}

}
// After core has initialized
add_action('vg_sheet_editor/initialized', 'WPSE_Terms_WPML_Obj');
