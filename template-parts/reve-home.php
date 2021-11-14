    <?php

        /*
         *
         * ATTENTION, LE CONTENU DE LA QUERY EST LA MEME
         * QUE DANS LE TEMPLATE-PARTS
         *
         *
         */


        $args = array(
            'post_type'      => 'reve',
            'posts_per_page' => -1
        );
        $home_projects = new WP_Query( $args );
        if ( $home_projects->have_posts() ) : $i = 0; while ( $home_projects->have_posts() ) : $home_projects->the_post(); $i++;

    ?>
        <?php $typologie_de_reve = get_field( 'typologie_de_reve' ); ?>
    <?php $niveau_de_lucidite = get_field( 'niveau_de_lucidite' ); ?>
    <?php $term = get_term_by( 'id', $typologie_de_reve, 'typologiedereve' ); ?>
    <?php $term_lucidite = get_term_by( 'id', $niveau_de_lucidite, 'niveaudelucidite' ); ?>
    <?php if ( $term ) : ?>
    <article class="article-reve article-<?php echo esc_html( $term->slug); ;?> border-<?php echo esc_html( $term->slug ); ?>" id="reve--<?php echo $i; ?>">


        <div class="article-reve--header border-bottom-<?php echo esc_html( $term->slug ); ?>">
        <!-- AUTHOR ET DATE DU POST -->
        <div class="article-header--author-and-date background-<?php echo esc_html( $term->slug ); ?>">
        <span><?php echo get_the_author_meta( 'nickname', false ); ?></span> - <span><?php the_time( 'd/m/Y' );?></span>
        </div>

        <!-- TITRE DU REVE -->
        <h1><?php the_field( 'titre_du_reve' ); ?></h1>

        <!-- LIEN DE TELECHARGEMENT -->
        <div class="article-reve--download border-left-<?php echo esc_html( $term->slug ); ?>">
        <div class="button--round round--white round--small button--select-to-download"></div>

        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/contenu_texte.svg" alt="">
        </div>
        </div>

        <div class="article-reve--text border-bottom-<?php echo esc_html( $term->slug ); ?>">
        <!-- CONTENU -->
        <?php get_template_part( 'template-parts/reve/contenu' ); ?>
    </div>

        <div class="article-reve--taxonomies border-top-<?php echo esc_html( $term->slug ); ?>">

        <!-- TYPOLOGIE DE REVE -->
        <?php if ( $term ) : ?>
        <?php if ( $term->name === 'Cauchemar' ) : ?>
        <!-- CAUCHEMAR -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/Cauchemar.svg">
        </div>
        <?php endif; ?>

    <?php if ( $term->name === 'Rêve Concomitant' ) : ?>
        <!-- REVE CONCOMITANT -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/ReveConcomitant.svg">
        </div>
        <?php endif; ?>

    <?php if ( $term->name === 'Rêve Créatif' ) : ?>
        <!-- REVE CREATIF -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/ReveCréatif.svg">
        </div>
        <?php endif; ?>

    <?php if ( $term->name === 'Rêve d\'actualité' ) : ?>
        <!-- REVE D ACTUALITE -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/ReveActualite.svg">
        </div>
        <?php endif; ?>

    <?php if ( $term->name === 'Rêve lucide') : ?>
        <!-- REVE LUCIDE -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/ReveLucide.svg">
        </div>
        <?php endif; ?>

    <?php if ( $term->name === 'Rêve prémonitoire') : ?>
        <!-- REVE PREMONITOIRE -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/RevePremonitoire.svg">
        </div>
        <?php endif; ?>

    <?php if ( $term->name === 'Rêve Récurrent') : ?>
        <!-- REVE RECURRENT -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/ReveRecurrent.svg">
        </div>
        <?php endif; ?>

    <?php if ( $term->name === 'Rêve sexuel') : ?>
        <!-- REVE SEXUEL -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/ReveSexuel.svg">
        </div>
        <?php endif; ?>

    <?php endif; ?>
    <?php // get_template_part( 'template-parts/reve/taxonomy/taxonomy', 'typologie' ); ?>

        <!-- CUSTOM TAG -->
            <?php get_template_part( 'template-parts/reve/taxonomy/taxonomy', 'tag' ); ?>

    <!-- NIVEAU DE LUCIDITE -->
        <?php // get_template_part( 'template-parts/reve/taxonomy/taxonomy', 'lucidite' ); ?>

    <?php if ( $term_lucidite ) : ?>
        <div class="article-taxonomies--lucidite border-left-<?php echo esc_html( $term->slug ); ?>">
            <div class="<?php echo esc_html( $term_lucidite->slug );?> button--rounded rounded--lucidite" id="rounded--<?php echo esc_html( $term->slug ); ?>"><p><?php echo esc_html( $term_lucidite->name ); ?></p></div>
        </div>
        <?php endif; ?>

    </div>



        </article>
        <?php endif; ?>
    <?php endwhile; endif; wp_reset_postdata(); ?> <!-- WP_Query for CPT project -->
