<div class="lucidite--container typopologie--container left--filter button-group js-radio-button-group" data-filter-group="typologie">
    <?php
    $terms = get_terms( 'typologiedereve');
    $o = 0;

    foreach ( $terms as $term ) {

        // EACH
        echo '<button class="button lucidite--item typologie--item button--rounded ' . $term->slug . '" data-filter=".' . $term->slug .'">' . $term->name . '</button>';
        $o++;
    }
        // echo '<button class="button lucidite--item typologie--item typologie--item-all button--rounded is-checked" data-filter="">TOUT</button>';
    ?>
</div>
