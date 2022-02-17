<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="profile" href="https://gmpg.org/xfn/11" />
        <?php wp_head(); ?>

        <link rel="stylesheet" href="https://use.typekit.net/gta0mfy.css">

    </head>
    <body <?php body_class('is-home') ?> data-barba="wrapper">

        <main data-barba="container" data-barba-namespace="home">
            <?php get_template_part('template-parts/header/content', 'logo-home-animation'); ?>
        </main>

        <header id="masthead" class="site-header header-home" role="banner">
            <div class="container--header">

                <?php
                    // IF USER IS LOGGED IN
                    if ( is_user_logged_in() ) {

                        // IF USER IS ADMINISTATOR
                        if( current_user_can('administrator') ) {
                            get_template_part('template-parts/header/connexion-inscription');
                            get_template_part('template-parts/header/branding');
                            get_template_part('template-parts/header/retour-aux-reves');
                            get_template_part('template-parts/header/connexion-mobile-autre');

                        // IF USER IS AUTHOR
                        } else if ( current_user_can('author') ) {

                            // get the current user
                            global $current_user;
                            $pseudo = $current_user->user_nicename;
                            wp_get_current_user();

                            // to use $pseudo in template_parts
                            set_query_var( 'pseudo', $pseudo );

                            get_template_part('template-parts/header/pseudo-mes-reves');
                            get_template_part('template-parts/header/branding');
                            get_template_part('template-parts/header/retour-aux-reves');
                            get_template_part('template-parts/header/connexion-mobile-reveur');

                        // IF USER IS NOBODI !
                        } else {

                            get_template_part('template-parts/header/connexion-inscription');
                            get_template_part('template-parts/header/branding');
                            get_template_part('template-parts/header/retour-aux-reves');
                            get_template_part('template-parts/header/connexion-mobile-autre');
                        }


                    // IF USER IS NOT LOGGED IN
                    } else if ( ! is_user_logged_in() ) {

                        get_template_part('template-parts/header/connexion-inscription');
                        get_template_part('template-parts/header/branding');
                        get_template_part('template-parts/header/retour-aux-reves');
                        get_template_part('template-parts/header/connexion-mobile-autre');
                    }

                ?>

            </div>
        </header>

        <!-- A Propos for mobile -->
        <?php get_template_part( 'template-parts/header/apropos-mobile' ); ?>
