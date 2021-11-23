    <div class="container--cover container--filtres-cover">
        <h3 class="title--apropos-cover">FILTRES</h3>
    </div>
    <div class="content--left-close left--filter">
        <img class="content--left-close-button" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/closeButton.svg">
    </div>

    <div class="filtres--list is-hidden filters">
        <h4 class="content-left-container-title left--filter">TagS<img class="tooltip-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/infoBulle.svg">
            <span class="tooltip-text"><?php the_field( 'recherche_tag', 'option'  ); ?></span>
        </h4>
        <?php get_template_part('template-parts/content/content', 'left-tag'); ?>

        <div class="ui-group lucidite--container left--filter">
            <h4 class="content-left-container-title left--filter">Niveau de lucidité <img class="tooltip-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/infoBulle.svg">
                <span class="tooltip-text"><?php the_field( 'niveau_de_lucidite_tooltip', 'option'  ); ?></span>
            </h4>
            <div class="js-radio-button-group">

                <?php
                    // https://designorbital.com/snippets/how-to-get-all-taxonomies-for-a-post-type/
                    $terms = get_terms( 'niveaudelucidite' );
                    $field_lucidite = the_field('niveau_de_lucidite_tooltip');
                    $o = 0;

                    foreach ( $terms as $term ) {

                        // EACH
                        echo '<button class="button lucidite--item button--rounded ' . $term->slug . '" data-filter=".' . $term->slug .'" aria-hidden="true">' . $term->name . '</button>';
                        $o++;
                    }
                ?>

            </div>
        </div>

        <div class="ui-group lucidite--container typopologie--container left--filter">
            <h4 class="content-left-container-title left--filter">Typologie de rêve <img class="tooltip-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/infoBulle.svg">
                <span class="tooltip-text"><?php the_field( 'recherce_typologie_de_reves', 'option'  ); ?></span>
            </h4>
            <div class="js-radio-button-group">

                <?php
                    $terms = get_terms( 'typologiedereve');
                    $o = 0;

                    foreach ( $terms as $term ) {

                        // EACH
                        echo '<button class="button lucidite--item typologie--item button--rounded ' . $term->slug . '" data-filter=".' . $term->slug .'">' . $term->name . '</button>';
                        $o++;
                    }
                ?>

            </div>
        </div>

        <div class="ui-group calendrier--container left--filter">
            <h4 class="content-left-container-title left--filter">Période <img class="tooltip-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/infoBulle.svg">
                <span class="tooltip-text"><?php the_field( 'recherche_periode', 'option'  ); ?></span>
            </h4>
            <div class="js-radio-button-group">
                <?php get_template_part('template-parts/content/content', 'left-date'); ?>
            </div>
        </div>

        <?php // get_template_part('template-parts/content/content', 'left-lucidite'); ?>
        <?php // get_template_part('template-parts/content/content', 'left-typologie'); ?>

        <!-- Supprimer les filtres  -->
        <div class="content--left-reset-filters lucidite--container left--filter ui-group">
            <div class="js-radio-button-group">
                <h5 class="btn clear"><img class="content--left-close-button" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/closeButton.svg">supprimer les filtres</h5>
            </div>
        </div>

    </div>
