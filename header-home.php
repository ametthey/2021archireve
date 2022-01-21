<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>

        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="profile" href="https://gmpg.org/xfn/11" />
        <?php wp_head(); ?>
        <link rel="stylesheet" href="https://use.typekit.net/gta0mfy.css">

    </head>
    <body <?php body_class('is-home') ?>>

        <?php get_template_part('template-parts/header/content', 'logo-home-animation'); ?>

        <header id="masthead" class="site-header header-home" role="banner">
            <div class="container--header">
                <?php

                if ( is_user_logged_in() ) {
                    if(current_user_can('administrator')) {
                    } else if ( current_user_can('author') ){
                        global $current_user;
                        $pseudo = $current_user->user_nicename;
                        wp_get_current_user();
                ?>

                <div class="site-header-user">
                    <div id="left--connexion" class="left--filter button--rounded left--connexion-user">
                        <a href="<?php echo $home_url . '/reveur_info/' . $pseudo; ?>">
                            <p><?php echo $pseudo; ?></p>
                        </a>
                    </div>
                    <div id="left--inscription" class="left--filter button--rounded left--inscription">
                        <a href="<?php echo esc_url( get_permalink(  get_page_by_title('back-office', OBJECT , 'page')) ); ?>">
                            <p>Mes rêves</p>
                        </a>
                    </div>
                </div>

                <?php
                    }
                } else if ( ! is_user_logged_in() ) {
                ?>

                <div class="site-header-user">
                    <div id="left--connexion" class="left--filter button--rounded">
                        <a href="<?php echo esc_url( get_permalink(  get_page_by_title('connexion', OBJECT , 'page')) ); ?>">
                            <p>CONNEXION</p>
                        </a>
                    </div>
                    <div id="left--inscription" class="left--filter button--rounded">
                        <a href="<?php echo esc_url( get_permalink(  get_page_by_title('inscription', OBJECT , 'page')) ); ?>">
                            <p>INSCRIPTION</p>
                        </a>
                    </div>
                </div>
                <?php
                }

                ?>

                    <!-- Trigger a propos pour mobile -->
                    <div id="header--mobile-apropos" class="button--round round--black"></div>

                    <!-- Site branding -->
                    <div class="site-branding">
                        <a href="<?php echo esc_url( home_url() ); ?>" ></a>
                    </div>

                    <!-- Connexion pour mobile -->
                    <?php

                    // UTILISATEUR CONNECTE
                    if ( is_user_logged_in() ) {
                        if(current_user_can('administrator')) {
                        } else if ( current_user_can('author') ){
                            global $current_user;
                            $pseudo = $current_user->user_nicename;
                            wp_get_current_user();
                    ?>
                        <div id="mobile--connexion" class="button--rounded connexion">
                            <a href="<?php echo $home_url . '/reveur_info/' . $pseudo; ?>">
                                <p><?php echo $pseudo; ?></p>
                            </a>
                        </div>

                    <?php
                        }
                    // UTILISATEUR NON CONNECTE
                    } else if ( ! is_user_logged_in() ) {
                    ?>

                        <div id="mobile--connexion" class="button--rounded connected">
                            <a href="<?php echo esc_url( get_permalink(  get_page_by_title('connexion', OBJECT , 'page')) ); ?>">
                                <p>CONNEXION</p>
                            </a>
                        </div>

                    <?php
                    }

                    ?>

                    <!-- placeholder for centering -->
                    <div class="header-empty is-hidden"><div class="back-reve button--rounded"><p>Retour aux rêves</p></div></div>
            </div>

        </header>

        <!-- A Propos for mobile -->
        <?php // get_template_part( 'template-parts/header/apropos-mobile' ); ?>

        <div id="page">

