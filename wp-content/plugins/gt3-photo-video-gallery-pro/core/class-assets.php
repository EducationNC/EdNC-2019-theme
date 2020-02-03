<?php

namespace GT3\PhotoVideoGalleryPro;
defined('ABSPATH') OR exit;

class Assets {
	private static $instance = null;

	/** @return Assets */
	public static function instance(){
		if(is_null(static::$instance)) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	private $style = array();
	private $responsive_style = array();

	private $pro_enabled;
	private $optimizer_enabled;

	protected $is_rest = false;
	protected $is_editor = false;
	protected $is_elementor_editor = false;

	private function __construct(){
		$this->optimizer_enabled = defined('GT3PG_FHD_PLUGINPATH');
		$this->pro_enabled = defined('GT3PG_PRO_PLUGINPATH') OR defined('GT3PG_PRO_PLUGIN_ROOT_PATH');
		// Frontend
		add_action('wp_enqueue_scripts', array( $this, 'frontend_elementor' ), 5);
//		add_action('elementor/frontend/before_enqueue_scripts', array( $this, 'frontend_elementor' ));
		add_action('enqueue_block_assets', array( $this, 'frontend_gutenberg' ));
		add_action('wp_enqueue_scripts', array( $this, 'frontend_gutenberg' ),5);

		// Admin area
		add_action('elementor/editor/before_enqueue_scripts', array( $this, 'editor_elementor' ));
		add_action('enqueue_block_editor_assets', array( $this, 'editor_gutenberg' ));
		add_action('admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ));

		add_action('init', array( $this, 'init' ));

		remove_action('wp_head', 'gt3pg_wp_head');
		add_action('wp_head', array( $this, 'print_custom_css' ));
	}

	public function init(){
		$this->is_rest             = defined('REST_REQUEST');
		$this->is_elementor_editor = class_exists('\Elementor\Plugin') && \Elementor\Plugin::$instance->editor->is_edit_mode();
		$this->is_editor           = $this->is_rest || $this->is_elementor_editor;
	}

	public function admin_enqueue_scripts(){
		// Styles.
		wp_enqueue_style(
			'gt3pg-pro-blocks-editor',
			GT3PG_PRO_CSSURL.'gutenberg/editor.css',
			array( 'wp-edit-blocks' ),
			filemtime(GT3PG_PRO_CSSPATH.'gutenberg/editor.css')
		);
	}

	public function getPlugins(){
		return array(
			'io'  => $this->optimizer_enabled,
			'pro' => $this->pro_enabled,
		);
	}

	function get_jed_locale_data($domain){
		$translations = get_translations_for_domain($domain);

		$locale = array(
			'' => array(
				'domain' => $domain,
				'lang'   => is_admin() ? get_user_locale() : get_locale(),
			),
		);

		if(!empty($translations->headers['Plural-Forms'])) {
			$locale['']['plural_forms'] = $translations->headers['Plural-Forms'];
		}

		foreach($translations->entries as $msgid => $entry) {
			$locale[$msgid] = $entry->translations;
		}

		return $locale;
	}

	public function frontend_elementor(){

	}


	public function editor_elementor(){

	}

	function frontend_gutenberg(){
		static $loaded = false;
		if ($loaded) return;
		$loaded = true;
		wp_enqueue_style('wp-blocks');
		if(apply_filters('gt3pg-pro/blocks/enable-style', true)) {
			wp_enqueue_style(
				'gt3pg-pro-blocks-frontend',
				GT3PG_PRO_CSSURL.'gutenberg/frontend.css',
				array(),
				filemtime(GT3PG_PRO_CSSPATH.'gutenberg/frontend.css')
			);
		}

		wp_enqueue_script(
			'gt3pg-pro-frontend',
			GT3PG_PRO_JSURL.'gutenberg/frontend.js',
			array(
				'jquery-ui-tabs',
				'jquery-ui-accordion',
				'wp-i18n',
				'imagesloaded',
			),
			filemtime(GT3PG_PRO_JSPATH.'gutenberg/frontend.js'),
			true
		);

		wp_enqueue_script('isotope',
			GT3PG_PRO_JSURL.'isotope.pkgd.min.js',
			array(),
			filemtime(GT3PG_PRO_JSPATH.'/isotope.pkgd.min.js'),
			true);

		$locale  = $this->get_jed_locale_data('gt3pg_pro');
		$content = ';document.addEventListener("DOMContentLoaded", function(){window.wp && wp.i18n && wp.i18n.setLocaleData('.json_encode($locale).', "gt3pg_pro" );;window.ajaxurl = window.ajaxurl || "'.admin_url('admin-ajax.php').'";});';

		wp_script_add_data('gt3pg-pro-frontend', 'data', $content);

		if($this->is_editor) {
			wp_enqueue_script('vimeo_api', 'https://player.vimeo.com/api/player.js', array(), false, true);
			wp_enqueue_script('youtube_api', 'https://www.youtube.com/iframe_api', array(), false, true);
		}
		wp_register_script('vimeo_api', 'https://player.vimeo.com/api/player.js', array(), false, true);
		wp_register_script('youtube_api', 'https://www.youtube.com/iframe_api', array(), false, true);
	}

	/**
	 * Enqueue Gutenberg block assets for backend editor.
	 */
	function editor_gutenberg(){
		static $loaded = false;
		if ($loaded) return;
		$loaded = true;
		wp_enqueue_media();
		wp_enqueue_script('media-grid');
		wp_enqueue_script('media');
		// Scripts.

		wp_enqueue_script('block-library');
		wp_enqueue_script('editor');
		wp_enqueue_script('wp-editor');
		wp_enqueue_script('wp-components');

		wp_enqueue_style('wp-components');
		wp_enqueue_style('wp-element');
		wp_enqueue_style('wp-blocks-library');

		wp_enqueue_script(
			'gt3pg-pro-blocks-editor',
			GT3PG_PRO_JSURL.'gutenberg/editor.js',
			array(
				'wp-url',
				'wp-blocks',
				'wp-i18n',
				// Tabs
				'jquery-ui-tabs',
				'jquery-ui-accordion',
			), // Dependencies, defined above.
			filemtime(GT3PG_PRO_JSPATH.'gutenberg/editor.js'),
			true
		);

		$settings = Settings::instance();

		wp_localize_script(
			'gt3pg-pro-blocks-editor',
			'gt3pg_pro',
			array(
				'defaults' => $settings->getSettings(),
				'blocks'   => array_map('mb_strtolower', $settings->getBlocks()),
				'plugins'  => array(
					'io'  => $this->optimizer_enabled,
					'pro' => $this->pro_enabled,
				)
			)
		);
		$this->admin_enqueue_scripts();
	}

	public function print_custom_css(){
		$customCss = Settings::instance()->getSettings('basic');
		if(key_exists('gt3pg_text_before_head', $customCss) && !empty($customCss['gt3pg_text_before_head'])) {
			echo '<style id="gt3pg_pro-custom-css">'.$customCss['gt3pg_text_before_head'].'</style>';
		}
	}

	public function camelToUnderscore($string, $us = "-"){
		$patterns = array(
			'/([a-z]+)([0-9]+)/i',
			'/([a-z]+)([A-Z]+)/',
			'/([0-9]+)([a-z]+)/i'
		);
		$string   = preg_replace($patterns, '$1'.$us.'$2', $string);

		return mb_strtolower($string);
	}

	public function get_styles($with_tags = true, $getResponsiveStyle = true){
		$style = '';
		if(is_array($this->style) && count($this->style)) {
			foreach($this->style as $selector => $_styles) {
				if(is_array($_styles) && count($_styles)) {
					$_style = '';
					foreach($_styles as $styleName => $value) {
						if(!empty($value)) {
							if(!is_array($value)) {
								$value = array( $value );
							}
							if(substr($styleName, -1, 1) !== ';') {
								$styleName .= ';';
							}
							$_style .= "\t".sprintf($this->camelToUnderscore($styleName), ...$value).PHP_EOL;
						}
					}
					if(!empty($_style)) {
						$style .= $selector.' {'.PHP_EOL.$_style.'}'.PHP_EOL;
					}
				}
			}
		}
		if($getResponsiveStyle) {
			$style .= $this->get_responsive_styles();
		}
		if(!empty($style) && $with_tags) {
			return '<style>'.$style.'</style>';
		}

		return $style;
	}

	/**
	 * @param array|string $selector
	 * @param array|null   $value
	 */
	public function add_style($selector, $value = null){
		$oldStyle = array();
		if(is_array($selector) && count($selector)) {

			foreach($selector as $_selector => $_value) {
				if(is_numeric($_selector)) {
					$_selector = $_value;
					$_value    = $value;
				}
				if(isset($this->style[$_selector])) {
					$oldStyle = $this->style[$_selector];
				} else {
					$oldStyle = array();
				}
				$this->style[$_selector] = array_merge($oldStyle, $_value);
			}
		} else {
			if(isset($this->style[$selector])) {
				$oldStyle = $this->style[$selector];
			} else {
				$oldStyle = array();
			}
			$this->style[$selector] = array_merge($oldStyle, $value);
		}
	}

	public function get_responsive_styles(){
		$style            = '';
		$responsive_style = '';
		if(is_array($this->responsive_style) && count($this->responsive_style)) {
			krsort($this->responsive_style);
			foreach($this->responsive_style as $maxWidth => $_styles) {
				if(is_array($_styles) && count($_styles)) {
					$this->style      = $_styles;
					$responsive_style = $this->get_styles(false, false);
					if(!empty($responsive_style)) {
						$style .= '@media screen and (max-width: '.$maxWidth.'px) {'."\t".PHP_EOL.$responsive_style."\t".PHP_EOL.'}'.PHP_EOL;
					}
				}
			}
		}

		return $style;
	}

	public function add_responsive_style($maxWidth, $selector, $value = null){
		$oldStyle = array();
		if(is_array($selector) && count($selector)) {
			foreach($selector as $_selector => $value) {
				if(isset($this->responsive_style[$maxWidth]) && isset($this->responsive_style[$maxWidth][$_selector])) {
					$oldStyle = $this->responsive_style[$maxWidth][$_selector];
				} else {
					$oldStyle = array();
				}
				$this->responsive_style[$maxWidth][$_selector] = array_merge($oldStyle, $value);
			}
		} else {
			if(isset($this->responsive_style[$maxWidth]) && isset($this->responsive_style[$maxWidth][$selector])) {
				$oldStyle = $this->responsive_style[$maxWidth][$selector];
			} else {
				$oldStyle = array();
			}
			$this->responsive_style[$maxWidth][$selector] = array_merge($oldStyle, $value);
		}
	}

	/**
	 * @param array|string $selector
	 * @param array|string $style
	 * @param array        $block
	 */
	public function add_responsive_block($selector, $style, $block){
		if(is_array($block) && key_exists('default', $block)) {
			if(is_array($selector) && count($selector)) {
				foreach($selector as $_selector) {
					// Default
					if(is_array($style) && count($style)) {
						foreach($style as $_style) {
							$this->add_style($_selector, array( $_style => $block['default'] ));
						}
					} else {
						$this->add_style($_selector, array( $style => $block['default'] ));
					}

					// Responsive
					if(key_exists('responsive', $block)
					   && $block['responsive']
					   && key_exists('data', $block)
					   && is_array($block['data'])
					   && count($block['data'])) {
						foreach($block['data'] as $name => $data) {
							if(is_array($style) && count($style)) {
								foreach($style as $_style) {
									$this->add_responsive_style($data['width'], $_selector, array( $_style => $data['value'] ));
								}
							} else {
								$this->add_responsive_style($data['width'], $_selector, array( $style => $data['value'] ));
							}
						}
					}
				}
			}
		}
	}
}

