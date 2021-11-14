<?php

/*
 * https://code.tutsplus.com/fr/tutorials/creating-a-custom-wordpress-registration-form-plugin--cms-20968
 * https://gist.github.com/deep-amristar/3cb0436e57ef01e1ab73745d63634229
 *
 */

function _themename_custom_registration_function() {
    if (isset($_POST['submit'])) {
        registration_validation(
        $_POST['username'],
        $_POST['password'],
        $_POST['email'],
		);

		// sanitize user form input
        // global $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio;
        global $username,  $email, $password;
        $username	= 	sanitize_user($_POST['username']);
        $password 	= 	esc_attr($_POST['password']);
        $email 		= 	sanitize_email($_POST['email']);

		// call @function complete_registration to create the user
		// only when no WP_error is found
        complete_registration(
        $username,
        $password,
        $email,
		);
    }

    registration_form(
    	$username,
        $password,
        $email,
		);

}

function registration_form( $username, $password, $email) {

    echo '
    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post" class="form--inscription">

        <div class="username">
            <label for="username">Pseudo</label>
            <input type="text" name="username" value="' . (isset($_POST['username']) ? $username : null) . '">
        </div>

        <div class="email">
            <label for="email">Mail</label>
            <input type="text" name="email" value="' . (isset($_POST['email']) ? $email : null) . '">
        </div>

        <div class="password">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" value="' . (isset($_POST['password']) ? $password : null) . '">
        </div>


        <div class="login_fields">
            <input type="submit" name="submit" value="CONTINUER" class="user-submit"/>
        </div>
	</form>
	';
}

// function registration_validation( $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio )  {
function registration_validation( $username, $password, $email )  {
    global $reg_errors;
    $reg_errors = new WP_Error;

    if ( empty( $username ) || empty( $password ) || empty( $email ) ) {
        $reg_errors->add('field', 'Veuillez remplir les champs requis');
    }

    if ( strlen( $username ) < 4 ) {
        $reg_errors->add('username_length', 'Le pseudo est trop court. Choisisez au moins 4 caractères.');
    }

    if ( username_exists( $username ) )
        $reg_errors->add('user_name', 'Désolé, ce nom d\'utilisateur est déjà utilisé');

    if ( !validate_username( $username ) ) {
        $reg_errors->add('username_invalid', 'Désolé, le pseudo que vous avez entré n\'est pas valide.');
    }

    if ( strlen( $password ) < 5 ) {
        $reg_errors->add('password', 'Le mot de passe doit contenu plus de 5 caractères.');
    }

    if ( !is_email( $email ) ) {
        $reg_errors->add('email_invalid', 'Le mail n\'est pas valide');
    }

    if ( email_exists( $email ) ) {
        $reg_errors->add('email', 'Mail déjà utilisé');
    }

    // https://wordpress.stackexchange.com/questions/188417/why-is-wp-error-is-not-returning-false-even-theres-no-defined-error
    if ( is_wp_error( $error ) && ! empty( $error->errors ) ) {

        echo '<div class="registration--error-container is-active">';
        echo '<h2>ERREUR</h2>';
        echo '<div class="button--round round--white"></div>';

            foreach ( $reg_errors->get_error_messages() as $error ) {
                echo '
                        <div class="registration--error-item">
                            <h3>• ' . $error . '</h3>
                        </div>
                ';
            }
        echo '</div>';
    }
}

function complete_registration() {
    global $reg_errors, $username, $password, $email;

    if ( 1 > count( $reg_errors->get_error_messages() ) ) {

        // Informations sur le user
        $userdata = array(
            'user_login'	=> 	$username,
            'user_email' 	=> 	$email,
            'user_pass' 	=> 	$password,
		);
        $user = wp_insert_user( $userdata );

        // Message indiquant que le user a bien été créé
        echo '
            <div class="wrapper--merci">
                <div class="container--merci">
                    <h1 class="container--merci-title">MERCI ' . $username . '!</h1>
                    <h2 class="container--merci-subtitle">nous avons envoyé un mail à ' . $email . '.
                        Cliquez sur le lien pour activer votre compte.</h2>
                </div>
            </div>
        ';

        // Message to the console to check if the registration is successful
        echo '<script>console.log("The user ' . $username . ' has won a new registration. And email is ' . $email . '");</script>';

        // ENVOI D'UN EMAIL DE CONFIRMATION
        // https://developer.wordpress.org/reference/hooks/wp_new_user_notification_email/
        add_filter( 'wp_new_user_notification_email', 'custom_wp_new_user_notification_email', 10, 3 );
        // function custom_wp_new_user_notification_email( $wp_new_user_notification_email, $username, $blogname ) {
        //
        //     $wp_new_user_notification_email['subject'] = sprintf( 'Confirmation de votre inscription sur le site Archirêve', $blogname, $username->user_login );
        //
        //     $message .= __('Merci de votre inscription à Archirêve');
        //     $message .= __('Voici les identifiants que vous avez remplis sur la page d\'inscription');
        //     $message .= __('Pseudo' . $username);
        //     $message .= __('Email' . $email);
        //     $message .= __('Mot de passe' . $password);
        //     $message .= __('Vous pouvez maintenant vous connecter et remplir le formulaire d\informations avant de publier enfin votre premier rêve !');
        //     $message .= __('<https:www.2021archireve.dev>');
        //
        //     $wp_new_user_notification_email['message'] = $message;
        //
        //     $wp_new_user_notification_email['headers'] = "De Archirêve";
        //
        //     return $wp_new_user_notification_email;
        // }
        /**
            * Custom register email
         */
        add_filter( 'wp_new_user_notification_email', 'custom_wp_new_user_notification_email', 10, 3 );
        function custom_wp_new_user_notification_email( $wp_new_user_notification_email, $user, $blogname ) {

            $user_login = stripslashes( $user->user_login );
            $user_email = stripslashes( $user->user_email );
            $login_url  = wp_login_url();
            $message  = __( 'Hi there,' ) . "/r/n/r/n";
            $message .= sprintf( __( "Welcome to %s! Here's how to log in:" ), get_option('blogname') ) . "/r/n/r/n";
            $message .= wp_login_url() . "/r/n";
            $message .= sprintf( __('Username: %s'), $user_login ) . "/r/n";
            $message .= sprintf( __('Email: %s'), $user_email ) . "/r/n";
            $message .= __( 'Password: The one you entered in the registration form. (For security reason, we save encripted password)' ) . "/r/n/r/n";
            $message .= sprintf( __('If you have any problems, please contact me at %s.'), get_option('admin_email') ) . "/r/n/r/n";
            $message .= __( 'bye!' );

            $wp_new_user_notification_email['subject'] = sprintf( '[%s] Your credentials.', $blogname );
            $wp_new_user_notification_email['headers'] = array('Content-Type: text/html; charset=UTF-8');
            $wp_new_user_notification_email['message'] = $message;

            return $wp_new_user_notification_email;
        }
	}

}

// Register a new shortcode: [_themename_custom_registration]
add_shortcode('_themename_custom_registration', 'custom_registration_shortcode');

// The callback function that will replace [book]
function custom_registration_shortcode() {
    ob_start();
    _themename_custom_registration_function();
    return ob_get_clean();
}

