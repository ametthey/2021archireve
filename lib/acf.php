<?php

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title'	=> 'Barre de recherce',
		'menu_title'	=> 'Barre de recherce',
		'menu_slug' 	=> 'acf-barre-de-recherce',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
	));

}

// Enable the option show in rest
add_filter( 'acf/rest_api/field_settings/show_in_rest', '__return_true' );

// Enable the option edit in rest
add_filter( 'acf/rest_api/field_settings/edit_in_rest', '__return_true' );

// Add values to taxonomy tag
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
add_filter('acf/update_value/key=field_60ec18ce6f727', 'my_acf_update_value', 10, 4);

?>
