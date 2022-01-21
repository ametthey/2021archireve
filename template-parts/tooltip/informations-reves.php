<div class="container--inscription-informations-tooltip">
    <!-- COVER AVEC LE TEXTE EN VERTICAL -->
    <div class="container--cover container--tooltip-cover">
        <h3 class="inscription-tooltip-cover">INFORMATIONS</h3>
    </div>

    <!-- TEXTES AVEC LES EXPLICATIONS -->
    <div class="inscription-tooltip-texte">
        <h2>Niveau de lucidité</h2>
        <?php the_field( 'niveau_de_lucidite', 'option' ); ?>

        <h2>Typologie de rêve</h2>
        <?php the_field( 'typologie', 'option' ); ?>

        <h2>Modalité du sommeil</h2>
        <?php the_field( 'modalite_du_sommeil', 'option' ); ?>

        <h2>Souvenir du rêve</h2>
        <?php the_field( 'souvenir_du_reve', 'option' ); ?>
    </div>

    <!-- BOUTON CLOSE -->
    <div class="inscription-tooltip-close">
        <img class="inscription-tooltip-close-button" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/closeButton.svg">
    </div>

</div>
