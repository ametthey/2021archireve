// CLICK TO COLLAPSE ARTICLE
const articles = document.querySelectorAll('.article-reve');

articles.forEach( article => {
    const articleHeader = article.querySelector('.article-reve--header');
    const articleTexte = article.querySelector('.article-reve--text');
    const articleTaxonomies = article.querySelector('.article-reve--taxonomies');

    if ( articleHeader ) {

        /******************************************************************************
         * Affichage du contenu
         ******************************************************************************/
        article.addEventListener( 'click' , (e) => {
            // console.log( e.target );
            if ( e.target === articleHeader || e.target === articleHeader.querySelector('.article-reve--taxonomies') || e.target === articleHeader.querySelector('.article-header-date') || e.target === articleTaxonomies.querySelector('.article-taxonomies--typologie-icone') || e.target === articleTexte || e.target === articleTexte.querySelector('img') || e.target === articleHeader.querySelector('h1') || e.target === articleTaxonomies ) {

                if ( articleTexte.classList.contains('-is-active') ) {
                    articleHeader.classList.remove('-is-active');
                    articleTexte.classList.remove('-is-active');
                    articleTaxonomies.classList.remove('-is-active');

                    if (articleTexte.style.maxHeight){
                        articleTexte.style.maxHeight = null;
                    }

                } else if( !articleTexte.classList.contains('-is-active') ) {
                    const activeElements = Array.from(document.querySelectorAll('.-is-active'));
                    activeElements.forEach(activeElement => {
                        const activeText = activeElement.classList.contains('article-reve--text');
                        if ( activeText ) {
                            const theActiveText = activeElement;
                            if ( theActiveText.style.maxHeight ) {
                                theActiveText.style.maxHeight  = null;
                            }
                        }
                        activeElement.classList.remove('-is-active');
                    });

                    articleHeader.classList.add('-is-active');
                    articleTexte.classList.add('-is-active');
                    articleTaxonomies.classList.add('-is-active');

                    articleTexte.style.maxHeight = articleTexte.scrollHeight + "px";
                }
            }
        } )

    } else {
        // Silence is golden
    }


    /******************************************************************************
     * Ajout d'une classe custom pour le filtrage des dates
     ******************************************************************************/
    const dateReves = article.querySelectorAll('.date--reve');
    dateReves.forEach( date => {
        const theDate = JSON.stringify(date);
        const theRealDate = date.innerText;
        const theNewDate = theRealDate.slice(3,10);

        const month = theNewDate.slice(0,2);
        const year = theNewDate.slice(3);

        switch(month) {
            case '01':
                const janvier = 'janvier' + year;
                article.classList.add(janvier);
                break;
            case '02':
                const fevrier = 'fevrier' + year;
                article.classList.add(fevrier);
                break;
            case '03':
                const mars = 'mars' + year;
                article.classList.add(mars);
                break;
            case '04':
                const avril = 'avril' + year;
                article.classList.add(avril);
                break;
            case '05':
                const mai = 'mai' + year;
                article.classList.add(mai);
                break;
            case '06':
                const juin = 'juin' + year;
                article.classList.add(juin);
                break;
            case '07':
                const juillet = 'juillet' + year;
                article.classList.add(juillet);
                break;
            case '08':
                const aout = 'aout' + year;
                article.classList.add(aout);
                break;
            case '09':
                const septembre = 'septembre' + year;
                article.classList.add(septembre);
                break;
            case '10':
                const octobre = 'octobre' + year;
                article.classList.add(octobre);
                break;
            case '11':
                const novembre = 'novembre' + year;
                article.classList.add(novembre);
                break;
            case '12':
                const decembre = 'decembre' + year;
                article.classList.add(decembre);
                break;
        }

    });

});
/******************************************************************************
 *
 * Affichage de l'icone DESSIN ou TEXTE
 *
 ******************************************************************************/

const reveTexteDessins = document.querySelectorAll('.article-reve--text img');
const iconeT = document.querySelector('#contenu--texte');
const iconeD = document.querySelector('#contenu--dessin');
const reves = [...document.querySelectorAll('.container--articles .article-reve')];

window.addEventListener('load', (e) => {
    if ( reves ) {
        const removesNotFound = reves.filter( reve => !reve.classList.contains('article-notfound') );

        removesNotFound.forEach( reve => {
            const reveDessin = reve.querySelector('.article-reve--text img');
            const iconeT = reve.querySelector('#contenu--texte');
            const iconeD = reve.querySelector('#contenu--dessin');
            const iconeDM = reve.querySelector('#contenu--dessin-mobile');

            if ( reveDessin ) {
                const reveTexteDessin = reve.querySelector('.article-reve--text img').getAttribute('src');

                if ( reveTexteDessin.startsWith('data') ) {
                    iconeD.classList.remove('wrong');
                    iconeDM.classList.remove('wrong');
                }

            } else {
                iconeT.classList.remove('wrong');
            }

        });
    } else {
        // Silence is golden
    }
});
