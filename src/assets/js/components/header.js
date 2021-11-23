import lottie from 'lottie-web';
/******************************************************************************
 *
 * Lottie Animation for the logo
 *
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
            console.log('lottie animation is complete');
            setTimeout( function delayHeaderAnimation() {
                headerLottieAnimation.goToAndPlay(0);
                console.log(`C'est reparti`);
            }, 10000 );
        });

    }
}
/******************************************************************************
 *
 * Header reveal
 *
 ******************************************************************************/

// const connexionButton = document.querySelector('#left--connexion');
// const inscriptionButton = document.querySelector('#left--inscription');
// const header = document.querySelector('#masthead');
// const containerHeader = document.querySelector('.container--header');
// const back = document.querySelector('.header-empty');
// const connexion = document.querySelector('.container--header-back-office .container--connexion');
// const inscription = document.querySelector('.container--header-back-office .container--inscription');
// if ( header && connexionButton ) {
//     connexionButton.addEventListener( 'click', (e) => {
//         setTimeout( function() {
//             header.classList.add('header-is-open');
//         }, 200 );
//         connexion.classList.add('is-active');
//         inscription.classList.remove('is-active');
//         setTimeout( function() {
//             back.classList.remove('is-hidden');
//         }, 900 );
//     });
// }
//
// if ( header && inscriptionButton ) {
//     inscriptionButton.addEventListener( 'click', (e) => {
//         setTimeout( function() {
//             header.classList.add('header-is-open');
//
//         }, 200 );
//         inscription.classList.add('is-active');
//         connexion.classList.remove('is-active');
//         setTimeout( function() {
//             back.classList.remove('is-hidden');
//         }, 900 );
//     });
// }
//
// if ( containerHeader ) {
//     back.addEventListener('click', (e) => {
//         connexion.classList.remove('is-active');
//         inscription.classList.remove('is-active');
//         header.classList.remove('header-is-open');
//
//         setTimeout( function() {
//             back.classList.add('is-hidden');
//         }, 900 );
//     }, false);
// }



