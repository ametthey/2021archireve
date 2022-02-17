<?php
    require_once( 'lib/acf.php' );
    require_once( 'lib/cleanup.php');
    require_once( 'lib/connexion-first-time.php' );
    require_once( 'lib/connexion.php' );
    require_once( 'lib/custom-admin-bar.php' );
    require_once( 'lib/custom-post-type-user.php' );
    require_once( 'lib/custom-post-type.php' );
    require_once( 'lib/custom-taxonomy-humeur.php' );
    require_once( 'lib/custom-taxonomy-lieu.php' );
    require_once( 'lib/custom-taxonomy-lucidite.php' );
    require_once( 'lib/custom-taxonomy-sens.php' );
    require_once( 'lib/custom-taxonomy-sommeil.php' );
    require_once( 'lib/custom-taxonomy-typologie.php' );
    require_once( 'lib/dashboard.php' );
    require_once( 'lib/enqueue-assets.php' );
    require_once( 'lib/images.php' );
    require_once( 'lib/inscription.php' );
    require_once( 'lib/menu.php' );
    require_once( 'lib/r-debug.php' );
    require_once( 'lib/theme-supports.php' );
    require_once( 'lib/show-hide-admin-bar.php' );
    require_once( 'lib/custom-date-reveur-info.php' );

    function get_user($type = 'ID') {
        global $current_user;
        get_currentuserinfo();

        switch ($type)
        {
        case 'ID':
            return $current_user->ID;
            break;
        case 'displayname':
            return $current_user->display_name;
            break;
        case 'username':
            return $current_user->user_login;
            break;
        case 'firstname':
            return $current_user->user_firstname;
            break;
        case 'lastname':
            return $current_user->user_lastname;
            break;
        case 'level':
            return $current_user->user_level;
            break;
        case 'email':
            return $current_user->user_email;
            break;
        default:
            return;
        }
    }


?>
