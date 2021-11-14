<?php
/*
 * Template Name: profil
 */
get_header(); ?>

<div class="content--home content--profil">

    <div class="profil--header">
        <h1>Profil</h1>
    <?php

    if ( is_user_logged_in() ) {
        if(current_user_can('administrator')) {
            echo 'Je suis administrator';
        } else if ( current_user_can('author') ){
            global $current_user;
            wp_get_current_user();
            ?>

        <div class="profil--header-links">
            <a href="<?php echo get_permalink( get_page_by_title($pseudo , 'reveur_info') ); ?>">
                <h3 class="button--rounded rounded--big">Modifier le profil</h3>
            </a>
            <a href="<?php echo esc_url( get_permalink( 182 ) ); ?>">
                <h3 class="button--rounded rounded--big">Voir mes rêves</h3>
            </a>
            <a href="<?php echo wp_logout_url( get_permalink( 194 ) ); ?>">
                <h3 class="button--rounded rounded--big">Se déconnecter</h3>
            </a>
        </div>

    <?php
            }
        } else if ( ! is_user_logged_in() ) {
            echo 'Vous n\'êtes pas autorisés à être ici !';
        }
    ?>
    </div>

    <div class="profil--utilisateur">

        <?php


        ?>

    </div>

</div>

<?php get_footer(); ?>

