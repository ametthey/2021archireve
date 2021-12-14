import lottie from 'lottie-web';
/******************************************************************************
 * Lottie Animation for the logo
 ******************************************************************************/

window.addEventListener( 'load', headerAnimation );

function headerAnimation() {
    const headerLottie = document.querySelector('.site-branding a');

    if ( headerLottie ) {

        const headerLottieAnimation = lottie.loadAnimation({
            container: headerLottie,
            renderer: 'svg',
            path: '/wp-content/themes/_themename/dist/assets/images/animation/header.json',
        })

        headerLottieAnimation.addEventListener( 'complete', (e) => {
            setTimeout( function delayHeaderAnimation() {
                headerLottieAnimation.goToAndPlay(0);
            }, 10000 );
        });

    }
}
