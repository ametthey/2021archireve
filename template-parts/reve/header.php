<?php $author_id=$post->post_author; ?>
<!-- AUTHOR ET DATE DU POST -->
<div class="article-header--author-and-date background-<?php echo esc_html( $term_typologie->slug ); ?>">
    <span class="article-header-author"><?php echo get_the_author_meta( 'nickname', $author_id ); ?></span><span class="article-header-date"><?php echo the_field('date_du_reve'); ?></span>
    <span class="date--reve"><?php echo the_field( 'date_du_reve' ); ?></span>
</div>

<!-- TITRE DU REVE -->
<?php the_title( '<h1>', '</h1>' ); ?>


<!-- LIEN DE TELECHARGEMENT -->
<div class="article-reve--download border-left-<?php echo esc_html( $term_typologie->slug ); ?>">

    <?php
        if ( is_page_template('page-back-office.php') ) {
?>

<a href="<?php the_permalink(); ?>">
    <button class="contenu--edit">
        <img class="contenu--edit" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/contenu_edit.svg" alt="">
    </button>
</a>
<?php

        } else {
?>
<div class="button--round round--white round--small button--select-to-download">
    <div class="button--smaller"></div>
</div>

    <!-- ICONE TEXTE -->
    <svg xmlns="http://www.w3.org/2000/svg" width="21.819" height="20.326" class="wrong" id="contenu--texte">
        <g fill="#303030">
            <rect class="rect--long" width="21" height="2" rx="1.24"/>
            <rect class="rect--short" width="15" height="2" rx="1.24" transform="translate(0 5.949)"/>
            <rect class="rect--long" width="21" height="2" rx="1.24" transform="translate(0 11.897)"/>
            <rect class="rect--short" width="15" height="2" rx="1.24" transform="translate(0 17.846)"/>
        </g>
    </svg>

    <!-- ICONE DESSIN -->
    <svg xmlns="http://www.w3.org/2000/svg" width="21.43" height="23.831" class="wrong"  id="contenu--dessin">
        <path class="icone-dessin-path" data-name="Tracé 12" d="M16.668.711C15.344-1.196 9.925.739.488 6.462A1.051 1.051 0 00.136 7.87a1.051 1.051 0 001.408.352c5.98-3.6 11.976-6.378 13.315-6.366-.474.994-3.055 3.342-4.78 4.928-4.27 3.908-7.608 7-6.127 9.133 1.532 2.206 4.878.16 8.11-1.809a18.583 18.583 0 014-2.059c-.16.887-2.059 3.259-3.145 4.568-2.345 2.848-4.061 4.926-3.022 6.422 1.48 2.131 6.785-.445 11.031-2.951l.075-.052a1 1 0 00.277-1.356 1.019 1.019 0 00-1.408-.352c-3.446 2.061-7.129 3.621-8.217 3.49a19.492 19.492 0 012.841-3.969c2.356-2.911 4.443-5.414 3.274-7.1-1.195-1.72-3.766-.156-6.737 1.631-1.36.834-4.956 3-5.372 2.4-.172-1.045 3.739-4.592 5.786-6.513 3.848-3.552 6.392-5.874 5.223-7.556z" fill="#303030"/>
    </svg>

    <svg xmlns="http://www.w3.org/2000/svg" width="12.887" height="14.331" class="wrong" viewBox="0 0 12.887 14.331" id="contenu--dessin-mobile">
        <path id="Tracé_378" data-name="Tracé 378" d="M-279.683,5.695c-.8-1.147-4.055.017-9.73,3.459a.632.632,0,0,0-.212.847.632.632,0,0,0,.847.212c3.6-2.165,7.2-3.836,8.007-3.828a19.113,19.113,0,0,1-2.875,2.963c-2.568,2.35-4.575,4.211-3.685,5.492.921,1.327,2.933.1,4.877-1.088a11.174,11.174,0,0,1,2.407-1.238,11.665,11.665,0,0,1-1.892,2.747c-1.41,1.713-2.442,2.963-1.817,3.862.89,1.281,4.081-.268,6.634-1.775l.045-.031a.6.6,0,0,0,.167-.816.613.613,0,0,0-.847-.212c-2.072,1.239-4.287,2.178-4.942,2.1A11.722,11.722,0,0,1-280.99,16c1.417-1.751,2.672-3.256,1.969-4.267-.719-1.034-2.265-.094-4.052.981-.818.5-2.98,1.8-3.23,1.444-.1-.628,2.248-2.762,3.479-3.917C-280.51,8.1-278.98,6.706-279.683,5.695Z" transform="translate(289.707 -5.267)" fill="#303030"/>
    </svg>

<?php

        }

?>


</div>
