<?php
/*
 * Template Name: test2
 */

get_header(); ?>

<div class="container-test">
    <div class="lucidite--container typopologie--container left--filter">
        <?php
        $terms = get_terms( 'typologiedereve');
        $o = 0;

        foreach ( $terms as $term ) {

            // EACH
            echo '<input id="radio-input-' . $o . '"type="checkbox" value=".' . $term->slug . '" class=" lucidite--label-input ' . $term->slug . ' "><label for="radio-input-' . $o . '" class="lucidite--label lucidite--label-radio lucidite--item typologie--item button--rounded ' . $term->slug . '"><div class="typologie--image ' . $term->slug . '"></div>' . $term->name . '</label>';
            $o++;
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>
