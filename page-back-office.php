<?php
/*
 * Template Name: back-office
 */

$pseudo = $current_user->user_nicename;
$home_url = home_url();

get_header(); ?>



<div class="content--home content--profil">

    <?php


    // Si le user a déjà fait un post
    // Afficher les posts

    if ( is_user_logged_in() ) {
        if(current_user_can('administrator')) {
            echo 'Je suis administrator';
        } else if ( current_user_can('author') ){
            global $current_user;
            // get_currentuserinfo();
            wp_get_current_user();
            ?>

    <div class="profil--header">
        <h1><?php echo $pseudo; ?></h1>
        <div class="profil--header-links">
            <a href="<?php echo $home_url . '/reveur_info/' . $pseudo; ?>">
                <h3 class="button--rounded rounded--big">Modifier le profil</h3>
            </a>
            <a href="<?php echo esc_url( get_home_url() ); ?>">
                <h3 class="button--rounded rounded--big">Voir les rêves</h3>
            </a>
            <a href="<?php echo wp_logout_url( get_permalink( 194 ) ); ?>">
                <h3 class="button--rounded rounded--big">Se déconnecter</h3>
            </a>
        </div>
    </div>

            <div class="profil--reve">

                <div class="profil--reve-new profil--reve-new-active">
                    <h2><a href="<?php echo esc_url( get_permalink( 325 ) ); ?>">PUBLIER UN NOUVEAU RÊVE <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/coucou.svg" alt=""></a></h2>
                </div>

            <?php

            // Si le user n'a jamais posté de rêves
            // Proposer de poster son premier post
            $args = array(
                'author'  =>  $current_user->ID,
                'orderby' => 'date',
                'order'   => 'DESC',
                'post_type'      => 'reve',
                'post_status' => array('publish', 'pending'),
                'posts_per_page' => -1
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
            $tagElement = get_field( 'tag' );
            $get_terms_args = array(
                'taxonomy' => 'customtag',
                'hide_empty' => 0,
                'include' => $tag,
            );
            $tags = get_the_terms( $post->ID, 'customtag' );

            // POST CLASSES
            // for creating the opacity effect
            $post_class_1 = 'article-<?php echo esc_html( $term_typologie->slug)';
            $post_class_2 = 'border-<?php echo esc_html( $term_typologie->slug )';
            $post_class_3 = '<?php echo esc_html( $term_lucidite->slug ); ?>';
            $post_class_4 = '<?php echo esc_html( $term_typologie->slug ); ?>';
            $classes = array(
                'backoffice-reve',
                'article-reve',
                // $post_class_1,
                // $post_class_2,
                // $post_class_3,
                // $post_class_4,
            )
            ?>

                    <div <?php post_class('profil--reve-published profil--reve-new');?> >
                    <?php if ( $term_lucidite  && $term_typologie  ) : ?>

                        <article
                            class="
                            backoffice-reve article-reve article-<?php echo esc_html( $term_typologie->slug); ;?> border-<?php echo esc_html( $term_typologie->slug ); ?> <?php echo esc_html( $term_lucidite->slug ); ?> <?php echo esc_html( $term_typologie->slug ); ?>
                                <?php
                                    if ( !empty( $tags ) ) {
                                        foreach( $tags as $tag ) {
                                            echo $tag->name . ' ';
                                        }
                                    }
                                ?>
                            "
                            id="reve--<?php echo $i; ?>"
                            data-filter-date=""
                        >

                            <!-- HEADER DE L'ARTICLE -->
                            <div class="article-reve--header border-bottom-<?php echo esc_html( $term_typologie->slug ); ?>">

                                <?php get_template_part( 'template-parts/reve/header' ); ?>

                            </div>

                            <div class="article-reve--text border-bottom-<?php echo esc_html( $term_typologie->slug ); ?>">
                                <!-- CONTENU -->
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

                    <div class="message--status-pending">
                        <h3>Votre rêve est en attente de validation</h3>
                    </div>
                </div>


            <?php
            endwhile; else :

            ?>


            <div class="profil--no-reve">
                <h2>UN RÊVE À PARTAGER ?</h2>
                <h2><a href="<?php echo esc_url( get_permalink( 325 ) ); ?>">PUBLIE TON PREMIER RÊVE!</a></h2>
            </div>

            <?php


            endif; wp_reset_postdata();
            ?>

            </div>

            <div class="profil--empty"></div>

    <?php
        }
    } else if ( ! is_user_logged_in() ) {
        echo 'Vous n\'êtes pas autorisés à être ici !';
    }


    ?>



</div>

<?php get_footer(); ?>
