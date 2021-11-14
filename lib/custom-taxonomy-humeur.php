<?php

// Register Taxonomy Modalite du humeur
// Taxonomy Key: humeur
function _themename_create_modalite_humeur() {

	$labels = array(
		'name'              => _x( 'Humeur', 'taxonomy general name', '_themename' ),
		'singular_name'     => _x( 'Humeur', 'taxonomy singular name', '_themename' ),
		// 'search_items'      => __( 'Chercher les tags', '_themename' ),
		// 'all_items'         => __( 'Tout les tags', '_themename' ),
		// 'parent_item'       => __( 'Parent Niveau de lucidité', '_themename' ),
		// 'parent_item_colon' => __( 'Parent Niveau de lucidité:', '_themename' ),
		'edit_item'         => __( 'Humeur', '_themename' ),
		'update_item'       => __( 'Humeur', '_themename' ),
		'add_new_item'      => __( 'Ajouté une modalité du Humeur', '_themename' ),
		'new_item_name'     => __( 'Humeur', '_themename' ),
		'menu_name'         => __( 'Humeur', '_themename' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Humeur', '_themename' ),
		'hierarchical' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => false,
		'show_admin_column' => true,
		'show_in_rest' => true,
        // User can't add taxonomies
        'capabilities' => array(
            'manage_terms' => 'manage_categories',
            'edit_terms' => 'manage_categories',
            'delete_terms' => 'manage_categories',
            'assign_terms' => 'edit_posts'
        ),

	);
	register_taxonomy( 'modalite_humeur', array('reve'), $args );

}
add_action( 'init', '_themename_create_modalite_humeur' );

?>
