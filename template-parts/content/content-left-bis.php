<div class="content--left content--left-bis">

    <div class="content--left-close left--filter">
        <img class="content--left-close-button" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/closeButton.svg">
    </div>

    <div class="content--left-cover">
        <h3>filtres</h3>
    </div>

    <h4 class="content-left-container-title left--filter">TagS<img class="tooltip-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/infoBulle.svg">
        <span class="tooltip-text"><?php the_field( 'recherche_tag', 'option'  ); ?></span>
    </h4>
    <?php get_template_part('template-parts/content/content', 'left-tag'); ?>

    <h4 class="content-left-container-title left--filter">Niveau de lucidité <img class="tooltip-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/infoBulle.svg">
        <span class="tooltip-text"><?php the_field( 'niveau_de_lucidite_tooltip', 'option'  ); ?></span>
    </h4>
    <?php get_template_part('template-parts/content/content', 'left-lucidite'); ?>

    <h4 class="content-left-container-title left--filter">Typologie de rêve <img class="tooltip-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/infoBulle.svg">
        <span class="tooltip-text"><?php the_field( 'recherce_typologie_de_reves', 'option'  ); ?></span>
    </h4>
    <?php get_template_part('template-parts/content/content', 'left-typologie'); ?>

    <!-- NEW FILTERS TEMPLATE PARTS -->
    <?php get_template_part( 'template-parts/left/filters'); ?>

    <h4 class="content-left-container-title left--filter">Période <img class="tooltip-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/infoBulle.svg">
        <span class="tooltip-text"><?php the_field( 'recherche_periode', 'option'  ); ?></span>
    </h4>
    <?php get_template_part('template-parts/content/content', 'left-date'); ?>

    <div class="content--left-reset-filters lucidite--container left--filter button-group js-radio-button-group">
        <h5 class="button" data-filter=""><img class="content--left-close-button" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/closeButton.svg">supprimer les filtres</h5>
    </div>


</div>
