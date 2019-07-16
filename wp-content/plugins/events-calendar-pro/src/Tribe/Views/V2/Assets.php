<?php
/**
 * Handles registering all Assets for the Events Pro V2 Views
 *
 * To remove a Assets:
 * tribe( 'assets' )->remove( 'asset-name' );
 *
 * @since TBD
 *
 * @package Tribe\Events\Pro\Views\V2
 */
namespace Tribe\Events\Pro\Views\V2;

use Tribe__Events__Pro__Main as Plugin;

/**
 * Register the Assets for Events Pro View V2.
 *
 * @since TBD
 *
 * @package Tribe\Events\Pro\Views\V2
 */
class Assets extends \tad_DI52_ServiceProvider {
	/**
	 * Binds and sets up implementations.
	 *
	 * @since TBD
	 */
	public function register() {
		$plugin = Plugin::instance();

	}
}