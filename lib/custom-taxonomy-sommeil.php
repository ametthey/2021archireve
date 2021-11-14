<?php
// Register Taxonomy Modalite du sommeil
// Taxonomy Key: sommeils
function create_modalite_sommeil_tax() {

	$labels = array(
		'name'              => _x( 'Sommeil', 'taxonomy general name', '_themename' ),
		'singular_name'     => _x( 'Sommeil', 'taxonomy singular name', '_themename' ),
		// 'search_items'      => __( 'Chercher les tags', '_themename' ),
		// 'all_items'         => __( 'Tout les tags', '_themename' ),
		// 'parent_item'       => __( 'Parent Niveau de lucidité', '_themename' ),
		// 'parent_item_colon' => __( 'Parent Niveau de lucidité:', '_themename' ),
		'edit_item'         => __( 'Sommeil', '_themename' ),
		'update_item'       => __( 'Sommeil', '_themename' ),
		'add_new_item'      => __( 'Ajouté une modalité du Sommeil', '_themename' ),
		'new_item_name'     => __( 'Sommeil', '_themename' ),
		'menu_name'         => __( 'Sommeil', '_themename' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Tag', '_themename' ),
		'hierarchical' => false,
		'public' => true,
		'publicly_queryable' => true,
        // show in admin menu and edit post sidebar
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
		'show_in_rest' => true,
        // User can't add taxonomies
        'capabilities' => array(
            'manage_terms' => 'manage_categories',
            'edit_terms' => 'manage_categories',
            'delete_terms' => 'manage_categories',
            'assign_terms' => 'edit_posts'
        ),

	);
	register_taxonomy( 'modalite_sommeil', array('reve'), $args );

}
add_action( 'init', 'create_modalite_sommeil_tax' );

?>
