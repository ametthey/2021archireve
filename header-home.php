<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>

        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="profile" href="https://gmpg.org/xfn/11" />
        <link rel="stylesheet" href="https://use.typekit.net/gta0mfy.css">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class('is-home') ?>>

        <?php echo "<script>console.log('We are using the file header-home.php');</script>"; ?>

        <?php // get_template_part('template-parts/content', 'logo-home-animation'); ?>

        <!-- <div class="content"> -->


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
                    <div class="header--user rounded--black button--rounded">
                        <p><?php echo $pseudo; ?></p>
                    </div>
                    <div id="left--connexion" class="left--filter button--rounded left--connexion-user">
                        <a href="<?php echo $home_url . '/reveur_info/' . $pseudo; ?>">
                            <p>Mon profil</p>
                        </a>
                    </div>
                    <div id="left--inscription" class="left--filter button--rounded left--inscription">
                        <a href="<?php echo esc_url( get_page_link( 182 ) ) ;?>">
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
                        <a href="<?php echo esc_url( get_page_link( 194 ) ); ?>">
                            <p>CONNEXION</p>
                        </a>
                    </div>
                    <div id="left--inscription" class="left--filter button--rounded">
                        <a href="<?php echo esc_url( get_page_link( 190 ) ) ;?>">
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
                        <a href="<?php echo esc_url( get_permalink( 134 ) ); ?>" >
                            <?php get_template_part( 'template-parts/content', 'logo' ); ?>
                        </a>
                    </div>

                    <!-- Connexion pour mobile -->
                    <?php

                    if ( is_user_logged_in() ) {
                        if(current_user_can('administrator')) {
                        } else if ( current_user_can('author') ){
                            global $current_user;
                            $pseudo = $current_user->user_nicename;
                            wp_get_current_user();
                    ?>
                        <div id="mobile--connexion" class="button--rounded connexion"><a href="<?php echo esc_url( get_page_link( 194 ) ); ?>"><p>CONNEXION</p></a></div>

                    <?php
                        }
                    } else if ( ! is_user_logged_in() ) {
                    ?>

                        <div id="mobile--connexion" class="button--rounded connected">
                            <a href="<?php echo $home_url . '/reveur_info/' . $pseudo; ?>">
                                <p>Mon profil</p>
                            </a>
                        </div>

                    <?php
                    }

                    ?>

                    <!-- placeholder for centering -->
                    <div class="header-empty is-hidden"><div class="back-reve button--rounded"><p>Retour aux rêves</p></div></div>
            </div>



            <div class="container--header-back-office">
                <?php get_template_part( 'template-parts/content', 'connexion' ); ?>
                <?php get_template_part( 'template-parts/content', 'inscription' ); ?>
            </div>

        </header>

        <!-- A Propos for mobile -->
        <?php get_template_part( 'template-parts/content/content', 'right-propos-header' ); ?>

        <div id="page">

