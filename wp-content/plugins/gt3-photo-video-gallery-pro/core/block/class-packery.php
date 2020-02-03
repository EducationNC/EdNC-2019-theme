<?php

namespace GT3\PhotoVideoGalleryPro\Block;

defined('ABSPATH') OR exit;

use GT3\PhotoVideoGalleryPro\Help\Types;
use GT3_Post_Type_Gallery;

class Packery extends Isotope_Gallery {
	protected $isCategoryEnabled = true;

	private $packery_grids = array(
		1 => array(
			'lap'  => 6,
			'grid' => 3,
			'elem' => array(
				1 => array( 'w' => 2, 'h' => 2, ),
				3 => array( 'h' => 2, ),
				4 => array( 'w' => 2, ),
				6 => array( 'w' => 2, ),
			)
		),
		2 => array(
			'lap'  => 8,
			'grid' => 4,
			'elem' => array(
				1 => array( 'w' => 2, 'h' => 2, ),
				4 => array( 'w' => 2, ),
				7 => array( 'w' => 2, 'h' => 2, ),
				8 => array( 'w' => 2, ),
			)
		),
		3 => array(
			'lap'  => 10,
			'grid' => 5,
			'elem' => array(
				2  => array( 'h' => 2, ),
				3  => array( 'w' => 2, ),
				4  => array( 'h' => 2, ),
				6  => array( 'w' => 2, 'h' => 2, ),
				7  => array( 'w' => 2, 'h' => 2, ),
				10 => array( 'w' => 2, ),
			)
		),
		4 => array(
			'lap'  => 12,
			'grid' => 4,
			'elem' => array(
				1  => array( 'w' => 2, ),
				6  => array( 'w' => 2, ),
				7  => array( 'w' => 2, ),
				12 => array( 'w' => 2, ),
			)
		),
	);

	protected function getDefaultsAttributes(){
		return array_merge(
			parent::getDefaultsAttributes(),
			array(
				'packery' => array(
					'type'    => 'string',
					'default' => 'default',
				)
			)
		);
	}

	protected $name = 'packery';

	protected function getCheckTypeSettings(){
		return array_merge(parent::getCheckTypeSettings(),
			array(
				'packery' => Types::TYPE_INT,
			)
		);
	}

	protected function renderItem($image, &$settings){
		$render                  = '';
		$this->active_image_size = $settings['imageSize'];

		if($settings['lightbox']) {
			$lightbox_item               = $this->getLightboxItem($image, $settings);
			$settings['lightboxArray'][] = $lightbox_item;
		}

		$render .= '<div class="gt3pg-isotope-item loading '.$image['item_class'].'"><div class="isotope_item-wrapper">';
		if($settings['linkTo'] !== 'none') {
			$link       = '';
			$href_class = '';
			$target     = '';
			switch($settings['linkTo']) {
				case 'post':
					$link = get_permalink($image['id']);
					break;
				case 'lightbox':
					$link       = wp_get_attachment_image_url($image['id'], $settings['imageSize']);
					$href_class = 'gt3pg-lightbox';
					$target     = ' target="_blank"';
					break;
				case 'file':
					$link = wp_get_attachment_image_url($image['id'], $settings['imageSize']);
					break;
			}
			$external_link = get_post_meta($image['id'], 'gt3_external_link_url', true);
			if($external_link) {
				$link       = $external_link;
				$href_class .= ' external-link';
			}
			$render .= '<a href="'.esc_url($link).'" class="'.$href_class.'" '.$target.' data-elementor-open-lightbox="no">';
		}
		$render .= '<div class="img-wrapper">';
		$render .= $this->wp_get_attachment_image($image['id'], $settings['imageSize']);
		$render .= '</div>';
		if($settings['linkTo'] !== 'none') {
			$render .= '</a>';
		}
		$render .= '</div>';
		$render .= '</div>';

		return $render;
	}

