<?php
// Register Taxonomy Typologie de rêve
// Taxonomy Key: typologiedereve
function create_typologiedereve_tax() {

	$labels = array(
		'name'              => _x( 'Typologies de rêve', 'taxonomy general name', '_themename' ),
		'singular_name'     => _x( 'Typologie de rêve', 'taxonomy singular name', '_themename' ),
		'search_items'      => __( 'Search Typologies de rêve', '_themename' ),
		'all_items'         => __( 'All Typologies de rêve', '_themename' ),
		'parent_item'       => __( 'Parent Typologie de rêve', '_themename' ),
		'parent_item_colon' => __( 'Parent Typologie de rêve:', '_themename' ),
		'edit_item'         => __( 'Edit Typologie de rêve', '_themename' ),
		'update_item'       => __( 'Update Typologie de rêve', '_themename' ),
		'add_new_item'      => __( 'Add New Typologie de rêve', '_themename' ),
		'new_item_name'     => __( 'New Typologie de rêve Name', '_themename' ),
		'menu_name'         => __( 'Typologie de rêve', '_themename' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'Typologie de rêve', '_themename' ),
		'hierarchical' => false,
		'public' => true,
		'publicly_queryable' => true,
        // Cacher de l'admin
		'show_ui' => false,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => false,
		'show_admin_column' => true,
		'show_in_rest' => true,
        // 'rest_base' => 'typologie',
        // 'rest_controler_class' => 'WP_REST_Post_Controller'


        // User can't add taxonomies
        'capabilities' => array(
            // 'manage_terms' => '',
            // SO WE CAN NOT EDIT TERMS
            'edit_terms' => '',
            // 'delete_terms' => '',
            'assign_terms' => 'edit_posts',
        ),
	);
	register_taxonomy( 'typologiedereve', array('reve'), $args );

}
add_action( 'init', 'create_typologiedereve_tax' );
