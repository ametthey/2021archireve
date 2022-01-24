// HOVER CONTENT LEFT
const contentLeft = document.querySelector('.content--left');
const contentRight = document.querySelector('.content--right');
const buttonLeft = document.querySelector('#left--button');
const loupe = document.querySelector('.content--left-cover');
const filters = document.querySelectorAll('.left--filter');
const contentCloseButton = document.querySelector('.content--left-close-button');

if( contentLeft ){
    contentLeft.addEventListener( 'click', (e) => {
        if ( !contentLeft.classList.contains('is-open') ) {
            contentLeft.classList.add('is-open');
        } else if ( contentLeft.classList.contains('is-open') && e.target === contentCloseButton  ) {
            contentLeft.classList.remove('is-open');
        }

    });

    contentLeft.addEventListener( 'transitionstart', (e) => {
        const contentLeftEvent = e.target;

        if ( !contentLeftEvent.classList.contains('is-open')  ) {
            if ( e.propertyName === 'width' ) {
                contentLeft.classList.remove('is-open');
                filters.forEach( filter => {
                    filter.classList.remove('is-visible');
                });
            }
        }

        if ( e.propertyName === 'width' ) {
            loupe.classList.add('is-invisible');
        }
    });

    contentLeft.addEventListener( 'transitionend', (e) => {
        const contentLeftEvent = e.target;

        if ( contentLeftEvent.classList.contains('is-open')  ) {
            if ( e.propertyName === 'width' ) {
                contentLeft.classList.add('is-open');
                filters.forEach( filter => {
                    filter.classList.add('is-visible');
                });
            }
        }

        if ( !contentLeftEvent.classList.contains('is-open')  ) {
            if ( e.propertyName === 'width' ) {
                loupe.classList.remove('is-invisible');
            }
        }
    });

}
