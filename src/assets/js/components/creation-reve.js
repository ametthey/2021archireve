// show everything when everything is loaded
const creationReveContainer = document.querySelector('#form--creation-reve');
window.addEventListener('DOMContentLoaded', function(e) {
    if( creationReveContainer ){
        setTimeout( function(e) {
            creationReveContainer.classList.add('is-loaded');
        }, 500);
    }
});

/*
 * Creation de la zone Contenu
 */

const datePicker = document.querySelector('.acf-field-61015e94be047');
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

if ( datePicker ){
    datePicker.insertAdjacentHTML('afterend', contenuTitle);
}

/*
 * Creation de la zone Souvenir du reve
 */

const lieu = document.querySelector('.acf-field-6101cf2cc0b64');
const SouvenirReveTitle = `
    <div class="acf-field acf-field-souvenir-reve">
        <div class="acf-label">
            <label>Souvenir du rêve</label>
    </div>
`;

if ( lieu ){
    lieu.insertAdjacentHTML('afterend', SouvenirReveTitle);
}

const contenuTexte = document.querySelector('.acf-field-610161fcb8f44');
const contenuDessin = document.querySelector('.acf-field-6101620bb8f45');

/*
 * Selection du type de contenu
 */

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

/*
 * Modal pour dessin
 */


/*
 * Modalités du sommeil
 */

const modaliteSommeilInputs = document.querySelectorAll('#reve--sommeil .acf-checkbox-list label input');
modaliteSommeilInputs.forEach( input => {
    const label = input.closest('label');
    input.addEventListener('change', (e) => {
        if ( input.checked ) {
            label.classList.add('-is-checked');
        } else {
            label.classList.remove('-is-checked');
        }
    });
});


/*
 * Modalités de l'humeur
 */

const modaliteHumeurInputs = document.querySelectorAll('#reve--humeur .acf-checkbox-list label input');
modaliteHumeurInputs.forEach( input => {
    const label = input.closest('label');
    input.addEventListener('change', (e) => {
        if ( input.checked ) {
            console.log('check');
            label.classList.add('-is-checked');
        } else {
            console.log('uncheck');
            label.classList.remove('-is-checked');
        }
    });
});

/*
 * Modalités du sens
 */
const modaliteSensInputs = document.querySelectorAll('#reve--sens .acf-checkbox-list label input');
modaliteSensInputs.forEach( input => {
    const label = input.closest('label');
    input.addEventListener('change', (e) => {
        if ( input.checked ) {
            console.log('check');
            label.classList.add('-is-checked');
        } else {
            console.log('uncheck');
            label.classList.remove('-is-checked');
        }
    });
});

/*
 * Modalités du lieu
 */
const modaliteLieuInputs = document.querySelectorAll('#reve--lieu .acf-checkbox-list label input');
modaliteLieuInputs.forEach( input => {
    const label = input.closest('label');
    input.addEventListener('change', (e) => {
        if ( input.checked ) {
            console.log('check');
            label.classList.add('-is-checked');
        } else {
            console.log('uncheck');
            label.classList.remove('-is-checked');
        }
    });
});
