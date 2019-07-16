<?php
/**
 * The main service provider for PRO support and additions to the Views V2 functions.
 *
 * @since   TBD
 * @package Tribe\Events\Pro\Views\V2
 */

namespace Tribe\Events\Pro\Views\V2;

/**
 * Class Service_Provider
 * @since   TBD
 * @package Tribe\Events\Pro\Views\V2
 */
class Service_Provider extends \tad_DI52_ServiceProvider {

	/**
	 * Binds and sets up implementations.
	 *
	 * @since TBD
	 */
	public function register() {
		if ( ! tribe_events_views_v2_is_enabled() ) {
			return;
		}

		$this->container->singleton( Shortcodes\Manager::class, Shortcodes\Manager::class );
		$this->container->singleton( Recurrence::class, Recurrence::class );
		$this->container->singleton( Location::class, Location::class );
		$this->container->singleton( Templates::class, Templates::class );

		$this->register_hooks();
		$this->register_assets();

		// Register the SP on the container
		$this->container->singleton( 'pro.views.v2.provider', $this );
		$this->container->singleton( static::class, $this );
	}

	/**
	 * Registers the provider handling all the 1st level filters and actions for Views v2.
	 *
	 * @since TBD
	 */
	protected function register_assets() {
		$assets = new Assets( $this->container );
		$assets->register();

		$this->container->singleton( Assets::class, $assets );
	}

	/**
	 * Registers the provider handling all the 1st level filters and actions for Views v2.
	 *
	 * @since TBD
	 */
	protected function register_hooks() {
		$hooks = new Hooks( $this->container );
		$hooks->register();

		// Allow Hooks to be removed, by having the them registred to the container
		$this->container->singleton( Hooks::class, $hooks );
		$this->container->singleton( 'pro.views.v2.hooks', $hooks );
	}


}