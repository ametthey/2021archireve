// CLICK TO COLLAPSE ARTICLE
const articles = document.querySelectorAll('.article-reve');

let yearsToFilter = [];
let finalYear;
articles.forEach( article => {
    const articleHeader = article.querySelector('.article-reve--header');
    const articleTexte = article.querySelector('.article-reve--text');
    const articleTaxonomies = article.querySelector('.article-reve--taxonomies');

    if ( articleHeader ) {

        /******************************************************************************
         * Affichage du contenu
         ******************************************************************************/
        article.addEventListener( 'click' , (e) => {
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

                article.dataset.year = finalYear;
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

        yearsToFilter.push(year);

        date.dataset.year = year;
        const swiperSlide = document.querySelectorAll('.swiper-slide');

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

function filteredYears(yearsToFilter) {
    finalYears = yearsToFilter.filter( (value, index) => yearsToFilter.indexOf(value) === index  );
    // const scd = document.querySelector('.swiper-container-date .swiper-wrapper').parentNode;
    finalYears.forEach( year => {
    const scd2 = document.querySelector('.swiper-container-date .swiper-wrapper');
    scd2.innerHTML += swiperSlideContent(year);
    })
}

const home = document.querySelector('.home');

if ( home ) {
    filteredYears(yearsToFilter);
}

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

    function swiperSlideContent(year) {
return `
                    <div class="swiper-slide js">
                        <div class="calendrier--item">
                            <h4>${ year }</h4>
                            <div class="calendrier--mois">
                                <button data-filter=".janvier${year}" aria-hidden="true" class="button mois--item button--round round--white janvier ${year}">jan</button>
                                <button data-filter=".fevrier${year}" aria-hidden="true" class="button mois--item button--round round--white fevrier ${year}">fév</button>
                                <button data-filter=".mars${year}" aria-hidden="true" class="button mois--item button--round round--white mars ${year}">mar</button>
                                <button data-filter=".avril${year}" aria-hidden="true" class="button mois--item button--round round--white avril ${year}">avr</button>
                                <button data-filter=".mai${year}" aria-hidden="true" class="button mois--item button--round round--white mai ${year}">mai</button>
                                <button data-filter=".juin${year}" aria-hidden="true" class="button mois--item button--round round--white juin ${year}">juin</button>
                                <button data-filter=".juillet${year}" aria-hidden="true" class="button mois--item button--round round--white juillet ${year}">juillet</button>
                                <button data-filter=".aout${year}" aria-hidden="true" class="button mois--item button--round round--white aout ${year}">aoû</button>
                                <button data-filter=".septembre${year}" aria-hidden="true" class="button mois--item button--round round--white septembre ${year}">sep</button>
                                <button data-filter=".octobre${year}" aria-hidden="true" class="button mois--item button--round round--white octobre ${year}">oct</button>
                                <button data-filter=".novembre${year}" aria-hidden="true" class="button mois--item button--round round--white novembre ${year}">nov</button>
                                <button data-filter=".decembre${year}" aria-hidden="true" class="button mois--item button--round round--white decembre ${year}">dec</button>
                            </div>
                        </div>
                    </div>`
}

