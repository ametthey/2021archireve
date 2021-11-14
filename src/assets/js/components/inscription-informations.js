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
