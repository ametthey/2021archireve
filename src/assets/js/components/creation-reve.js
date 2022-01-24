// show everything when everything is loaded
const creationReveContainer = document.querySelector('#form--creation-reve');
window.addEventListener('load', function(e) {
    if( creationReveContainer ){
        setTimeout( function(e) {
            creationReveContainer.classList.add('is-loaded');
        }, 500);
    }
});


/******************************************************************
 * AJOUT DE LABEL POUR CONTENU & SOUVENIR DU REVE
 *****************************************************************/
const datePicker = document.querySelector('.acf-field-61015e94be047');
const lieu = document.querySelector('.acf-field-6101cf2cc0b64');
const contenuTitle = `
    <div class="acf-field acf-field-contenu">
        <div class="acf-label">
            <label>Contenu</label>
        </div>
        <div class="contenu--buttons">
            <div class="button--rounded contenu--button-texte"><h4>TEXTE</h4></div>
            <div class="button--rounded contenu--button-dessin"><h4>DESSIN</h4></div>
        </div>
    </div>
`;
const SouvenirReveTitle = `
    <div class="acf-field acf-field-souvenir-reve">
        <div class="acf-label">
            <label>Souvenir du rêve</label>
    </div>
`;

if ( datePicker && lieu ){
    // Creation de la zone Contenu
    datePicker.insertAdjacentHTML('afterend', contenuTitle);
    // Creation de la zone Souvenir du reve
    lieu.insertAdjacentHTML('afterend', SouvenirReveTitle);
}

/******************************************************************
 * SELECTION DU TYPE DE CONTENU
 *****************************************************************/

const contenuTexte = document.querySelector('.acf-field-610161fcb8f44');
const contenuDessin = document.querySelector('.acf-field-6101620bb8f45');
const buttonText = document.querySelector('.contenu--button-texte');
const buttonDessin = document.querySelector('.contenu--button-dessin');
const containerDessin = document.querySelector('.dessin--wrapper');
const containerCreationReve = document.querySelector('.content--creation-reve');

window.addEventListener( 'DOMContentLoaded', (e) => {
    if ( buttonText && buttonDessin ){
        buttonText.addEventListener( 'click', (e) => {
            buttonText.classList.toggle('rounded--black');
            contenuTexte.classList.toggle('textearea--visible');
        });
        buttonDessin.addEventListener( 'click', (e) => {
            buttonDessin.classList.toggle('rounded--black');
            containerDessin.classList.add('-is-active');
        });
    }
});


/*****************************************************************
 * AJOUT D'UNE CLASSE IS-CHECKED TO STYLE LES BOUTONS DE MODALITÉS
 ****************************************************************/

const modaliteSommeilInputs = document.querySelectorAll('#reve--sommeil .acf-checkbox-list label input');
const modaliteHumeurInputs = document.querySelectorAll('#reve--humeur .acf-checkbox-list label input');
const modaliteSensInputs = document.querySelectorAll('#reve--sens .acf-checkbox-list label input');
const modaliteLieuInputs = document.querySelectorAll('#reve--lieu .acf-checkbox-list label input');
const modalites = [modaliteSommeilInputs, modaliteHumeurInputs, modaliteSensInputs, modaliteLieuInputs ];

modalites.forEach( modalite => {
    modalite.forEach( input => {
        const label = input.closest('label');
        input.addEventListener('change', (e) => {
            if ( input.checked ) {
                label.classList.add('-is-checked');
            } else {
                label.classList.remove('-is-checked');
            }
        });
    });
});


/*****************************************************************
// MODIFIER L'EMPLACEMENT DE LA SPAN AVEC LE NOM DE LA TYPOLOGIE
 ****************************************************************/
const typologieListItems = document.querySelectorAll('#reve--typologie .categorychecklist-holder .acf-checkbox-list li');

    typologieListItems.forEach( ( li ) => {
        const label = li.querySelector('label');
        const span = li.querySelector('span');
        const input = li.querySelector('input');
        const newSpan = document.createElement('span');
        li.setAttribute('class', 'typologie--item');
        label.setAttribute('class', 'typologie--label');
        input.setAttribute('class', 'typologie--input');
        newSpan.classList.add('typologie--span');
        newSpan.innerHTML = span.innerHTML;
        span.remove();

        input.parentNode.insertBefore(newSpan, input);
    });


function insertAfter(newNode, existingNode) {
    existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
}
