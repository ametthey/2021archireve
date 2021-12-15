import lottie from 'lottie-web';
import barba from '@barba/core';

window.addEventListener( 'load', function(e) {
    firstVisit();
    loadLottieAProposDesktop();
    loadLottieAProposMobile();
} );

function firstVisit() {
    console.log('first visit');
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
    console.log('load lottie animation');
    const logoAnimation = lottie.loadAnimation({
        container: contentHomeLogo,
        renderer: 'svg',
        loop: false,
        path: '/wp-content/themes/_themename/dist/assets/images/animation/archireve.json',
        autoplay: true,
    });

    logoAnimation.addEventListener( 'complete', (e) => {
        contentHomeLogo.classList.add('is-hidden');
    });
}

function loadLottieAProposDesktop() {
    console.log('load lottie animation desktop');
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
    console.log('load lottie animation mobile');
    const aproposTitleM = lottie.loadAnimation({
        container: document.querySelector('.right--container-propos-header .propos--section-title') ,
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '/wp-content/themes/_themename/dist/assets/images/animation/archireve-white.json',
    })
    aproposTitleM.play();
}

export { loadLottieAProposDesktop, loadLottieAProposMobile };
