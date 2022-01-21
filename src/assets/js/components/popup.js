// Click on the info buttons
const popupTriggers = document.querySelectorAll('.content-left-container-title .filter--title-information');
const popupLucidite = document.querySelector('#popup-lucidite');
const popupTypologie = document.querySelector('#popup-typologie');
const containerReves = document.querySelector('#container--reves');

if ( popupTriggers && popupLucidite && popupTypologie ) {
    popupTriggers.forEach( trigger => {
        trigger.addEventListener('click', function(e) {

            if ( e.target.dataset.filtre === 'lucidite' ) {
                popupLucidite.classList.add('is-visible');
                containerReves.classList.add('is-fading');
            }
            if ( e.target.dataset.filtre === 'typologie' ) {
                popupTypologie.classList.add('is-visible');
                containerReves.classList.add('is-fading');
            }

        }, false);
    });

    const closeLucidite = popupLucidite.querySelector('img');
    closeLucidite.addEventListener( 'click', function(e) {
        popupLucidite.classList.remove('is-visible');
        containerReves.classList.remove('is-fading');
    }, false );

    const closeTypologie = popupTypologie.querySelector('img');
    closeTypologie.addEventListener( 'click', function(e) {
        popupTypologie.classList.remove('is-visible');
        containerReves.classList.remove('is-fading');
    }, false );
}

export function removePopups(popupLucidite, popupTypologie) {
    if ( popupLucidite.classList.contains('is-visible') ) {
        popupLucidite.classList.remove('is-visible');
    } else if ( popupTypologie.classList.contains('is-visible') ) {
        popupTypologie.classList.remove('is-visible');
    }
}

