// Tooltip
window.addEventListener('load', (e) => {
    const tooltipIcons = document.querySelectorAll('.questionnaire-categorie-tooltip');
    tooltipIcons.forEach( tooltip => {
        const icon = tooltip.querySelector('.tooltip-icon');
        const text = tooltip.querySelector('.tooltip-text');

        if ( icon ) {

            // Click Event for Mobile
            icon.addEventListener( 'click', (e) => {
                e.preventDefault();
                text.classList.toggle( 'is-clicked' );
            });

            // Mouseenter (hover) for Desktop
            icon.addEventListener( 'mouseenter', (e) => {
                e.preventDefault();
                text.classList.add( 'is-clicked' );
            });

            // Mouseleave (hover) for Desktop
            icon.addEventListener( 'mouseleave', (e) => {
                e.preventDefault();
                text.classList.remove( 'is-clicked' );
            });
        }
    });
});
