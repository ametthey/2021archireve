<?php
/*
 * How to Build A Fully Customized WordPress Login Page
 * https://www.hongkiat.com/blog/wordpress-custom-loginpage/
 */

 /*
  * redirect to custom login page
  */
function _themename_redirect_login_page() {

    // Change /connexion/ to custom page
    $login_page  = home_url( 'connexion/' );
    $page_viewed = basename($_SERVER['REQUEST_URI']);

    if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($login_page);
        exit;
    }
}
add_action('init','_themename_redirect_login_page');



/*
 * If failed login redirect to custom login page
 */
function _themename_login_failed() {
  $login_page  = home_url( '/connexion/' );
  wp_redirect( $login_page . '?login=failed' );
  exit;
}
add_action( 'wp_login_failed', '_themename_login_failed' );

/*
 * if wrong password redirection to custom login page
 */
function _themename_verify_username_password( $user, $username, $password ) {
  $login_page  = home_url( '/connexion/' );
    if( $username == "" || $password == "" ) {
        // wp_redirect( $login_page . "?login=empty" );
        wp_redirect( $login_page );
        exit;
    }
}
add_filter( 'authenticate', '_themename_verify_username_password', 1, 3);

/*
 * Redirect user to certains pages
 * https://tommcfarlin.com/redirect-non-admin/
 *
 * redirect administator to admin_url
 * rediret other users with less capabilities to custom page - back office
 */

function _themename_redirect_user_after_login( $redirect_to, $request, $user  ) {
    $profil_page = home_url( '/back-office/' );
    return ( is_array( $user->roles ) && in_array( 'administrator', $user->roles ) ) ? admin_url() : $profil_page ;
}
add_filter( 'login_redirect', '_themename_redirect_user_after_login', 10, 3 );


/*
 * Redirect to home page after logout
 *
 */
function _themename_auto_redirect_after_logout(){
  wp_safe_redirect( home_url() );
  exit;
}
add_action('wp_logout','_themename_auto_redirect_after_logout');
