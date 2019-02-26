/*!
 * Custom JS for custom image uploading
 * @package ThemeEgg
 * @subpackage MultiCommerce
 */
 (function($){

    'use strict';

    var winWidth, winHeight, TegAdmin;
    var teg_document = $(document);
    TegAdmin = {
        // Repeater Library
        Repeater: function(){

            /*sortable*/
            var TEGREFRESHVALUE = function (wrapObject) {
                wrapObject.find('[name]').each(function(){
                    $(this).trigger('change');
                });
            };

            var TEGSORTABLE = function () {
                var repeaters = $('.te-repeater');
                repeaters.sortable({
                    orientation: "vertical",
                    items: '> .repeater-table',
                    placeholder: 'te-sortable-placeholder',
                    update: function( event, ui ) {
                        TEGREFRESHVALUE(ui.item);
                    }
                });
                repeaters.trigger("sortupdate");
                repeaters.sortable("refresh");
            };

            /*replace*/
            var TEGREPLACE = function( str, replaceWhat, replaceTo ){
                var re = new RegExp(replaceWhat, 'g');
                return str.replace(re,replaceTo);
            };

            var TEGREPEATER =  function (){
                teg_document.on('click','.te-add-repeater',function (e) {
                    e.preventDefault();
                    var add_repeater = $(this),
                        repeater_wrap = add_repeater.closest('.te-repeater'),
                        code_for_repeater = repeater_wrap.find('.te-code-for-repeater'),
                        total_repeater = repeater_wrap.find('.te-total-repeater'),
                        total_repeater_value = parseInt( total_repeater.val() ),
                        repeater_html = code_for_repeater.html();

                    total_repeater.val( total_repeater_value +1 );
                    var final_repeater_html = TEGREPLACE( repeater_html, add_repeater.attr('id'),total_repeater_value );
                    add_repeater.before($('<div class="repeater-table"></div>').append( final_repeater_html ));
                    var new_html_object = add_repeater.prev('.repeater-table');
                    var repeater_inside = new_html_object.find('.te-repeater-inside');
                    repeater_inside.slideDown( 'fast',function () {
                        new_html_object.addClass( 'open' );
                        TEGREFRESHVALUE(new_html_object);
                    } );

                });
                teg_document.on('click', '.te-repeater-top, .te-repeater-close', function (e) {
                    e.preventDefault();
                    var accordion_toggle = $(this),
                        repeater_field = accordion_toggle.closest('.repeater-table'),
                        repeater_inside = repeater_field.find('.te-repeater-inside');

                    if ( repeater_inside.is( ':hidden' ) ) {
                        repeater_inside.slideDown( 'fast',function () {
                            repeater_field.addClass( 'open' );
                        } );
                    }
                    else {
                        repeater_inside.slideUp( 'fast', function() {
                            repeater_field.removeClass( 'open' );
                        });
                    }
                });
                teg_document.on('click', '.te-repeater-remove', function (e) {
                    e.preventDefault();
                    var repeater_remove = $(this),
                        repeater_field = repeater_remove.closest('.repeater-table'),
                        repeater_wrap = repeater_remove.closest('.te-repeater');

                    repeater_field.remove();
                    repeater_wrap.closest('form').trigger('change');
                    TEGREFRESHVALUE(repeater_wrap);
                });

                teg_document.on('change', '.te-select', function (e) {
                    e.preventDefault();
                    var select = $(this),
                        repeater_inside = select.closest('.te-repeater-inside'),
                        postid = repeater_inside.find('.te-postid'),
                        repeater_control_actions = repeater_inside.find('.te-repeater-control-actions'),
                        optionSelected = select.find("option:selected"),
                        valueSelected = optionSelected.val();

                    if( valueSelected == 0 ){
                        postid.remove();
                    }
                    else{
                        postid.remove();
                        $.ajax({
                            type      : "GET",
                            data      : {
                                action: 'teg_get_edit_post_link',
                                id: valueSelected
                            },
                            url       : ajaxurl,
                            beforeSend: function ( data, settings ) {
                                postid.remove();

                            },
                            success   : function (data) {
                                if( 0 != data ){
                                    repeater_control_actions.append( data );
                                }
                            },
                            error     : function (jqXHR, textStatus, errorThrown) {
                                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                            }
                        });
                    }
                });
            };

            teg_document.on('widget-added widget-updated panelsopen', function( event, widgetContainer ) {
                TEGSORTABLE();
            });

            /*
             * Manually trigger widget-added events for media widgets on the admin
             * screen once they are expanded. The widget-added event is not triggered
             * for each pre-existing widget on the widgets admin screen like it is
             * on the customizer. Likewise, the customizer only triggers widget-added
             * when the widget is expanded to just-in-time construct the widget form
             * when it is actually going to be displayed. So the following implements
             * the same for the widgets admin screen, to invoke the widget-added
             * handler when a pre-existing media widget is expanded.
             */
            $( function initializeExistingWidgetContainers() {
                var widgetContainers;
                if ( 'widgets' !== window.pagenow ) {
                    return;
                }
                widgetContainers = $( '.widgets-holder-wrap:not(#available-widgets)' ).find( 'div.widget' );
                widgetContainers.one( 'click.toggle-widget-expanded', function toggleWidgetExpanded() {
                    TEGSORTABLE();
                });
            });
            TEGREPEATER();

        },
        //Custom Snipits goes here
        Snipits: {
            Variables: function(){
                winWidth = $(window).width();
                winHeight = $(window).height();
            },
            Append_HTML: function(){
                if(typeof teg_theme_info_object != 'undefined'){
                    /* If there are required actions, add an icon with the number of required actions in the About multicommerce-info page -> Actions recommended tab */
                    var count_actions_recommended = teg_theme_info_object.count_actions_recommended;
                    if ( (typeof count_actions_recommended !== 'undefined') && (count_actions_recommended != '0') ) {
                        $('li.multicommerce-info-w-red-tab a').append('<span class="multicommerce-info-actions-count">' + count_actions_recommended + '</span>');
                    }
                }
            },

            Color_Picker: function(selector){
                var color_picker_option = {
                    change: function(event, ui){
                        selector.closest('form').trigger('change');
                    },
                };
                selector.wpColorPicker(color_picker_option);
            },

            ImageUpload: function(evt){
                // Prevents the default action from occuring.
                evt.preventDefault();
                var media_title = $(this).data('title');
                var media_button = $(this).data('button');
                var media_input_val = $(this).prev();
                var media_image_url_value = $(this).prev().prev().children('img');
                var media_image_url = $(this).siblings('.img-preview-wrap');

                var meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
                    title: media_title,
                    button: { text:  media_button },
                    library: { type: 'image' }
                });

                // Opens the media library frame.
                meta_image_frame.open();

                // Runs when an image is selected.
                meta_image_frame.on('select', function(){

                    // Grabs the attachment selection and creates a JSON representation of the model.
                    var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

                    // Sends the attachment URL to our custom image input field.
                    media_input_val.val(media_attachment.url);
                    if( media_image_url_value != null ){
                        media_image_url_value.attr( 'src', media_attachment.url );
                        media_image_url.show();
                    }
                    media_input_val.trigger('change');
                });
            },

            WidgetTab: function(evt){
                if (!$(this).hasClass('nav-tab-active')) {
                    var tab_wraper, tab_id;
                    tab_id = $(this).data('id');
                    tab_wraper = $(this).closest('.multicommerce-tab-wraper');
                    $(this).addClass('nav-tab-active').siblings('.nav-tab').removeClass('nav-tab-active');
                    tab_wraper.find('.multicommerce-tab-content').removeClass('multicommerce-content-active');
                    tab_wraper.find(tab_id).addClass('multicommerce-content-active');
                }
            },

            Widget_Accordion: function(){
                var accordion_title = $(this).closest('.teg-accordion-title');
                var is_checked = $(this).prop('checked');
                if(is_checked){
                    accordion_title.siblings('.teg-accordion-content').slideDown().removeClass('open close');
                    accordion_title.find('.teg-accordion-arrow').addClass('fa-angle-up').removeClass('fa-angle-down');
                }else{
                    accordion_title.siblings('.teg-accordion-content').slideUp().removeClass('open close');
                    accordion_title.find('.teg-accordion-arrow').addClass('fa-angle-down').removeClass('fa-angle-up');
                }
            },

            Widget_Relation: function(evt){
                var relation_field = $(this);
                var current_value = relation_field.val();
                var relations = $(this).data('relations');
                if(!relations){
                    return;
                }
                current_value = (relation_field.is(':checkbox') && relation_field.is(':checked')) ? current_value : 0;
                for(var relation_key in relations){

                    if(relation_key!=current_value && current_value!='!'){
                        continue;
                    }
                    
                    var relation_details = relations[relation_key];
                    for(var action_key in relation_details){
                        var action_detils = relation_details[action_key];
                        var action_detail_class = action_detils.join(", .");
                        var action_class = '.'+action_detail_class;
                        switch(action_key){
                            case 'show_fields':
                                relation_field.closest('.widget-content').find(action_class).removeClass('teg_hidden_field');
                                break;
                            case 'hide_fields':
                                relation_field.closest('.widget-content').find(action_class).addClass('teg_hidden_field');
                                break;
                            default:
                                console.warn(relation_key + ' case is not defined');
                            break;
                        }
                    }
                }
            },

            CustomizerIcons: function(){
                var single_icon = $(this),
                    teg_customize_icons = single_icon.closest( '.te-icons-wrapper' ),
                    icon_display_value = single_icon.children('i').attr('class'),
                    icon_split_value = icon_display_value.split(' '),
                    icon_value = icon_split_value[1];

                single_icon.siblings().removeClass('selected');
                single_icon.addClass('selected');
                teg_customize_icons.find('.te-icon-value').val( icon_value );
                teg_customize_icons.find('.icon-preview').html('<i class="' + icon_display_value + '"></i>');
                teg_customize_icons.find('.te-icon-value').trigger('change');
            },

            IconToggle: function(){
                var icon_toggle = $(this),
                    teg_customize_icons = icon_toggle.closest( '.te-icons-wrapper' ),
                    icons_list_wrapper = teg_customize_icons.find( '.icons-list-wrapper' ),
                    dashicons = teg_customize_icons.find( '.dashicons' );

                if ( icons_list_wrapper.is(':hidden') ) {
                    icons_list_wrapper.slideDown();
                    dashicons.removeClass('dashicons-arrow-down');
                    dashicons.addClass('dashicons-arrow-up');
                } else {
                    icons_list_wrapper.slideUp();
                    dashicons.addClass('dashicons-arrow-down');
                    dashicons.removeClass('dashicons-arrow-up');
                }
            },

            IconSearch: function(){
                var text = $(this),
                value = this.value,
                teg_customize_icons = text.closest( '.te-icons-wrapper' ),
                icons_list_wrapper = teg_customize_icons.find( '.icons-list-wrapper' );
                icons_list_wrapper.find('i').each(function () {
                    if ($(this).attr('class').search(value) > -1) {
                        $(this).parent('.single-icon').show();
                    } else {
                        $(this).parent('.single-icon').hide();

                    }
                });
            },
            DismissRequiredActions: function(){
                var id = $(this).attr('id'),
                    action = $(this).attr('data-action');

                $.ajax({
                    type      : "GET",
                    data      : {
                        action: 'teg_theme_info_update_recommended_action',
                        id: id,
                        todo: action
                    },
                    dataType  : "html",
                    url       : teg_theme_info_object.ajaxurl,
                    beforeSend: function (data, settings) {
                        $('.multicommerce-info-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + teg_theme_info_object.template_directory + '/inc/multicommerce-info/images/ajax-loader.gif" /></div>');
                    },
                    success   : function (data) {
                        location.reload();
                        $("#temp_load").remove();
                        /* Remove loading gif */
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                    }
                });
            },
            Widget_Change: function(evt, widget){
                var __this = TegAdmin;
                var snipits = __this.Snipits;
                var this_widget = $(widget);
                this_widget.find('.teg_widget_relations').trigger('change');
                snipits.Color_Picker(this_widget.find('.multicommerce-color-picker'));
                if(this_widget.hasClass('widget-dirty')){
                    this_widget.removeClass('widget-dirty');
                    this_widget.find('input[type="submit"]').attr('disabled','disabled');    
                }
            },
        },     

        Click: function(){

            var __this = TegAdmin;
            var snipits = __this.Snipits;

            var image_upload = snipits.ImageUpload;
            teg_document.on('click', '.media-image-upload', image_upload);

            var widget_tab = snipits.WidgetTab;
            teg_document.on('click', '.multicommerce-tab-list .nav-tab', widget_tab);

            var widget_relations = snipits.Widget_Relation;
            $(document).on('change', '.teg_widget_relations', widget_relations);
            
            //for default load
            $('.teg_widget_relations').trigger('change');

            // Runs when the image button is clicked.
            teg_document.on('click','.media-image-remove', function(e){
                $(this).siblings('.img-preview-wrap').hide();
                $(this).prev().prev().val('');
            });

             /**
             * Script for Customizer icons
             */
            var customizer_icons = snipits.CustomizerIcons;
            teg_document.on('click', '.te-icons-wrapper .single-icon', customizer_icons);

            var icon_toggle = snipits.IconToggle;
            teg_document.on('click', '.te-icons-wrapper .icon-toggle ,.te-icons-wrapper .icon-preview', icon_toggle);

            var icon_search = snipits.IconSearch;
            teg_document.on('keyup', '.te-icons-wrapper .icon-search', icon_search);

            /* Dismiss required actions */
            var dismiss_actions = snipits.DismissRequiredActions;
            $(".multicommerce-info-recommended-action-button,.reset-all").click(dismiss_actions);

            var widget_accordion = snipits.Widget_Accordion;
            teg_document.on('change', '.teg-accordion-title input', widget_accordion);

            var widget_change = snipits.Widget_Change;
            teg_document.on('widget-added widget-updated panelsopen', widget_change);

        },

        Ready: function(){
            var __this = TegAdmin;
            var snipits = __this.Snipits;

            //Library
            __this.Repeater();

            //This is multicommerce functions
            snipits.Variables();
            snipits.Append_HTML();
            snipits.Color_Picker($('.multicommerce-color-picker'));
            __this.Click();

        },

        Load: function(){

        },

        Resize: function(){

        },

        Scroll: function(){

        },

        Init: function(){
            var __this = TegAdmin;
            var docready = __this.Ready;
            var winload = __this.Load;
            var winresize = __this.Resize;
            var winscroll = __this.Scroll;
            $(document).ready(docready);
            $(window).load(winload);
            $(window).scroll(winscroll);
            $(window).resize(winresize);
        },

     };
     
     TegAdmin.Init();

})(jQuery);