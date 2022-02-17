
    <div class="container--articles" id="list-id">
    <?php

        $args = array(
            'orderby' => 'date',
            'order'   => 'DESC',
            'post_type'      => 'reve',
            'posts_per_page' => -1,
        );
        $home_projects = new WP_Query( $args );
        if ( $home_projects->have_posts() ) : $i = 0; while ( $home_projects->have_posts() ) : $home_projects->the_post(); $i++;

        // TYPOLOGIE
        $typologie_de_reve = get_field( 'typologie_de_reve' );
        $term_typologie = get_term_by( 'id', $typologie_de_reve, 'typologiedereve' );
        set_query_var( 'term_typologie', $term_typologie );

        // LUCIDITE
        $niveau_de_lucidite = get_field( 'niveau_de_lucidite' );
        $term_lucidite = get_term_by( 'id', $niveau_de_lucidite, 'niveaudelucidite' );
        set_query_var( 'term_lucidite', $term_lucidite );

        // TAG
        $tagString = get_field( 'tag' );
        $tagArray = explode(",", str_replace(" ","",$tagString));




        set_query_var('i', $i);
    ?>

        <?php if ( $term_lucidite  && $term_typologie  ) :

?>

            <article
                class=" article-reve article-<?php echo esc_html( $term_typologie->slug); ;?> border-<?php echo esc_html( $term_typologie->slug ); ?> <?php echo esc_html( $term_lucidite->slug ); ?> <?php echo esc_html( $term_typologie->slug ); ?><?php
        foreach( $tagArray as $tag ) :
            echo ' ' . $tag . ' ';
        endforeach;
                ?>
                 "
                id="reve--<?php echo $i; ?>"
                data-taxonomy="<?php echo esc_html( $term_typologie->slug ); ?> <?php echo esc_html( $term_lucidite->slug ); ?> 092020"
                data-number="<?php echo $i; ?>"
                <?php foreach( $tagArray as $tag ) :
                            echo 'data-tag="' . $tag . '"';
                        endforeach;
                ?>
            >

                <!-- HEADER DE L'ARTICLE -->
                <div class="article-reve--header border-bottom-<?php echo esc_html( $term_typologie->slug ); ?>">
                    <?php get_template_part( 'template-parts/reve/header' ); ?>
                </div>

                <!-- CONTENU -->
                <div class="article-reve--text border-bottom-<?php echo esc_html( $term_typologie->slug ); ?>">
                    <?php get_template_part( 'template-parts/reve/contenu' ); ?>
                </div>

                <div class="article-reve--taxonomies border-top-<?php echo esc_html( $term_typologie->slug ); ?>">
                    <!-- TYPOLOGIE DE REVE -->
                    <?php get_template_part( 'template-parts/reve/taxonomy/taxonomy', 'typologie' ); ?>

                    <!-- CUSTOM TAG -->
                    <?php get_template_part( 'template-parts/reve/taxonomy/taxonomy', 'tag' ); ?>

                    <!-- NIVEAU DE LUCIDITE -->
                    <?php get_template_part( 'template-parts/reve/taxonomy/taxonomy', 'lucidite' ); ?>
                </div>

            </article>
        <?php endif; ?>
        <?php endwhile; endif; wp_reset_postdata(); ?> <!-- WP_Query for CPT project -->

    </div>

    <!-- IMPORTER LE TEMPLATE DU PDF VIEWER ICI POUR DEBUGGER LE PDF -->

    <?php get_template_part( 'template-parts/reve/download/content', 'download-reve' ); ?>

    <div class="popup--download">
        <?php get_template_part('template-parts/reve/download/content', 'left-buttons'); ?>

        <img class="popup--download-close-button" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/closeButton.svg" alt="close button">
    </div>

