// HOVER CONTENT RIGHT
const contentRight = document.querySelector('.content--right');
const contentHome = document.querySelector('.content--home');
const contentLeft = document.querySelector('.content--left');
const articleReves = document.querySelectorAll('.article-reve');
const header = document.querySelector('#masthead');
const rightContainerPropos = document.querySelector('.right--container-propos');
const contentRightO = document.querySelector('.content--right-oriented');
const titreReve = document.querySelector('.content--home-text-border');
const closeButton = document.querySelector('.apropos-close');
const popupDownload = document.querySelector('.popup--download');



if ( contentRight ){
    contentRight.addEventListener( 'click', () => {
        if ( contentLeft.classList.contains('is-open') ) {
            // CAN'T WITH IN THE RIGHT BANDEAU
        } else {
            contentRightEvents();
            // // console.log('allez c\'est parti pour la  droite');
        }
    });

    closeButton.addEventListener( 'click', () => {
        if ( contentLeft.classList.contains('is-open') ) {
            // // console.log('content left a la classe is open');
        } else {
            // // console.log(`content left n'a pas la classe is open`);
            contentRightEventsOff();
        }
    });
}

function contentRightEvents(){
    articleReves.forEach( article => {
        // console.log('pour tout les rêves');
        // console.log(article.classList);

        // Hide all reves
        if ( !article.classList.contains('is-hidden') ) {
            article.classList.add('is-hidden');
            // console.log('hidden!');
        } else {
            // console.log('hidden ?');
            // article.classList.add('is-hidden');
        }
        popupDownload.classList.add('is-hidden');

        // After reves have opacity 0, add multiples classes
        article.addEventListener( 'transitionend', (e) => {
            const articleOpacity = getComputedStyle(article).getPropertyValue('opacity');

            if ( articleOpacity === '0' ) {
                header.classList.add('right-is-open');
                contentHome.classList.add('right-is-open');
                contentRight.classList.add('is-open');
                contentRightO.classList.add('is-hidden');
            }

        });
    });

    contentRight.addEventListener( 'transitionend', (e) => {
        if ( contentRight.classList.contains('is-open') ) {
            if( e.propertyName === 'width' ) {
                // console.log( e.target.offsetWidth );
                titreReve.classList.add('is-visible');
                rightContainerPropos.classList.add('-is-visible');
                contentRight.classList.add('has-right-orientation');
                const proposSections = document.querySelectorAll('.propos--section');
                proposSections.forEach( section => {
                    section.classList.remove('is-hidden');
                });
            }
        }
    });

    contentLeft.classList.add('is-unclickable');

    removeAllClassesIfResize();
}

function contentRightEventsOff(){

    contentRight.addEventListener( 'transitionend', (e) => {
        if ( !contentRight.classList.contains('is-open') ) {
            if( e.target.offsetWidth === 50 ) {
                // console.log( e.target.offsetWidth );
                articleReves.forEach( article => {
                    if ( article.classList.contains('is-hidden') ) {
                        // ici trouver quel animation doit être terminé pour finir l'animation
                        article.classList.remove('is-hidden');
                    }
                    if ( popupDownload.classList.contains('is-hidden') ) {
                        popupDownload.classList.remove('is-hidden');
                    }

                    // console.log(article.classList);
                });
            } else if ( e.target.offsetWidth <= 50 ) {
                // console.log( e.target.offsetWidth );
            }
        }
    });

    if ( contentRight.classList.contains('is-open') ) {
        // REMOVES ALL STYLES FROM BANDEAU
        header.classList.remove('right-is-open');
        contentHome.classList.remove('right-is-open');
        contentRight.classList.remove('is-open');
        titreReve.classList.remove('is-visible');
        rightContainerPropos.classList.remove('-is-visible');
        const proposSections = document.querySelectorAll('.propos--section');
        proposSections.forEach( section => {
            section.classList.add('is-hidden');
            if ( section.classList.contains('is-hidden') ) {
                section.classList.remove('is--visible');
            }
        });

        contentLeft.classList.remove('is-unclickable');


        contentRightO.classList.remove('is-hidden');
        contentRight.classList.remove('has-right-orientation');
    } else {
    }



}

function removeAllClassesIfResize() {
    let tablet = window.matchMedia( '(min-width: 768px)' );
    tablet.addListener(breakpointChecker);

    function breakpointChecker() {
        if ( tablet.matches === false ){
            if ( contentHome.classList.contains('right-is-open') ) {
                contentHome.classList.remove('right-is-open');
            }
            if ( header.classList.contains('right-is-open') ) {
                header.classList.remove('right-is-open');
            }
            if ( contentRight.classList.contains('is-open') ) {
                contentRight.classList.remove('is-open');
            }
            if ( contentRightO.classList.contains('is-visible') ) {
                contentRightO.classList.remove('is-visible');
            }
            setTimeout ( () => {
                if ( contentRight.classList.contains('has-right-orientation') ) {
                    contentRight.classList.remove('has-right-orientation');
                }
            }, 1000 );
            if ( rightContainerPropos.classList.contains('-is-visible') ) {
                rightContainerPropos.classList.remove('-is-visible')
            }

        }
    }
}

