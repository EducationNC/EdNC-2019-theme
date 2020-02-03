<?php
defined('ABSPATH') OR exit;

class GT3_Lazy_Images {
	private static $instance = null;

	/** @return GT3_Lazy_Images */
	public static function instance(){
		if(is_null(static::$instance)) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	private function __construct(){
		if(is_admin()) {
			return;
		}

		add_filter('wp_kses_allowed_html', array( $this, 'allow_lazy_attributes' ));
		add_action('wp_head', array( $this, 'add_nojs_fallback' ));
	}

	public function setup_filters(){
		add_filter('jetpack_lazy_images_skip_image_with_attributes', '__return_true');
		add_filter('wp_get_attachment_image_attributes', array( $this, 'process_image_attributes' ), PHP_INT_MAX);
	}

	public function remove_filters(){
		remove_filter('jetpack_lazy_images_skip_image_with_attributes', '__return_true');
		remove_filter('wp_get_attachment_image_attributes', array( $this, 'process_image_attributes' ), PHP_INT_MAX);
	}

	public function allow_lazy_attributes($allowed_tags){
		if(!isset($allowed_tags['img'])) {
			return $allowed_tags;
		}

		// But, if images are allowed, ensure that our attributes are allowed!
		$img_attributes = array_merge($allowed_tags['img'], array(
			'data-lazy-src'    => 1,
			'data-lazy-srcset' => 1,
			'data-lazy-sizes'  => 1,
		));

		$allowed_tags['img'] = $img_attributes;

		return $allowed_tags;
	}

	public function should_skip_image_with_blacklisted_class($classes){
		$blacklisted_classes = array(
//			'skip-lazy',
//			'gazette-featured-content-thumbnail',
		);

		$blacklisted_classes = apply_filters('gt3pg_pro_lazy_images_blacklisted_classes', $blacklisted_classes);

		if(!is_array($blacklisted_classes) || empty($blacklisted_classes)) {
			return false;
		}

		foreach($blacklisted_classes as $class) {
			if(false !== strpos($classes, $class)) {
				return true;
			}
		}

		return false;
	}

	public function process_image_attributes($attributes){
		if(empty($attributes['src'])) {
			return $attributes;
		}

		if(!empty($attributes['class']) && $this->should_skip_image_with_blacklisted_class($attributes['class'])) {
			return $attributes;
		}

		$old_attributes = $attributes;

		foreach(array( 'srcset', 'sizes' ) as $attribute) {
			if(isset($old_attributes[$attribute])) {
				$attributes["data-lazy-$attribute"] = $old_attributes[$attribute];
				unset($attributes[$attribute]);
			}
		}

		$attributes['data-lazy-src'] = esc_url_raw(add_query_arg('is-pending-load', true, $attributes['src']));

		$attributes['srcset'] = $this->get_placeholder_image();
		$attributes['class']  = sprintf(
			'%s gt3-lazy-image',
			empty($old_attributes['class'])
				? ''
				: $old_attributes['class']
		);

		return apply_filters('gt3pg_pro_lazy_images_new_attributes', $attributes);
	}

	public function add_nojs_fallback(){

	}

	private function get_placeholder_image(){
		return apply_filters(
			'lazyload_images_placeholder_image',
			'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'
		);
	}
}

GT3_Lazy_Images::instance();
