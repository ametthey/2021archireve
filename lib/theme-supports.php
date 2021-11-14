<?php

    /*
     * Add Theme Support
     * @documentation: https://developer.wordpress.org/reference/functions/add_theme_support/
     */
    add_theme_support( 'title-tag' );
    add_theme_support( '' );
    add_theme_support( 'post-formats', ['aside', 'gallery', 'link', 'iamges', 'quote', 'status', 'video', 'audio', 'chat'] );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5' );
    add_theme_support( 'automatic-feed-links' );
    // following are for customizer
    add_theme_support( 'custom-background' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'starter-content' );
