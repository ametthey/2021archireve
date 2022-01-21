import lottie from 'lottie-web';
import barba from '@barba/core';

barba.init({
    // debug: true,
    transitions: [{
        once(data) {
            const contentHomeLogo = data.next.container;
            if ( contentHomeLogo ) {
                loadLottieAnimation(contentHomeLogo);
                headerAnimation();
            } else {
                headerAnimation();
            }
        }
    }]
});

// Without Barbajs
// const contentHomeLogo  = document.querySelector('   ')
// loadLottieAnimation(contentHomeLogo);

// headerAnimation();

function loadLottieAnimation(contentHomeLogo) {
    const logoAnimation = lottie.loadAnimation({
        container: contentHomeLogo,
        renderer: 'svg',
        loop: false,
        path: '/wp-content/themes/_themename/dist/assets/images/animation/archireve.json',
        autoplay: true,
        progressiveLoad: true,
    });

    logoAnimation.addEventListener( 'complete', (e) => {
        contentHomeLogo.classList.add('is-hidden');
    });
}

function headerAnimation() {
    const headerLottie = document.querySelector('.site-branding a');

    if ( headerLottie ) {

        const headerLottieAnimation = lottie.loadAnimation({
            container: headerLottie,
            renderer: 'svg',
            path: '/wp-content/themes/_themename/dist/assets/images/animation/header.json',
            assetsPath: '/wp-content/themes/_themename/',
            progressiveLoad: true,
        })

        headerLottieAnimation.addEventListener( 'complete', (e) => {
            setTimeout( function delayHeaderAnimation() {
                headerLottieAnimation.goToAndPlay(0);
            }, 10000 );
        });

        // A PROPOS
        loadLottieAProposDesktop();
        loadLottieAProposMobile();
    }
}

function loadLottieAProposDesktop() {
    const aproposTitle = lottie.loadAnimation({
        container: document.querySelector('.apropos--elements .propos--section-title') ,
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '/wp-content/themes/_themename/dist/assets/images/animation/archireve-white.json',
        progressiveLoad: true,
    })

    aproposTitle.addEventListener( 'complete', (e) => {
        aproposTitle.classList.add('desktop');
    });

    aproposTitle.play();

}
function loadLottieAProposMobile() {
    const aproposTitleM = lottie.loadAnimation({
        container: document.querySelector('.right--container-propos-header .propos--section-title') ,
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '/wp-content/themes/_themename/dist/assets/images/animation/archireve-white.json',
        progressiveLoad: true,
    })
    aproposTitleM.play();

    aproposTitleM.addEventListener( 'complete', (e) => {
        aproposTitleM.classList.add('mobile');
    });
}
