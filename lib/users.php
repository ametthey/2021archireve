<?php


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
