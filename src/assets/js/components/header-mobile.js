const headerButton = document.querySelector('#header--mobile-apropos');
const headerAPropos = document.querySelector('.right--container-propos-header');
const header = document.querySelector('#masthead');

if ( headerButton ) {
    headerButton.addEventListener( 'click', (e) => {
        e.preventDefault();
        console.log('click sur le bouton pour faire apparaitre le header')
        headerAPropos.classList.toggle('is-active');
        console.log('il est temps de changer le header de couleur nan ?');
        header.classList.toggle('is-faded');
        headerButton.classList.toggle('is-faded');
    });
}

