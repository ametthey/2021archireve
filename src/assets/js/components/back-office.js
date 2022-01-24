const postsBackOffice = document.querySelectorAll('.profil--reve .profil--reve-new');
const postsPublishedStatus = document.querySelectorAll('.profil--reve-published');
const backofficeReves = document.querySelectorAll('.backoffice-reve');

// S'il n'y a pas de post, montrer uniquement le bouton PUBLIER UN NOUVEAU REVE
if ( postsBackOffice &&  postsBackOffice.length === 1 ) {
    postsBackOffice.forEach( post => post.classList.add('-is-hidden') );
}

// S'il le reve n'est pas validé, le cacher avec le message
// VOTRE REVE EST EN ATTENTE DE VALIDATION
if ( postsPublishedStatus ) {
    postsPublishedStatus.forEach( post => {
        const postMessage = post.querySelector('.message--status-pending');

        if ( post.classList.contains('status-pending') ) {
            postMessage.classList.add('is-hidden');
        }
    });
}
