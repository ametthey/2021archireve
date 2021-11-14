import lottie from 'lottie-web';

window.addEventListener( 'load', loadLottieAnimation );

function loadLottieAnimation() {
    const contentHomeLogo = document.querySelector('.content--home-logo');

    if ( contentHomeLogo ) {

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
}

