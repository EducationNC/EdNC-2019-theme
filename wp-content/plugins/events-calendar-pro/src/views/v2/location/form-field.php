<?php
/**
 * View: Form Location Field
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-pro/views/v2/location/form-field.php
 *
 * See more documentation about our views templating system.
 *
 * @link {INSERT_ARTCILE_LINK_HERE}
 *
 * @version TBD
 */
?>
<div class="tribe-common-form-control-text tribe-common-c-search__input-control tribe-common-c-search__input-control--location">
	<label class="tribe-common-form-control-text__label" for="tribe-events-events-bar-location">
		<?php printf( esc_html__( 'Enter Location. Search for %s by Location.', 'events-pro' ), tribe_get_event_label_plural() ); ?>
	</label>
	<input
		class="tribe-common-form-control-text__input tribe-common-c-search__input tribe-common-c-search__input--icon"
		type="text"
		id="tribe-events-events-bar-location"
		name="tribe-events-views[tribe-bar-location]"
		value="<?php echo esc_attr( tribe_events_template_var( [ 'bar', 'location' ], '' ) ); ?>"
		placeholder="<?php esc_attr_e( 'In a location', 'events-pro' ); ?>"
	/>
</div>
