<?php
/*
 * https://wp-mix.com/wordpress-first-user-login/
 */

// Step 1: Add User Meta on Registration
// This adds an entry to the user meta that indicates that they are a new user. We will then be able to use this information in the next step.
function shapeSpace_register_add_meta($user_id) {
	add_user_meta($user_id, '_new_user', '1');
}
add_action('user_register', 'shapeSpace_register_add_meta');

// Step 2: Check First Login and Do Something
function shapeSpace_first_user_login($user_login, $user) {
	$new_user = get_user_meta($user->ID, '_new_user', true);
	if ($new_user) {
		update_user_meta($user->ID, '_new_user', '0');

		// do something for first login.. e.g., send a custom email
        $inscription_information = home_url('/inscription-information/');
        wp_redirect($inscription_information);
        exit;

        echo '<script>console.log("what?")</script>';

	}
}
add_action('wp_login', 'shapeSpace_first_user_login', 10, 2);
