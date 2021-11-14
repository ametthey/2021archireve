<div class="dessin--wrapper">

    <!-- Fermer l'espace de dessin -->
    <div class="dessin-close">
        <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/closeButtonWhite.svg">
        <svg xmlns="http://www.w3.org/2000/svg" width="25.104" height="25.104" viewBox="0 0 25.104 25.104"><g transform="translate(-51 -858)"><path d="M12.552,1A11.552,11.552,0,0,0,4.383,20.72,11.552,11.552,0,0,0,20.72,4.383,11.476,11.476,0,0,0,12.552,1m0-1A12.552,12.552,0,1,1,0,12.552,12.552,12.552,0,0,1,12.552,0Z" transform="translate(51 858)" /><g transform="translate(56.851 864.237)"><path d="M-1603.091-147.937l-3.148,5.254h-3.343l4.917-6.715-4.861-6.322h3.541l3.288,5.2,3.2-5.2h3.287l-4.917,6.658,4.944,6.378h-3.539Z" transform="translate(1609.582 155.72)" /></g></g></svg>
    </div>

    <!-- Espace de dessin -->
    <div class="dessin--container">

        <!-- Espace de dessin -->
        <canvas id="dessin--canvas" height="600" width="600"></canvas>

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
                    <input class="range" type="range" id="taille" name="taille" min="0" max="50" value="6">
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

            <div id="annuler" class="button--rounded">Annuler</div>
        </div>
    </div>
</div>
