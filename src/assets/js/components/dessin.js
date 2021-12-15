// https://getbutterfly.com/how-to-draw-on-canvas-and-save-the-result-using-vanilla-javascript/
const container = document.querySelector('.dessin--container');


// document.addEventListener('load', (e) => {
if ( container ) {

    let count = 0;
    let finalValue;
    const cursorDessin = document.querySelector('#cursorDessin');
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
    const buttons = document.querySelector('#buttons');
    const buttonsC = document.querySelector('#buttons-commandes');
    const imageContainer = document.querySelector('.image-container');
    const imageContainers = document.querySelectorAll('.image-container');
    const acfDessins = document.querySelectorAll('.acf-field-dessin');
    const contenuButtons = document.querySelector('.contenu--buttons');

    // PARAMETRE DU STYLÉ
    ctx.fillStyle = "#FFF";
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.lineJoin = 'round';
    ctx.lineCap = 'round';

    // DESSIN EN FONCTION DE LA POSITION DE LA SOURIS
    function mouseMove(evt) {
        let mousePos = getMousePos(canvas, evt);

        ctx.lineTo(mousePos.x, mousePos.y);
        ctx.stroke();
    }

    function getMousePos(canvas, evt) {
        let rect = canvas.getBoundingClientRect();
        return {
            x: evt.clientX - rect.left,
            y: evt.clientY - rect.top
        };
    }

    // EVENEMENT DU DESSIN DANS LE CANVAS
    canvas.addEventListener('mousedown', (evt) => {
        let mousePos = getMousePos(canvas, evt);

        ctx.beginPath();
        ctx.moveTo(mousePos.x, mousePos.y);
        evt.preventDefault();
        canvas.addEventListener('mousemove', mouseMove, false);
    });

    // EVENEMENT DE FIN DU DESSIN DANS LE CANVAS
    canvas.addEventListener('mouseup', () => {
        canvas.removeEventListener('mousemove', mouseMove, false);
    }, false);



    /*********************************************
     * Drawing functions
     *********************************************/

    if ( annuler ) {
        annuler.addEventListener('click' , Undo);
    }


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
                ra.classList.remove('visible');
                rb.classList.remove('visible');
            }
            if ( !colorName.classList.contains('color-selected') ) {
                const selectedColors = Array.from(document.querySelectorAll('.color-selected'));
                selectedColors.forEach(selectedColor => {
                    const activeColorName = selectedColor.classList.contains('color');
                    if ( activeColorName ) {
                        console.log( activeColorName );
                        console.log( selectedColor );
                    }
                    selectedColor.classList.remove('color-selected');
                })
                colorName.classList.add('color-selected');



                switch ( color ) {
                    case 'noir':
                        ctx.globalCompositeOperation = 'source-over';
                        ctx.strokeStyle = noir;
                        console.log(`La couleur ${colorName.id} à la classe selected`);

                        ;
                        break;
                    case 'cauchemar':
                        ctx.globalCompositeOperation = 'source-over';
                        ctx.strokeStyle = cauchemar;
                        console.log(`La couleur ${colorName.id} à la classe selected`);

                        ;
                        break;
                    case 'concomitant':
                        ctx.globalCompositeOperation = 'source-over';
                        ctx.strokeStyle = concomitant;
                        console.log(`La couleur ${colorName.id} à la classe selected`);

                        ;
                        break;
                    case 'creatif':
                        ctx.globalCompositeOperation = 'source-over';
                        ctx.strokeStyle = creatif;
                        console.log(`La couleur ${colorName.id} à la classe selected`);

                        ;
                        break;
                    case 'actualite':
                        ctx.globalCompositeOperation = 'source-over';
                        ctx.strokeStyle = actualite;
                        console.log(`La couleur ${colorName.id} à la classe selected`);

                        ;
                        break;
                    case 'recurrent':
                        ctx.globalCompositeOperation = 'source-over';
                        ctx.strokeStyle = recurrent;
                        console.log(`La couleur ${colorName.id} à la classe selected`);

                        ;
                        break;
                    case 'sexuel':
                        ctx.globalCompositeOperation = 'source-over';
                        ctx.strokeStyle = sexuel;
                        console.log(`La couleur ${colorName.id} à la classe selected`);

                        ;
                        break;
                    case 'premonitoire':
                        ctx.globalCompositeOperation = 'source-over';
                        ctx.strokeStyle = premonitoire;
                        console.log(`La couleur ${colorName.id} à la classe selected`);
                        break;
                    case 'lucide':
                        ctx.globalCompositeOperation = 'source-over';
                        ctx.strokeStyle = lucide;
                        break;
                    default:
                        break;
                }

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
    setBubble(taille, tailleAffiche, cursorDessin);


    function setBubble(taille, tailleAffiche, cursorDessin) {
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

            if ( eraser.classList.contains('selected') ) {
                eraser.classList.remove('selected');
            } else {
                eraser.classList.add('selected');
                DeselectColor();
            }
        });
    }

    /*************************************************
     * FERMER LA BOITE DE DIALOGUE
     * EN APPUYANT SUR LA CROIX
     ************************************************/

    const boutonDessin = document.querySelector('.contenu--button-dessin');
    const closeButton = document.querySelector('.dessin-close img');

    window.addEventListener('click', function(e) {
        if ( e.target ===  closeButton ) {
            wrapperDessin.classList.remove('-is-active');
            boutonDessin.classList.remove('rounded--black');
        }
    }, false);

    /*********************************************
     * Valider son dessin
     *********************************************/

    uploadButton.addEventListener('click', (e) => {
        if ( imageContainers.length === 0 ) onValideDessin();
    }, false);


    /*********************************************
     * MODIFIER SON REVE
     * Recommencer son rêve
     *********************************************/


    if ( singleReve ) {
        insertButtonRedo(srcDessin, contenuText, wrapperDessin);

        verifyTextAndImageActive( contenuButtons );

        function verifyTextAndImageActive(contenuButtons) {
            const Btext = contenuButtons.querySelector('.contenu--button-texte');
            const Bimage = contenuButtons.querySelector('.contenu--button-dessin');
            const Ctext = document.querySelector('#contenu--text textarea').value;
            const Cimage = document.querySelector('#acf-dessin-1 img').src;

            if ( Ctext && Cimage ) {
                Btext.classList.add('rounded--black', 'is-active');
                Bimage.classList.add('rounded--black', 'is-active');
                console.log('they exist ! ');
            } else if ( !Ctext && !Cimage ){
                console.log('they don\'t exist');
            } else if ( !Ctext && Cimage ) {
                Bimage.classList.add('rounded--black', 'is-active');
                console.log( 'image exist' );
            } else if ( Ctext && !Cimage ) {
                Btext.classList.add('rounded--black', 'is-active');
                console.log( 'text exist' );
            }
        }
    }


    /*********************************************************
     * Enregistrer les modifications du dessin et sauvegarder
     *********************************************************/
    const targetNode = document.querySelector(".acf-form-fields");
    const observerOptions = {
        childList: true,
        subtree: true,
        attributes: true,
    }

    const observer = new MutationObserver(callback);
    observer.observe(targetNode, observerOptions);

    function callback(mutationList, observer) {
        mutationList.forEach( (mutation) => {
            switch(mutation.type) {
                case 'childList':
                    const recommencerDessin = mutation.target.querySelector('.contenu--button-dessin-edit');
                    if ( recommencerDessin ) {
                        recommencerDessin.addEventListener( 'click', clearCanvasAndShowCanvas, false );
                    }

                    // Recommencer Dessin
                    if ( mutation.addedNodes[1].id !== 'acf-dessin-1' ) {
                        const dessin1 = mutation.target.querySelectorAll('.acf-field-dessin')[1];
                        dessin1.remove();
                    }

                    break;
                case 'attributes':
                    break;
                case 'subtree':
                    break;
            }
        });
    }

    function onValideDessin() {
        let image = canvas.toDataURL("image/png");
        let imageDownloaded = this.href = image;
        count++;

        dessinHTML = `
                        <div class="acf-field acf-field-dessin" id="acf-dessin-${count}">
                            <div class="image-container">
                                <img id="dessin-termine" class="dessin-termine" src="${image}" alt="">
                            </div>
                            <div class="button--rounded contenu--button-dessin-edit"><span>Recommencer son dessin</span></div>
                        </div>
                    `;

        // Ajouter l'image à un snippet qui viendra juste après le contenu texte
        contenuTexte.insertAdjacentHTML('afterend', dessinHTML);

        // Ajouter l'image au ACF Field
        ajoutDessinToField(image, contenuDessin);

        // Cacher l'outil dessin
        if ( wrapperDessin.classList.contains('-is-active') ) {
            wrapperDessin.classList.remove('-is-active');
        }

        // Ajustement du style après l'ajout de l'image
        contenuTexte.classList.add('as-drawing');
    }

    function clearCanvasAndShowCanvas() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        if ( !wrapperDessin.classList.contains('-is-active')  ) {
            wrapperDessin.classList.add('-is-active');
        }
    }

    // Modifier son rêve - recommncer son dessin
    function insertButtonRedo(srcDessin, contenuText, wrapperDessin ) {
        count++;
        dessinHTML = `
                        <div class="acf-field acf-field-dessin acf-field-for-edit" id="acf-dessin-${count}">
                            <div class="image-container image-container-old">
                                <img src="${srcDessin.value}" alt="">
                            </div>
                            <div class="button--rounded contenu--button-dessin-edit"><span>Recommencer son dessin</span></div>
                        </div>
            `;
        contenuText.insertAdjacentHTML('afterend', dessinHTML);


        const recommencerDessin = document.querySelector('.contenu--button-dessin-edit');
        if ( recommencerDessin ) {
            recommencerDessin.addEventListener( 'click', clearCanvasAndShowCanvas, false );
        }
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
    return {
        x: Math.round(evt.clientX - ClientRect.left),
        y: Math.round(evt.clientY - ClientRect.top)
    }
}

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

function debounce( fn, threshold ) {
    var timeout;
    return function debounced() {
        if ( timeout ) {
            clearTimeout( timeout );
        }
        function delayed() {
            fn();
            timeout = null;
        }
        timeout = setTimeout( delayed, threshold || 100 );
    }
}

function DeselectColor() {
    // ENLEVER LA CLASS SELECTED DES COULEURS SI ON SELECTIONNE LA GOMME
    let colors = document.querySelectorAll('.color');
    colors.forEach( color => {
        const colorSelected = color.classList.contains('color-selected');
        if ( colorSelected ) {
            console.log(`La couleur ${color.id} est sélectionné et on veut lui enlever sa classe selected`);
            color.classList.remove('color-selected');
        } else {
            // Silence is golden.
        }
    });
}
// });
