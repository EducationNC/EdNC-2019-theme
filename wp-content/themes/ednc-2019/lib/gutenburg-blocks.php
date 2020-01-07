<?php

// use Roots\Sage\Anchor;

/**
 * Register Blocks
 * @see https://www.billerickson.net/building-gutenberg-block-acf/#register-block
 *
 */



function be_register_blocks() {
	if( ! function_exists('acf_register_block') )
		return;
  acf_register_block( array(
    'name'			=> 'block-quote',
    'title'			=> __( 'Block-Quote', 'clientname' ),
    'render_template'	=> 'templates/gutenberg/block-quote.php',
    'category'		=> 'formatting',
    'icon'			=> 'admin-users',
    'mode'			=> 'preview',
		'icon'			=> 'format-quote',
    'keywords'		=> array( 'blockquote', 'quote', 'block-quote' )
  ));
	acf_register_block( array(
		'name'			=> 'trust-project-block',
		'title'			=> __( 'Trust Project Block', 'clientname' ),
		'render_template'	=> 'templates/gutenberg/trust-project.php',
		'category'		=> 'formatting',
		'icon'			=> 'admin-users',
		'mode'			=> 'preview',
		'icon'			=> 'format-quote',
		'keywords'		=> array( 'trustproject', 'trust', 'trust-project' )
	));
  acf_register_block( array(
    'name'			=> 'longform-intro',
    'title'			=> __( 'Full-Bleed Text', 'clientname' ),
    'render_template'	=> 'templates/gutenberg/longform-intro.php',
    'category'		=> 'formatting',
    'icon'			=> 'admin-users',
    'mode'			=> 'preview',
		'icon'			=> 'format-aside',
    'keywords'		=> array( 'longform', 'intro', 'long-form' )
  ));
	acf_register_block( array(
		'name'			=> 'center-quote',
		'title'			=> __( 'Center Quote', 'clientname' ),
		'render_template'	=> 'templates/gutenberg/center-quote.php',
		'category'		=> 'formatting',
		'icon'			=> 'admin-users',
		'mode'			=> 'preview',
		'icon'			=> 'format-aside',
		'keywords'		=> array( 'center', 'quote', 'middle' )
	));
	acf_register_block( array(
		'name'			=> 'recommended-articles-inline-block',
		'title'			=> __( 'Recommended Articles Block', 'clientname' ),
		'render_template'	=> 'templates/gutenberg/recommended-articles-inline-block.php',
		'category'		=> 'formatting',
		'icon'			=> 'admin-users',
		'mode'			=> 'preview',
		'icon'			=> 'format-aside',
		'keywords'		=> array( 'center', 'quote', 'middle' )
	));
	acf_register_block( array(
		'name'			=> 'gallery-block-acf',
		'title'			=> __( 'Gallery', 'clientname' ),
		'render_template'	=> 'templates/gutenberg/gallery.php',
		//'render_callback' => 'my_acf_block_render_callback',
		'category'	=> 'formatting',
		'icon'			=> 'admin-users',
		'mode'			=> 'preview',
		'icon'			=> 'format-gallery',
		'keywords'		=> array ( 'gallery', 'images', 'image' ),
		'supports' => array(
			'align' => array( 'left', 'right', 'center', 'wide' ),
		 ),
	));
	acf_register_block( array(
		'name'			=> 'table-of-contents',
		'title'			=> 'Table of Contents',
		'description'		=> '',
		'render_template'	=> 'templates/gutenberg/block-table-of-contents.php',
		'category'		=> 'widgets',
		'icon'			=> 'list-view',
	));
	acf_register_block( array(
		'name'			=> 'recommended-articles-float-right',
		'title'			=> 'Top Reads',
		'description'		=> '',
		'render_template'	=> 'templates/gutenberg/recommended-articles-float-right.php',
		'category'		=> 'widgets',
		'mode'			=> 'preview',
		'icon'			=> 'list-view',
	));
	acf_register_block( array(
		'name'			=> 'slider',
		'title'			=> 'Slider',
		'description'		=> '',
		'render_template'	=> 'templates/gutenberg/slider.php',
		'category'		=> 'widgets',
		'mode'			=> 'preview',
		'icon'			=> 'image-flip-horizontal',
	));
}

add_action('acf/init', 'be_register_blocks' );



