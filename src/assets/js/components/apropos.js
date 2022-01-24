import Splitting from 'splitting';

const home = document.querySelector('.is-home');
const contentRight = document.querySelector('#container--apropos');
const aproposWrapper = document.querySelector('.apropos--elements');


if ( home ) {

    /*****************************************************************************
     *
     * A PROPOS - OPEN EVENT
     *
     *****************************************************************************/
    let options = {
        attributes: true,
        childList: true,
    }
    let observer = new MutationObserver(mutations => {
        mutations.forEach( record => {

            if ( record.type === 'attributes' ) {
                const changedAttrName = record.attributeName;
                const newValue = record.target.getAttribute(changedAttrName);

                /*////////////////////////////////////////////////
                 * Show Text when they are visible on screen
                 */////////////////////////////////////////////////
                const sections = [...document.querySelectorAll(".propos--section")];

                let options = {
                    rootMargin: "0px",
                    threshold: 0.25
                };

                const callback = (entries, observer) => {
                    entries.forEach(entry => {
                        const { target } = entry;

                        if (entry.intersectionRatio >= 0.25) {
                            target.classList.add("is-visible");
                        } else {
                        }
                    });
                };

                const observer = new IntersectionObserver(callback, options);

                sections.forEach((section, index) => {
                    observer.observe(section);
                });


            }
        });
    });

    observer.observe(contentRight, options);

    /*****************************************************************************
     * Fade background
     *****************************************************************************/

    aproposWrapper.addEventListener('scroll', function(e) {
        const half = aproposWrapper.scrollHeight / 2;
        const position = aproposWrapper.scrollTop;
        if ( position < half  ) {
            contentRight.classList.remove('is-fading');
        } else {
            contentRight.classList.add('is-fading');
        }
    });

    /*****************************************************************************
     * Splitting
     *****************************************************************************/

    const target = document.querySelectorAll('.colored-hover');
    const results = Splitting({ target: target, by: 'chars' });

    // Colors
    const cauchemar =  '#6755AA';
    const concomitant =  '#2CAF38';
    const creatif =  '#F79D65';
    const actualite =  '#99BA22';
    const recurrent =  '#DB5931';
    const sexuel =  '#D67083';
    const premonitoire =  '#4CA58E';
    const lucide =  '#c12b2b';
    const bonheur = '#1C0C5B';

    const colors = [ cauchemar, concomitant, creatif, actualite, recurrent, sexuel, premonitoire, lucide, bonheur ];

    // https://stackoverflow.com/questions/4550505/getting-a-random-value-from-a-javascript-array

    const coloredHovers = document.querySelectorAll('.colored-hover');
    coloredHovers.forEach( coloredHover => {
        const section = coloredHover.closest('.propos--section-1');
        const chars = coloredHover.querySelectorAll('.char');
        chars.forEach( char => {
            char.addEventListener( 'mouseenter', (e) => {
                const randomColor = colors[Math.floor(Math.random() * colors.length)];
                char.style.color = randomColor;
            });
            char.addEventListener( 'mouseleave', (e) => {
                setTimeout( function() {
                    char.style.color = '#fff';
                }, 1500 );
            });
        });
    });

    /*****************************************************************************
     *
     * COLLAPSE
     *
     *****************************************************************************/

    const aproposContainer = document.querySelectorAll('.propos--collapse-container');
    aproposContainer.forEach( container => {
        const header = container.querySelector('.propos--collapse-header');
        const texte = container.querySelector('.propos--collapse-texte');

        header.addEventListener( 'click', function() {
            if ( texte.classList.contains('-is-active') ) {

                header.classList.remove('-is-active');
                texte.classList.remove('-is-active');

                if ( texte.style.maxHeight ) {
                    texte.style.maxHeight = null;
                }

            } else if ( !texte.classList.contains('-is-active') ) {

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
}
