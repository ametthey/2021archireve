<?php
/*
 * Template Name: a propos
 */

get_header(); ?>

<div class="container-test">
    <div class="container-test-filtres">
        <h4 class="content-left-container-title left--filter">Niveau de lucidité <img class="tooltip-icon" src="https://www.perimetre.studio/wp-content/uploads/2021/07/infoBulle.png">
            <span class="tooltip-text"><?php the_field( 'niveau_de_lucidite_tooltip', 'option'  ); ?></span>
        </h4>
        <?php
            // https://designorbital.com/snippets/how-to-get-all-taxonomies-for-a-post-type/
            $terms = get_terms( 'niveaudelucidite' );
            $field_lucidite = the_field('niveau_de_lucidite_tooltip');
            $o = 0;
            echo '<div class="lucidite--container left--filter button-group js-radio-button-group" data-filter-group="lucidite">';

            foreach ( $terms as $term ) {

                // EACH
                echo '<button class="button lucidite--item button--rounded" data-filter=".' . $term->slug .'">' . $term->name . '</button>';
                $o++;
            }
            // TOUT
            echo '<button class="button lucidite--item button--rounded is-checked" data-filter="">TOUT</button>';

            echo '</div>';
        ?>
        <h4 class="content-left-container-title left--filter">Typologie de rêves<img class="tooltip-icon" src="https://www.perimetre.studio/wp-content/uploads/2021/07/infoBulle.png">
            <span class="tooltip-text"><?php the_field( 'recherce_typologie_de_reves', 'option'  ); ?></span>
        </h4>
        <div class="typologie--container left--filter button-group js-radio-button-group" data-filter-group="typologie">
            <div class="swiper-container swiper-container-typologie">
                <div class="swiper-wrapper">
                    <?php
                        // https://designorbital.com/snippets/how-to-get-all-taxonomies-for-a-post-type/
                        $terms = get_terms( 'typologiedereve' );
                        $field_lucidite = the_field('recherce_typologie_de_reves');
                        foreach ( $terms as $term ) {

                            // EACH
                            echo '<div class="swiper-slide">';
                            echo '<div class="typologie--item">';
                            echo '<button class="button typologie--visuals" data-filter=".' . $term->slug .'"><img class="typologie--item-image" src="' . get_stylesheet_directory_uri() . '/dist/assets/images/' . $term->slug . '.svg"><p>' . $term->name . '</p></button>';
                            echo '</div>';
                            echo '</div>';
                            // $o++;
                        }
                        // TOUT
                        echo '<div class="swiper-slide">'
                    ?>
                </div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev swiper-typologie-button-prev">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/fleche-gauche.svg" alt="">
                </div>
                <div class="swiper-button-next swiper-typologie-button-next">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/fleche-droite.svg" alt="">
                </div>
                    </div>
                </div>

    </div>


    <div class="container-test-grid">
        <?php // get_template_part( 'template-parts/reve/all' ); ?>
    </div>

    <div class="container-test-grid">
        <?php
            $args = array(
                'post_type' => array( 'reveur_info', 'reve' ),
            );

            $home_projects = new WP_Query( $args );
            if ( $home_projects->have_posts() ) : $i = 0; while ( $home_projects->have_posts() ) : $home_projects->the_post(); $i++;

        ?>
        <!-- <td><?php echo get_the_author_meta( "nickname", false ); ?></td> -->
        <!-- <td>age:<?php the_field( 'age' ); ?></td> -->

        <?php endwhile; endif; wp_reset_postdata(); ?> <!-- WP_Query for CPT project -->

    </div>

    <div class="container-test-grid">
        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="21.819" height="20.326" id="contenu&#45;&#45;texte"> -->
            <!-- <g fill="#303030"> -->
        <!--     <g> -->
        <!--     <rect class="rect&#45;&#45;long" width="21" height="2" rx="1.24"/> -->
        <!--     <rect class="rect&#45;&#45;short" width="15" height="2" rx="1.24" transform="translate(0 5.949)"/> -->
        <!--     <rect class="rect&#45;&#45;long" width="21" height="2" rx="1.24" transform="translate(0 11.897)"/> -->
        <!--     <rect class="rect&#45;&#45;short" width="15" height="2" rx="1.24" transform="translate(0 17.846)"/> -->
        <!--     </g> -->
        <!-- </svg> -->
        <svg xmlns="http://www.w3.org/2000/svg" id="contenu--texte" width="150" height="100">
            <g>
                <title>Layer 1</title>
                <line stroke-width="5" stroke-linecap="round" stroke-linejoin="round" id="haut--long" y2="10" x2="70" y1="10" x1="10" stroke="#000" fill="none"/>
                <line stroke-width="5" stroke-linecap="round" stroke-linejoin="round" id="haut--court" y2="20" x2="50" y1="20" x1="10" stroke="#000" fill="none"/>
                <line stroke-width="5" stroke-linecap="round" stroke-linejoin="round" id="bas--long" y2="30" x2="70" y1="30" x1="10" stroke="#000" fill="none"/>
                <line stroke-width="5" stroke-linecap="round" stroke-linejoin="round" id="bas--court" y2="40" x2="50" y1="40" x1="10" stroke="#000" fill="none"/>
            </g>
        </svg>

        <div class="borderSVG">
            <svg width="200" height="200">
                <line x1="0" y1="10" x2="600" y2="10" />
                <line x1="0" y1="50" x2="600" y2="50" />
            </svg>
        </div>
    </div>

</div>

<?php get_footer(); ?>
