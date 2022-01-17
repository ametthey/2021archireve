// Click on the info buttons
const popupTriggers = document.querySelectorAll('.content-left-container-title .filter--title-information');
const popupLucidite = document.querySelector('#popup-lucidite');
const popupTypologie = document.querySelector('#popup-typologie');

if ( popupTriggers && popupLucidite && popupTypologie ) {
    popupTriggers.forEach( trigger => {
        trigger.addEventListener('click', function(e) {

            if ( e.target.dataset.filtre === 'lucidite' ) {
                popupLucidite.classList.add('is-visible');
            }
            if ( e.target.dataset.filtre === 'typologie' ) {
                popupTypologie.classList.add('is-visible');
            }

        }, false);
    });

    const closeLucidite = popupLucidite.querySelector('img');
    closeLucidite.addEventListener( 'click', function(e) {
        popupLucidite.classList.remove('is-visible');
    }, false );

    const closeTypologie = popupTypologie.querySelector('img');
    closeTypologie.addEventListener( 'click', function(e) {
        popupTypologie.classList.remove('is-visible');
    }, false );
}

