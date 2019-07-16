<?php
/**
 * Handles hooking all the actions and filters used by the module.
 *
 * To remove a filter:
 * remove_filter( 'some_filter', [ tribe( Tribe\Events\Pro\Views\V2\Hooks::class ), 'some_filtering_method' ] );
 * remove_filter( 'some_filter', [ tribe( 'pro.views.v2.hooks' ), 'some_filtering_method' ] );
 *
 * To remove an action:
 * remove_action( 'some_action', [ tribe( Tribe\Events\Pro\Views\V2\Hooks::class ), 'some_method' ] );
 * remove_action( 'some_action', [ tribe( 'pro.views.v2.hooks' ), 'some_method' ] );
 *
 * @since TBD
 *
 * @package Tribe\Events\Pro\Views\V2
 */

namespace Tribe\Events\Pro\Views\V2;

use Tribe\Events\Pro\Views\V2\Views\All_View;

/**
 * Class Hooks.
 *
 * @since TBD
 *
 * @package Tribe\Events\Pro\Views\V2
 */
class Hooks extends \tad_DI52_ServiceProvider {
	/**
	 * Binds and sets up implementations.
	 *
	 * @since TBD
	 */
	public function register() {
		$this->add_actions();
		$this->add_filters();
	}

	/**
	 * Adds the actions required by each Pro Views v2 component.
	 *
	 * @since TBD
	 */
	protected function add_actions() {
		add_action( 'init', [ $this, 'action_disable_shortcode_v1' ], 15 );
		add_action( 'init', [ $this, 'action_add_shortcodes' ], 20 );
		add_action( 'tribe_template_after_include:events/top-bar/actions/content', [ $this, 'action_include_hide_recurring_events' ], 10, 3 );
		add_action( 'tribe_template_after_include:events/events-bar/search/keyword', [ $this, 'action_include_location_form_field' ], 10, 3 );

	}

	/**
	 * Adds the filters required by each Pro Views v2 component.
	 *
	 * @since TBD
	 */
	protected function add_filters() {
		add_filter( 'tribe_events_views', [ $this, 'filter_events_views' ] );
	}

	/**
	 * Filters the available Views to add the ones implemented in PRO.
	 *
	 * @since TBD
	 *
	 * @param array $views An array of available Views.
	 *
	 * @return array The array of available views, including the PRO ones.
	 */
	public function filter_events_views( array $views = [] ) {
		$views['all'] = All_View::class;

		return $views;
	}

	/**
	 * Fires to include the hide recurring template on the end of the actions of the top-bar.
	 *
	 * @since TBD
	 *
	 * @param string $file      Complete path to include the PHP File
	 * @param array  $name      Template name
	 * @param self   $template  Current instance of the Tribe__Template
	 */
	public function action_include_hide_recurring_events( $file, $name, $template ) {
		$this->container->make( Recurrence::class )->include_hide_recurring_events( $file, $name, $template );
	}

	/**
	 * Fires to include the hide recurring template on the end of the actions of the top-bar.
	 *
	 * @since TBD
	 *
	 * @param string $file      Complete path to include the PHP File
	 * @param array  $name      Template name
	 * @param self   $template  Current instance of the Tribe__Template
	 */
	public function action_include_location_form_field( $file, $name, $template ) {
		$this->container->make( Location::class )->include_form_field( $file, $name, $template );
	}

	/**
	 * Fires to disable V1 of shortcodes, normally they would be registered on `init@P10`
	 * so we will trigger this on `init@P15`.
	 *
	 * It's important to leave gaps on priority for better injection.
	 *
	 * @since TBD
	 */
	public function action_disable_shortcode_v1() {
		$this->container->make( Shortcodes\Manager::class )->disable_v1();
	}

	/**
	 * Adds the new shortcodes, this normally will trigger on `init@P20` due to how we the
	 * v1 is added on `init@P10` and we remove them on `init@P15`.
	 *
	 * It's important to leave gaps on priority for better injection.
	 *
	 * @since TBD
	 */
	public function action_add_shortcodes() {
		$this->container->make( Shortcodes\Manager::class )->add_shortcodes();
	}
}
