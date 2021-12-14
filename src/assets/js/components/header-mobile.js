const headerButton = document.querySelector('#header--mobile-apropos');
const headerAPropos = document.querySelector('.right--container-propos-header');
const header = document.querySelector('#masthead');
const page = document.querySelector('#page');
const aproposContainerMobile = document.querySelectorAll('.right--container-propos-header .propos--collapse-container');

// if ( headerButton ) {
    headerButton.addEventListener( 'click', (e) => {
        e.preventDefault();
        headerAPropos.classList.toggle('is-active');
        header.classList.toggle('is-header-faded');
        headerButton.classList.toggle('is-faded');
        page.classList.toggle('header-mobile-active');
    });

    window.addEventListener( 'resize', removeActiveState );

    aproposContainerMobile.forEach( container => {
        const header = container.querySelector('.propos--collapse-header');
        const texte = container.querySelector('.propos--collapse-texte');

        header.addEventListener( 'click', function() {
            if ( texte.classList.contains('-is-active') ) {

                header.classList.remove('-is-active');
                texte.classList.remove('-is-active');


                if ( texte.style.maxHeight ) {
                    texte.style.maxHeight = null;

                }

            }
            if ( !texte.classList.contains('-is-active') ) {

                const activeElements = Array.from(document.querySelectorAll('.-is-active'));
                activeElements.forEach(activeElement => {
                    const activeText = activeElement.classList.contains('propos--collapse-texte');
                    if ( activeText ) {
                        const theActiveText = activeElement;
                        if ( theActiveText.style.maxHeight ) {
                            theActiveText.style.maxHeight  = null;

                        }
                    }
                    activeElement.classList.remove('-is-active');
                });


                header.classList.add('-is-active');
                texte.classList.add('-is-active');

                texte.style.maxHeight = texte.scrollHeight + "px";

            }
        });
    });
// }


function removeActiveState() {
    if (window.innerWidth > 600 &&  headerAPropos.classList.contains('is-active') ) {
        headerAPropos.classList.remove('is-active');
        page.classList.remove('header-mobile-active');
        header.classList.remove('is-header-faded');
        headerButton.classList.remove('is-faded');
    }
}
