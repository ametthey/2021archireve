<?php
    // https://designorbital.com/snippets/how-to-get-all-taxonomies-for-a-post-type/
    $terms = get_terms( 'niveaudelucidite' );
    $field_lucidite = the_field('niveau_de_lucidite_tooltip');
    $o = 0;
    echo '<div class="lucidite--container left--filter button-group js-radio-button-group" data-filter-group="lucidite">';

    foreach ( $terms as $term ) {

        // EACH
        echo '<button class="button lucidite--item button--rounded" data-filter=".' . $term->slug .'">' . $term->name . '</button>';
        $o++;
    }
    // TOUT
    // echo '<button class="button lucidite--item button--rounded is-checked" data-filter="">TOUT</button>';

    echo '</div>';
?>
