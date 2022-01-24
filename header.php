<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>

        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="profile" href="https://gmpg.org/xfn/11" />
        <link rel="dns-prefetch" href="https://use.typekit.net">
        <link rel="stylesheet" href="https://use.typekit.net/gta0mfy.css">
        <link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/fonts/Mono/Solide_Mirage-Mono_web.woff2" as="font" type="font/woff2" crossorigin>

        <?php wp_head(); ?>
    </head>
    <body <?php body_class('is-hidden') ?>>

        <div data-barba="wrapper">
        </div>

        <header id="masthead" class="site-header site-back-office" role="banner">

            <!-- Site branding -->
            <div class="site-branding">
                <a href="<?php echo esc_url( get_home_url() ); ?>"></a>
            </div>

        </header>

        <div data-barba="container" data-barba-namespace="back-office">
            <div id="page">