function tabor_gutenberg_color_palette() {
  add_theme_support( 'align-wide' );
  add_theme_support('editor-styles');
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Light-blue', '@@textdomain' ),
				'slug' => 'light-blue',
				'color' => '#5CADD6',
			),
			array(
				'name'  => esc_html__( 'Med-Blue', '@@textdomain' ),
				'slug' => 'med-blue',
				'color' => '#3399CC',
			),
      array(
        'name'  => esc_html__( 'blueish', '@@textdomain' ),
        'slug' => 'blueish',
        'color' => '#4E6CA5',
      ),
      array(
        'name'  => esc_html__( 'Blue', '@@textdomain' ),
        'slug' => 'blue',
        'color' => '#384E77',
      ),
      array(
        'name'  => esc_html__( 'Dark-Blue', '@@textdomain' ),
        'slug' => 'dark-blue',
        'color' => '#25283D',
      ),
      array(
        'name'  => esc_html__( 'Light-Orange', '@@textdomain' ),
        'slug' => 'light-orange',
        'color' => '#F6B042',
      ),
      array(
        'name'  => esc_html__( 'Orange', '@@textdomain' ),
        'slug' => 'orange',
        'color' => '#F49C11',
      ),
      array(
        'name'  => esc_html__( 'Pink', '@@textdomain' ),
        'slug' => 'pink',
        'color' => '#EC6A56',
      ),
      array(
        'name'  => esc_html__( 'Red', '@@textdomain' ),
        'slug' => 'red',
        'color' => '#E94F37',
      ),
      array(
        'name'  => esc_html__( 'Yellow', '@@textdomain' ),
        'slug' => 'yellow',
        'color' => '#FFD700',
      ),
      array(
        'name'  => esc_html__( 'Light-Green', '@@textdomain' ),
        'slug' => 'light-green',
        'color' => '#B0C05E',
      ),
      array(
        'name'  => esc_html__( 'Green', '@@textdomain' ),
        'slug' => 'green',
        'color' => '#98A942',
      ),
      array(
        'name'  => esc_html__( 'Light-Gray', '@@textdomain' ),
        'slug' => 'light-gray',
        'color' => '#DCDFE5',
      ),
      array(
        'name'  => esc_html__( 'Medium-Gray', '@@textdomain' ),
        'slug' => 'medium-gray',
        'color' => '#777A80',
      ),
      array(
        'name'  => esc_html__( 'Dark-Gray', '@@textdomain' ),
        'slug' => 'dark-gray',
        'color' => '#44474D',
      ),
      array(
        'name'  => esc_html__( 'Black', '@@textdomain' ),
        'slug' => 'black',
        'color' => '#12151',
      ),
      array(
        'name'  => esc_html__( 'Light-Purple', '@@textdomain' ),
        'slug' => 'light-purple',
        'color' => '#901969',
      ),
      array(
        'name'  => esc_html__( 'Purple', '@@textdomain' ),
        'slug' => 'purple',
        'color' => '#731454',
      ),
      array(
        'name'  => esc_html__( 'Dark-Purple', '@@textdomain' ),
        'slug' => 'dark-purple',
        'color' => '#5C1043',
      ),
      array(
        'name'  => esc_html__( 'White', '@@textdomain' ),
        'slug' => 'white',
        'color' => '#FFFFFF',
      )
		)
	);
}
add_action( 'after_setup_theme', 'tabor_gutenberg_color_palette' );

/*
function ea_register_acf_blocks() {
	// check function exists
	if( ! function_exists('acf_register_block') )
		return;
		acf_register_block( array(
			'name'			=> 'table-of-contents',
			'title'			=> __( 'Table of Contents', 'client-name' ),
			'description'		=> '',
			'render_template'	=> 'templates/gutenberg/block-table-of-contents.php',
			'category'		=> 'widgets',
			'icon'			=> 'list-view',
		));
}
add_action( 'acf/init', 'ea_register_acf_blocks' );
*/

/**
 * Table of Contents
 *
 */
function ea_table_of_contents( $count = false ) {
	global $post;
	$content = apply_filters( 'ea_anchor_header', $post->post_content );
	$content;
	$doc = new DOMDocument();
	// START LibXML error management.
	// Modify state
	$libxml_previous_state = libxml_use_internal_errors( true );
	$doc->loadHTML( mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ) );
	// handle errors
	libxml_clear_errors();
	// restore
	libxml_use_internal_errors( $libxml_previous_state );
	// END LibXML error management.
	$headings = $doc->getElementsByTagName( 'h2' );
	$output = array();
	foreach( $headings as $heading ) {
		$output[] = '<li><a href="#' . sanitize_title( $heading->nodeValue ) . '">' . $heading->nodeValue . '</a></li>';
	}
	if( empty( $output ) )
		return;
	if( false !== $count )
		$output = array_slice( $output, 0, $count );
	echo '<div class="table-of-contents toc-no-span">';
	echo '<h6 class="toc rd"><span>Chapters</span></h6>';
	echo '<ol>' . join( PHP_EOL, $output ) . '</ol>';
	echo '</div>';
}


/**
 * Disable Editor
 *
 * @package      ClientName
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Templates and Page IDs without editor
 *
 */
function ea_disable_editor( $id = false ) {

	$excluded_templates = array(
		'template-page-flex-content.php',
	);

	$excluded_ids = array(
		// get_option( 'page_on_front' )
	);

	if( empty( $id ) )
		return false;

	$id = intval( $id );
	$template = get_page_template_slug( $id );

	return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
}

/**
 * Disable Gutenberg by template
 *
 */
function ea_disable_gutenberg( $can_edit, $post_type ) {

	if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
		return $can_edit;

	if( ea_disable_editor( $_GET['post'] ) )
		$can_edit = false;

	return $can_edit;

}
add_filter( 'gutenberg_can_edit_post_type', 'ea_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'ea_disable_gutenberg', 10, 2 );

/**
 * Disable Classic Editor by template
 *
 */
function ea_disable_classic_editor() {

	$screen = get_current_screen();
	if( 'page' !== $screen->id || ! isset( $_GET['post']) )
		return;

	if( ea_disable_editor( $_GET['post'] ) ) {
		remove_post_type_support( 'page', 'editor' );
	}

}
add_action( 'admin_head', 'ea_disable_classic_editor' );
