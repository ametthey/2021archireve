<?php
// Register Custom Post Type reveur_infour_info
// Post Type Key: reveur_infour_info
function _themename_reveur_infour_info() {

	$labels = array(
		'name' => _x( 'reveur_infos', 'Post Type General Name', '_themename' ),
		'singular_name' => _x( 'reveur_info', 'Post Type Singular Name', '_themename' ),
		'menu_name' => _x( 'reveur_infos', 'Admin Menu text', '_themename' ),
		'name_admin_bar' => _x( 'reveur_info', 'Add New on Toolbar', '_themename' ),
		'archives' => __( 'reveur_info Archives', '_themename' ),
		'attributes' => __( 'reveur_info Attributes', '_themename' ),
		'parent_item_colon' => __( 'Parent reveur_info:', '_themename' ),
		'all_items' => __( 'Tout les reveur_info', '_themename' ),
		'add_new_item' => __( 'Add New reveur_info', '_themename' ),
		'add_new' => __( 'Ajouter un reveur_info', '_themename' ),
		'new_item' => __( 'New reveur_info', '_themename' ),
		'edit_item' => __( 'Edit reveur_info', '_themename' ),
		'update_item' => __( 'Update reveur_info', '_themename' ),
		'view_item' => __( 'View reveur_info', '_themename' ),
		'view_items' => __( 'View reveur_infos', '_themename' ),
		'search_items' => __( 'Search reveur_info', '_themename' ),
		'not_found' => __( 'Not found', '_themename' ),
		'not_found_in_trash' => __( 'Not found in Trash', '_themename' ),
		'featured_image' => __( 'Featured Image', '_themename' ),
		'set_featured_image' => __( 'Set featured image', '_themename' ),
		'remove_featured_image' => __( 'Remove featured image', '_themename' ),
		'use_featured_image' => __( 'Use as featured image', '_themename' ),
		'insert_into_item' => __( 'Insert into reveur_info', '_themename' ),
		'uploaded_to_this_item' => __( 'Uploaded to this reveur_info', '_themename' ),
		'items_list' => __( 'reveur_infos list', '_themename' ),
		'items_list_navigation' => __( 'reveur_infos list navigation', '_themename' ),
		'filter_items_list' => __( 'Filter reveur_infos list', '_themename' ),
	);
	$args = array(
		'label' => __( 'reveur_info', '_themename' ),
		'description' => __( 'reveur_info', '_themename' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-visibility',
		'supports' => array('title', 'editor', 'author'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
        // 'rest_base'          => 'reveur_info',
        // 'rest_controller_class' => 'WP_REST_Terms_Controller',
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'reveur_info', $args );

}
add_action( 'init', '_themename_reveur_infour_info', 0 );

?>
