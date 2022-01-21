const rangeBubbles = `
        <div class="bubble-start bubble-endpoints"></div>
        <div class="bubble-end bubble-endpoints"></div>
        <output class="bubble"></output>
    `;
const rangeBubblesSolo = `
        <div class="bubble-start bubble-endpoints"></div>
        <div class="bubble-end bubble-endpoints"></div>
        <output class="bubble"></output>
    `;
const ranges = document.querySelectorAll('.acf-range .acf-range-wrap');


ranges.forEach( range => {
    if ( range.classList.contains('acf-range-age') ) {
        range.innerHTML += rangeBubbles;
    } else {
        range.innerHTML += rangeBubblesSolo;
    }
});

const geran = document.querySelectorAll('.acf-range');
geran.forEach( range => {
    const rangeInput = document.querySelector('input[type="range"]');
    const numberInput = document.querySelector('input[type="number"]');

    if ( range.classList.contains('acf-range-age') ) {
        document.addEventListener('DOMContentLoaded', function() {
            const bubble = range.querySelector('.bubble');
            rangeInput.addEventListener("input", () => {
                setBubble(rangeInput, bubble);
            });
            setBubble(rangeInput, bubble);
        });
    } else {
        // silence is golden
    }


});

let finalValue;

function setBubble(range, bubble) {
    const val = range.value;
    const min = range.min ? range.min : 0;
    const max = range.max ? range.max : 100;
    const newVal = Number(((val - min) * 100) / (max - min));
    finalValue = bubble.innerHTML = val;
    // console.log( finalValue );
    // console.log( newVal );

    // Sorta magic numbers based on size of the native UI thumb
    bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
}

const pageII = document.querySelector('.page-template-page-inscription-informations');
const pageProfil = document.querySelector('.single-reveur_info');
const tooltipII = document.querySelector('.container--inscription-informations-tooltip');
const tooltipCoverII = document.querySelector('.inscription-tooltip-cover');
const tooltipCloseII = document.querySelector('.inscription-tooltip-close');
const tooltipCloseImgII = document.querySelector('.inscription-tooltip-close-button');
const tooltipCoverContainer = document.querySelector('.container--tooltip-cover');
const tooltipTexte = document.querySelector('.inscription-tooltip-texte');
const reveModif = document.querySelector('.single-reve');
const reveCrea = document.querySelector('.page-template-page-creation-reve');

if ( pageII || pageProfil || reveModif || reveCrea ) {
    document.addEventListener( 'click', function(e) {

        if ( e.target === tooltipCoverII || e.target === tooltipCoverContainer) {
            console.log('click');
            tooltipII.classList.toggle('is-open');
        }

        if ( e.target === tooltipCloseII || e.target === tooltipCloseImgII ) {
            tooltipII.classList.remove('is-open');
            setTimeout( function() {
                tooltipTexte.scrollTo({
                    top: 0,
                    behavior: 'instant',
                })
            }, 750);
        }

    }, false );
}

// window.addEventListener('load' , (e) => {
// const foiSpirituels = document.querySelectorAll('.page-template-page-inscription-informations .acf-radio-list input');
// foiSpirituels.forEach(foi => {
//     const label = foi.closest('label');
//     const customInput = `<span class="custom--input"></span>`;
//     const customEmpty = ``;
//     foi.insertAdjacentHTML('afterend', customInput);
// });
//
// const travaillePas = document.querySelector('#ne-travaille-pas');
// const labelTP = travaillePas.querySelector('label');
// const inputTP = travaillePas.querySelector('input');
// const customTP = travaillePas.querySelector('.custom--input');
// const foiOInput = document.querySelectorAll('#acf-radio-foi-origine .acf-radio-list input');
// const foiOLabel = document.querySelectorAll('#acf-radio-foi-origine .acf-radio-list label');
//
//     if ( travaillePas ) {
//         travaillePas.addEventListener('click', showHideCustom, false);
//     }
//
//     if ( foiOInput ) {
//         foiOInput.forEach( foi => {
//             foi.addEventListener('click', function(e) {
//                 console.log( foi );
//                 const label = foi.closest('label');
//                 const custom = foi.nextSibling;
//                 custom.classList.add('visible');
//
//                 if ( !label.classList.contains('selected') ) {
//                     console.log(label);
//                 }
//
//
//             }, false);
//         });
//     }
//
// });

function showHideCustom() {
    if ( !labelTP.classList.contains('selected') ) {
        customTP.classList.add('visible');
    } else {
        customTP.classList.remove('visible');
    }
}
