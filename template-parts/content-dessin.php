<div class="dessin--wrapper">

    <!-- Fermer l'espace de dessin -->
    <div class="dessin-close">
        <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/closeButtonWhite.svg">
    </div>

    <!-- Espace de dessin -->
    <div class="dessin--container">
        <!-- Espace de dessin -->
        <canvas id="dessin--canvas" height="600" width="600">
        </canvas>

        <!-- Choix de la couleur, taille, etc -->
        <div id="buttons">

            <!-- Bouton couleur -->
            <div class="color--container">
                <div class="color--texte">
                    <h4>Couleur</h4>
                </div>
                <div class="color--choice">
                    <div id="noir" class="color"></div>
                    <div id="cauchemar" class="color"></div>
                    <div id="concomitant" class="color"></div>
                    <div id="creatif" class="color"></div>
                    <div id="actualite" class="color"></div>
                    <div id="recurrent" class="color"></div>
                    <div id="sexuel" class="color"></div>
                    <div id="premonitoire" class="color"></div>
                    <div id="lucide" class="color"></div>
                </div>
            </div>

            <!-- Bouton taille -->
            <div class="size--container">
                <div class="size--texte"><h4>Taille</h4></div>
                <div class="size--choice">
                    <input class="range" type="range" id="taille" name="taille" min="5" max="50" value="20">
                    <output class="taille--affiche"></output>
                </div>
            </div>

            <!-- Bouton gomme -->
            <div class="eraser--container color--container">
                <div class="color--texte">
                    <h4>Gomme</h4>
                </div>
                <div class="color--choice">
                    <div id="eraser" class="eraser"></div>
                </div>
            </div>

        </div>


        <!-- Bouton recommencer -->
        <div id="buttons-commandes">

            <div class="button--rounded" id="reset"><h4>Recommencer</h4></div>
            <input class="button--rounded" href="#" download="illustration.png" type="button" name="upload-button" id="upload-button" value="Valider son dessin">
            <input type="hidden" name="image-url" id="image-url" value="">

            <?php if ( is_single() ) { ?>
                <div id="annuler" class="button--rounded">Annuler</div>
            <?php } else {} ?>

        </div>
    </div>
</div>
