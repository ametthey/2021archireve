<?php
// Register Taxonomy Tag
// Taxonomy Key: customtag
function create_customtag_tax() {

	$labels = array(
		'name'              => _x( 'Tag', 'taxonomy general name', '_themename' ),
		'singular_name'     => _x( 'Custom Tag', 'taxonomy singular name', '_themename' ),
		'search_items'      => __( 'Chercher les tags', '_themename' ),
		'all_items'         => __( 'Tout les tags', '_themename' ),
		// 'parent_item'       => __( 'Parent Niveau de lucidité', '_themename' ),
		// 'parent_item_colon' => __( 'Parent Niveau de lucidité:', '_themename' ),
		'edit_item'         => __( 'Editer le tag', '_themename' ),
		'update_item'       => __( 'Mettre à jour le tag', '_themename' ),
		'add_new_item'      => __( 'Ajouter un nouveau tag', '_themename' ),
		'new_item_name'     => __( 'Ajouter un nouveau nom de tag', '_themename' ),
		'menu_name'         => __( 'Tag', '_themename' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Tag', '_themename' ),
		'hierarchical' => false,
		'public' => true,
		'publicly_queryable' => true,
        // Show in admin
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
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
	register_taxonomy( 'customtag', array('reve'), $args );

}
add_action( 'init', 'create_customtag_tax' );
