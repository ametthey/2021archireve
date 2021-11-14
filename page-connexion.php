<?php
    /*
     * Template Name: connexion
     */

?>
<?php get_header(); ?>

<div class="container--connexion">
    <h1>CONNEXION</h1>

    <h2>ENTRER VOTRE ADRESSE MAIL POUR VOUS CONNECTER</h2>

    <?php

    $args = array(
        'echo'  => true,
        // 'redirect' => ''
        'form_id' => 'connexion_form',
        'label_username' => 'Mail',
        'label_password' => 'Mot de passe',
        'label_log_in'  => 'Continuer',
        'remember' => false,

    );
    wp_login_form( $args );

    $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;

    if ( $login === "failed" ) {
        echo '<p class="login-msg"><strong>ERREUR:</strong> Nom d\'utilisateur ou mot de passe incorrect.</p>';
    } elseif ( $login === "empty" ) {
        echo '<p class="login-msg"><strong>ERREUR:</strong> Nom d\'utilisateur ou mot de passe vide.</p>';
    } elseif ( $login === "false" ) {
        echo '<p class="login-msg"><strong>ERREUR:</strong> Vous êtes déconnecté.</p>';
    }
    ?>
</div>


<?php get_footer(); ?>
