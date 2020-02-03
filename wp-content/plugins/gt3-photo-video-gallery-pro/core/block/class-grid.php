<?php

namespace GT3\PhotoVideoGalleryPro\Block;

defined('ABSPATH') OR exit;

use Elementor\Plugin;
use GT3\PhotoVideoGalleryPro\Settings;
use GT3_Post_Type_Gallery;

class Grid extends Isotope_Gallery {
	protected $isCategoryEnabled = true;

	protected function getDefaultsAttributes(){
		return array_merge(
			parent::getDefaultsAttributes(),
			array(
				'gridType' => array(
					'type'    => 'string',
					'default' => 'default',
				),
			)
		);
	}

	protected $name = 'grid';

	protected function getDeprecatedSettings(){
		return array_merge(
			parent::getDeprecatedSettings(),
			array()
		);
	}

	protected function renderItem($image, &$settings){
		$render                  = '';
		$this->active_image_size = $settings['imageSize'];
		if($settings['lightbox']) {
			$lightbox_item               = $this->getLightboxItem($image, $settings);
			$settings['lightboxArray'][] = $lightbox_item;
		}

		$wrapper_title = $settings['showTitle'] && !empty($image['title']) ? ' title="'.esc_attr($image['title']).'"' : '';

		$render .= '<div class="gt3pg-isotope-item loading '.$image['item_class'].'" '.$wrapper_title.'><div class="isotope_item-wrapper">';
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
		$img_wrapper_class = (($settings['showTitle'] && !empty($image['title'])) || ($settings['showCaption'] && !empty($image['caption']))) ? 'has_text_info' : '';
		$render            .= '<div class="img-wrapper '.esc_attr($img_wrapper_class).'">';
		$render            .= $this->wp_get_attachment_image($image['id'], $settings['imageSize']);
		$render            .= '</div>';
		if($settings['linkTo'] !== 'none') {
			$render .= '</a>';
		}
		$render .= '</div>';
		if(($settings['showTitle'] && !empty($image['title'])) || ($settings['showCaption'] && !empty($image['caption']))) {
			$render .= '<div class="text_info_wrapper">';
			if($settings['showTitle'] && !empty($image['title'])) {
				$render .= '<div class="text_wrap_title">';
				$render .= '<span class="title">'.esc_html($image['title']).'</span>';
				$render .= '</div>';
			}
			if($settings['showCaption'] && !empty($image['caption'])) {
				$render .= '<div class="text_wrap_caption">';
				$render .= '<span class="caption">'.esc_html($image['caption']).'</span>';
				$render .= '</div>';
			}
			$render .= '</div>';
		}
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
			'columns-'.$settings['columns'],
			$settings['hover'],
			'gallery-'.$this->name,
			$settings['gridType'] === 'circle' ? 'circle' : null,
			$settings['externalVideoThumb'] ? 'video-thumbnails-hidden' : '',
		));
		$dataSettings = array(
			'lightbox'  => $settings['lightbox'],
			'id'        => $this->render_index,
			'uid'       => $this->_id,
			'grid_type' => $settings['gridType'],
			'lazyLoad'  => $settings['lazyLoad'],
		);

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
		$this->add_render_attribute('wrapper', 'class', $settings['gridType']);

		$items      = '';
		$foreachIds = $settings['loadMoreEnable']
			? array_slice($settings['ids'], 0, $settings['loadMoreFirst'])
			: $settings['ids'];

		foreach($foreachIds as $id) {
			$items .= $this->renderItem($id, $settings);
		}

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
					'showTitle'         => $settings['showTitle'],
					'linkTo'            => $settings['linkTo'],
					'showCaption'       => $settings['showCaption'],
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
				<div class="isotope-filter<?php echo $settings['filterShowCount'] ? ' with-counts' : '' ?>">
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
				$this->add_render_attribute('loadMoreButtonText', 'href', 'javascript:void(0)');
				$this->add_render_attribute('loadMoreButtonText', 'class', 'view_more_link');
				$this->add_inline_editing_attributes('loadMoreButtonText');

				echo '<a '.$this->get_render_attribute_string('loadMoreButtonText').'>'.esc_html($settings['loadMoreButtonText']).'</a>';
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

