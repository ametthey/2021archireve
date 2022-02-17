<?php
! defined( 'ABSPATH' ) AND exit;

/*
 * Remove admin bar for every user except admin
 * https://www.wpbeginner.com/wp-tutorials/how-to-disable-wordpress-admin-bar-for-all-users-except-administrators/
 */

function _themename_remove_admin_bar_for_everyone() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', '_themename_remove_admin_bar_for_everyone');



// Remove access to back-office to usrs
// https://wordpress.stackexchange.com/questions/66093/how-to-prevent-access-to-wp-admin-for-certain-user-roles
function wpse66093_no_admin_access()
{
    // Do not run if the user is logged in and trying to log out
    // This might need one or two more checks.
    // Especially if you have custom login/logout/reset password/etc rules and routes set up.
    if (
        ! is_admin()
        || (
            is_user_logged_in()
            && isset( $GLOBALS['pagenow'] ) AND 'wp-login.php' === $GLOBALS['pagenow']
        )
    ) {
        return;
    }

    $redirect = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : home_url( '/' );
    if (
        current_user_can( 'author' )
        OR current_user_can( 'author' )
    )
        exit( wp_redirect( $redirect ) );
}
add_action( 'admin_init', 'wpse66093_no_admin_access', 100 );
