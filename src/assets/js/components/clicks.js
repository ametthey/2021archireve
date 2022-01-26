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

    const conProposCover = document.querySelector('.container--apropos-cover');
    const conProposCoverTitle = document.querySelector('.title--apropos-cover');

    const popup = document.querySelector('.filtres-popup');

    // -----------------------------------------------------------------------------
    // EVENEMENTS SUR LE BANDEAU FILTRES
    // -----------------------------------------------------------------------------

    conFilCover.addEventListener( 'click', function(e) {
        filtresReveal(e);
        aproposClose(e);
    });

    containerFiltres.addEventListener( 'click', function(e) {
        filtresReveal(e);
        aproposClose(e);
    });

    // Click sur le bouton close du bandeau filtre
    conFilClose.addEventListener('click', function(e) {
        filtresClose();
    });

    // -----------------------------------------------------------------------------
    // EVENEMENTS SUR LE BANDEAU A PROPOS
    // -----------------------------------------------------------------------------

    const aproposLinks =  containerAPropos.querySelectorAll('a');


    conProposCover.addEventListener('click', (e) => {
        aproposReveal(e);
        filtresClose(e);
    });
    conProposCoverTitle.addEventListener('click', (e) => {
        aproposReveal(e);
        filtresClose(e);
    });


    conProposClose.addEventListener('click', aproposClose);

    containerReves.addEventListener('click', function(e) {
        filtresClose(e);
        aproposClose(e);
    });


    // -----------------------------------------------------------------------------
    // FONCTIONS POUR LES DIFFÉRENTS ÉVÉNEMENTS
    // -----------------------------------------------------------------------------

    function filtresReveal(e) {
        containerFiltres.classList.add('is-open');
        containerReves.classList.add('is-reduced');
        conFilCover.classList.add('is-hidden');
        conFilList.classList.remove('is-hidden');

    }
    function filtresClose(e) {
        e.preventDefault();
        if ( containerFiltres.classList.contains('is-open') && conFilCover.classList.contains('is-hidden') ) {
            containerFiltres.classList.remove('is-open');
            containerReves.classList.remove('is-reduced');
            conFilCover.classList.remove('is-hidden');
            conFilList.classList.add('is-hidden');
            removePopups(e);
        }

    }

    // A PROPOS
    function aproposReveal(e) {
        containerAPropos.classList.toggle('is-open');
        conRevCover.classList.toggle('is-hidden');
        conRevesArticles.classList.toggle('is-hidden');
        conRevesArticles.classList.toggle('is-hidden');
        conProposElements.classList.toggle('is-hidden');
        if ( conProposClose.classList.contains('is-hidden') ) {
            conProposClose.classList.toggle('is-hidden');
        }

        removePopups(e);
    }
    function aproposClose(e) {
        containerAPropos.classList.remove('is-open');
        conRevCover.classList.add('is-hidden');
        conRevesArticles.classList.remove('is-hidden');
        conProposElements.classList.add('is-hidden');
        conProposClose.classList.add('is-hidden');
        conRevesArticles.classList.remove('is-hidden');
    }

    function removePopups(e) {
        if ( popup.classList.contains('is-visible') ) {
            popup.classList.remove('is-visible');
            containerReves.classList.remove('is-fading');
        } else {
            // Silence is golden
        }
    }
}
