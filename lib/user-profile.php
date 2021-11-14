<?php

add_action( 'get_header', '_themename_modify_user_profile' );
function _themename_modify_user_profile() {

    // Get current user info
	global $post,$current_user;
	get_currentuserinfo();

	// Bail if user is not logged in and not post author
	if ( ! ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
		return;
    }

    /**
	 * Add required acf_form_head() function to head of page
	 * @uses Advanced Custom Fields Pro
	 */
	add_action( 'get_header', '_themename__do_acf_form_head', 1 );

    /**
	 * Deregister the admin styles outputted when using acf_form
	 */
	add_action( 'wp_print_styles', 'tsm_deregister_admin_styles', 999 );

    /**
	 * Add the acf_form
	 * @uses Advanced Custom Fields Pro
	 */
	add_action( 'genesis_after', 'tsm_do_acf_form_content' );

    /**
	 * Update existing post data
	 * @uses Advanced Custom Fields Pro
	 */
	add_action( 'acf/save_post', 'tsm_update_existing_post_data', 10 );
}


function tsm_do_acf_form_head() {
	acf_form_head();
}

function tsm_deregister_admin_styles() {
	wp_deregister_style( 'wp-admin' );
}

function tsm_do_acf_form_content() {
?>
	<div id="edit-post" style="display:none;">

    	<?php

        // Natasha
        $reveur_infos_natasha = 546;


		$edit_post = array(
			'post_id'            => $reveur_infos_natasha, // Get the post ID
			'field_groups'       => array(219), // Create post field group ID(s)
			'form'               => true,
			'return'             => '%post_url%',
			'html_before_fields' => '<div class="edit-close-wrap"><button class="edit-close" role="button" aria-pressed="false"><i class="fa fa-times"></i> Close</button></div>',
			'html_after_fields'  => '',
			'submit_value'       => 'Save Changes',
		);
		acf_form( $edit_post );
		?>

	</div>
<?php
}
function tsm_update_existing_post_data( $post_id ) {

	// Update existing post
	$post = array(
		'ID'           => $post_id,
		'post_status'  => 'publish',
	);

	// Update the post
	$post_id = wp_insert_post( $post );

	// ACF image field key
	$age   = $_POST['acf']['field_60e537a66ad5a'];
	$physiologie   = $_POST['acf']['field_60fe3fe90c4e7'];
	$ressenti   = $_POST['acf']['field_60fe40100c4e8'];
	$attirance   = $_POST['acf']['field_60fe40240c4e9'];
	$langues_maternelles   = $_POST['acf']['field_60fe404f0c4ea'];
	$pays_enfance   = $_POST['acf']['field_60fe40a90c4eb'];
	$milieu_origine   = $_POST['acf']['field_60fe40b10c4ec'];
	$milieu_actuel   = $_POST['acf']['field_60fe40c70c4ed'];
	$rapport_au_travail_metier   = $_POST['acf']['field_60fe40d80c4ee'];
	$rapport_au_travail_type   = $_POST['acf']['field_60fe40f20c4ef'];
	$enfance_relation_a_un_paysage_enfance_ville_campagne   = $_POST['acf']['field_60fe41080c4f0'];
	$enfance_relation_a_un_paysage_enfance_plaine_montage   = $_POST['acf']['field_60fe41450c4f1'];
	$enfance_relation_a_un_paysage_enfance_humide_seche   = $_POST['acf']['field_60fe41590c4f2'];
	$actuelle_relation_a_un_paysage_actuelle_plaine_montage_copy   = $_POST['acf']['field_60fe41920c4f4'];
	$actuelle_relation_a_un_paysage_actuelle_humide_seche   = $_POST['acf']['field_60fe41a30c4f5'];
	$attirance_ville_campagne   = $_POST['acf']['field_60fe41fd0c4f9'];
	$attirance_plaine_montage   = $_POST['acf']['field_60fe41e80c4f8'];
	$attirance_humide_seche   = $_POST['acf']['field_60fe41c00c4f7'];
	$foi_spirituel_origine   = $_POST['acf']['field_60fe42100c4fa'];
	$foi_spirituel_actuelle   = $_POST['acf']['field_60fe42520c4fb'];
	$relation_au_sommeil_bon_mauvais   = $_POST['acf']['field_60fe425e0c4fc'];
	$relation_au_sommeil_appreciation_du_sommeil   = $_POST['acf']['field_60fe42730c4fd'];
	$relation_aux_reves_reveur_non   = $_POST['acf']['field_60fe42870c4fe'];
	$relation_aux_reves_important_non   = $_POST['acf']['field_60fe429e0c4ff'];

}
