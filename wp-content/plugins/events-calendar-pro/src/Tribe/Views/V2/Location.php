<?php
namespace Tribe\Events\Pro\Views\V2;

/**
 * Class managing Location loading for the Views V2.
 *
 * @package Tribe\Events\Pro\Views\V2
 * @since   TBD
 */
class Location {
	/**
	 * Includes the location field to the Views form when Pro is active.
	 *
	 * @since  TBD
	 *
	 * @param string $file      Complete path to include the PHP File
	 * @param array  $name      Template name
	 * @param self   $template  Current instance of the Tribe__Template
	 *
	 * @return string
	 */
	public function include_form_field( $file, $name, $template ) {
		$disable_tribe_bar = tribe_is_truthy( tribe_get_option( 'tribeDisableTribeBar', false ) );

		if ( $disable_tribe_bar ) {
			return '';
		}

		$hide_location_search = tribe_is_truthy( tribe_get_option( 'hideLocationSearch', false ) );

		if ( $hide_location_search ) {
			return '';
		}

		if ( ! tribe_is_using_basic_gmaps_api() ) {
			return '';
		}

		if ( ! tribe_is_map() ) {
			return '';
		}

		return tribe( Templates::class )->template( 'location/form-field', $template->get_values() );
	}
}
