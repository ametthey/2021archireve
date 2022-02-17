<div class="debug">
    <?php
        // R_Debug::list_hooks();

        // IF USER IS LOGGED IN
        if ( is_user_logged_in() ) {

            // IF USER IS ADMINISTATOR
            if( current_user_can('administrator') ) {
                echo ' user is administartor';

            // IF USER IS AUTHOR
            } else if ( current_user_can('author') ) {
                echo ' user is author<br>';
                global $current_user;
                $pseudo = $current_user->user_nicename;
                wp_get_current_user();

                echo 'le pseudo est ' . $pseudo;

            // IF USER IS NOBODI !
            } else {
                echo ' user is who ?';
            }


        // IF USER IS NOT LOGGED IN
        } else if ( ! is_user_logged_in() ) {
            echo 'user is not logged in';
        }
    ?>
</div>
