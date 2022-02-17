import $ from 'jquery';
import jQueryBridget from 'jquery-bridget';
import isotope from 'isotope-layout';
import Swiper, { Navigation } from 'swiper/bundle';
import imagesLoaded from 'imagesLoaded';

jQueryBridget( 'isotope' , isotope, $ );

/**********************************************************************
 * BARRE DE FILTRES
 **********************************************************************/

const articlesContainer = document.querySelector('.container--articles');
if ( articlesContainer ) {
    let $grid;
    const imageL = imagesLoaded( articlesContainer );

    imageL.on( 'done', function( instance ) {

        $(function(){
            /********************************************
             * ISOTOPE CONFIGURATION
             *******************************************/
            $grid = $('.container--articles').isotope({
                itemSelector: '.article-reve',
                transitionDuration: 0,
                hiddenStyle: {
                    opacity: 0
                },
                visibleStyle: {
                    opacity: 1
                },
            });


            /********************************************
             * SEARCH FILTRE CODE
             *  https://gist.github.com/candidosales/10e22f0a3b4676ac6aeb
             *******************************************/
            var qsRegex;
            var quickSearch = $('#search-term');

            var filterFns = {
                tagName: function(qsRgex) {
                    qsRegex = new RegExp( quickSearch.val(), 'gi' );

                    // Recherche dans tout les tags
                    var tagName = $(this).find('.taxonomy-tag').text();

                    console.log( tagName );

                    // Vérification que la query existe
                    return qsRegex ? tagName.match(qsRegex) : true;
                }
            };

            // Evenement quand on écrit
            quickSearch.on('keyup change', function(){
                debounce(searchFilter());
            });

            function searchFilter() {
                var filterValue = quickSearch.attr('data-filter');
                filterValue = filterFns[ filterValue ] || filterValue;
                $grid.isotope({ filter: filterValue });

                console.log( filterValue );
            }


            /********************************************
             * FILTRE EN CLIQUANT SUR DES BOUTONS
             * TYPOLOGIE DE RÊVE
             * NIVEAU DE LUCIDITE
             *******************************************/
            //store filter for each group
            var filters = [];

            //change is-checked class on buttons
            $('.filters').on( 'click', '.button', function( event ) {

                var $target = $( event.currentTarget );
                $target.toggleClass('is-checked');
                var isChecked = $target.hasClass('is-checked');
                var buttonfilter = $target.attr('data-filter');


                if ( isChecked ) {
                    addFilter( buttonfilter );

                } else {
                    removeFilter( buttonfilter );
                }

                //filter isotope
                $grid.isotope();
                location.hash = 'filter=' + encodeURIComponent( filters.join(',') );


            });


            /********************************************
             * BOUTON POUR SUPPRIMER TOUT LES FILTRES
             *******************************************/
            $(".clear").click(function(){

                $(".button").each(function(filter){
                    $(this).removeClass("is-checked");
                    var buttonfilter = $(this).attr('data-filter');
                    var hashFilter = getHashFilter();
                    var s = hashFilter.split(",");
                    for(var i=0;i<s.length;i++){
                        if(s[i] == buttonfilter){
                            removeFilter( buttonfilter );
                        }
                    }
                });
                location.hash = 'filter=' + encodeURIComponent( filters.join(',') );
                $grid.isotope()
            })

            /**********************************************************************
             * Helper Functions
             **********************************************************************/
            function debounce( fn, threshold ) {
                var timeout;
                return function debounced() {
                    if ( timeout ) {
                        clearTimeout( timeout );
                    }
                    function delayed() {
                        fn();
                        timeout = null;
                    }
                    timeout = setTimeout( delayed, threshold || 100 );
                }
            }

            function addFilter( filter ) {
                if ( filters.indexOf( filter ) == -1 ) {
                    filters.push( filter );
                }
            }

            function removeFilter( filter ) {
                var index = filters.indexOf( filter);
                if ( index != -1 ) {
                    filters.splice( index, 1 );
                }
            }

            function onHashchange() {
                var hashFilter = getHashFilter();

                $grid.isotope({
                    filter: function() {
                        var $this = $(this);
                        var searchResult = qsRegex ? $this.text().match( qsRegex ) : true;
                        var buttonResult = hashFilter ? $this.is( hashFilter ) : true;

                        return searchResult && buttonResult;
                    }
                });
            };

            $grid.on( 'isotopeComplete', function( event, filteredItems ) {
                //console.log( filteredItems.length );
                if(filteredItems.length == 0){
                    $(".no-results").show();
                }else{
                    $(".no-results").hide();
                }
            });

            $(window).on( 'hashchange', onHashchange );

            onHashchange();

            var hashFilter = getHashFilter();
            if ( hashFilter ) {
                var filters = hashFilter.split(',');
                filters.forEach( function( filter ) {
                    var $checkbox = $(".button").filter('[data-filter="' + filter + '"]');
                    $checkbox.addClass( 'is-checked' );
                });
            }

            function getHashFilter() {
                var hash = location.hash;
                var matches = location.hash.match( /filter=([^&]+)/i );

                if ( !matches ) {
                    return '';
                }

                return decodeURIComponent( matches[1] );
            }


        });
    });

    // SI LE CONTAINER DES RÊVES NE CHARGENT PAS CORRECTEMENT
    imageL.on( 'fail', function( instance ) {
        console.log('all images are failed');
    });

    verifyAndDisplayReves();
    filterDateLayout();

}




// -----------------------------------------------------------------------------
// VERIFY IF LAYOUY IS CORRECT THEN LOAD AND DISPLAY IT
// -----------------------------------------------------------------------------

function verifyAndDisplayReves() {
    const targetNode = document.querySelector(".container--articles");
    const observerOptions = {
        childList: true,
        attributes: true,
        subtree: true
    }

    const observer = new MutationObserver(callback);
    observer.observe(targetNode, observerOptions);

    function callback(mutationList, observer) {
        mutationList.forEach( (mutation) => {
            switch(mutation.type) {
                case 'attributes':
                    if ( mutation.target.classList.contains('article-reve') ) {
                        const reve = mutation.target;

                        reve.style.position = 'relative';
                        reve.style.top = 'inherit';
                        reve.style.left = 'inherit';

                        setTimeout( (e) => {
                            reve.classList.add('is-visible');
                        }, 1000 );

                    }
                    break;
            }
        });
    }
}

// -----------------------------------------------------------------------------
// FILTER THE DATE
// -----------------------------------------------------------------------------
function filterDateLayout() {
    let swiperDate = new Swiper( '.swiper-container-date', {
        allowTouchMove: false,
        directon: 'horizontal',
        effect: 'slide',
        speed: 700,
        slidesPerView: 2,
        navigation: {
            nextEl: '.swiper-date-button-next',
            prevEl: '.swiper-date-button-prev',
        },
    });
}
