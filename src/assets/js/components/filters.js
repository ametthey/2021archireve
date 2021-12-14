import Swiper from 'swiper/bundle';
import imagesLoaded from 'imagesLoaded';

const articlesContainer = document.querySelector('.container--articles');

if ( articlesContainer ) {
    let $grid;
    const imageL = imagesLoaded( articlesContainer );

    imageL.on( 'done', function( instance ) {

        (function($) {

            $grid = $('.container--articles').isotope({
                itemSelector: '.article-reve',
                transitionDuration: 0,
                hiddenStyle: {
                    opacity: 0
                },
                visibleStyle: {
                    opacity: 1
                },
                getSortData: {
                    // tag: '.taxonomy-tag parseInt'
                    tag: '.taxonomy-tag'
                },
                filter: function() {
                    var $this = $(this);
                    var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
                    // var selectResult = filterValue ? $this.is(filterValue) : true;
                    // return searchResult && selectResult;
                    return searchResult;
                }
            });

            // SEARCH TAG
            var qsRegex;

            var $quicksearch = $('.tagsearch').keyup( debounce( function() {
                qsRegex = new RegExp( $quicksearch.val(), 'gi' );
                $grid.isotope({ sortBy: 'tag' });
            }));


            // debounce so filtering doesn't happen every millisecond
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

            function onHashchange() {
                var hashFilter = getHashFilter();

                // filter isotope
                // $grid.isotope({
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

            //init Isotope with hash filter
            onHashchange();

            var hashFilter = getHashFilter();
            if ( hashFilter ) {
                var filters = hashFilter.split(',');
                filters.forEach( function( filter ) {
                    var $checkbox = $(".button").filter('[data-filter="' + filter + '"]');
                    //console.log(filter)
                    $checkbox.addClass( 'is-checked' );
                });
            }

            function getHashFilter() {
                var hash = location.hash;
                // get filter=filterName
                var matches = location.hash.match( /filter=([^&]+)/i );

                if ( !matches ) {
                    return '';
                }

                return decodeURIComponent( matches[1] );
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

        })( jQuery );
    });

    // SI LE CONTAINER DES RÊVES NE CHARGENT PAS CORRECTEMENT
    imageL.on( 'fail', function( instance ) {
        console.log('all images are failed');
    });



    // MUTATION OBSERVER POUR BIEN CHARGER LE CONTAINER DES RÊVES AVEC LE BON LAYOUT
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
                        // reve.style.transform = 'translate3d(0px, 0px, 0px)';
                        // reve.style.transitionDuration = '0s';

                        setTimeout( (e) => {
                            reve.classList.add('is-visible');
                        }, 1000 );

                    }
                    break;
            }
        });
    }

    // DATE
    let swiperDate = new Swiper( '.swiper-container-date', {
        allowTouchMove: false,
        // centeredSlides: true,
        directon: 'horizontal',
        effect: 'slide',
        speed: 700,
        slidesPerView: 2,
        // spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-date-button-next',
            prevEl: '.swiper-date-button-prev',
        },
    });
}
