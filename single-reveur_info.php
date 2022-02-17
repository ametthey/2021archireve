<?php
ob_get_clean();
acf_form_head();
/*
 * Template Name: profil single
 */
get_header(); ?>

<!-- <div class="content&#45;&#45;home content&#45;&#45;profil"> -->
<div class="container--inscription-informations">

    <div class="profil--header">
        <h1>Profil</h1>
    <?php

    if ( is_user_logged_in() ) {
        if(current_user_can('administrator')) {
            echo 'Je suis administrator';
        } else if ( current_user_can('author') ){
            global $current_user;
            wp_get_current_user();
            ?>

        <div class="profil--header-links">
            <a href="<?php echo esc_url( get_permalink(  get_page_by_title('back-office', OBJECT , 'page')) ); ?>">
                <h3 class="button--rounded rounded--big">Voir tout mes rêves</h3>
            </a>
            <a href="<?php echo wp_logout_url( home_url( '/home/' ) ); ?>">
                <h3 class="button--rounded rounded--big">Se déconnecter</h3>
            </a>
        </div>

    <?php
            }
        } else if ( ! is_user_logged_in() ) {
            echo 'Vous n\'êtes pas autorisés à être ici !';
        }
    ?>
    </div>

    <!-- <div class="profil&#45;&#45;utilisateur"> -->

        <?php

            $pseudo = $current_user->user_nicename;
            $id = get_the_ID();

        acf_form(array(
            'id' => 'form--inscription-informations',
            'post_id'		=> $id,
            'fields' => array(
                'field_6199f6970cc56', // LABEL AGE
                'field_60e537a66ad5a', // AGE
                'field_6191ed80b5d66', // LABEL GENRE
                'field_60fe3fe90c4e7', // PHYSIOLOGIE
                'field_60fe40100c4e8', // RESSENTI
                'field_60fe40240c4e9', // ATTIRANCE
                'field_60fe404f0c4ea', // LANGUE MATERNELLE
                'field_60fe40a90c4eb', // PAYS D'ENFANCE
                'field_6191ef4267933', // LABEL MILIEUX
                'field_60fe40b10c4ec', // MILIEU ORIGINE
                'field_60fe40c70c4ed', // MILIEU ACTUEL
                'field_6191f14105fa6', // LABEL RAPPORT AU TRAVAIL
                'field_60fe40d80c4ee', // RAT - METIER
                'field_60fe40f20c4ef', // RAT - TYPE
                'field_61304403387ec', // RAT - NE TRAVAILLE PAS
                'field_6191f1952e089', // RELATION A UN PAYSAGE
                'field_60fe41080c4f0', // RAP - enfance ville
                'field_60fe41450c4f1', // RAP - enfance plaine
                'field_60fe41590c4f2', // RAP - enfance humide
                'field_60fe416e0c4f3', // RAP - actuelle ville
                'field_60fe41920c4f4', // RAP - actuelle plaine
                'field_60fe41a30c4f5', // RAP - actuelle humide
                'field_60fe41fd0c4f9', // RAP - attirance ville
                'field_60fe41e80c4f8', // RAP - attirance plaine
                'field_60fe41c00c4f7', // RAP - attirance humide
                'field_6191f28b9abec', // LABEL FOI SPIRITUELLE
                'field_60fe42100c4fa', // FOI ORIGINE
                'field_60fe42520c4fb', // FOI ACTUELLE
                'field_6199f2bca5250', // LABEL RELATION AU SOMMEIL
                'field_60fe425e0c4fc', // SOMMEIL 1
                'field_60fe42730c4fd', // SOMMEIL 2
                'field_6199f2a3a524f', // LABEL RELATION AUX REVES
                'field_60fe42870c4fe', // REVE 1
                'field_60fe429e0c4ff', // REVE 2
            ),
            // 'post_title'    => true,
            'submit_value' => __("Modifier le profil", '_themename'),
            'html_submit_button'  => '<input type="submit" class="acf-button-inscription-information" value="%s" />',
            'updated_message' => __("Vous venez de modifier votre profil", '_themename'),
            'html_updated_message'  => '<div id="message" class="updated"><p>%s</p></div>',
            'html_submit_spinner' => '<span class="acf-spinner"></span>',
            'return' => '/reveur_info/' . $pseudo,
        ));

        ?>

    <!-- </div> -->

</div>
<div class="container--inscription-informations-tooltip">

    <!-- COVER AVEC LE TEXTE EN VERTICAL -->
    <div class="container--cover container--tooltip-cover">
        <h3 class="inscription-tooltip-cover">INFORMATIONS</h3>
    </div>

    <!-- TEXTES AVEC LES EXPLICATIONS -->
    <div class="inscription-tooltip-texte">
        <h2>Genre</h2>
        <p><?php the_field( 'genre', 'option' ); ?></p>
        <h2>Milieux</h2>
        <p><?php the_field( 'milieux', 'option' ); ?></p>
        <h2>Rapport au travail</h2>
        <p><?php the_field( 'relation_au_travail', 'option' ); ?>
        </p>
        <h2>Relation à un paysage</h2>
        <p><?php the_field( 'relation_a_un_paysage', 'option' ); ?>
        </p>
        <h2>Foi spirituelle</h2>
        <p><?php the_field( 'foi_spirituelle', 'option' ); ?></p>
        <h2>Relation au sommeil</h2>
        <p><?php the_field( 'relation_au_sommeil', 'option' ); ?></p>
        <h2>Relation aux rêves</h2>
        <p><?php the_field( 'relation_aux_reves', 'option' ); ?></p>
    </div>

    <!-- BOUTON CLOSE -->
    <div class="inscription-tooltip-close">
        <img class="inscription-tooltip-close-button" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/closeButton.svg">
    </div>

</div>

<?php get_footer(); ?>

