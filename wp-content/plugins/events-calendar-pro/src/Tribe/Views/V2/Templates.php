<?php
/**
 * The base template all Views templates will use to locate, manage and render their HTML code.
 *
 * @package Tribe\Events\Pro\Views\V2
 * @since   TBD
 */

namespace Tribe\Events\Pro\Views\V2;

use Tribe__Template as Base_Template;

/**
 * Class Events Pro Views V2 Templates loader
 *
 * @package Tribe\Events\Pro\Views\V2
 * @since   TBD
 */
class Templates extends Base_Template {

	/**
	 * Template constructor.
	 *
	 * @since  TBD
	 *
	 * @param  string $slug The slug the template should use to build its path.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->set_template_origin( tribe( 'events-pro.main' ) )
		     ->set_template_folder( 'src/views/v2' )
		     ->set_template_folder_lookup( true )
		     ->set_template_context_extract( true );
	}
}
