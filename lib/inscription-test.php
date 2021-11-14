<?php

/*
 * https://code.tutsplus.com/fr/tutorials/creating-a-custom-wordpress-registration-form-plugin--cms-20968
 * https://gist.github.com/deep-amristar/3cb0436e57ef01e1ab73745d63634229
 *
 */

// function custom_registration_function() {
//     if (isset($_POST['submit'])) {
//         registration_validation(
//         $_POST['username'],
//         $_POST['password'],
//         $_POST['email'],
// 		);
//
// 		// sanitize user form input
//         // global $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio;
//         global $username, $password, $email;
//         $username	= 	sanitize_user($_POST['username']);
//         $password 	= 	esc_attr($_POST['password']);
//         $email 		= 	sanitize_email($_POST['email']);
//
// 		// call @function complete_registration to create the user
// 		// only when no WP_error is found
//         complete_registration(
//         $username,
//         $password,
//         $email,
// 		);
//     }
//
//     registration_form(
//     	$username,
//         $password,
//         $email,
// 		);
// }
