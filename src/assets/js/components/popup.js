// Click on the info buttons
const popupTriggers = document.querySelectorAll('.content-left-container-title .filter--title-information');
const popupLucidite = document.querySelector('#popup-lucidite');
const popupTypologie = document.querySelector('#popup-typologie');
const containerReves = document.querySelector('#container--reves');
const popupContainer = document.querySelector('.filtres-popup');

if ( popupTriggers && popupLucidite && popupTypologie ) {
    popupTriggers.forEach( trigger => {
        trigger.addEventListener('click', function(e) {

            if ( e.target.dataset.filtre === 'lucidite' ) {
                popupLucidite.classList.add('is-visible');
                popupContainer.classList.add('is-visible');
                containerReves.classList.add('is-fading');

                if (popupTypologie.classList.contains('is-visible') ) {
                    popupTypologie.classList.remove('is-visible');
                    popupTypologie.scrollTo({
                        top: 0,
                        left: 0,
                        behavior: 'instant',
                    });
                }
            }
            if ( e.target.dataset.filtre === 'typologie' ) {
                popupTypologie.classList.add('is-visible');
                popupContainer.classList.add('is-visible');
                containerReves.classList.add('is-fading');

                if (popupLucidite.classList.contains('is-visible') ) {
                    popupLucidite.classList.remove('is-visible');
                    popupLucidite.scrollTo({
                        top: 0,
                        left: 0,
                        behavior: 'instant',
                    });
                }
            }

        }, false);
    });


    const closeLucidite = popupLucidite.querySelector('img');
    closeLucidite.addEventListener( 'click', function(e) {
        popupContainer.classList.remove('is-visible');
        popupLucidite.classList.remove('is-visible');
        containerReves.classList.remove('is-fading');
    }, false );

    const closeTypologie = popupTypologie.querySelector('img');
    closeTypologie.addEventListener( 'click', function(e) {
        popupContainer.classList.remove('is-visible'); popupTypologie.classList.remove('is-visible'); containerReves.classList.remove('is-fading'); }, false ); }

export function removePopups(popupLucidite, popupTypologie) {
    if ( popupLucidite.classList.contains('is-visible') ) {
        popupLucidite.classList.remove('is-visible');
    } else if ( popupTypologie.classList.contains('is-visible') ) {
        popupTypologie.classList.remove('is-visible');
    }
}

