import lottie from 'lottie-web';
import barba from '@barba/core';

window.addEventListener( 'load', function(e) {
    firstVisit();
    loadLottieAProposDesktop();
    loadLottieAProposMobile();
} );

function firstVisit() {
    const contentHomeLogo = document.querySelector('.content--home-logo');

    if ( contentHomeLogo ) {
        if (localStorage.getItem('wasVisited') == undefined) {
            console.log('first page load');
            localStorage.setItem('wasVisited', 1);
            loadLottieAnimation(contentHomeLogo);
        } else {
            console.log('not first page load');
            contentHomeLogo.classList.add('is-hidden');
        }
    }
}

function loadLottieAnimation(contentHomeLogo) {
    const logoAnimation = lottie.loadAnimation({
        container: contentHomeLogo,
        renderer: 'svg',
        loop: false,
        path: '/wp-content/themes/_themename/dist/assets/images/animation/archireve.json',

    });

    logoAnimation.addEventListener( 'complete', (e) => {
        contentHomeLogo.classList.add('is-hidden');
    });
}

function loadLottieAProposDesktop() {
    const aproposTitle = lottie.loadAnimation({
        container: document.querySelector('.apropos--elements .propos--section-title') ,
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '/wp-content/themes/_themename/dist/assets/images/animation/archireve-white.json',
    })
    aproposTitle.play();

}
function loadLottieAProposMobile() {
    const aproposTitleM = lottie.loadAnimation({
        container: document.querySelector('.right--container-propos-header .propos--section-title') ,
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '/wp-content/themes/_themename/dist/assets/images/animation/archireve-white.json',
    })
    aproposTitleM.play();
}
