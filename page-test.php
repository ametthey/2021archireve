<?php
/*
 * Template Name: test
 */

get_header(); ?>

    <div class="container-test-filtres">
        <!-- BARRE DE RECHERCHE -->
        <h4 class="content-left-container-title left--filter">TagS<img class="tooltip-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/infoBulle.svg">
            <span class="tooltip-text"><?php the_field( 'recherche_tag', 'option'  ); ?></span>
        </h4>
        <?php // get_template_part('template-parts/content/content', 'left-tag'); ?>
        <input type="text" class="tagsearch" placeholder="RECHERCHER UN TAG..." />

        <!-- NIVEAU DE LUCIDITE -->
        <div class="ui-group">
            <h4 class="content-left-container-title left--filter">Niveau de lucidité <img class="tooltip-icon" src="https://www.perimetre.studio/wp-content/uploads/2021/07/infoBulle.png">
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
        <div class="ui-group">
            <h4 class="content-left-container-title left--filter">Niveau de lucidité <img class="tooltip-icon" src="https://www.perimetre.studio/wp-content/uploads/2021/07/infoBulle.png">
                <span class="tooltip-text"><?php the_field( 'niveau_de_lucidite_tooltip', 'option'  ); ?></span>
            </h4>
            <div class="js-radio-button-group">
                <?php
                $terms = get_terms( 'typologiedereve');
                $o = 0;

                foreach ( $terms as $term ) {

                    // EACH
                    echo '<button class="button lucidite--item typologie--item button--rounded ' . $term->slug . '" data-filter=".' . $term->slug .'" aria-hidden="true">' . $term->name . '</button>';
                }
                ?>
            </div>
        </div>

        <div class="ui-group">
            <div class="js-radio-button-group">
                <div class="calendrier--container left--filter">
                    <div class="swiper-container swiper-container-date">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <?php

                                // Empty array to push all the dates of the reves
                                $years = array();

                                $args = array(
                                    'orderby' => 'date',
                                    'order'   => 'DESC',
                                    'post_type'      => 'reve',
                                    'posts_per_page' => -1,
                                );
                                $home_projects = new WP_Query( $args );
                                if ( $home_projects->have_posts() ) : $i = 0; while ( $home_projects->have_posts() ) : $home_projects->the_post(); $i++;


                                $years_dates = get_the_date( 'Y' );

                                // Push all the dates in the empty array
                                array_push( $years, $years_dates );

                                // Si l'année est 2001, alors affiché juste les années ou il y a des articles
                                endwhile; endif; wp_reset_postdata();

                                // return array without duplicate values
                                $years = array_unique($years);

                                // Convert array values from string to integrer
                                $years_num = array_map('intval', $years);

                                // Sort the array in ascending numerical order
                                // https://www.w3schools.com/php/php_arrays_sort.asp
                                sort($years_num);

                                // Counter to loop with ascending numerical order
                                $counter = 0;

                                foreach( $years_num as $year ) {

                                    ?>

                                    <div class="swiper-slide">
                                        <div class="calendrier--item">
                                            <h4><?php echo $year; ?></h4>
                                            <div class="calendrier--mois">

                                                <button data-filter="<?php echo esc_attr( ".01" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "01" . $year ); ?>">jan</button>
                                                <button data-filter="<?php echo esc_attr( ".02" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "02" . $year ); ?>">fév</button>
                                                <button data-filter="<?php echo esc_attr( ".03" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "03" . $year ); ?>">mar</button>
                                                <button data-filter="<?php echo esc_attr( ".04" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "04" . $year ); ?>">avr</button>
                                                <button data-filter="<?php echo esc_attr( ".05" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "05" . $year ); ?>">mai</button>
                                                <button data-filter="<?php echo esc_attr( ".06" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "06" . $year ); ?>">juin</button>
                                                <button data-filter="<?php echo esc_attr( ".07" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "07" . $year ); ?>">juillet</button>
                                                <button data-filter="<?php echo esc_attr( ".08" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "08" . $year ); ?>">aoû</button>
                                                <button data-filter="<?php echo esc_attr( ".09" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "09" . $year ); ?>">sep</button>
                                                <button data-filter="<?php echo esc_attr( ".10" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "10" . $year ); ?>">oct</button>
                                                <button data-filter="<?php echo esc_attr( ".11" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "11" . $year ); ?>">nov</button>
                                                <button data-filter="<?php echo esc_attr( ".12" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "12" . $year ); ?>">dec</button>

                                            </div>
                                        </div>
                                    </div>

                                    <?php

                                    $counter = $counter + 1;

                                }

                                ?>



                        </div>

                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev swiper-date-button-prev">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/fleche-gauche.svg" alt="">
                        </div>
                        <div class="swiper-button-next swiper-date-button-next">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/fleche-droite.svg" alt="">
                        </div>
                    </div>

                </div>

            </div>
        </div>


        <div class="no-results">No Results Found</div>
        <!-- CLEAR ALL  -->
        <div class="ui-group">
            <div class="js-radio-button-group">
                <button class="btn clear">Clear Filters</button>
            </div>
        </div>


    </div>


    <div class="container-test-grid">
        <?php get_template_part( 'template-parts/reve/selected' ); ?>
    </div>

<?php get_footer(); ?>
