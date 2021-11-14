const postsBackOffice = document.querySelectorAll('.profil--reve .profil--reve-new');
const postsPublishedStatus = document.querySelectorAll('.profil--reve-published');

if ( postsBackOffice ) {
    if ( postsBackOffice.length === 1 ) {
        console.log('Il y a 1 seul element');
        postsBackOffice.forEach( post => post.classList.add('-is-hidden') );
    } else {
        // Silence is golden.
    }
}


if ( postsPublishedStatus ) {
    postsPublishedStatus.forEach( post => {
        const postMessage = post.querySelector('.message--status-pending');

        if ( post.classList.contains('status-publish') ) {
            postMessage.classList.add('is-hidden');
        }
    });
}



// HIDE HEADER ON SCROLL
const header = document.querySelector('#masthead');
const contentBackoffice = document.querySelector('.page-template-page-back-office #page');
if ( contentBackoffice ){
    contentBackoffice.addEventListener( 'scroll', (e) => {
        var scrollPosition = contentBackoffice.scrollTop;
        if ( scrollPosition >= 50 ) {
            // console.log('scroll');
            header.classList.add('is-hidden');
        } else {
            // console.log('scroll');
            header.classList.remove('is-hidden');
        }

    });
}
