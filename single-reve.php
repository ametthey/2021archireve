<?php

ob_get_clean();
acf_form_head();
/*
 * Template Name: creation reve
 */
get_header();
?>

<div class="content--home content--creation-reve">

    <?php

    $pseudo = $current_user->user_nicename;

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
            <a href="<?php echo esc_url( get_home_url() ); ?>">
                <h3 class="button--rounded rounded--big">Voir les rêves</h3>
            </a>
            <a href="<?php echo wp_logout_url( get_permalink( 194 ) ); ?>">
                <h3 class="button--rounded rounded--big">Se déconnecter</h3>
            </a>
        </div>
    </div>

    <?php
        }
    } else if ( ! is_user_logged_in() ) {
        echo 'Vous n\'êtes pas autorisés à être ici !';
    }


    ?>

	<?php

    $id = get_the_ID();

	acf_form(array(
        'id' => 'form--creation-reve',
		'post_id'		=> $id,
        'fields' => array(
            'field_60ec18ce6f70f',
            'field_61015e94be047', // Date du rêve
            'field_610161fcb8f44', // Contenu du rêve (texte)
            'field_6104fb96d7330', // Contenu du rêve (dessin)
            'field_6101620bb8f45',
            'field_60ec18ce6f717', // Typologie de rêve
            'field_60ec18ce6f727', // Tag
            'field_60ec18ce6f71f', // Niveau de lucidité
            'field_60ec18ce6f737', // Modalité du sommeil
            'field_6101cb13a88d4', // Humeur
            'field_6101cc6fc7157', // Sens
            'field_6101cf1188fbe',
            'field_6101cf2cc0b64', // Lieu
            'field_6101d0f126bbf', // Quand
            'field_6101d12d26bc0', // Ou
            'field_6101d13426bc1', // Comment
            'field_6101b366df9c6'
        ),
		'post_title'	=> true,
        'submit_value'  => __('MODIFIER LE RÊVE'),
        'html_submit_button'  => '<input type="submit" class="acf-button-inscription-information" value="%s" />',
        'html_submit_spinner' => '<span class="acf-spinner"></span>',
    ));

	?>



</div>


<!-- ATTENTION C'EST SPECIFIQUE A CE TEMPLATE ET AU FOOTER -->
</div><!-- #page -->

<?php get_template_part('template-parts/content', 'dessin'); ?>

<?php get_footer( 'creation-reve' ); ?>

