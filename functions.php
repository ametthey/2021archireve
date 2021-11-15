<?php

function _themename_footer_message_uppercase( $message ) {
    $new_message =  strtoupper( $message );

    return $new_message;

}
add_filter( '_themename_footer_message' , '_themename_footer_message_uppercase' , 15 );




require_once( 'lib/theme-supports.php' );
require_once( 'lib/cleanup.php');
require_once( 'lib/enqueue-assets.php' );
require_once( 'lib/javascript.php' );
require_once( 'lib/menu.php' );
require_once( 'lib/custom-admin-bar.php' );
require_once( 'lib/custom-post-type.php' );
require_once( 'lib/custom-post-type-user.php' );
// require_once( 'lib/custom-taxonomy.php' );
// require_once( 'lib/custom-taxonomy-tag.php' );
require_once( 'lib/custom-taxonomy-typologie.php' );
require_once( 'lib/custom-taxonomy-lucidite.php' );
// Modalite du sommeil
require_once( 'lib/custom-taxonomy-sommeil.php' );
require_once( 'lib/custom-taxonomy-humeur.php' );
require_once( 'lib/custom-taxonomy-sens.php' );
require_once( 'lib/custom-taxonomy-lieu.php' );
require_once( 'lib/images.php' );
require_once( 'lib/acf.php' );
require_once( 'lib/users.php' );
// require_once( 'lib/user-profile.php' );

// Login and Register
// require_once( 'lib/login-redirection.php' );
// require_once( 'lib/login-register.php' );
// require_once( 'lib/login-custom.php' );

require_once( 'lib/connexion.php' );
require_once( 'lib/connexion-first-time.php' );
require_once( 'lib/inscription.php' );
// require_once( 'lib/inscription-test.php' );
// require_once( 'lib/inscription-email.php' );

// DASHBOARD
require_once( 'lib/dashboard.php' );


// https://gist.github.com/Rarst/1739714
require_once( 'lib/r-debug.php' );

?>
