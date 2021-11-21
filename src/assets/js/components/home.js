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

    // Click event on Filtres
    window.addEventListener( 'click', function(e) {
        if ( e.target.closest('#container--filtres') ) {
            filtresReveal(e);
        } else if ( e.target.closest('#container--apropos') || e.target.closest('#container--reves') ) {
            closeFiltresSection(e);
        }
    }, true);

    conFilClose.addEventListener('click', closeFiltresSection, true);

    // Click event on A propos
    document.addEventListener('click', function(e) {
        // console.log(e.target)
        if ( e.target === containerAPropos.querySelector('.container--apropos-cover') || e.target === containerAPropos.querySelector('.title--apropos-cover')  ) {
            aproposReveal(e);
        }
    }, true);
    conProposClose.addEventListener('click', aproposClose, true);

    containerReves.addEventListener('click', aproposClose, true);


    function filtresReveal(e) {
        containerFiltres.classList.add('is-open');
        containerAPropos.classList.add('is-forbidden');
        containerReves.classList.add('is-reduced');
        conFilCover.classList.add('is-hidden');
        conFilList.classList.remove('is-hidden');

    }
    function closeFiltresSection(e) {
        e.preventDefault();
        if ( containerFiltres.classList.contains('is-open') && conFilCover.classList.contains('is-hidden') ) {
            containerFiltres.classList.remove('is-open');
            containerAPropos.classList.remove('is-forbidden');
            containerReves.classList.remove('is-reduced');
            conFilCover.classList.remove('is-hidden');
            conFilList.classList.add('is-hidden');
        }

    }
    function aproposClose(e) {
        // if ( e.target.closest('#container--filtres') ) {
        //     console.log('on clique sur les filtres ! ');
        // } else if ( e.target.closest('#container--reves') ) {
        //     console.log('on clique sur les reves');
        // }
        containerAPropos.classList.remove('is-open');
        containerFiltres.classList.remove('is-forbidden');
        conRevCover.classList.add('is-hidden');
        conRevesArticles.classList.remove('is-hidden');
        conProposElements.classList.add('is-hidden');
        conProposClose.classList.add('is-hidden');
        conRevesArticles.classList.remove('is-hidden');
    }
    function aproposReveal(e) {
        containerAPropos.classList.toggle('is-open');
        containerFiltres.classList.toggle('is-forbidden');
        conRevCover.classList.toggle('is-hidden');
        conRevesArticles.classList.toggle('is-hidden');
        conRevesArticles.classList.toggle('is-hidden');
        conProposElements.classList.toggle('is-hidden');
        if ( conProposClose.classList.contains('is-hidden') ) {
            conProposClose.classList.toggle('is-hidden');
        }
    }
}
