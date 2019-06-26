<?php

// namespace Roots\Sage\Anchor;


/**
 * Anchor Header
 *
 * @package      CoreFunctionality
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/
if ( defined( 'ABSPATH' ) ) {
	EA_Anchor_Header::instance();
}
class EA_Anchor_Header {
	/**
	 * Refers to a single instance of this class
	 *
	 * @var null
	 */
	private static $instance = null;
	/**
	 * Creates or returns an instance of this class.
	 *
	 * @since 0.1.8
	 * @return object EA_Anchor_Header, a single instance of this class.
	 */
	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	/**
	 * Load style and attach $this->the_content to the the_content filter
	 *
	 * @since 0.1.0
	 */
	function __construct() {
		add_filter( 'the_content', array( $this, 'the_content' ) );
		add_filter( 'ea_anchor_header', array( $this, 'the_content' ) );
	}
	/**
	 * Using DOMDocument, parse the content and add anchors to headers (H1-H6)
	 *
	 * @since 0.1.0
	 *
	 * @param string  $content The content
	 * @return string          the content, updated if the content has H1-H6
	 */
	function the_content( $content ) {
		if ( ! is_singular() || '' == $content ) {
			return $content;
			$content;
		}
		global $post;
		if( false === strpos( $post->post_content, 'wp:acf/table-of-contents' ) )
			return $content;
		$anchors = array();
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
//		foreach ( array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ) as $h ) {
//			$headings = $doc->getElementsByTagName( $h );
			$headings = $doc->getElementsByTagName( 'h2' );
			foreach ( $headings as $heading ) {
				$a = $doc->createElement( 'a' );
				$newnode = $heading->appendChild( $a );
				$newnode->setAttribute( 'class', 'anchorlink' );
				// @codingStandardsIgnoreStart
				// $heading->nodeValue is from an external libray. Ignore the standard check sinice it doesn't fit the WordPress-Core standard
				$slug = $heading->getAttribute( 'id' );
				if( empty( $slug ) ) {
					$slug = $tmpslug = sanitize_title( $heading->nodeValue );
					// @codingStandardsIgnoreEnd
					$i = 2;
					while ( false !== in_array( $slug, $anchors ) ) {
						$slug = sprintf( '%s-%d', $tmpslug, $i++ );
					}
					$heading->setAttribute( 'id', $slug );
					$heading->setAttribute( 'class', 'h2-margin' );
				}
				$anchors[] = $slug;
				$newnode->setAttribute( 'href', '#' . $slug );
			}
//		}
		return $doc->saveHTML();
	}
} // class EA_Anchor_Header
