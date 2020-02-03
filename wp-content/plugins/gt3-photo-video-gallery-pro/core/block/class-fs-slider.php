<?php

namespace GT3\PhotoVideoGalleryPro\Block;

use GT3\PhotoVideoGalleryPro\Help\Types;

defined('ABSPATH') OR exit;

class FS_Slider extends Isotope_Gallery {
	protected function getDefaultsAttributes(){
		return array_merge(
			parent::getDefaultsAttributes(),
			array(
				'ytWidth'           => array(
					'type'    => 'string',
					'default' => 'default',
				),
				'autoplay'          => array(
					'type'    => 'string',
					'default' => 'default',
				),
				'interval'          => array(
					'type'    => 'string',
					'default' => '6',
				),
				'thumbnails'        => array(
					'type'    => 'string',
					'default' => 'default',
				),
				'showTitle'         => array(
					'type'    => 'string',
					'default' => 'default',
				),
				'showCaption'       => array(
					'type'    => 'string',
					'default' => 'default',
				),
				'scroll'            => array(
					'type'    => 'string',
					'default' => 'default',
				),
				'boxed'             => array(
					'type'    => 'string',
					'default' => 'default',
				),
				'cover'             => array(
					'type'    => 'string',
					'default' => 'default',
				),
				'imageSize'         => array(
					'type'    => 'string',
					'default' => 'default',
				),
				'socials'           => array(
					'type'    => 'string',
					'default' => 'default',
				),
				'download'          => array(
					'type'    => 'string',
					'default' => 'default',
				),
				'theme'             => array(
					'type'    => 'string',
					'default' => 'default',
				),
				'footerAboveSlider' => array(
					'type'    => 'string',
					'default' => 'default',
				),
				'textColor'         => array(
					'type'    => 'string',
					'default' => 'default',
				),
				'borderOpacity'     => array(
					'type'    => 'float',
					'default' => 'default',
				),

			)
		);
	}

	protected function getCheckTypeSettings(){
		return array_merge(
			parent::getCheckTypeSettings(),
			array(
				'ytWidth'           => Types::TYPE_BOOL,
				'autoplay'          => Types::TYPE_BOOL,
				'interval'          => Types::TYPE_INT,
				'thumbnails'        => Types::TYPE_BOOL,
				'showTitle'         => Types::TYPE_BOOL,
				'showCaption'       => Types::TYPE_BOOL,
				'scroll'            => Types::TYPE_BOOL,
				'boxed'             => Types::TYPE_BOOL,
				'cover'             => Types::TYPE_BOOL,
				'socials'           => Types::TYPE_BOOL,
				'download'          => Types::TYPE_BOOL,
				'allowZoom'         => Types::TYPE_BOOL,
				'footerAboveSlider' => Types::TYPE_BOOL,
				'borderOpacity'     => Types::TYPE_FLOAT,
			)
		);
	}

	protected $name = 'fsslider';

	protected function renderItem($image, &$settings){
		$this->active_image_size = $settings['imageSize'];

		if($settings['lightbox']) {
			$lightbox_item               = $this->getLightboxItem($image, $settings);
			$settings['lightboxArray'][] = $lightbox_item;
		}

		return '';
	}

