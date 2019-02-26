/**
 * User Experience.js
 *
 * This javascript for user expereince. Easy to use to all technical or non technical person.
 *
 */

( function( $, customize ) {

	'use strict';

	/**
	 * Header User Experience Part
	**/
	// Top header display
	customize( 'multicommerce_theme_options[multicommerce-top-right-button-title]', function( value ){
		value.bind( function( to ) {
			$( '.header-right .my-account' ).text( to );
		} );
	} );

	//Category Menu Options
	customize( 'multicommerce_theme_options[multicommerce-category-menu-text]', function( value ){
		value.bind( function( to ) {
			$( '.category-menu-wrapper .category-menu' ).text( to );
		} );
	} );

	//Menu Right Text
	customize( 'multicommerce_theme_options[multicommerce-menu-right-text]', function( value ){
		value.bind( function( to ) {
			$( '.te-menu-right-wrapper .menu-right-text' ).text( to );
		} );
	} );

	customize( 'multicommerce_theme_options[multicommerce-menu-right-highlight-text]', function( value ){
		value.bind( function( to ) {
			$( '.te-menu-right-wrapper .menu-right-highlight-text' ).text( to );
		} );
	} );

	customize( 'multicommerce_theme_options[multicommerce-menu-right-link-new-tab]', function( value ){
		value.bind( function( is_checked ) {
			if(is_checked){
				$( '.te-menu-right-wrapper .cart-icon' ).attr('target','_blank');
			}else{
				$( '.te-menu-right-wrapper .cart-icon' ).removeAttr('target');
			}
		} );
	} );

	// Site title and description.
	customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	customize( 'blogdescription', function( value ) {

		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	customize( 'multicommerce_theme_options[multicommerce-search-placeholder]', function( value ) {
		value.bind( function( to ) {
			$( '.widget_search input[name="s"]' ).prop( 'placeholder', to );
		} );

	} );


	$( document.body ).on( 'click', '.teg-edit-shortcut', function(){
		var control = $(this).data('control');
		customize.preview.send( 'multicommerce_preview_init', control );
	});

	//console.clear();

} )( jQuery, wp.customize );
