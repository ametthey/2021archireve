<?php
/*
 * Template Name: test2
 */

get_header(); ?>

<div class="js-radio-button-group">

    <?php
        // https://designorbital.com/snippets/how-to-get-all-taxonomies-for-a-post-type/
        $terms = get_terms( 'niveaudelucidite' );
        $field_lucidite = the_field('niveau_de_lucidite_tooltip');
        $o = 0;

        foreach ( $terms as $term ) {

            // EACH
            echo '<button class="button button--filter lucidite--item button--rounded ' . $term->slug . '" data-filter=".' . $term->slug .'" aria-hidden="true">' . $term->name . '<span class="tooltip--lucidite-item">This is a tooltip test</span></button>';
            $o++;
        }
    ?>

</div>

<?php get_footer(); ?>
