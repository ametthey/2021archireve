import lottie from 'lottie-web';

headerLogoAnimation();

function headerLogoAnimation() {
    const headerLottie = document.querySelector('.site-branding a');

    if ( headerLottie ) {

        const headerLottieAnimation = lottie.loadAnimation({
            container: headerLottie,
            renderer: 'svg',
            // path: '/wp-content/themes/_themename/dist/assets/images/animation/header.json',
            assetsPath: 'https://archireve.perimetre.studio/wp-content/uploads/header.json',
            progressiveLoad: true,
        })

        headerLottieAnimation.addEventListener( 'complete', (e) => {
            setTimeout( function delayHeaderAnimation() {
                headerLottieAnimation.goToAndPlay(0);
            }, 10000 );
        });
    }
}
