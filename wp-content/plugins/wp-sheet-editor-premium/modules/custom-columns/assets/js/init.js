jQuery(document).ready(function(){function e(){jQuery("body").find(".tipso").tipso({size:"small",tooltipHover:!0,background:"#444444"})}function i(e){e=e||jQuery(".column-wrapper"),$name=e.find(".name-field"),e.find(".column-title").length||e.prepend('<h3 class="column-title"><span class="text"></span> <i class="fa fa-chevron-down"></i></h3>'),e.find(".column-title .text").text($name.val())}jQuery(".select2").select2({tags:!0,selectOnBlur:!0}),e(),jQuery("body").append('<div id="ohsnap" style="z-index: -1"></div>'),jQuery(".column-wrapper").each(function(){i(jQuery(this))}),jQuery("body").on("change",".column-wrapper .name-field",function(){var e=jQuery(this).parents(".column-wrapper");i(e);var t=e.find(".key-field"),n=e.find(".name-field");if(!t.val()&&n.val()){var r=n.val();r=r.replace(/(\d+)/gi,"").replace(/(\s+)/gi,"_").replace(/[^a-z\_]/gi,"_").toLowerCase(),t.val(r)}}),jQuery("body").on("click",".column-title",function(){jQuery(this).parents(".column-wrapper").find(".column-fields-wrapper").slideToggle()}),$columnTitles=jQuery(".column-title"),1<$columnTitles.length&&$columnTitles.trigger("click"),jQuery("body").on("click",".add-column",function(){jQuery(this).parents("form").find(".column-wrapper:not(:last)").find(".column-fields-wrapper:visible").each(function(){var e=jQuery(this);e.find(".name-field").val()&&e.slideToggle()}),jQuery(".mode-field").trigger("change"),jQuery(this).parents("form").find(".column-wrapper:last").find(".column-title .text").text(""),e(),jQuery(".select2").select2({tags:!0,selectOnBlur:!0})}),jQuery(".repeater").repeater({initEmpty:!1,defaultValues:vg_sheet_editor_custom_columns.default_values,show:function(){jQuery(this).slideDown(),jQuery(this).find(".select2-container").remove(),jQuery(this).find("select.select2").select2({tags:!0,selectOnBlur:!0})},hide:function(e){confirm(vg_sheet_editor_custom_columns.texts.confirm_delete)&&jQuery(this).slideUp(e)},ready:function(e){},isFirstItemUndeletable:!1}),jQuery(".save").click(function(e){e.preventDefault(),loading_ajax({estado:!0});var t=jQuery(this).parents("form");jQuery.post(t.attr("action"),t.serializeArray(),function(e){loading_ajax({estado:!1}),notification({tipo:e.success?"success":"error",mensaje:e.data})})}),jQuery(".mode-field").change(function(){var r=jQuery(this);["read-only","formulas","hide","rename","cell-type","plain-renderer","formatted-renderer","width","data-source"].forEach(function(e,t){var n=".field-container-"+e;r.is(":checked")?jQuery(n).show():jQuery(n).hide()})}),jQuery(".mode-field").trigger("change")});