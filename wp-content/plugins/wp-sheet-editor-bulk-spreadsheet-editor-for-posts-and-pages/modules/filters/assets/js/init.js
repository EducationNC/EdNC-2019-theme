jQuery(document).ready(function(){var o=jQuery("#be-filters"),n=o.parents(".remodal");if(!o.length)return!0;n.submit(function(e){e.preventDefault();var t=o.serialize();return o.find("select.select2").each(function(){var e=jQuery(this);e.val()||(t+="&"+e.attr("name")+"=")}),beAddRowsFilter(t),vgseReloadSpreadsheet(),n.find(".remodal-cancel").trigger("click"),!1}),vgse_editor_settings.last_session_filters&&(beAddRowsFilter(vgse_editor_settings.last_session_filters),vgseCustomTooltip(jQuery(".vgse-current-filters a").last(),vgse_editor_settings.texts.last_session_filters_notice,"right"))}),jQuery(document).ready(function(){jQuery("body").on("vgSheetEditor:beforeRowsInsert",function(e,t){if(void 0===window.cellLocatorAlreadyInit){window.cellLocatorAlreadyInit=!0;var o=document.getElementById("cell-locator-input");o&&Handsontable.dom.addEvent(o,"keyup",function(e){if(13==e.keyCode){var t=hot.getPlugin("search").query(this.value);t.length?hot.scrollViewportTo(t[0].row,t[0].col,!0):this.value&&alert("Cells not found. Try with another search criteria."),hot.render(),jQuery("#responseConsole .rows-located").length||jQuery("#responseConsole").append('. <span class="rows-located" />'),jQuery("#responseConsole .rows-located").text(t.length+" cells located")}})}if(void 0===window.columnLocatorAlreadyInit){window.columnLocatorAlreadyInit=!0;var n=document.getElementById("column-locator-input");n&&Handsontable.dom.addEvent(n,"keyup",function(e){if(13==e.keyCode){var t=hot.getSettings().colHeaders,o=null,n=this.value.toLowerCase(),s=0;t.forEach(function(e,t){e&&-1<e.toLowerCase().indexOf(n)&&(0===s&&(o=t),s++)}),null!==o?hot.selectColumns(o):this.value&&(alert(vgse_editor_settings.texts.column_not_found),vgse_editor_settings.texts.hint_missing_column_on_scroll&&notification({mensaje:vgse_editor_settings.texts.hint_missing_column_on_scroll,tipo:"info",time:4e4,position:"bottom"})),jQuery("#responseConsole .columns-located").length||jQuery("#responseConsole").append('. <span class="columns-located" />'),jQuery("#responseConsole .columns-located").text(s+" columns located")}})}})});