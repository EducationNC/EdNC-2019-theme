<?php
namespace Tribe\Events\Pro\Views\V2;

/**
 * Class managing Recurrence loading for the Views V2.
 *
 * @package Tribe\Events\Pro\Views\V2
 * @since   TBD
 */
class Recurrence {
	/**
	 * Includes the Hide recurring action to the Views when Pro is active.
	 *
	 * @since  TBD
	 *
	 * @param string $file      Complete path to include the PHP File
	 * @param array  $name      Template name
	 * @param self   $template  Current instance of the Tribe__Template
	 *
	 * @return string
	 */
	public function include_hide_recurring_events( $file, $name, $template ) {
		return tribe( Templates::class )->template( 'recurrence/hide-recurring', $template->get_values() );
	}
}
