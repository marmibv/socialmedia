/*!
 * Custom JS
 * @package ThemeEgg
 * @subpackage MultiCommerce
 */
(function($){
    'use strict';
    var winWidth, winHeight, MultiCommerce;
    var teg_body = $('body');
    var complete = 1;
    MultiCommerce = {

        Snipits: {

            Variables: function(){
                winWidth = $(window).width();
                winHeight = $(window).height();
            },

            Add_DOM: function(){
                $('.themeegg-nav >ul > li,.category-menu-wrapper > li').each(function(){
                    if ($(this).children('ul.sub-menu').length) {
                        $(this).prepend("<i class='fa fa-angle-down angle-down'></i>")
                    }
                });
                $('.header-main-menu ul.sub-menu li').each(function(){
                    if ($(this).children('ul.sub-menu').length){
                        $(this).prepend("<i class='fa fa-angle-right angle-down'></i>");
                    }
                });
                $('.header-wrapper #site-navigation .menu-main-menu-container').addClass('clearfix');
            },

            Equal_Height: function(wraper_selector, equal_height_selector){
                if($(wraper_selector).length){
                    $(wraper_selector).each(function(){
                        var wraper_elements = $(this);
                        var equal_height_elements = wraper_elements.find(equal_height_selector);
                        if(equal_height_elements.length>1){
                            var maxHeight = 0;
                            var currentElementHeight = 0;
                            equal_height_elements.css({
                                'min-height':0,
                            });
                            if(winWidth<767){
                                return;
                            }
                            equal_height_elements.each(function(){
                                currentElementHeight = $(this).height();
                                maxHeight = (currentElementHeight>maxHeight) ? currentElementHeight : maxHeight;
                            });
                            equal_height_elements.css({
                                'min-height':maxHeight,
                            });
                        }
                    });
                }
            },

             Select2: function(){
                //Select 2 js init
                if (typeof $().select2 == 'function'  ){
                    //$('.select_products, .woocommerce-ordering .orderby').select2();
                    $('select').select2();
                }
            },

            Navigation_Menu: function(){
                $('.header-wrapper .themeegg-nav').slicknav({
                    allowParentLinks :true,
                    duration: 500,
                    prependTo: '.header-wrapper .responsive-slick-menu',
                    easingOpen: "swing",
                    'closedSymbol': '+',
                    'openedSymbol': '-'
                });
            },

            Category_Menu: function(){
                if( winWidth > 992 ){
                    var slider_height = $('.multicommerce-feature-category-menu .slider-feature-wrap').height();
                    $('.multicommerce-feature-category-menu .category-menu-wrapper > li > ul').height( slider_height+19 );
                }
                else{
                    $('.multicommerce-feature-category-menu .category-menu-wrapper > li > ul').attr('style','');
                }
            },

            Hover_Effect_Mobile: function(evt){
                if( winWidth > 992 ){
                    return false;
                }
                evt.preventDefault();
                var angle_down = $(this).parent().children('i.angle-down'),
                    submenu = angle_down.siblings('ul.sub-menu');
                submenu.slideToggle('slow');
                angle_down.toggleClass('fa-angle-up');
                angle_down.toggleClass('fa-angle-down');
                return false;
            },

            Sliders: function(){

                $('.teg-slick-carousel').each(function(){
                    var teg_featured_img_slider = $(this);
                    var slidesToShow = parseInt(teg_featured_img_slider.data('column'));
                    var slidesToScroll = parseInt(teg_featured_img_slider.data('column'));
                    var adaptiveHeight = (parseInt(teg_featured_img_slider.data('adaptive'))==1) ? true : false;
                    var prevArrow = teg_featured_img_slider.closest('.widget').find('.teg-action-wrapper > .prev');
                    var nextArrow = teg_featured_img_slider.closest('.widget').find('.teg-action-wrapper > .next');

                    teg_featured_img_slider.removeClass('column');
                    teg_featured_img_slider.children().removeClass('teg-col-'+slidesToScroll);
                    teg_featured_img_slider.css('visibility', 'visible').slick({
                        slidesToShow: slidesToShow,
                        slidesToScroll: slidesToScroll,
                        autoplay: true,
                        adaptiveHeight: adaptiveHeight,
                        cssEase: 'linear',
                        arrows: true,
                        prevArrow: prevArrow,
                        nextArrow: nextArrow,
                        responsive: [
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: ( slidesToShow > 1 ? slidesToShow - 1 : slidesToShow ),
                                    slidesToScroll: ( slidesToScroll > 1 ? slidesToScroll - 1 : slidesToScroll ),
                                }
                            },
                            {
                                breakpoint: 640,
                                settings: {
                                    slidesToShow: ( slidesToShow > 2 ? slidesToShow - 2 : slidesToShow ),
                                    slidesToScroll: ( slidesToScroll > 2 ? slidesToScroll - 2 : slidesToScroll ),
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                }
                            }
                        ]
                    });
                });

                $('.featured-slider').each(function() {
                    var teg_featured_img_slider = $(this);
                    var autoplay = parseInt(teg_featured_img_slider.data('autoplay'));
                    var arrows = parseInt(teg_featured_img_slider.data('arrows'));
                    var prevArrow = teg_featured_img_slider.closest('.slider-section').find('.teg-action-wrapper > .prev');
                    var nextArrow = teg_featured_img_slider.closest('.slider-section').find('.teg-action-wrapper > .next');
                    teg_featured_img_slider.css('visibility', 'visible').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autoplay: (autoplay===1),
                        adaptiveHeight: true,
                        cssEase: 'linear',
                        arrows: (arrows===1),
                        prevArrow: prevArrow,
                        nextArrow: nextArrow
                    });
                });

                $('.fs-right-slider').each(function() {
                    var teg_featured_img_slider = $(this);
                    var autoplay = parseInt(teg_featured_img_slider.data('autoplay'));
                    var arrows = parseInt(teg_featured_img_slider.data('arrows'));
                    var prevArrow = teg_featured_img_slider.closest('.beside-slider').find('.teg-action-wrapper > .prev');
                    var nextArrow = teg_featured_img_slider.closest('.beside-slider').find('.teg-action-wrapper > .next');
                    teg_featured_img_slider.css('visibility', 'visible').slick({
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        autoplay: (autoplay===1),
                        vertical: true,
                        verticalSwiping: true,
                        arrows: (arrows===1),
                        prevArrow: prevArrow,
                        nextArrow: nextArrow,
                        adaptiveHeight: false,
                        responsive: [
                            {
                                breakpoint: 992,
                                settings: {
                                    vertical: false,
                                },
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    vertical: true,
                                    slidesToShow: 1,
                                },
                            },
                        ]
                    });
                });
            },

            Category_Tabs: function(evt){
                var $this = $(this),
                    tab_wrap = $this.closest('.widget_multicommerce_wc_cats_tabs'),
                    cats_tab_id = $this.data('id'),
                    tab_title = tab_wrap.find('.te-tabs > span'),
                    single_tab_content_wrap = tab_wrap.find('.te-tabs-wrap');

                if( $this.hasClass('active') || complete === 0 ){
                    return false;
                }
                if( complete === 1 ){
                    complete = 0;
                }
                tab_title.removeClass('active');
                $this.addClass('active');
                single_tab_content_wrap.removeClass('active');

                single_tab_content_wrap.each(function () {
                    if( $(this).data('id') === cats_tab_id ){
                        $(this).addClass('active');
                        var teg_featured_img_slider = $(this).find('.teg-slick-carousel');
                        var prevArrow =teg_featured_img_slider.closest('.widget').find('.teg-action-wrapper > .prev');
                        var nextArrow =teg_featured_img_slider.closest('.widget').find('.teg-action-wrapper > .next');
                        prevArrow.off('click');
                        nextArrow.off('click');
                        teg_featured_img_slider.slick('reinit')
                    }
                });
                complete = 1;
                evt.preventDefault();
            },

            Sticky_Menu: function(){
                var site_header = $('#masthead');
                var site_navigation = $('#site-navigation');
                var navigation_wrapper = site_navigation.closest('.navigation-wrapper');
                var header_height = site_header.height();
                var navigation_height = site_navigation.height();
                var menu_sticky_height = header_height - navigation_height;
                var window_scroll_top = $(window).scrollTop();
                var menu_from_top = 0;

                if($('#wpadminbar').length){
                    menu_from_top = $('#wpadminbar').height();
                    header_height += menu_from_top;
                }

                if ( window_scroll_top > menu_sticky_height) {
                    $('.multicommerce-enable-sticky-menu').css({"position": "fixed", "top": menu_from_top,"right": "0","left": "0","z-index":'999'});
                    $('.multicommerce-enable-sticky-menu .header-main-menu').css('margin','0 auto');
                    $('.sm-up-container').show();
                    navigation_wrapper.css('padding-bottom', navigation_height);
                }else{
                    $('.multicommerce-enable-sticky-menu').removeAttr( 'style' );
                    $('.multicommerce-enable-sticky-menu .header-main-menu').removeAttr( 'style' );
                    $('.sm-up-container').hide();
                    navigation_wrapper.css('padding-bottom', '');
                }                
            },

            Sticky_Sidebar: function(){
                if($('body').hasClass('te-sticky-sidebar')){
                    $('.inner-content>div.content-area, .inner-content>div.secondary-sidebar').theiaStickySidebar();
                }
            },

            Toggle_Cats: function(evt){
                if( winWidth <= 767 ){
                    var $this = $(this),
                        action_wrapper = $this.next('.teg-action-wrapper.te-tabs');
                        action_wrapper.slideToggle();
                }
                evt.preventDefault();
            },

            Menu_Children: function(){
                if( $(this).hasClass('te-clicked')){
                    return true;
                }
                if( winWidth > 992 && winWidth <= 1230 ){
                    $(this).addClass('te-clicked');
                    return false;
                }
            },
            Model_Open: function(evt){
                evt.preventDefault();
                teg_body.addClass('modal-open');
                $('#te-widget-modal').fadeIn();
            },
            Model_Close: function(evt){
                evt.preventDefault();
                $(this).closest('.modal').fadeOut();
                teg_body.removeClass('modal-open');
            },

        },

        Click: function(){
            
            var __this = MultiCommerce;
            var snipits = __this.Snipits;

            var menu_children = snipits.Menu_Children;
            $('.menu-item-has-children > a').click(menu_children);
            
            /*click hover effect on mobile*/
            var hover_effect_mobile = snipits.Hover_Effect_Mobile;
            $(document).on('click', '.category-menu, .angle-down', hover_effect_mobile);

            // Runs when the image button is clicked.
            var category_tabs = snipits.Category_Tabs;
            $(document).on('click', '.te-tabs > span', category_tabs);

            $('.widget_multicommerce_wc_cats_tabs').each(function () {
                $(this).find('.te-tabs-wrap:first').find('.teg-slick-carousel').slick('reinit')
            });
            if( winWidth > 767 ){
               $('.teg-action-wrapper.te-tabs').show();
            }
            var toggle_cats = snipits.Toggle_Cats;
            $('body').on('click', '.toggle-cats', toggle_cats);

            var model_open = snipits.Model_Open;
            $(document).on('click', '.te-modal', model_open);

            var model_close = snipits.Model_Close;
            $(document).on('click', '.modal-header .close', model_close);

        },

        Ready: function(){
            var __this = MultiCommerce;
            var snipits = __this.Snipits;
            snipits.Variables();
            snipits.Add_DOM();
            snipits.Equal_Height('.featured-entries-page', '.feature-promo .single-unit');
            snipits.Select2();
            snipits.Navigation_Menu();
            snipits.Sticky_Sidebar();
            __this.Click();
        },

        Load: function(){
            var __this = MultiCommerce;
            var snipits = __this.Snipits;
            snipits.Variables();
            snipits.Equal_Height('.featured-entries-page', '.feature-promo .single-unit');
            snipits.Sliders();
            snipits.Category_Menu();
        },

        Resize: function(){
            var __this = MultiCommerce;
            var snipits = __this.Snipits;
            snipits.Variables();
            snipits.Equal_Height('.featured-entries-page', '.feature-promo .single-unit');
            snipits.Category_Menu();
        },

        Scroll: function(){
            var __this = MultiCommerce;
            var snipits = __this.Snipits;
            snipits.Sticky_Menu();
        },

        Init: function(){
            var __this = MultiCommerce,
            ready = __this.Ready,
            load = __this.Load,
            resize = __this.Resize,
            scroll = __this.Scroll;
            $(document).ready(ready);
            $(window).on('load', load);
            $(window).scroll(scroll);
            $(window).resize(resize);
        },

     };
     
     MultiCommerce.Init();

})(jQuery);

