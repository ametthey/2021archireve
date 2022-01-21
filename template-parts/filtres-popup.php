<div class="filtres-popup" id="popup-lucidite">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/closeButton.svg">

    <h4>Niveau de lucidité</h4>
    <p><?php the_field( '_niveau_de_lucidite', 'option' ); ?></p>

    <div class="filtres-popup--elements">
        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded">Rêve ordinaire</button>
            <p><?php the_field( 'reve_ordinaire', 'option' ); ?></p>
        </div>

        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded">Lucide tacite</button>
            <p><?php the_field( 'lucide_tacite', 'option' ); ?></p>
        </div>

        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded">Pré-lucide</button>
            <p><?php the_field( 'pre-lucides', 'option' ); ?></p>
        </div>

        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded">Post-lucide</button>
            <p><?php the_field( 'post-lucide', 'option' ); ?></p>
        </div>

        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded">Faux-éveil</button>
            <p><?php the_field( 'faux-eveil', 'option' ); ?></p>
        </div>

        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded">Intrarêve</button>
            <p><?php the_field( 'intrareve', 'option' ); ?></p>
        </div>

        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded">Semi-lucide</button>
            <p><?php the_field( 'semi-lucide', 'option' ); ?></p>
        </div>

        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded">Lucide</button>
            <p><?php the_field( 'lucide', 'option' ); ?></p>
        </div>

        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded">Protolucide</button>
            <p><?php the_field( 'protolucide', 'option' ); ?></p>
        </div>

        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded">Paralysie</button>
            <p><?php the_field( 'paralysie', 'option' ); ?></p>
        </div>

        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded">Experience hors du corps</button>
            <p><?php the_field( 'experience_hors_du_corps', 'option' ); ?></p>
        </div>

        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded">Succint</button>
            <p><?php the_field( 'succinct', 'option' ); ?></p>
        </div>
    </div>

</div>
<div class="filtres-popup" id="popup-typologie">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/closeButton.svg">

    <h4>Niveau de typologie</h4>
    <p><?php the_field( '_niveau_de_lucidite', 'option' ); ?></p>

    <div class="filtres-popup--elements">
        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded reve-dactualite">Actualité</button>
            <p><?php the_field( 'actualite', 'option' ); ?></p>
        </div>
        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded cauchemar">Cauchemar</button>
            <p><?php the_field( 'cauchemar', 'option' ); ?></p>
        </div>
        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded reve-commun">Commun</button>
            <p><?php the_field( 'commun', 'option' ); ?></p>
        </div>
        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded reve-concomitant">Concomitant</button>
            <p><?php the_field( 'concomitant', 'option' ); ?></p>
        </div>
        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded reve-creatif">Créatif</button>
            <p><?php the_field( 'creatif', 'option' ); ?></p>
        </div>
        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded reve-premonitoire">Prémonitoire</button>
            <p><?php the_field( 'premonitoire', 'option' ); ?></p>
        </div>
        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded reve-recurrent">Récurrent</button>
            <p><?php the_field( 'recurrent', 'option' ); ?></p>
        </div>
        <div class="filtres--elements-item">
            <button class="button lucidite--item button--rounded reve-sexuel">Sexuel</button>
            <p><?php the_field( 'sexuel', 'option' ); ?></p>
        </div>
    </div>

</div>
