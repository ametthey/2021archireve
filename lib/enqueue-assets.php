<?php

/**************************************************************************
 *
 * Load Stylesheet
 *
 ***********************************************************************/

// Bundle stylesheet
add_action( 'wp_enqueue_scripts', '_themename_bundle_assets' );
function _themename_bundle_assets() {


    // HOME
    if ( is_front_page() && is_home() ) {
        wp_enqueue_style( '_themename-stylesheet-home', get_stylesheet_directory_uri() . '/dist/assets/css/bundle.css', array(), filemtime( get_template_directory().'/dist/assets/css/bundle.css' ) ,  'all' );
        wp_enqueue_script( '_themename-scripts-home', get_stylesheet_directory_uri() . '/dist/assets/js/home.js',array('jquery', 'acf-input') , filemtime( get_template_directory().'/dist/assets/js/home.js' ) ,   true );


    // CREATION ET MODIFICATION REVE
    } elseif  ( is_page_template('page-creation-reve.php') && is_singular() ) {
        wp_enqueue_style( '_themename-stylesheet-edit-reve', get_stylesheet_directory_uri() . '/dist/assets/css/bundle.css', array(), filemtime( get_template_directory().'/dist/assets/css/bundle.css' ) ,  'all' );
        wp_enqueue_script( '_themename-scripts-creation-reve', get_stylesheet_directory_uri() . '/dist/assets/js/edit-reve.js',array('jquery', 'acf-input') , filemtime( get_template_directory().'/dist/assets/js/edit-reve.js' ) ,   true );
    } else {
        wp_enqueue_style( '_themename-stylesheet-else', get_stylesheet_directory_uri() . '/dist/assets/css/bundle.css', array(), filemtime( get_template_directory().'/dist/assets/css/bundle.css' ) ,  'all' );
        wp_enqueue_script( '_themename-scripts-else', get_stylesheet_directory_uri() . '/dist/assets/js/main.js',array('jquery', 'acf-input') , filemtime( get_template_directory().'/dist/assets/js/main.js' ) ,   true );
    }

}

add_action( 'wp_print_styles', '_themename_my_deregister_styles', 100 );
function _themename_my_deregister_styles() {
    // WP
    wp_deregister_style( 'wp-block-library' );

    // USER REGISTRATION
    wp_deregister_style( 'sweetalert2' );
    wp_deregister_style( 'user-registration-general' );
    wp_deregister_style( 'user-registration-smallscreen' );
    wp_deregister_style( 'user-registration-my-account-layout' );

    // COOKIE-NOTICE
    // wp_deregister_style( 'cookie-notice-front' );
}

add_action( 'wp_enqueue_scripts', '_themename_my_deregister_scripts' );
function _themename_my_deregister_scripts() {
    wp_deregister_script( 'wp-embed' );
    // wp_deregister_script('jquery');
}

/***********************************************************************
 *
 * Defer JavaScript Scripts
 *
 ***********************************************************************/

add_filter( 'script_loader_tag', '_themename_defer_parsing_of_js', 10 );
function _themename_defer_parsing_of_js( $url ) {
    if ( is_user_logged_in() ) return $url; //don't break WP Admin
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'jquery.js' ) ) return $url;
    return str_replace( ' src', ' defer src', $url );
}

/***********************************************************************
 *
 * Remove jQuery Migrate
 *
 ***********************************************************************/

// add_action( 'wp_default_scripts', 'remove_jquery_migrate' );
function remove_jquery_migrate( $scripts ) {
    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
        $script = $scripts->registered['jquery'];
        if ( $script->deps ) {
            // Check whether the script has any dependencies

            $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
        }
    }
}
