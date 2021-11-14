<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>

        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="profile" href="https://gmpg.org/xfn/11" />
        <link rel="stylesheet" href="https://use.typekit.net/gta0mfy.css">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class('is-hidden') ?>>

        <?php echo "<script>console.log('We are using the file header.php');</script>"; ?>

        <div class="content">

            <header id="masthead" class="site-header" role="banner">

                <!-- Trigger a propos pour mobile -->
                <div id="header--mobile-apropos" class="button--round round--black"></div>

                <!-- Site branding -->
                <div class="site-branding">
                    <a href="<?php echo esc_url( get_home_url() ); ?>" >
                        <?php get_template_part( 'template-parts/content', 'logo' ); ?>
                    </a>
                </div>

                <!-- Connexion pour mobile -->
                <div id="mobile--connexion" class="button--rounded"><a href="<?php echo esc_url( get_page_link( 194 ) ); ?>"><p>CONNEXION</p></a></div>

            </header>

        <!-- A Propos for mobile -->
        <?php get_template_part( 'template-parts/content/content', 'right-propos-header' ); ?>

        <!-- <main id="swup" class="transition&#45;fade"> -->
        <?php
            if ( is_page_template( 'page-test.php' ) ) {
                echo '<div id="page" class="page-test filters">';
                get_template_part( 'template-parts/transition', 'loader-home' );
            } else {
                echo '<div id="page">';
                get_template_part( 'template-parts/transition', 'loader-page' );
            }
        ?>

