<?php
// Register Custom Post Type reve
// Post Type Key: reve
function create_reve_cpt() {

	$labels = array(
		'name' => _x( 'reves', 'Post Type General Name', '_themename' ),
		'singular_name' => _x( 'rêve', 'Post Type Singular Name', '_themename' ),
		'menu_name' => _x( 'Rêves', 'Admin Menu text', '_themename' ),
		'name_admin_bar' => _x( 'reve', 'Add New on Toolbar', '_themename' ),
		'archives' => __( 'reve Archives', '_themename' ),
		'attributes' => __( 'reve Attributes', '_themename' ),
		'parent_item_colon' => __( 'Parent reve:', '_themename' ),
		'all_items' => __( 'Tout les rêves', '_themename' ),
		'add_new_item' => __( 'Add New reve', '_themename' ),
		'add_new' => __( 'Ajouter un rêve', '_themename' ),
		'new_item' => __( 'New reve', '_themename' ),
		'edit_item' => __( 'Edit reve', '_themename' ),
		'update_item' => __( 'Update reve', '_themename' ),
		'view_item' => __( 'View reve', '_themename' ),
		'view_items' => __( 'View reves', '_themename' ),
		'search_items' => __( 'Search reve', '_themename' ),
		'not_found' => __( 'Not found', '_themename' ),
		'not_found_in_trash' => __( 'Not found in Trash', '_themename' ),
		'featured_image' => __( 'Featured Image', '_themename' ),
		'set_featured_image' => __( 'Set featured image', '_themename' ),
		'remove_featured_image' => __( 'Remove featured image', '_themename' ),
		'use_featured_image' => __( 'Use as featured image', '_themename' ),
		'insert_into_item' => __( 'Insert into reve', '_themename' ),
		'uploaded_to_this_item' => __( 'Uploaded to this reve', '_themename' ),
		'items_list' => __( 'reves list', '_themename' ),
		'items_list_navigation' => __( 'reves list navigation', '_themename' ),
		'filter_items_list' => __( 'Filter reves list', '_themename' ),
	);
	$args = array(
		'label' => __( 'reve', '_themename' ),
		'description' => __( 'Rêve', '_themename' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-visibility',
		'supports' => array('title', 'editor', 'author'),
		'taxonomies' => array('lucidite', 'typologie', 'customtag', 'modalite_sommeil', 'modalite_lieu', 'modalite_sens', 'modalite_humeur' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
        // 'rest_base'          => 'reve',
        // 'rest_controller_class' => 'WP_REST_Terms_Controller',
		'publicly_queryable' => true,
		'capability_type' => 'post',
        // 'capabilities' => array(
        //     'edit_post'          => 'edit_reve',
        //     'read_post'          => 'read_reve',
        //     'delete_post'        => 'delete_reve',
        //     'edit_posts'         => 'edit_reves',
        //     'edit_others_posts'  => 'edit_others_reves',
        //     'publish_posts'      => 'publish_reves',
        //     'read_private_posts' => 'read_private_reves',
        //     'create_posts'       => 'edit_reves',
        // ),
	);
	register_post_type( 'reve', $args );

}
add_action( 'init', 'create_reve_cpt', 0 );

// Add the custom columns to the book post type:
add_filter( 'manage_reve_posts_columns', 'set_custom_edit_reve_columns' );
function set_custom_edit_reve_columns($columns) {
    unset( $columns['author'] );
    $columns['reveur'] = __( 'Author', '_themename' );

    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_reve_posts_custom_column' , 'custom_reve_column', 10, 2 );
function custom_reve_column( $column, $post_id ) {
    switch ( $column ) {

        case 'reveur' :
            $terms = get_the_term_list( $post_id , 'reveur' , '' , ',' , '' );
            if ( is_string( $terms ) )
                echo $terms;
            else
                _e( 'Unable to get author(s)', '_themename' );
            break;


    }
}
