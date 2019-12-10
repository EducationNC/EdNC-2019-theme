function vgseColumnKeyToExportKey(e){if(vgse_editor_settings.export_keys_mapping&&vgse_editor_settings.export_keys_mapping[e])var t=vgse_editor_settings.export_keys_mapping[e];else t=e;return t}jQuery(document).ready(function(){if(!jQuery(".import-csv-modal").length)return!0;jQuery(".import-csv-modal .remodal-confirm").hide();var s=jQuery(".import-csv-form");function r(){var e=s.find(".step.current"),t=s.find(".step.current").prev(".step");e.slideToggle(),e.removeClass("current"),t.show(),t.addClass("current")}s.find(".import-column-bulk-actions select").change(function(e){"unselect"===jQuery(this).val()&&jQuery(".map-columns .map-template select").val("")}),s.find(".toggle-advanced-options").change(function(e){s.find(".advanced-options").slideToggle()}),s.find(".existing-check-csv-field").change(function(e){var t=jQuery(this).val();t&&jQuery(this).parent(".field-wrapper").next(".field-wrapper").find("option").filter(function(){return jQuery(this).text()===t}).prop("selected",!0).trigger("change")}),s.find('[name="writing_type"]').change(function(e){jQuery(this).val()&&"all_new"!==jQuery(this).val()?s.find(".field-find-existing-columns").show():s.find(".field-find-existing-columns").hide()}),s.find(".data-input,.step").hide(),s.find(".step").first().show(),s.find(".source").change(function(e){var t=jQuery(this).val();if(s.find(".data-input").hide(),"csv_upload"===t)s.find(".data-input.csv-upload").show();else if("csv_url"===t)s.find(".data-input.csv-url").show();else if("server_file"===t)s.find(".data-input.server-file").show();else if("paste"===t){s.find(".data-input.paste").show(),window.importHOT&&window.importHOT.destroy();var a={minSpareRows:4,wordWrap:!0,allowInsertRow:!0,columnSorting:!0,colHeaders:!1,width:s.width(),height:300},o=document.getElementById("handsontable-paste");window.importHOT=new Handsontable(o,a)}}),s.on("click",".next-step",function(e){e.preventDefault(),function(){var e=s.find(".step.current"),t=s.find(".step.current").next(".step");e.slideToggle(),e.removeClass("current"),t.show(),t.addClass("current")}();var t=s.find(".step.current");if(t.hasClass("preview-step")&&window.vgseImportData&&window.vgseImportData.success){window.importPreviewHOT&&window.importPreviewHOT.destroy();var a={data:window.vgseImportData.data.firstRows,minSpareRows:1,wordWrap:!0,allowInsertRow:!0,columnSorting:!0,colHeaders:window.vgseImportData.data.rowHeaders,width:s.width(),height:170},o=document.getElementById("hot-preview");window.importPreviewHOT=new Handsontable(o,a),jQuery(".import-csv-modal .remodal-confirm").show(),setFormSubmitting()}t.hasClass("write-type")}),s.on("click",".prev-step",function(e){e.preventDefault(),r()}),s.find(".vgse-upload-csv-file").click(function(e){e.preventDefault();var t=jQuery(this),o=t.parents(".data-input");loading_ajax({estado:!0});var a={data:{action:"vgse_upload_file_for_import",data_type:t.data("type"),vgse_plain_mode:"yes",nonce:jQuery("#vgse-wrapper").data("nonce"),separator:o.parents(".step").find(".separator").val(),decode_quotes:o.parents(".step").find(".decode-quotes").is(":checked")?"on":"",post_type:jQuery("#post-data").data("post-type")},type:"POST",url:ajaxurl};if("local"===t.data("type")){var n=new FormData;n.append("action","vgse_upload_file_for_import"),n.append("data_type",t.data("type")),n.append("nonce",jQuery("#vgse-wrapper").data("nonce")),n.append("post_type",jQuery("#post-data").data("post-type")),n.append("separator",o.parents(".step").find(".separator").val()),n.append("decode_quotes",o.parents(".step").find(".decode-quotes").is(":checked")?"on":""),n.append("data",""),n.append("file",document.getElementById("vgse-import-local-file").files[0]),a.processData=!1,a.contentType=!1,a.data=n}else"url"===t.data("type")?a.data.data=o.find(".data").val():"server_file"===t.data("type")?a.data.data=o.find(".data").val():a.data.data=window.importHOT.getSourceData();jQuery.ajax(a).always(function(i){if(window.vgseImportData=i,loading_ajax({estado:!1}),i.success&&i.data.rowHeaders){s.find(".existing-check-csv-field").each(function(){jQuery(this).find("option:not(:eq(0))").remove()}),s.find(".import-file").val(i.data.filePath),s.find(".total-rows").val(i.data.totalRows);var e=i.data.rowHeaders;s.find(".map-template:not(.hidden)").remove(),s.find(".import-column-bulk-actions").val(""),jQuery.each(e,function(e,t){if(t){var a=s.find(".map-template.hidden").clone();a.removeClass("hidden"),a.find(".csv-column-name-text").text(t),a.find(".csv-column-name-example").append(jQuery("<span>"+i.data.firstRows[0][t]+"</span>").text().substring(0,100)),a.find(".csv-column-name-value").val(t),s.find(".map-template").last().after(a);if(-1<["ID","id","record_id"].indexOf(t))var o="ID";else o=t;var n=o.replace(/ [0-9] /g," ");if(n!==o)o=n;if(vgse_editor_settings.post_type===vgse_editor_settings.woocommerce_product_post_type_key){if("Attribute visible"===o)o="Attribute visibility";if("Attribute global"===o)o="Is a global attribute?";if("Attribute default"===o)o="Default attribute";if(-1<o.indexOf("Meta:"))o="Import as meta"}s.find(".map-template").last().find("select option").each(function(){var e=jQuery(this),t=jQuery.trim(e.text());jQuery.trim(o.toLowerCase())===t.toLowerCase()&&(e.prop("selected",!0),e.parents("select").trigger("change"))}),s.find(".existing-check-csv-field").append('<option value="'+t+'">'+t+"</option>")}});var t=s.find(".map-template:not(.hidden) select").filter(function(){return!jQuery(this).val()});1===e.length?s.find(".one-column-detected-tip").show():s.find(".one-column-detected-tip").hide(),t.length?(s.find(".import-column-list-headers, .import-column-bulk-actions").show(),s.find(".map-template:not(.hidden)").show(),s.find(".import-auto-map-notice").hide(),s.find(".map-columns .button-primario.next-step").show()):(s.find(".import-auto-map-notice").show(),s.find(".import-column-list-headers, .import-column-bulk-actions").hide(),s.find(".map-columns .button-primario.next-step").hide(),s.find(".import-auto-map-notice .import-map-select-columns").click(function(e){e.preventDefault(),s.find(".import-column-list-headers, .import-column-bulk-actions").show(),s.find(".map-template:not(.hidden)").show(),s.find(".map-columns .button-primario.next-step").show()}))}else{r();var a=void 0!==i.data.message?i.data.message:"Error";notification({mensaje:"Error",tipo:"error",tiempo:18e4}),o.parents(".step").find(".file-upload-error").remove(),o.parents(".step").find(".advanced-options").before('<div class="alert alert-red file-upload-error">'+a+"</div>")}})}),vgse_editor_settings.post_type===vgse_editor_settings.woocommerce_product_post_type_key&&jQuery("body").on("change",".map-template select",function(){if(-1<jQuery(this).val().indexOf(":"))if("meta:"===jQuery(this).val()){jQuery(this).find("option:selected").attr("value",jQuery(this).parents(".map-template").find(".csv-column-name-text").text().replace("Meta: ","meta:"))}else{var t=jQuery(this).find("option:selected").attr("value").replace(/[0-9]/g,"");s.find('.map-template select option[value*="'+t+'"]:selected').each(function(e){jQuery(this).attr("value",t+e)})}});var d=jQuery(".import-csv-modal");jQuery(document).on("closed",".import-csv-modal",function(){s.show(),s.find(".step").removeClass("current").hide(),s.find(".step").first().addClass("current").show(),d.find(".import-step").hide(),d.find(".remodal-confirm").hide()}),s.append('<input type="hidden" name="wpse_source_suffix" value="'+(vgse_editor_settings.wpse_source_suffix||"")+'" />'),d.submit(function(e){e.preventDefault(),d.find(".import-step").show();var n=d.find(".import-response");n.empty(),d.find("#be-import-nanobar-container").remove(),n.before('<div id="be-import-nanobar-container" />');var t={classname:"be-progress-bar",target:document.getElementById("be-import-nanobar-container")},i=new Nanobar(t);i.go(1),s.hide(),d.find(".remodal-cancel").hide();var a=parseInt(s.find(".total-rows").val()),o={updated:0,created:0,processed:0},r=0;return window.beImportLoop=beAjaxLoop({totalCalls:Math.ceil(a/vgse_editor_settings.save_posts_per_page),url:ajaxurl,dataType:"json",method:"POST",data:s.serializeArray(),onSuccess:function(e,t){if(r=0,!e.success)return"string"==typeof e.data.row&&(e.data.message+=". Row: "+e.data.row+"<br>"+vgse_editor_settings.texts.import_data_issue_correct_restart),n.append("<p>"+e.data.message+"</p>"),n.scrollTop(n[0].scrollHeight),i.go(100),d.find(".remodal-cancel").show(),d.find(".import-actions").hide(),!1;jQuery.isArray(t.data)?(t.data.push({name:"file_position",value:e.data.file_position}),t.data.push({name:"file_position",value:e.data.file_position})):t.data.file_position=e.data.file_position,o.updated+=e.data.updated,o.created+=e.data.created,o.processed+=e.data.processed;var a=e.data.message.replace("{total_updated}",o.updated).replace("{total_created}",o.created);return t.totalCalls=Math.ceil(parseInt(e.data.total)/vgse_editor_settings.save_posts_per_page),n.empty(),n.append(a),n.scrollTop(n[0].scrollHeight),t.current===t.totalCalls||e.data.force_complete?(n.scrollTop(n[0].scrollHeight),i.go(100),d.find(".remodal-cancel").show(),d.find(".import-actions").hide(),vgseReloadSpreadsheet(!0),!1):(i.go(t.current/t.totalCalls*100),d.find(".remodal-cancel").hide(),d.find(".import-actions").show(),!0)},onError:function(e,t,a){if(++r<=3)var o=!!s.find(".auto-retry-failed-batches").is(":checked")||confirm(vgse_editor_settings.texts.import_failed_retry_server_error);else o=!1;return o?(window.vgseDontNotifyServerError=!0,a.current--,i.go(a.current/a.totalCalls*100),d.find(".remodal-cancel").hide(),d.find(".import-actions").show(),!0):(n.append(vgse_editor_settings.texts.import_failed_server_error_tips),n.scrollTop(n[0].scrollHeight),i.go(100),d.find(".remodal-cancel").show(),d.find(".import-actions").hide(),!1)}}),d.find(".pause-import").data("action","pause").addClass("button-secondary").removeClass("button-primary").html('<i class="fa fa-pause"></i> Pause'),!1}),d.find(".pause-import").click(function(e){e.preventDefault();var t=jQuery(this);"pause"===t.data("action")?(t.data("action","play").addClass("button-primary").removeClass("button-secondary").html('<i class="fa fa-play"></i> Resume'),window.beImportLoop.pause(),d.find(".remodal-cancel").show(),d.find(".remodal-confirm").show()):(t.data("action","pause").addClass("button-secondary").removeClass("button-primary").html('<i class="fa fa-pause"></i> Pause'),window.beImportLoop.resume(),d.find(".remodal-cancel").hide(),d.find(".remodal-confirm").hide())})}),jQuery(document).ready(function(){var i;if(!(i=jQuery(".export-csv-form")).length)return!0;(i=jQuery(".export-csv-form")).find(".export-actions").hide(),i.find(".select-all").click(function(e){e.preventDefault(),i.find(".export-columns option").prop("selected",!0).trigger("change")}),i.find(".select-active").click(function(e){e.preventDefault();var o=i.find(".export-columns");o.find("option").prop("selected",!1),jQuery.each(vgse_editor_settings.columnsFormat,function(e,t){var a=vgseColumnKeyToExportKey(e);o.find('option[value="'+a+'"]').prop("selected",!0)}),i.find(".export-columns").trigger("change")}),i.find(".unselect-all").click(function(e){e.preventDefault(),i.find(".export-columns option").prop("selected",!1).trigger("change")}),i.submit(function(e){window.beExportLoop=null;var o=jQuery(".export-response");o.empty(),i.find("#be-export-nanobar-container").remove(),o.before('<div id="be-export-nanobar-container" />');var t={classname:"be-progress-bar",target:document.getElementById("be-export-nanobar-container")},n=new Nanobar(t);return n.go(1),i.find(".remodal-cancel").hide(),i.find(".remodal-confirm").hide(),i.find(".export-actions").show(),i.find(".export-columns").prop("disabled",!0).trigger("change"),window.beExportLoop=beAjaxLoop({totalCalls:Math.ceil(window.beFoundRows/vgse_editor_settings.posts_per_page),url:ajaxurl,dataType:"json",method:"POST",data:{action:"vgse_load_data",vgse_plain_mode:"yes",vgse_csv_export:"yes",custom_enabled_columns:i.find(".export-columns").val().join(","),add_excel_separator_flag:i.find(".excel-compatibility-container input").is(":checked")?1:0,nonce:jQuery("#vgse-wrapper").data("nonce"),post_type:jQuery("#post-data").data("post-type"),filters:beGetRowsFilters(),export_key:[vgseFormatDate(),jQuery("#post-data").data("post-type"),vgseGuidGenerator()].join("-"),wpse_source_suffix:vgse_editor_settings.wpse_source_suffix||""},prepareData:function(e,t){return e.paged=e.page,e},onSuccess:function(e,t){return e.success?(t.totalCalls=Math.ceil(parseInt(e.data.total)/vgse_editor_settings.posts_per_page),o.empty(),o.append(e.data.message),o.scrollTop(o[0].scrollHeight),t.current===t.totalCalls?(e.data.export_file_url&&window.location.href.indexOf("no_redirect=1")<0&&(window.location.href=e.data.export_file_url),o.scrollTop(o[0].scrollHeight),n.go(100),i.find(".export-actions").hide(),i.find(".remodal-cancel").show(),i.find(".remodal-confirm").show(),i.find(".export-columns").prop("disabled",!1).trigger("change"),!1):(n.go(t.current/t.totalCalls*100),i.find(".remodal-cancel").hide(),!0)):(o.append("<p>"+e.data.message+"</p>"),o.scrollTop(o[0].scrollHeight),n.go(100),i.find(".remodal-cancel").show(),i.find(".remodal-confirm").show(),i.find(".export-columns").prop("disabled",!1).trigger("change"),!1)},onError:function(e,t,a){return confirm(vgse_editor_settings.texts.formula_retry_batch)?(window.vgseDontNotifyServerError=!0,a.current--,n.go(a.current/a.totalCalls*100),i.find(".remodal-cancel").hide(),!0):(o.append(vgse_editor_settings.texts.process_execution_failed),o.scrollTop(o[0].scrollHeight),n.go(100),i.find(".remodal-cancel").show(),i.find(".remodal-confirm").show(),i.find(".export-columns").prop("disabled",!1).trigger("change"),!1)}}),i.find(".pause-export").data("action","pause").addClass("button-secondary").removeClass("button-primary").html('<i class="fa fa-pause"></i> Pause'),!1}),i.find(".pause-export").click(function(e){e.preventDefault();var t=jQuery(this);"pause"===t.data("action")?(t.data("action","play").addClass("button-primary").removeClass("button-secondary").html('<i class="fa fa-play"></i> Resume'),window.beExportLoop.pause(),i.find(".remodal-cancel").show(),i.find(".remodal-confirm").show(),i.find(".export-columns").prop("disabled",!1).trigger("change"),i.find(".export-actions").show()):(t.data("action","pause").addClass("button-secondary").removeClass("button-primary").html('<i class="fa fa-pause"></i> Pause'),window.beExportLoop.resume(),i.find(".remodal-cancel").hide(),i.find(".remodal-confirm").hide())}),i.find(".export-columns").change(function(){window.beExportLoop&&(window.beExportLoop.pause(),i.find(".export-actions").hide())})}),jQuery(window).load(function(){jQuery("body").on("click",".wpse-quick-access-link",function(e){e.preventDefault();var t=jQuery(this);"function"==typeof loading_ajax&&loading_ajax({estado:!0}),jQuery.get(vgse_universal_sheet_data.rest_base_url+"sheet-editor/v1/sheet/generate-quick-access?_wpnonce="+vgse_universal_sheet_data.rest_nonce+"&sheet_key="+vgse_universal_sheet_data.post_type,function(e){t.parent().find(".wpsegs-quick-access input").val(e.quick_access_url).focus(),t.parent().find(".wpsegs-quick-access").show(),"function"==typeof loading_ajax&&loading_ajax({estado:!1})})})}),jQuery(document).ready(function(){var r=jQuery('[data-remodal-id="export-csv-modal"]');if("undefined"==typeof hot||!r.length)return!0;var e=hot.getSettings().contextMenu;void 0===e.items&&(e.items={}),e.items.wpse_export_column={name:vgse_editor_settings.texts.export_column,hidden:function(){if(!hot.getSelected())return!0;var e=hot.colToProp(hot.getSelected()[0][1]);return!(r.find(".export-columns").find('option[value="'+e+'"]').length||vgse_editor_settings.export_keys_mapping&&vgse_editor_settings.export_keys_mapping[e])},callback:function(e,t,a){var o=hot.colToProp(t[0].start.col);r.remodal().open();var n=r.find(".export-columns"),i=vgseColumnKeyToExportKey(o);n.find("option").prop("selected",!1),n.find('option[value="'+i+'"]').prop("selected",!0),n.find('option[value="'+vgseColumnKeyToExportKey(hot.colToProp(1))+'"]').prop("selected",!0),n.trigger("change"),r.find('[name="use_search_query"]').prop("checked",!0),r.find(".vgse-trigger-export").click()}},hot.updateSettings({contextMenu:e})});