	protected function render($settings){
		$this->checkImagesNoEmpty($settings);
		if(!count($settings['ids'])) {
			return;
		}

		$this->add_render_attribute('_wrapper', 'class', 'gt3-photo-gallery-pro--isotope_gallery');

		if($settings['lazyLoad']) {
			\GT3_Lazy_Images::instance()->setup_filters();
		}
		if($settings['random']) {
			shuffle($settings['ids']);
		}
		if($settings['imageSize'] === 'thumbnail') {
			$settings['imageSize'] = 'medium_large';
		}

		if(!key_exists($settings['packery'], $this->packery_grids)) {
			$settings['packery'] = 1;
		}

		$settings['lightboxArray'] = array();
		$settings['lightbox']      = $settings['linkTo'] === 'lightbox';
		$settings['hover']         = !$settings['lightbox'] ? 'hover-none' : 'hover-default';

		if(!isset($GLOBALS['gt3pg']) || !is_array($GLOBALS['gt3pg']) ||
		   !isset($GLOBALS['gt3pg']['extension']) || !is_array($GLOBALS['gt3pg']['extension']) ||
		   !isset($GLOBALS['gt3pg']['extension']['pro_optimized'])
		) {
			if($settings['lightboxImageSize'] === 'gt3pg_optimized') {
				$settings['lightboxImageSize'] = 'large';
			}

			if($settings['imageSize'] === 'gt3pg_optimized') {
				$settings['imageSize'] = 'large';
			}

		}

		if($settings['rightClick']) {
			$this->add_render_attribute('wrapper', array(
				'oncontextmenu' => 'return false',
				'onselectstart' => 'return false'
			));
		}

		$this->add_render_attribute('wrapper', 'class', array(
			'gt3pg-isotope-gallery',
			$settings['hover'],
			'gallery-'.$this->name,
			$settings['externalVideoThumb'] ? 'video-thumbnails-hidden' : '',
		));
		$dataSettings = array(
			'lightbox' => $settings['lightbox'],
			'id'       => $this->render_index,
			'uid'      => $this->_id,
			'lazyLoad' => $settings['lazyLoad'],
		);

		if($settings['lightbox']) {
			$dataSettings['lightboxOptions'] = array(
				'showTitle'           => $settings['lightboxShowTitle'],
				'showCaption'         => $settings['lightboxShowCaption'],
				'allowDownload'       => $settings['allowDownload'],
				'allowZoom'           => $settings['lightboxAllowZoom'],
				'socials'             => $settings['socials'],
				'deepLink'            => $settings['lightboxDeeplink'],
				'stretchImages'       => $settings['lightboxCover'],
				'thumbnailIndicators' => $settings['lightboxThumbnails'],
				'startSlideshow'      => $settings['lightboxAutoplay'],
				'slideshowInterval'   => $settings['lightboxAutoplayTime']*1000, // s -> ms
				'instance'            => static::$index,
				'customClass'         => 'style-'.$settings['lightboxTheme'],
				'rightClick'          => $settings['rightClick'],
				'externalPosters'     => $settings['externalVideoThumb'],
			);

			if($settings['ytWidth']) {
				$dataSettings['lightboxOptions']['ytWidth'] = true;
			}
		}
		$dataSettings['packery'] = $this->packery_grids[$settings['packery']];
		$this->add_style('.gt3pg-isotope-item', array(
			'padding-right: %spx'  => $settings['margin'],
			'padding-bottom: %spx' => $settings['margin'],
		));
		$this->add_style('.gallery-isotope-wrapper', array(
			'margin-right: -%spx'  => $settings['margin'],
			'margin-bottom: -%spx' => $settings['margin'],
		));
		if($settings['loadMoreEnable']) {
			$this->add_style('.view_more_link', array(
				'marginTop: %spx' => $settings['margin'],
			));
		}
		if($settings['borderType']) {
			$this->add_style('.isotope_item-wrapper', array(
				'border: %1$spx solid %2$s' => array( $settings['borderSize'], $settings['borderColor'] ),
				'padding: %spx'             => $settings['borderPadding'],
			));

			if($settings['borderType'] === 'rounded') {
				$this->add_style(array(
					'.isotope_item-wrapper',
					'.img-wrapper'
				), array( 'border-radius: %spx' => $settings['borderPadding']+$settings['borderSize']+5 ));
			}
		}

		$this->add_render_attribute('wrapper', 'class', 'corner-'.$settings['cornersType']);

		$items      = '';
		$foreachIds = $settings['loadMoreEnable']
			? array_slice($settings['ids'], 0, $settings['loadMoreFirst'])
			: $settings['ids'];

		foreach($foreachIds as $id) {
			$items .= $this->renderItem($id, $settings);
		}

		if($settings['lightbox']) {
			$dataSettings['lightboxArray'] = $settings['lightboxArray'];
		}

		if($settings['loadMoreEnable']) {
			$dataSettings['loadMore'] = array(
				'enable'    => true,
				'items'     => array_slice($settings['ids'], $settings['loadMoreFirst']),
				'firstLoad' => $settings['loadMoreFirst'],
				'limit'     => $settings['loadMoreLimit'],
				'ajax'      => array(
					'action'            => 'gt3pg_isotope_load_images',
					'_blockName'        => $this->name,
					'source'            => $settings['source'],
					'imageSize'         => $settings['imageSize'],
					'lightbox'          => $settings['lightbox'],
					'lightboxImageSize' => $settings['lightboxImageSize'],
					'linkTo'            => $settings['linkTo'],
					'lazyLoad'          => $settings['lazyLoad'],
				)
			);
		}

		$this->add_render_attribute('wrapper', array(
			'data-settings' => wp_json_encode($dataSettings)
		));

		?>
		<div <?php $this->print_render_attribute_string('wrapper'); ?>>
			<?php if($settings['filterEnable'] && count($settings['filter_array']) > 1) {
				?>
				<div class="isotope-filter <?php echo $settings['filterShowCount'] ? ' with-counts' : ''?>">
					<?php
					$this->add_inline_editing_attributes('filterText');
					$this->add_render_attribute('filterText', array(
						'class'       => 'active',
						'href'        => '#',
						'data-filter' => '*',
						'data-count'  => $settings['filterCount']['*'],
					));
					echo '<a '.$this->get_render_attribute_string('filterText').'>'.esc_html($settings['filterText']).'</a>';
					ksort($settings['filter_array']);
					foreach($settings['filter_array'] as $cat_slug) {
						echo '<a href="#" data-filter=".'.esc_attr($cat_slug['slug']).'" data-count="'.$settings['filterCount'][$cat_slug['slug']].'">'.esc_html($cat_slug['name']).'</a>';
					}
					?>
				</div>
			<?php } ?>
			<div class="gallery-isotope-wrapper">
				<?php
				echo $items; // XSS Ok
				$this->getPreloader();
				?>
			</div>
			<?php
			if($settings['loadMoreEnable'] && $settings['loadMoreFirst'] < count($settings['ids'])) {
				$settings['loadMoreButtonText'] = esc_html__(!empty($settings['loadMoreButtonText']) ? $settings['loadMoreButtonText'] : 'More', 'gt3pg_pro');
				$this->add_render_attribute('view_more_button', 'href', 'javascript:void(0)');
				$this->add_render_attribute('view_more_button', 'class', 'view_more_link');
				$this->add_inline_editing_attributes('view_more_button');

				echo '<a '.$this->get_render_attribute_string('view_more_button').'>'.esc_html($settings['loadMoreButtonText']).'</a>';
			} // End button
			?>

		</div>

		<?php
		if($settings['lazyLoad']) {
			\GT3_Lazy_Images::instance()->remove_filters();
		}

		return;
	}
}

