<?php
/**
 * View: Top Bar - Navigation
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/components/top-bar/nav.php
 *
 * See more documentation about our views templating system.
 *
 * @link {INSERT_ARTCILE_LINK_HERE}
 *
 * @version 4.9.13
 *
 * @var string $prev_url The URL to the previous page, if any, or an empty string.
 * @var string $next_url The URL to the next page, if any, or an empty string.
 */
?>
<nav class="tribe-events-c-top-bar__nav tribe-common-a11y-hidden">
	<ul class="tribe-events-c-top-bar__nav-list">
		<?php
		if ( ! empty( $prev_url ) ) {
			$this->template( 'components/top-bar/nav/prev', [ 'link' => $prev_url ] );
		} else {
			$this->template( 'components/top-bar/nav/prev-disabled' );
		}
		?>

		<?php
		if ( ! empty( $next_url ) ) {
			$this->template( 'components/top-bar/nav/next', [ 'link' => $next_url ] );
		} else {
			$this->template( 'components/top-bar/nav/next-disabled' );
		}
		?>
	</ul>
</nav>
