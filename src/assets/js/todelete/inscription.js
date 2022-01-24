const errorContainer = document.querySelector('.registration--error-container');
const errorButton = document.querySelector('.button--round');

if ( errorContainer && errorButton ) {
    setTimeout( (e) => {
       if ( errorContainer.classList.contains('is-active') ) {
           errorButton.addEventListener( 'click', (e) => {
               errorContainer.classList.remove('is-active');
           });
       }
    }, 5000 );
}

console.log('inscription.js');
