import lottie from 'lottie-web';

const home = document.querySelector('.is-home');
const loadingAnimationLogo  = document.querySelector('.content--home-logo');

if ( home ) {
    loadingAnimation();
} else {
    // loadLottieAProposDesktop();
    // loadLottieAProposMobile();
}


function loadingAnimation() {
    const articles = document.querySelectorAll(".article-reve");
    const loadingAnimationLogo  = document.querySelector('.content--home-logo');
    const logoAnimation = lottie.loadAnimation({
        container: loadingAnimationLogo,
        renderer: 'svg',
        loop: false,
        path: '/wp-content/themes/_themename/dist/assets/images/animation/logo-2lines-black.json',
        autoplay: true,
        progressiveLoad: true,
    });

    logoAnimation.addEventListener( 'complete', (e) => {
        loadingAnimationLogo.classList.add('is-hidden');

        // LANCER LES ANIMATIONS POUR LES PARTIES APROPOS EN MOBILE ET DESKTOP
        loadLottieAProposDesktop();
        loadLottieAProposMobile();

        // MONTRER TOUT LES ARTICLES QUAND L'ANIMATION D'INTRO EST TERMINÉE
        articles.forEach( article => article.classList.add('is-visible') );
    });

}


function loadLottieAProposDesktop() {
    const aproposTitle = lottie.loadAnimation({
        container: document.querySelector('.apropos--elements .propos--section-title') ,
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '/wp-content/themes/_themename/dist/assets/images/animation/logo-1line-white.json',
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
        path: '/wp-content/themes/_themename/dist/assets/images/animation/logo-1line-white.json',
        progressiveLoad: true,
    })
    aproposTitleM.play();

    aproposTitleM.addEventListener( 'complete', (e) => {
        aproposTitleM.classList.add('mobile');
    });
}
