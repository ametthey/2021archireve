    <!-- VERTICAL COVER TEXT -->
    <div class="container--cover container--filtres-cover">
        <h3 class="title--apropos-cover">FILTRES</h3>
    </div>


    <!-- CLOSE BUTTON -->
    <div class="content--left-close left--filter">
        <img class="content--left-close-button" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/closeButton.svg" alt="close button">
    </div>

    <!-- ALL FILTERS -->
    <div class="filtres--list is-hidden filters">
        <h4 class="content-left-container-title left--filter">TagS</h4>

        <!-- SEARCH FOR TAG ONLY -->
        <div class="tagsearch--container left--filter">
            <div class="tagsearch-wrapper">
                <input type="text" id="search-term" data-filter="tagName" class="tagsearch" placeholder="RECHERCHER UN TAG..." />
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/loupe.svg" alt="loupe">
            </div>
        </div>

        <!-- SELECTION OF TAGS -->
        <div class="tagitems--container js-radio-button-group left--filter">
        <?php
            $args = array(
                'orderby' => 'date',
                'order'   => 'DESC',
                'post_type'      => 'reve',
                'posts_per_page' => -1,
            );
            $home_projects = new WP_Query( $args );
            if ( $home_projects->have_posts() ) : $i = 0; while ( $home_projects->have_posts() ) : $home_projects->the_post(); $i++;

                $tagString = get_field( 'tag' );
                $tagArray = explode(",", str_replace(" ","",$tagString));
                shuffle( $tagArray );

                foreach ( $tagArray as $tag ) {
                    echo '<button class="button tagitem button--squared no-button-syle ' . $tag . '" data-filter=".' . $tag .'" aria-hidden="true"><p>' . $tag . '</p></button>';
                }

            endwhile; endif; wp_reset_postdata();
        ?>
        </div>

        <!-- NIVEAU DE LUCIDITE -->
        <div class="ui-group lucidite--container left--filter">
            <h4 class="content-left-container-title left--filter">Niveau de lucidité<div class="filter--title-information" data-filtre="lucidite">i</div></h4>
            <div class="js-radio-button-group">
                <?php
                    // https://designorbital.com/snippets/how-to-get-all-taxonomies-for-a-post-type/
                    $terms = get_terms( 'niveaudelucidite' );
                    $field_lucidite = the_field('niveau_de_lucidite_tooltip');
                    $o = 0;

                    foreach ( $terms as $term ) {
                        echo '<button class="button lucidite--item button--rounded ' . $term->slug . '" data-filter=".' . $term->slug .'" aria-hidden="true">' . $term->name . '</button>';
                        $o++;
                    }
                ?>
            </div>
        </div>

        <!-- TYPOLOGIE DE REVE -->
        <div class="ui-group lucidite--container typopologie--container left--filter">
            <h4 class="content-left-container-title left--filter">Typologie de rêve<div class="filter--title-information" data-filtre="typologie">i</div></h4>
            <div class="js-radio-button-group">

                <?php
                    $terms = get_terms( 'typologiedereve');
                    $o = 0;

                    foreach ( $terms as $term ) {
                        echo '<button class="button lucidite--item typologie--item button--rounded ' . $term->slug . '" data-filter=".' . $term->slug .'">' . $term->name . '</button>';
                        $o++;
                    }
                ?>

            </div>
        </div>

        <!-- DATE -->
        <div class="ui-group calendrier--container left--filter">
            <h4 class="content-left-container-title left--filter">Période</h4>
            <div class="js-radio-button-group">
                <?php get_template_part('template-parts/filtres/content', 'left-date'); ?>
            </div>
        </div>

        <!-- SUPPRIMER LES FILTRES  -->
        <div class="content--left-reset-filters lucidite--container left--filter ui-group">
            <div class="js-radio-button-group">
                <h5 class="btn clear"><img class="content--left-close-button" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/closeButton.svg" alt="close button">supprimer les filtres</h5>
            </div>
        </div>

    </div>
