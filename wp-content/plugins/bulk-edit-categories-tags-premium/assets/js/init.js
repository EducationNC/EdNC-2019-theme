(function (Handsontable) {
	function wpTermHierarchyLevel(hotInstance, td, row, column, prop, value, cellProperties) {
		// Optionally include `BaseRenderer` which is responsible for adding/removing CSS classes to/from the table cells.
		Handsontable.renderers.BaseRenderer.apply(this, arguments);

		var postType = jQuery('#post-data').data('post-type');
		var columnSettings = vgse_editor_settings.final_spreadsheet_columns_settings[prop];
		var levels = parseInt(value);
		var html = '';
		if (levels) {
			for (var i = 0; i < levels; i++) {
				html += ' &#8212; ';
			}
		}
		html = '<i class="fa fa-lock vg-cell-blocked"></i> ' + html;

		td.innerHTML = html;
		return td;
	}

	// Register an alias
	Handsontable.renderers.registerRenderer('wp_term_hierarchy_level', wpTermHierarchyLevel);

})(Handsontable);
jQuery(document).ready(function () {

	if (typeof hot === 'undefined') {
		return true;
	}
	/**
	 * Disable post status cells that contain readonly statuses.
	 * ex. scheduled posts
	 */

	if (typeof hot.getSettings().manualRowMove === 'boolean' && hot.getSettings().manualRowMove) {
		jQuery('head').append('<style>#vgse-wrapper .htCore th .rowHeader {    background: url(' + wpse_tt_data.sort_icon_url + ') no-repeat right -1px;    padding: 0 15px 0 0;    cursor: grab;    width: 15px;    display: inline-block;}</style>');
	}

	if (vgse_editor_settings.post_type === vgse_editor_settings.woocommerce_product_post_type_key) {
		hot.updateSettings({
			beforeRowMove: function (rows, target) {
				console.log('rows', rows, 'target', target);
				var nextId = hot.getDataAtRowProp(target, 'ID');
				rows.forEach(function (rowIndex) {
					var movedId = hot.getDataAtRowProp(rowIndex, 'ID');

					jQuery.post(ajaxurl, {action: 'woocommerce_term_ordering', id: movedId, nextid: nextId, thetaxonomy: jQuery('#post-data').data('post-type')}, function (response) {
						console.log('response: ', response);
					});
				});


			}
		});
	}

});
