import lottie from 'lottie-web';
// import barba from '@barba/core';

// barba.init({
//     // debug: true,
//     transitions: [{
//         once(data) {
//             const loadingAnimationLogo = data.next.container;
//             // const loadingAnimationLogo = data.next.container.classList.contains('.content--home-logo');
//             console.log( loadingAnimationLogo )
//             if ( loadingAnimationLogo.classList.contains('content--home-logo') ) {
//                 console.log('home');
//                 loadLottieAnimation(loadingAnimationLogo);
//                 headerAnimation();
//             } else {
//                 console.log('not home');
//                 headerAnimation();
//             }
//         }
//     }]
// });

const home = document.querySelector('.is-home');

if ( home ) {
    loadingAnimation();
}

function loadingAnimation() {
    const articles = document.querySelectorAll(".article-reve");
    const loadingAnimationLogo  = document.querySelector('.content--home-logo');
    const logoAnimation = lottie.loadAnimation({
        container: loadingAnimationLogo,
        renderer: 'svg',
        loop: false,
        path: '/wp-content/themes/_themename/dist/assets/images/animation/archireve.json',
        autoplay: true,
        progressiveLoad: true,
    });

    logoAnimation.addEventListener( 'complete', (e) => {
        loadingAnimationLogo.classList.add('is-hidden');
        loadLottieAProposDesktop();
        loadLottieAProposMobile();
    });
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
