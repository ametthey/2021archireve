import removePopups from '../components/popup.js';
const homeContainer = document.querySelector('.is-home');

if ( homeContainer ) {

    const containerFiltres = document.querySelector('#container--filtres');
    const containerReves = document.querySelector('#container--reves');
    const containerAPropos = document.querySelector('#container--apropos');

    const conFilCover = document.querySelector('.container--filtres-cover');
    const conRevCover = containerReves.querySelector('.container--reves-cover');

    const conFilList = containerFiltres.querySelector('.filtres--list');

    const conFilClose = containerFiltres.querySelector('.content--left-close');
    const conFilCloseImg = conFilClose.querySelector('.content--left-close-button');

    const conRevesArticles = document.querySelector('.container--articles');

    const conProposElements = document.querySelector('.apropos--elements');
    const conProposClose = document.querySelector('.apropos-close');

    const popupLucidite = document.querySelector('#popup-lucidite');
    const popupTypologie = document.querySelector('#popup-typologie');

    // -----------------------------------------------------------------------------
    // EVENEMENTS SUR LE BANDEAU FILTRES
    // -----------------------------------------------------------------------------

    // Click sur le bandeau filtre
    document.addEventListener( 'click', function(e) {
        if ( e.target.closest('#container--filtres') ) {
            filtresReveal(e);
            aproposClose(e);
        }
        // Si on clique dehors du bandeau filtre, il se ferme
        else if ( e.target.closest('#container--apropos') || e.target.closest('#container--reves') ) {
            filtresClose(e);
        }
    }, true);

    // Click sur le bouton close du bandeau filtre
    conFilClose.addEventListener('click', filtresClose, true);

    // -----------------------------------------------------------------------------
    // EVENEMENTS SUR LE BANDEAU A PROPOS
    // -----------------------------------------------------------------------------

    // Click sur le bandeau apropos
    document.addEventListener('click', function(e) {
        if ( e.target === containerAPropos.querySelector('.container--apropos-cover') || e.target === containerAPropos.querySelector('.title--apropos-cover')  ) {
            aproposReveal(e);
        }
    }, true);

    conProposClose.addEventListener('click', aproposClose, true);

    containerReves.addEventListener('click', aproposClose, true);


    // -----------------------------------------------------------------------------
    // FONCTIONS POUR LES DIFFÉRENTS ÉVÉNEMENTS
    // -----------------------------------------------------------------------------

    function filtresReveal(e) {
        containerFiltres.classList.add('is-open');
        // containerAPropos.classList.add('is-forbidden');
        containerReves.classList.add('is-reduced');
        conFilCover.classList.add('is-hidden');
        conFilList.classList.remove('is-hidden');

    }
    function filtresClose(e) {
        e.preventDefault();
        if ( containerFiltres.classList.contains('is-open') && conFilCover.classList.contains('is-hidden') ) {
            containerFiltres.classList.remove('is-open');
            // containerAPropos.classList.remove('is-forbidden');
            containerReves.classList.remove('is-reduced');
            conFilCover.classList.remove('is-hidden');
            conFilList.classList.add('is-hidden');
            // setTimeout( (e) => {
            //     containerFiltres.scrollTo({
            //         top: 0,
            //         behavior: 'auto'
            //     });
            // }, 500 );

            removePopups( popupLucidite, popupTypologie, containerReves );
        }

    }

    // A PROPOS
    function aproposReveal(e) {
        containerAPropos.classList.toggle('is-open');
        // containerFiltres.classList.toggle('is-forbidden');
        conRevCover.classList.toggle('is-hidden');
        conRevesArticles.classList.toggle('is-hidden');
        conRevesArticles.classList.toggle('is-hidden');
        conProposElements.classList.toggle('is-hidden');
        if ( conProposClose.classList.contains('is-hidden') ) {
            conProposClose.classList.toggle('is-hidden');
        }

        removePopups( popupLucidite, popupTypologie, containerReves );
    }
    function aproposClose(e) {
        containerAPropos.classList.remove('is-open');
        // containerFiltres.classList.remove('is-forbidden');
        conRevCover.classList.add('is-hidden');
        conRevesArticles.classList.remove('is-hidden');
        conProposElements.classList.add('is-hidden');
        conProposClose.classList.add('is-hidden');
        conRevesArticles.classList.remove('is-hidden');
    }

    function removePopups( popupLucidite, popupTypologie, containerReves ) {
        if ( popupLucidite.classList.contains('is-visible') ) {
            popupLucidite.classList.remove('is-visible');
            containerReves.classList.remove('is-fading');
        } else if ( popupTypologie.classList.contains('is-visible') ) {
            popupTypologie.classList.remove('is-visible');
            containerReves.classList.remove('is-fading');
        }
    }
}
