jQuery(document).ready(function($) {
	// ticker
    $('.duper-bn').show().bxSlider({
        speed: 500,
        auto: true,
        controls: false,
        pager: false,
        autoHover : true,
        mode:'fade'
    });
      /*search*/
    $('.search-icon-menu').click(function(){
        $('.menu-search-toggle').fadeToggle(0);
    });
});