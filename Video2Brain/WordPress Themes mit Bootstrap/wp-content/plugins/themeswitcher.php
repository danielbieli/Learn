<?php
/**
 * Plugin Name: Themeswitcher
 * Description: Unterschiedliche Themes für eingeloggte und nicht eingeloggte Nutzer/innen
*/

! defined( 'ABSPATH' ) and exit;

add_filter( 'template', 'themeswitcher' );
add_filter( 'option_template', 'themeswitcher' );
add_filter( 'option_stylesheet', 'themeswitcher' );


function themeswitcher( $template = '' ) {

	if ( is_user_logged_in() )	return 'berge';	
	return 'twentyfourteen';

}