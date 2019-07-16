<?php
/**
 * The interface all shortcodes should implement.
 *
 * @package Tribe\Events\Pro\Views\V2
 * @since   TBD
 */
namespace Tribe\Events\Pro\Views\V2\Shortcodes;

/**
 * Interface Shortcode_Interface
 *
 * @package Tribe\Events\Pro\Views\V2\Shortcodes
 * @since   TBD
 */
interface Shortcode_Interface {

	/**
	 * Returns the shortcode slug.
	 *
	 * The slug should be the one that will allow the shortcode to be built by the shortcode class by slug.
	 *
	 * @since  TBD
	 *
	 * @return string The shortcode slug.
	 */
	public function get_registration_slug();

	/**
	 * Configures the base variables for an instance of shortcode.
	 *
	 * @since  TBD
	 *
	 * @param array  $arguments Set of arguments passed to the Shortcode at hand.
	 * @param string $content   Contents passed to the shortcode, inside of the open and close brackets.
	 *
	 * @return void
	 */
	public function setup( array $arguments, string $content );

	/**
	 * Returns the arguments for the shortcode parsed correctly with defaults applied.
	 *
	 * @since TBD
	 *
	 * @param array  $arguments Set of arguments passed to the Shortcode at hand.
	 *
	 * @return array
	 */
	public function parse_arguments( array $arguments );

	/**
	 * Returns the array of arguments for this shortcode after applying the validation callbacks.
	 *
	 * @since TBD
	 *
	 * @param array  $arguments Set of arguments passed to the Shortcode at hand.
	 *
	 * @return array
	 */
	public function validate_arguments( array $arguments );

	/**
	 * Returns the array of callbacks for this shortcode's arguments.
	 *
	 * @since TBD
	 *
	 * @return array
	 */
	public function get_validate_arguments_map();

	/**
	 * Returns a shortcode default arguments.
	 *
	 * @since TBD
	 *
	 * @return array
	 */
	public function get_default_arguments();

	/**
	 * Returns a shortcode arguments after been parsed.
	 *
	 * @since TBD
	 *
	 * @return array
	 */
	public function get_arguments();

	/**
	 * Returns a shortcode argument after been parsed.
	 *
	 * @uses  Tribe__Utils__Array::get For index fetching and Default.
	 *
	 * @since TBD
	 *
	 * @param array  $index   Which index we indent to fetch from the arguments.
	 * @param array  $default Default value if it doesnt exist.
	 *
	 * @return array
	 */
	public function get_argument( $index, $default = null );

	/**
	 * Returns a shortcode HTML code.
	 *
	 * @since TBD
	 *
	 * @return string
	 */
	public function get_html();
}