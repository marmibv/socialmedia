/**
 * customizer.js
 *
 * @package ThemeEgg
 * @subpackage MultiCommerce
 * @version 1.0.2
 * @since 1.0.0
 *
 * Contains handlers to make Theme Customizer repeater
 */
 ( function( $, customize ) {
 	'use strict';
 	var teg_document = $(document);
 	var teg_window = $(window);
 	var MultiCommerceCustomizer = {

 		Snipits: {

 			AutoFocus: function(evt){
 				var section, panel;
 				section = $(this).data('section');
 				panel = $(this).data('panel');
 				if ( section ) {
 					customize.section( section ).focus();
 				}
 				if ( panel ) {
 					customize.panel( panel ).focus();
 				}
 				evt.preventDefault();
 			},

 			CustomizerIcons: function(){

 				var single_icon = $(this);
 				var teg_customize_icons = single_icon.closest( '.te-customize-icons' );
 				var icon_display_value = single_icon.children('i').attr('class');
 				var icon_split_value = icon_display_value.split(' ');
 				var icon_value = icon_split_value[1];

 				single_icon.siblings().removeClass('selected');
 				single_icon.addClass('selected');
 				teg_customize_icons.find('.te-icon-value').val( icon_value );
 				teg_customize_icons.find('.icon-preview').html('<i class="' + icon_display_value + '"></i>');
 				teg_customize_icons.find('.te-icon-value').trigger('change');
 			},

 			IconsToggle: function(){
 				var icon_toggle = $(this);
 				var teg_customize_icons = icon_toggle.closest( '.te-customize-icons' );
 				var icons_list_wrapper = teg_customize_icons.find( '.icons-list-wrapper' );
 				var dashicons = teg_customize_icons.find( '.dashicons' );
 				if( icons_list_wrapper.is(':hidden') ){
 					icons_list_wrapper.slideDown();
 					dashicons.removeClass('dashicons-arrow-down');
 					dashicons.addClass('dashicons-arrow-up');
 				}else{
 					icons_list_wrapper.slideUp();
 					dashicons.addClass('dashicons-arrow-down');
 					dashicons.removeClass('dashicons-arrow-up');
 				}
 			}, 

 			IconsSearch: function(){
 				var text = $(this),
 				value = this.value,
 				teg_customize_icons = text.closest( '.te-customize-icons' ),
 				icons_list_wrapper = teg_customize_icons.find( '.icons-list-wrapper' );

 				icons_list_wrapper.find('i').each(function () {
 					if ($(this).attr('class').search(value) > -1) {
 						$(this).parent('.single-icon').show();
 					} else {
 						$(this).parent('.single-icon').hide();

 					}
 				});
 			},

 			RepeaterToggle: function(){
 				$(this).next().slideToggle();
 				$(this).closest('.repeater-field-control').toggleClass('expanded');
 			},

 			RepeaterClose: function(){
 				$(this).closest('.repeater-fields').slideUp();
 				$(this).closest('.repeater-field-control').toggleClass('expanded');
 			},

 			RemoveRepeaterField: function(evt){
 				var snipits = MultiCommerceCustomizer.Snipits;
 				if( typeof	$(this).parent() != 'undefined'){
 					$(this).closest('.repeater-field-control').slideUp('normal', function(){
 						$(this).remove();
 						snipits.RefreshRepeaterValues();
 					});
 				}
 				return false;
 			},

 			RefreshRepeaterValues: function(){

 				$(".te-repeater-field-control-wrap").each(function(){
 					var values = [];
 					var $this = $(this);
 					$this.find(".repeater-field-control").each(function(){
 						var valueToPush = {};
 						var dataValue;
 						$(this).find('[data-name]').each(function(){
 							if( $(this).attr('type') === 'checkbox'){
 								if($(this).is(':checked')){
 									dataValue = 1;
 								}
 								else {
 									dataValue = '';
 								}
 							}
 							else{
 								dataValue = $(this).val();
 							}
 							var dataName = $(this).attr('data-name');
 							valueToPush[dataName] = dataValue;
 						});
 						values.push(valueToPush);
 					});
 					$this.next('.te-repeater-collection').val(JSON.stringify(values)).trigger('change');
 				});
 			},

 			RepeaterControl: function(){
 				
 				var $this = $(this).parent();
 				var snipits = MultiCommerceCustomizer.Snipits;

 				if(typeof $this !== 'undefined') {
 					var field = $this.find(".te-repeater-field-control-generator").html();
 					field = $($.parseHTML(field));
 					if(typeof field !== 'undefined'){
 						field.find("input[type='text'][data-name]").each(function(){
 							var defaultValue = $(this).attr('data-default');
 							$(this).val(defaultValue);
 						});
 						field.find("textarea[data-name]").each(function(){
 							var defaultValue = $(this).attr('data-default');
 							$(this).val(defaultValue);
 						});
 						field.find("select[data-name]").each(function(){
 							var defaultValue = $(this).attr('data-default');
 							$(this).val(defaultValue);
 						});

 						field.find('.single-field').show();

 						$this.find('.te-repeater-field-control-wrap').append(field);

 						field.addClass('expanded').find('.repeater-fields').show();
 						$('.accordion-section-content').animate({ scrollTop: $this.height() }, 1000);
 						snipits.RefreshRepeaterValues();
 					}

 				}

 				return false;
 			},
 			SearchOnSelect: function(){
 				/*$('select').select2({
 					allowClear: false
 				});*/
 			}
 		},

 		Click: function(){

 			var __this = MultiCommerceCustomizer;
 			var snipits = __this.Snipits;

 			var autofocus = snipits.AutoFocus;
 			teg_document.on('click','.te-customizer', autofocus);

 			var repeatertoggle = snipits.RepeaterToggle;
 			teg_document.on('click','.repeater-field-title', repeatertoggle);

 			var repeaterclose = snipits.RepeaterClose;
 			teg_document.on('click','.repeater-field-close', repeaterclose);

 			var repeatercontrol = snipits.RepeaterControl;
 			teg_document.on('click','.te-repeater-add-control-field', repeatercontrol);

 			var removerepeaterfield = snipits.RemoveRepeaterField;
 			teg_document.on("click", ".repeater-field-remove", removerepeaterfield);

 			teg_document.on('keyup change', '[data-name]', function(){
 				snipits.RefreshRepeaterValues();
 				return false;
 			});
 			$(".te-repeater-field-control-wrap").sortable({
 				orientation: "vertical",
 				update: function( event, ui ) {
 					snipits.RefreshRepeaterValues();
 				}
 			});

 			var customizericons = snipits.CustomizerIcons;
 			teg_document.on('click', '.te-customize-icons .single-icon', customizericons);

 			var iconstoggle = snipits.IconsToggle;
 			teg_document.on('click', '.te-customize-icons .icon-toggle, .te-customize-icons .icon-preview', iconstoggle);

 			var iconssearch = snipits.IconsSearch;
 			teg_document.on('keyup', '.te-customize-icons .icon-search', iconssearch);

 		},

 		Customizer: function(){

 			customize.previewer.bind( 'multicommerce_preview_init', function( fields ) {
 				var data = (typeof fields != 'object') ? $.parseJSON(fields) : fields;
 				var data_type = data.type;
 				switch(data_type){

 					case 'control':
	 					var control = customize.control( data.name );
	 					var args = {};
	 					control.focus(args);
 						break;

 					case 'section':
 						var section = customize.section( data.name );
 						var args = {};
 						section.focus(args);
 						break;

 					case 'panel':
 						var panel = customize.panel( data.name );
 						var args = {};
 						panel.focus(args);
 						break;

 					default:
 						break;

 				}
 				
 			});

 		},

 		Ready: function(){
 			var __this = MultiCommerceCustomizer;
 			var snipits = __this.Snipits;
 			__this.Click();
 			snipits.SearchOnSelect();
 			snipits.RepeaterToggle();
 		},

 		Load: function(){
 		},

 		Resize: function(){
 		},

 		Scroll: function(){
 		},

 		Init: function(){

 			var __this = MultiCommerceCustomizer;
 			var load, ready, resize, scroll, customizer;

 			ready = __this.Ready;
 			load = __this.Load;
 			resize = __this.Resize;
 			scroll = __this.Scroll;
 			customizer = __this.Customizer;
 			
 			teg_document.ready(ready);
 			teg_window.load(load);
 			teg_window.resize(resize);
 			teg_window.scroll(scroll);
 			customize.bind('ready', customizer);
 		},

 	};
 	MultiCommerceCustomizer.Init();

 } )( jQuery, wp.customize );