	protected function render($settings){
		$this->checkImagesNoEmpty($settings);

		if(!count($settings['ids'])) {
			return;
		}

		$this->add_render_attribute('_wrapper', 'class', 'gt3-photo-gallery-pro--isotope_gallery');
		$this->add_render_attribute('_wrapper', 'class', 'gt3pg_pro_FSSlider');

		if($this->is_editor) {
			$settings['boxed'] = true;
		}

		$settings['lightbox'] = true;
		if(count($settings['ids']) === 1) {
			$settings['autoplay'] = false;
		}

		if($settings['random']) {
			shuffle($settings['ids']);
		}
		if($settings['imageSize'] === 'thumbnail') {
			$settings['imageSize'] = 'medium_large';
		}
		$settings['lightboxArray'] = array();
		if(!isset($GLOBALS['gt3pg']) || !is_array($GLOBALS['gt3pg']) ||
		   !isset($GLOBALS['gt3pg']['extension']) || !is_array($GLOBALS['gt3pg']['extension']) ||
		   !isset($GLOBALS['gt3pg']['extension']['pro_optimized'])
		) {
			if($settings['imageSize'] === 'gt3pg_optimized') {
				$settings['imageSize'] = 'large';
			}
		}
		$settings['lightboxImageSize'] = $settings['imageSize'];
		if($settings['rightClick']) {
			$this->add_render_attribute('wrapper', array(
				'oncontextmenu' => 'return false',
				'onselectstart' => 'return false'
			));
		}
		$this->add_render_attribute('wrapper', 'class', array(
			'gt3pg-isotope-gallery',
			'gallery-'.$this->name,
			sprintf('animation_type--%s', $settings['animationType']),
			'thumbnails--'.($settings['cover'] ? 'cover' : 'normal'),
			$settings['externalVideoThumb'] ? 'video-thumbnails-hidden' : '',
		));

		if($settings['ytWidth']) {
			$this->add_render_attribute('wrapper', 'class', 'youtube-16x9');
		}

		$dataSettings                    = array(
			'boxed'    => $settings['boxed'],
			'lightbox' => $settings['lightbox'],
			'id'       => $this->render_index,
			'lazyLoad' => false,
		);
		$dataSettings['lightboxOptions'] = array(
			'stretchImages'              => $settings['cover'],
			'scroll'                     => $settings['scroll'],
			'thumbnailIndicators'        => $settings['thumbnails'],
			'indicatorType'              => 'slider',
			'startSlideshow'             => $settings['autoplay'],
			'slideshowInterval'          => $settings['interval']*1000,
			'instance'                   => $this->render_index,
			'fsSliderFooterAboveEnable'  => $settings['footerAboveSlider'],
			'transitionSpeed'            => 300,
			'toggleControlsOnSlideClick' => false,
			'rightClick'                 => $settings['rightClick'],
			'externalPosters'            => $settings['externalVideoThumb'],
			'animationType'              => $settings['animationType'],
		);

		$this->add_style(
			array(
				'.gt3pg_pro_gallery_wrap .gt3pg_pro_fsslider_footer',
				'.gt3pg_pro_gallery_wrap .gt3pg_pro_socials',
			),
			array(
				'color: %s' => $settings['textColor'],
			)
		);

		$this->add_style(
			array(
				'.gt3pg_pro_fsslider_footer > div:not(.gt3pg_pro_thumbnails_wrapper)::before',
				'.gt3pg_pro_fsslider_footer > div:not(.gt3pg_pro_thumbnails_wrapper)::after'
			),
			array(
				'opacity: %s' => $settings['borderOpacity'],
			)
		);

		if($settings['autoplay']) {
			$this->add_style('.gt3pg_pro_fsslider_footer .gt3pg_pro.autoplay_indicator .gt3pg_pro_duration', array(
				'animation-duration: %ss' => $settings['interval'],
			));
		}

		foreach($settings['ids'] as $id) {
			$this->renderItem($id, $settings);
		}

		$dataSettings['lightboxArray'] = $settings['lightboxArray'];
		$dataSettings['uid']           = $this->_id;
		$dataSettings['id']            = $this->render_index;

		$this->add_render_attribute('wrapper', array(
			'data-images'   => wp_json_encode(array()),
			'data-settings' => wp_json_encode($dataSettings)
		));

		?>
		<div <?php $this->print_render_attribute_string('wrapper'); ?>>
			<div class="gallery-isotope-wrapper">
				<div id="popup_gt3_elementor_gallery-<?php echo $this->_id ?>"
				     class="gt3pg_pro_gallery_wrap gt3pg_pro_wrap_controls gt3pg_pro_version_pro gt3pg_pro_gallery_type_slider gt3pg_pro_FullScreenSlider">
					<div class="gt3pg_pro_slides"></div>
					<div class="gt3pg_pro_socials">
						<div class="gt3pg_pro_socials_container">
							<a href="javascript:void(0)" class="gt3pg_pro_share_twitter" target="_blank"><i class="fa fa-twitter"></i></a>
							<a href="javascript:void(0)" class="gt3pg_pro_share_facebook" target="_blank"><i class="fa fa-facebook"></i></a>
							<a href="javascript:void(0)" class="gt3pg_pro_share_pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
						</div>
					</div>
					<div class="gt3pg_pro_fsslider_footer">
						<div class="gt3_pro_socials_button_wrapper">
							<a href="javascript:void(0)" class="gt3pg_pro_socials_button">
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48.665px" height="48.665px" viewBox="0 0 48.665 48.665"
								     style="enable-background:new 0 0 48.665 48.665;" xml:space="preserve"><g>
										<path d="M40.332,31.592c-2.377,0-4.515,1-6.033,2.598l-17.737-8.686c0.061-0.406,0.103-0.82,0.103-1.246c0-0.414-0.04-0.818-0.098-1.215l17.711-8.589c1.519,1.609,3.666,2.619,6.054,2.619c4.603,0,8.333-3.731,8.333-8.333c0-4.603-3.73-8.333-8.333-8.333s-8.333,3.73-8.333,8.333c0,0.414,0.04,0.817,0.098,1.215l-17.709,8.589c-1.519-1.609-3.666-2.619-6.054-2.619C3.73,15.925,0,19.656,0,24.258c0,4.603,3.73,8.333,8.333,8.333c2.377,0,4.515-1,6.033-2.596l17.736,8.685c-0.062,0.406-0.104,0.82-0.104,1.245c0,4.604,3.73,8.333,8.333,8.333s8.333-3.729,8.333-8.333C48.665,35.322,44.935,31.592,40.332,31.592z" />
									</g></svg>
							</a>
						</div>
						<div class="gt3pg_pro_title_wrap">
							<div>
								<?php if($settings['showTitle']) { ?>
									<div class="gt3pg_pro_title gt3pg_pro_clip"></div>
								<?php } ?>
								<?php if($settings['showCaption']) { ?>
									<div class="gt3pg_pro_description gt3pg_pro_clip"></div>
								<?php } ?>
							</div>
						</div>
						<?php
						if($settings['thumbnails']) {
							?>
							<div class="thumbnails_button_wrap">
								<a href="javascript:void(0)" class="gt3pg_pro_button_thumbnails">
									<span class="btn_thumb1"></span>
									<span class="btn_thumb2"></span>
									<span class="btn_thumb3"></span>
									<span class="btn_thumb4"></span>
								</a>
							</div>
							<?php
						}
						?>
						<div class="gt3pg_pro_controls">
							<div class="gt3pg_pro_prev_wrap gt3pg_pro_prev">
								<div class="gt3_slider_arrow">
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									     width="284.935px" height="284.936px" viewBox="0 0 284.935 284.936" style="enable-background:new 0 0 284.935 284.936;"
									     xml:space="preserve"><g>
											<path d="M110.488,142.468L222.694,30.264c1.902-1.903,2.854-4.093,2.854-6.567c0-2.474-0.951-4.664-2.854-6.563L208.417,2.857
		C206.513,0.955,204.324,0,201.856,0c-2.475,0-4.664,0.955-6.567,2.857L62.24,135.9c-1.903,1.903-2.852,4.093-2.852,6.567
		c0,2.475,0.949,4.664,2.852,6.567l133.042,133.043c1.906,1.906,4.097,2.857,6.571,2.857c2.471,0,4.66-0.951,6.563-2.857
		l14.277-14.267c1.902-1.903,2.851-4.094,2.851-6.57c0-2.472-0.948-4.661-2.851-6.564L110.488,142.468z" />
										</g></svg>
								</div>
							</div>
							<?php if($settings['autoplay']) {
								echo '<div class="gt3pg_pro_autoplay_wrap gt3pg_pro_autoplay_button">
									<div class="gt3pg_pro_play-pause"></div>
								</div>';
							} ?>
							<div class="gt3pg_pro_next_wrap gt3pg_pro_next">
								<div class="gt3_slider_arrow">
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									     width="284.935px" height="284.936px" viewBox="0 0 284.935 284.936" style="enable-background:new 0 0 284.935 284.936;"
									     xml:space="preserve">
<g>
	<path d="M222.701,135.9L89.652,2.857C87.748,0.955,85.557,0,83.084,0c-2.474,0-4.664,0.955-6.567,2.857L62.244,17.133
		c-1.906,1.903-2.855,4.089-2.855,6.567c0,2.478,0.949,4.664,2.855,6.567l112.204,112.204L62.244,254.677
		c-1.906,1.903-2.855,4.093-2.855,6.564c0,2.477,0.949,4.667,2.855,6.57l14.274,14.271c1.903,1.905,4.093,2.854,6.567,2.854
		c2.473,0,4.663-0.951,6.567-2.854l133.042-133.044c1.902-1.902,2.854-4.093,2.854-6.567S224.603,137.807,222.701,135.9z" />
</g></svg>
								</div>
							</div>
						</div>
						<div class="gt3pg_pro_caption_wrap">
							<div class="gt3pg_pro_caption_current"></div>
							<?php if($settings['autoplay']) {
								echo '<div class="gt3pg_pro autoplay_indicator">
									<svg class="gt3pg_pro_svg" width="32" height="2" viewport="0 0 32 2" version="1.1" xmlns="http://www.w3.org/2000/svg">
										<line stroke="#e0e0e0e" stroke-width="2" x1="0.0" x2="100%" y1="1" y2="1" />
										<line class="gt3pg_pro_svg_animate gt3pg_pro_duration" stroke="#fff" stroke-width="2"
										      x1="0.0" x2="100%" y1="1" y2="1"
										      stroke-dasharray="160" stroke-dashoffset="16" />
									</svg>
								</div>';
							} else {
								echo '<span class="gt3pg_pro_FSSlider_divider">/</span>';
							} ?>
							<div class="gt3pg_pro_caption_all"></div>
						</div>
						<div class="gt3_pro_controls_button">
							<a href="javascript:void(0)" class="gt3pg_pro_button_fullsize">
								<span class="btn_thumb1"></span>
								<span class="btn_thumb2"></span>
								<span class="btn_thumb3"></span>
								<span class="btn_thumb4"></span>
								<svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd"
									      d="M0 0H19V15H11V13.3333H17.3479V1.66667H1.65222V7H0V0ZM9.08696 9.16667H0V15H9.08696V9.16667ZM7.43483 10.8333H1.65222V13.3333H7.43483V10.8333ZM11.0635 7.18714L15.027 3.1889L15.9012 3.94628L11.8761 8.00665L15.2661 8.00761L15.265 9.16669H9.9133L9.91309 3.76761H11.0635V7.18714Z"
									      fill="#ffffff" />
								</svg>
							</a>
						</div>
						<div class="gt3pg_pro_thumbnails_wrapper">
							<div class="gt3pg_pro_thumbnails hide-thumbnails"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

