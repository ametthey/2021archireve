<?php

// Ajouter un message personnalisé sur la page d'admin/ de connexion
// https://smallenvelop.com/add-custom-message-wordpress-login-page/
function _themename_custom_login_message( $message ) {
    if ( empty($message) ){
        return "<h1>CONNEXION</h1><h2>ENTRER VOTRE ADRESSE MAIL POUR VOUS CONNECTER</h2>";
    } else {
        return $message;
    }
}

add_filter( 'login_message', '_themename_custom_login_message' );

// ajouter un message personnalisé sur la page d'inscription
// https://www.isitwp.com/display-custom-message-user-registration-page/
add_action('register_form', 'register_message');
function register_message() {
    $html = '';
    echo $html;
}

