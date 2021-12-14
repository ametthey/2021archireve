<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>

        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="profile" href="https://gmpg.org/xfn/11" />
        <link rel="dns-prefetch" href="https://use.typekit.net">
        <link rel="stylesheet" href="https://use.typekit.net/gta0mfy.css">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class('is-hidden') ?>>

        <div id="page">

            <header id="masthead" class="site-header site-back-office" role="banner">

                <!-- Site branding -->
                <div class="site-branding">
                    <a href="<?php echo esc_url( get_home_url() ); ?>"></a>
                </div>

            </header>

        <!-- A Propos for mobile -->
        <?php get_template_part( 'template-parts/content/content', 'right-propos-header' ); ?>


