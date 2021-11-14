<?php acf_form_head(); ?>
<?php
    /*
     * Template Name: inscription information
     */
?>
<?php get_header(); ?>

<div class="container--inscription-informations">
    <?php

    $pseudo = $current_user->user_nicename;
    //
    if ( is_user_logged_in() ) {
        if(current_user_can('administrator')) {
            echo 'Je suis administrator';
        } else if ( current_user_can('author') ){
            global $current_user;
            // get_currentuserinfo();
            wp_get_current_user();
            ?>
            <div class="profil--header">
                <h1><?php echo $pseudo; ?></h1>

                <div class="profil--header-links">
                    <a href="<?php echo $home_url . '/reveur_info/' . $pseudo; ?>">
                        <h3 class="button--rounded rounded--big">Modifier le profil</h3>
                    </a>
                    <a href="<?php echo esc_url( get_permalink( 134 ) ); ?>">
                        <h3 class="button--rounded rounded--big">Voir les rêves</h3>
                    </a>
                    <a href="<?php echo wp_logout_url( home_url( '/home/' ) ); ?>">
                        <h3 class="button--rounded rounded--big">Se déconnecter</h3>
                    </a>
                </div>
            </div>
            <?php

                $new_user = get_user_meta($user->ID, '_new_user', true);
                if ($new_user) {
                    update_user_meta($user->ID, '_new_user', '0');

                    echo '<script>console.log("vous êtes un nouvel utilisateur")</script>';
                    echo '<h2 class="questionnaire-subtitle">bienvenue sur archireve.fr, merci de compléter votre profil en quelques étapes</h2>';
                    echo '<h1>QUESTIONNAIRE</h1>';

                } else {
                    echo '<script>console.log("vous n\'êtes pas un nouvel utilisateur")</script>';
                }
            // echo var_dump( $current_user() );
            }
    } else if ( ! is_user_logged_in() ) {
        echo 'Vous n\'êtes pas autorisés à être ici !';
    }
    ?>


	<?php

	acf_form(array(
        'id' => 'form--inscription-informations',
		'post_id'		=> 'new_post',
        'fields' => array( 'field_60e537a66ad5a','field_60fe3fe90c4e7', 'field_60fe40100c4e8', 'field_60fe40240c4e9', 'field_60fe404f0c4ea', 'field_60fe40a90c4eb', 'field_60fe40b10c4ec', 'field_60fe40c70c4ed', 'field_60fe40d80c4ee', 'field_60fe40f20c4ef','field_61304403387ec', 'field_60fe41080c4f0', 'field_60fe41450c4f1', 'field_60fe41590c4f2', 'field_60fe416e0c4f3', '   field_60fe41920c4f4', 'field_60fe41a30c4f5', 'field_60fe41fd0c4f9', 'field_60fe41e80c4f8', 'field_60fe41c00c4f7', 'field_60fe42100c4fa', 'field_60fe42520c4fb', 'field_60fe425e0c4fc', 'field_60fe42730c4fd', 'field_60fe42870c4fe', 'field_60fe429e0c4ff'),
		'new_post'		=> array(
            'post_title'    => $pseudo,
			'post_type'		=> 'reveur_info',
			'post_status'	=> 'publish'
        ),
        'submit_value' => __("Valider", 'acf'),
        'html_submit_button'  => '<input type="submit" class="acf-button-inscription-information" value="%s" />',
        'updated_message' => __("merci d’avoir pris le temps de répondre à ces quelques questions. vous pouvez dès à présent commencer à archirever et flâner dans ces rêves fait de 1 et de 0.", 'acf'),
        'html_updated_message'  => '<div id="message" class="updated"><p>%s</p></div>',
        'return' => '/back-office/',
	));

	?>
</div>

<?php get_footer(); ?>
