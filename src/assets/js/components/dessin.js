// https://getbutterfly.com/how-to-draw-on-canvas-and-save-the-result-using-vanilla-javascript/
const container = document.querySelector('.dessin--container');


document.addEventListener('DOMContentLoaded', (e) => {
    if ( container ) {
        const canvas = document.getElementById('dessin--canvas');
        const ctx = canvas.getContext('2d');
        const recommencer = document.querySelector('#reset');
        const annuler = document.querySelector('#annuler');
        const eraser = document.querySelector('#eraser');
        let dessinTermine = document.querySelector('.dessin--termine');
        const wrapperDessin = document.querySelector('.dessin--wrapper');
        const contenuTexte = document.querySelector('.acf-field-610161fcb8f44');
        const contenuDessin = document.querySelector('#acf-field_6104fb96d7330');
        const uploadButton = document.querySelector('#upload-button');
        const noir = '#303030';
        const cauchemar =  '#6755AA';
        const concomitant =  '#2CAF38';
        const creatif =  '#F79D65';
        const actualite =  '#99BA22';
        const recurrent =  '#DB5931';
        const sexuel =  '#D67083';
        const premonitoire =  '#4CA58E';
        const lucide =  '#c12b2b';
        const colors = [ 'noir', 'cauchemar', 'concomitant', 'creatif', 'actualite', 'recurrent', 'sexuel', 'premonitoire', 'lucide' ];
        let drawing = false;
        let pathsry = [];
        let points = [];
        var mouse = {x: 0, y: 0};
        var previous = {x: 0, y: 0};
        // Modifier son rêve
        const buttonText = document.querySelector('.contenu--button-texte');
        const buttonDessin = document.querySelector('.contenu--button-dessin');
        const contenuText = document.querySelector('.acf-field-610161fcb8f44');
        const srcDessin = document.querySelector('#acf-field_6104fb96d7330');
        const singleReve = document.querySelector('.single-reve');
        const acfForm = document.querySelector('#form--creation-reve');
        const bodyEdit = document.querySelector('.reve-template-default');

        // PARAMETRE DU STYLÉ
        ctx.fillStyle = "#FFF";
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.lineJoin = 'round';
        ctx.lineCap = 'round';

        canvas.addEventListener('mousedown', function(e) {
            drawing = true;
            previous = {x:mouse.x,y:mouse.y};
            mouse = oMousePos(canvas, e);
            points = [];
            points.push({x:mouse.x,y:mouse.y})
        });

        canvas.addEventListener('mousemove', function(e) {
            if(drawing){
                previous = {x:mouse.x,y:mouse.y};
                mouse = oMousePos(canvas, e);
                // saving the points in the points array
                points.push({x:mouse.x,y:mouse.y})
                // drawing a line from the previous point to the current point
                ctx.beginPath();
                ctx.moveTo(previous.x,previous.y);
                ctx.lineTo(mouse.x,mouse.y);
                ctx.stroke();
            }
        }, false);


        canvas.addEventListener('mouseup', function() {
            drawing=false;
            // Adding the path to the array or the paths
            pathsry.push(points);
        }, false);




        /*********************************************
         * Drawing functions
         *********************************************/

        annuler.addEventListener('click' , Undo);

        recommencer.addEventListener('click', () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }, false);

        /*********************************************
         * Changer la couleur du tracé
         *********************************************/
        colors.forEach( color => {
            const colorName = document.querySelector(`#${color}`);
            colorName.addEventListener( 'click', (e) => {

                // ENLEVER LA CLASS SELECTED DE LA GOMME SI ELLE EST PRESENTE
                if ( eraser.classList.contains('selected') ) {
                    eraser.classList.remove('selected');
                }

                if ( colorName.classList.contains('selected') ) {
                    console.log(`La couleur ${colorName.id} a la classe selected`);
                    colorName.classList.remove('selected');
                } else if ( !colorName.classList.contains('selected') ) {
                    console.log(`La couleur ${colorName.id} n'a pas la classe selected`);
                    colorName.classList.add('selected');
                    switch ( color ) {
                        case 'noir':
                            ctx.globalCompositeOperation = 'source-over';
                            ctx.strokeStyle = noir;
                            colorName.classList.add('selected');
                            console.log(`La couleur ${colorName.id} à la classe selected`);

                            ;
                            break;
                        case 'cauchemar':
                            ctx.globalCompositeOperation = 'source-over';
                            ctx.strokeStyle = cauchemar;
                            colorName.classList.add('selected');
                            console.log(`La couleur ${colorName.id} à la classe selected`);

                            ;
                            break;
                        case 'concomitant':
                            ctx.globalCompositeOperation = 'source-over';
                            ctx.strokeStyle = concomitant;
                            colorName.classList.add('selected');
                            console.log(`La couleur ${colorName.id} à la classe selected`);

                            ;
                            break;
                        case 'creatif':
                            ctx.globalCompositeOperation = 'source-over';
                            ctx.strokeStyle = creatif;
                            colorName.classList.add('selected');
                            console.log(`La couleur ${colorName.id} à la classe selected`);

                            ;
                            break;
                        case 'actualite':
                            ctx.globalCompositeOperation = 'source-over';
                            ctx.strokeStyle = actualite;
                            colorName.classList.add('selected');
                            console.log(`La couleur ${colorName.id} à la classe selected`);

                            ;
                            break;
                        case 'recurrent':
                            ctx.globalCompositeOperation = 'source-over';
                            ctx.strokeStyle = recurrent;
                            colorName.classList.add('selected');
                            console.log(`La couleur ${colorName.id} à la classe selected`);

                            ;
                            break;
                        case 'sexuel':
                            ctx.globalCompositeOperation = 'source-over';
                            ctx.strokeStyle = sexuel;
                            colorName.classList.add('selected');
                            console.log(`La couleur ${colorName.id} à la classe selected`);

                            ;
                            break;
                        case 'premonitoire':
                            ctx.globalCompositeOperation = 'source-over';
                            ctx.strokeStyle = premonitoire;
                            colorName.classList.add('selected');
                            console.log(`La couleur ${colorName.id} à la classe selected`);

                            // removeSelectedClassOnColor();
                            break;
                        case 'lucide':
                            ctx.globalCompositeOperation = 'source-over';
                            ctx.strokeStyle = lucide;
                            colorName.classList.add('selected');
                            console.log(`La couleur ${colorName.id} à la classe selected`);

                            // removeSelectedClassOnColor();
                            break;
                        default:
                            break;
                    }

                    const selectedColors = document.querySelectorAll('.selected');
                    selectedColors.forEach( selected => {
                        const selectedColorElement = selected.classList.contains('color');
                        if ( selectedColorElement ) {
                            console.log(`La couleur qui a déjà la classe selected est ${selectedColorElement.id}`);
                        }
                        colorName.classList.remove('selected');
                    });

                }
            }, false);
        });

        /*********************************************
         * Changer la taille du dessin
         *********************************************/
        const taille = document.querySelector('#taille');
        const tailleAffiche = document.querySelector(".taille--affiche");
        ctx.lineWidth = taille.value;

        taille.addEventListener("change", () => {
            setBubble(taille, tailleAffiche);
            ctx.lineWidth = taille.value;
        });
        setBubble(taille, tailleAffiche);

        let finalValue;

        function setBubble(taille, tailleAffiche) {
            const val = taille.value;
            const min = taille.min ? taille.min : 0;
            const max = taille.max ? taille.max : 100;
            const newVal = Number(((val - min) * 100) / (max - min));
            finalValue = tailleAffiche.innerHTML = val;

            // Sorta magic numbers based on size of the native UI thumb
            tailleAffiche.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
        }

        /*********************************************
         * Changer la couleur du tracé
         *********************************************/
        if ( eraser  ) {
            eraser.addEventListener( 'click', (e) => {
                ctx.globalCompositeOperation = 'destination-out';
                eraser.classList.toggle('selected');

                if ( eraser.classList.contains('selected') ) {

                    // ENLEVER LA CLASS SELECTED DES COULEURS SI ON SELECTIONNE LA GOMME
                    let colors = document.querySelectorAll('.color');
                    colors.forEach( color => {
                        const colorSelected = color.classList.contains('selected');
                        if ( colorSelected ) {
                            console.log(`La couleur ${color.id} est sélectionné et on veut lui enlever sa classe selected`);
                            color.classList.remove('selected');
                        } else {
                            // Silence is golden.
                        }
                    });

                    // CHANGER LE CANVAS DE CURSOR
                    canvas.style.cursor = 'pointer';

                } else {
                    // Silence is golden
                }
            });
        }

        /*********************************************
         * Download
         *********************************************/

        document.getElementById('upload-button').addEventListener('click', () => {
            let image = canvas.toDataURL("image/png");
            let imageDownloaded = this.href = image;

            dessinHTML = `
                    <div class="acf-field acf-field-dessin">
                        <div class="image-container">
                        </div>
                        <div class="button--rounded contenu--button-dessin-edit"><span>Recommencer son rêve</span></div>
                    </div>
                `;
            contenuTexte.insertAdjacentHTML('afterend', dessinHTML);


            // REVOIR DANS LE PROCESS GLOBAL SI C'EST UTILE
            if ( imageDownloaded ) {

                // ajoutImage(image);
                console.log(`On ajoute l'image dans le DOM`)
                // Creation de la zone du dessin
                let imageTag = document.createElement("img");
                let imageContainer = document.querySelector('.acf-field-dessin .image-container');
                imageTag.classList.add('dessin--termine');
                imageTag.setAttribute('id', 'dessin--termine');
                imageTag.setAttribute('src', image);
                imageContainer.appendChild(imageTag);

                console.log( imageContainer )


                ajoutDessinToField(image, contenuDessin);
            }

            if ( wrapperDessin.classList.contains('-is-active') ) {
                wrapperDessin.classList.remove('-is-active');

            }

            contenuTexte.classList.add('as-drawing');
        });

        /*********************************************
         * Recommencer son rêve
         * MODIFIER SON REVE
         *********************************************/


        // if ( singleReve ) {

        // SI IL Y A DU TEXTE
        if ( contenuText.innerHTML && singleReve ) {
            if ( buttonText && buttonDessin ){
                buttonText.classList.add('rounded--black');
                buttonDessin.classList.add('rounded--black');
            } else if ( buttonText || buttonDessin ) {
                buttonText.classList.remove('rounded--black');
                buttonDessin.classList.add('rounded--black');
            }
        }
        insertButtonRedo();


        // ON CREE LA ZONE AVEC L'IMAGE
        function insertButtonRedo() {
            dessinHTML = `
                        <div class="acf-field acf-field-dessin acf-field-for-edit">
                            <div class="image-container image-container-old">
                                <img src="${srcDessin.value}" alt="">
                            </div>
                            <div class="button--rounded contenu--button-dessin-edit"><span>Recommencer son rêve</span></div>
                        </div>
            `;
            contenuText.insertAdjacentHTML('afterend', dessinHTML);

            setTimeout( function(e){
                RestartDessin(wrapperDessin);
            }, 1000 );
        }
        // }


        /*********************************************
         * Fermer la boite de dialogue pour dessiner
         *********************************************/

        const boutonDessin = document.querySelector('.contenu--button-dessin');
        const closeButton = document.querySelector('.dessin-close') && document.querySelector('.dessin-close img') && document.querySelector('.dessin-close svg');

        closeButton.addEventListener('click', function(e) {
            console.log(e);
            wrapperDessin.classList.remove('-is-active');
            boutonDessin.classList.remove('rounded--black');
        });


        /*********************************************
         * Enregistrer les modifications du dessin et sauvegarder
         *********************************************/
        const targetNode = document.querySelector(".acf-form-fields");
        const observerOptions = {
            childList: true,
            attributes: true,

            // Omit (or set to false) to observe only changes to the parent node
            subtree: true
        }

        const observer = new MutationObserver(callback);
        observer.observe(targetNode, observerOptions);

        function callback(mutationList, observer) {
            mutationList.forEach( (mutation) => {
                switch(mutation.type) {
                    case 'childList':
                        const imageContainers = document.querySelectorAll('.image-container');
                        const contenuDessin = document.querySelector('#acf-field_6104fb96d7330');
                        if( imageContainers.length === 2 ) {
                            imageContainers[1].closest('.acf-field-dessin').style.display = 'none';
                            const imageSrc = imageContainers[0].querySelector('img').src;
                            ajoutDessinToField(imageSrc, contenuDessin);
                        }
                        break;
                    case 'attributes':
                        break;
                    case 'subtree':
                        break;
                }
            });
        }

    }

    /*********************************************
     * Helper functions
     *********************************************/


    // POSITION DE LA SOURIS
    function getMousePos(canvas, evt) {
        let rect = canvas.getBoundingClientRect();
        return {
            x: evt.clientX - rect.left,
            y: evt.clientY - rect.top
        };
    }

    // DESSIN EN FONCTION DE LA POSITION DE LA SOURIS
    function mouseMove(evt) {
        let mousePos = getMousePos(canvas, evt);

        ctx.lineTo(mousePos.x, mousePos.y);
        ctx.stroke();
    }

    // FUNCTION POUR AJOUTER L'IMAGE DANS LE CONTAINER POUR AFFICHER LE DESSIN A L'UTILISATEUR
    function ajoutImage(image){
        console.log(`On ajoute l'image dans le DOM`)
        // Creation de la zone du dessin
        let imageTag = document.createElement("img");
        let imageContainer = document.querySelector('.acf-field-dessin .image-container');
        imageTag.classList.add('dessin--termine');
        imageTag.setAttribute('id', 'dessin--termine');
        imageTag.setAttribute('src', image);
        imageContainer.appendChild(imageTag);
    }

    // FUNCTION POUR AJOUTER L'IMAGE DANS LE FIELD
    function ajoutDessinToField(image, contenuDessin) {
        contenuDessin.value = image;
    }


    // Undo(s) function
    function drawPaths(){
        // delete everything
        ctx.clearRect(0,0,canvas.width,canvas.height);
        // draw all the paths in the paths array
        pathsry.forEach(path=>{
            ctx.beginPath();
            ctx.moveTo(path[0].x,path[0].y);
            for(let i = 1; i < path.length; i++){
                ctx.lineTo(path[i].x,path[i].y);
            }
            ctx.stroke();
        })
    }

    function Undo(){
        // remove the last path from the paths array
        pathsry.splice(-1,1);
        // draw all the paths in the paths array
        drawPaths();
    }


    // a function to detect the mouse position
    function oMousePos(canvas, evt) {
        var ClientRect = canvas.getBoundingClientRect();
        return { //objeto
            x: Math.round(evt.clientX - ClientRect.left),
            y: Math.round(evt.clientY - ClientRect.top)
        }
    }

    // Cliquer sur le bouton 'modifier son dessin' pour ouvrir l'outil pour dessiner

    function RestartDessin(wrapperDessin) {
        const editDessin = document.querySelector('.contenu--button-dessin-edit');
        editDessin.addEventListener('click', (e) => {
            // if ( e.target && e.target.classList === 'contenu--button-dessin-edit' ) {
            const acfDessin = document.querySelector('.acf-field-dessin');
            const containerImage = acfDessin.querySelector('.image-container');
            const image = containerImage.querySelector('img');
            if ( !wrapperDessin.classList.contains('-is-active') ) {
                wrapperDessin.classList.add('-is-active');
                // wrapperContainerImage.remove();
            } else {
                wrapperDessin.classList.remove('-is-active');
            }
            // }
        });
    }


});
