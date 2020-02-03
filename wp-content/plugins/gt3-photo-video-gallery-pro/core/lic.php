<?php
defined('ABSPATH') OR exit;

if(!class_exists('gt3pg_pro_plugin_updater') && class_exists('gt3pg_updater')) {
	class gt3pg_pro_plugin_updater extends gt3pg_updater {
		protected $item_id = 21755;
		protected $slug = 'gt3-photo-video-gallery-pro';
		protected $plugin_name = 'GT3 Photo & Video Gallery - Pro';

		private static $instance = null;

		public static function instance($file = null){
			if(!isset(self::$instance) || !(self::$instance instanceof self)) {
				self::$instance = new self($file);
			}

			return self::$instance;
		}

		protected function __construct($file = null){
			parent::__construct($file);
			$plugin = gt3_photo_video_galery_pro::instance();

			add_action('after_setup_theme', function() use ($plugin){
				$sts  = strrev('dilav');
				$cbck = strrev(base64_decode('c25vaXRjYQ=='));
				$fn   = base64_decode('Yzg0ZjljZWE1OGI5OTQzMGU4ZDRjNTY1NWFiNjI5OGY=');
				$tc   = wp_get_theme();
				$ic   = $tc->get('Template');
				!empty($ic) AND $tc = wp_get_theme($ic);
				if('valid' === $this->status
				   || (function_exists($fn) &&
				       'gt3themes' === mb_strtolower($tc->get('Author'))
				      && method_exists($plugin, $cbck))
				) {
					\GT3\PhotoVideoGalleryPro\Autoload::instance()->Init();
					$plugin->{$cbck}();
				}
			});

			add_action('admin_enqueue_scripts', function(){
				wp_enqueue_style(
					'gt3pg-pro-admin-license',
					GT3PG_PRO_CSSURL.'admin.css',
					array(),
					filemtime(GT3PG_PRO_CSSPATH.'admin.css')
				);
			});
		}
	}

	function gt3pg_pro_plugin_updater($file = null){
		return gt3pg_pro_plugin_updater::instance($file);
	}

	gt3pg_pro_plugin_updater::instance(GT3PG_PRO_FILE);
}


