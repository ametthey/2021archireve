<?php $author_id=$post->post_author; ?>

<!-- AUTHOR ET DATE DU POST -->
<div class="article-header--author-and-date background-<?php echo esc_html( $term_typologie->slug ); ?>">
    <span class="article-header-author"><?php echo get_the_author_meta( 'nickname', $author_id ); ?></span>
    <span class="article-header-date"><?php echo the_field('date_du_reve'); ?></span>
    <span class="date--reve"><?php echo the_field( 'date_du_reve' ); ?></span>
</div>

<!-- TITRE DU REVE -->
<h1><?php the_title(); ?></h1>



<!-- LIEN DE TELECHARGEMENT -->
<div class="article-reve--download border-left-<?php echo esc_html( $term_typologie->slug ); ?>">

    <?php if ( is_page_template('page-back-office.php') ) { ?>

        <a href="<?php the_permalink(); ?>">
            <button class="contenu--edit">
                <img class="contenu--edit" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/contenu_edit.svg" alt="contenu edit">
            </button>
        </a>

    <?php } else { ?>

        <div class="button--round round--white round--small button--select-to-download">
            <div class="button--smaller"></div>
        </div>

        <?php

            $dessin = get_field('contenu_dessin');
            if ( empty( $dessin ) ) :
                echo '<img class="icone--texte" src="'. get_stylesheet_directory_uri() . '/dist/assets/images/reve/icones/texte.svg" alt="texte">';
            else:
                echo '<img class="icone--dessin" src="'. get_stylesheet_directory_uri() . '/dist/assets/images/reve/icones/dessin.svg" alt="dessin">';
            endif;
        ?>

    <?php } ?>


</div>
