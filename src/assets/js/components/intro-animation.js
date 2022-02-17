import lottie from 'lottie-web';
const articles = document.querySelectorAll(".article-reve");
const home = document.querySelector('.is-home');
const loadingAnimationLogo  = document.querySelector('.content--home-logo');

/**
 * Detect first visit or not
 *
 * Detect if the visitor already came during this session
 * Or if it's the first time that he come
 */
function GetCookie(name) {
    var arg=name+"=";
    var alen=arg.length;
    var clen=document.cookie.length;
    var i=0;
    while (i<clen) {
        var j=i+alen;
        if (document.cookie.substring(i,j)==arg)
            return "here";
        i=document.cookie.indexOf(" ",i)+1;
        if (i==0) break;
    }
    return null;
}
function testFirstCookie(){
    var visit=GetCookie("FirstTimeVisitCookie");
    if (visit==null){
        var expire=new Date();
        expire=new Date(expire.getTime()+7776000000);
        document.cookie="FirstTimeVisitCookie=here; expires="+expire + ";path=/";
        // First visit
        console.log( 'first visit' );
        loadingAnimation();

    } else {
        // Returning visitor
        console.log( 'returning visitor' );
        loadingAnimationLogo.classList.add('is-hidden');
        articles.forEach( article => article.classList.add('is-visible') );
        loadLottieAProposDesktop();
        loadLottieAProposMobile();
    }
}


if  (home) {
    testFirstCookie()
} else {

}






function loadingAnimation() {
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
