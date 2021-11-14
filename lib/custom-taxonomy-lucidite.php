<?php

// Taxonomy Key: niveaudelucidite
// Register Taxonomy Niveau de lucidité
function create_niveaudelucidit_tax() {

	$labels = array(
		'name'              => _x( 'Niveaux de lucidité', 'taxonomy general name', '_themename' ),
		'singular_name'     => _x( 'Niveau de lucidité', 'taxonomy singular name', '_themename' ),
		'search_items'      => __( 'Search Niveaux de lucidité', '_themename' ),
		'all_items'         => __( 'All Niveaux de lucidité', '_themename' ),
		'parent_item'       => __( 'Parent Niveau de lucidité', '_themename' ),
		'parent_item_colon' => __( 'Parent Niveau de lucidité:', '_themename' ),
		'edit_item'         => __( 'Edit Niveau de lucidité', '_themename' ),
		'update_item'       => __( 'Update Niveau de lucidité', '_themename' ),
		'add_new_item'      => __( 'Add New Niveau de lucidité', '_themename' ),
		'new_item_name'     => __( 'New Niveau de lucidité Name', '_themename' ),
		'menu_name'         => __( 'Niveau de lucidité', '_themename' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Niveau de lucidite', '_themename' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
        // Show in admin
		'show_ui' => false,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => false,
		'show_admin_column' => true,
		'show_in_rest' => true,
        // User can't add taxonomies
        'capabilities' => array(
            // 'manage_terms' => '',
            // SO WE CAN NOT EDIT TERMS
            // 'edit_terms' => '',
            // 'delete_terms' => '',
            'assign_terms' => 'edit_posts'
        ),

	);
	register_taxonomy( 'niveaudelucidite', array('reve'), $args );

}
add_action( 'init', 'create_niveaudelucidit_tax' );


?>
