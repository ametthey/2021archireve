<?php

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title'	=> 'Barre de recherce',
		'menu_title'	=> 'Barre de recherce',
		'menu_slug' 	=> 'acf-barre-de-recherce',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
	));

	acf_add_options_page( array(
		'page_title'	=> 'Informations lors de l\'inscription',
		'menu_title'	=> 'Informations lors de l\'inscription',
		'menu_slug' 	=> 'acf-informations-lors-de-linscription',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
	));

	acf_add_options_page( array(
		'page_title'	=> 'Popup filtres',
		'menu_title'	=> 'Popup filtres',
		'menu_slug' 	=> 'acf-popup-filtres',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
	));

	acf_add_options_page( array(
		'page_title'	=> 'Informations du reve',
		'menu_title'	=> 'Informations du reve',
		'menu_slug' 	=> 'acf-informations-du-reve',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
	));

    acf_add_options_page( array(
		'page_title'	=> 'Barre vertical  contact',
		'menu_title'	=> 'Barre vertical  contact',
		'menu_slug' 	=> 'acf-barre-vertical--contact',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
	));

	acf_add_options_page( array(
		'page_title'	=> 'A Propos',
		'menu_title'	=> 'A Propos',
		'menu_slug' 	=> 'acf-a-propos',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
	));

}

// Enable the option show in rest
// add_filter( 'acf/rest_api/field_settings/show_in_rest', '__return_true' );

// Enable the option edit in rest
// add_filter( 'acf/rest_api/field_settings/edit_in_rest', '__return_true' );

// Add values to taxonomy tag
add_filter('acf/update_value/key=field_60ec18ce6f727', 'my_acf_update_value', 10, 4);
function my_acf_update_value( $value, $post_id, $field, $original ) {
    if( is_string($value) ) {
        $tagString = $value;
        $tagArray = explode(",", str_replace(" ","",$tagString));

        foreach( $tagArray as $tag ) :

            // https://wp-kama.com/function/wp_insert_term
            $parent_term = term_exists( 'customtag', 'niveaudelucidite' ); // returns an array if the taxonomy exists
            $parent_term_id = $parent_term['term_id'];         // get the numerical value of the term

            $insert_data = wp_insert_term(
                $tag,   // new term
                'customtag', // taxonomy
                array(
                    'description' => '',
                    'slug'        => strtolower( $tag ),
                    'parent'      => $parent_term_id
                )
            );

            if( ! is_wp_error($insert_data) )
                $term_id = $insert_data['term_id'];
        endforeach;
    }
    return $value;
}
