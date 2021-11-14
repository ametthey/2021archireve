<?php
ob_get_clean();
acf_form_head();
/*
 * Template Name: profil single
 */
get_header(); ?>

<div class="content--home content--profil">

    <div class="profil--header">
        <h1>Profil</h1>
    <?php

    if ( is_user_logged_in() ) {
        if(current_user_can('administrator')) {
            echo 'Je suis administrator';
        } else if ( current_user_can('author') ){
            global $current_user;
            wp_get_current_user();
            ?>

        <div class="profil--header-links">
            <a href="<?php echo esc_url( get_permalink( 182 ) ); ?>">
                <h3 class="button--rounded rounded--big">Voir mes rêves</h3>
            </a>
            <a href="<?php echo wp_logout_url( home_url( '/home/' ) ); ?>">
                <h3 class="button--rounded rounded--big">Se déconnecter</h3>
            </a>
        </div>

    <?php
            }
        } else if ( ! is_user_logged_in() ) {
            echo 'Vous n\'êtes pas autorisés à être ici !';
        }
    ?>
    </div>

    <div class="profil--utilisateur">

        <?php

            $pseudo = $current_user->user_nicename;
            $id = get_the_ID();

        acf_form(array(
            'id' => 'form--inscription-informations',
            'post_id'		=> $id,
            'fields' => array( 'field_60e537a66ad5a','field_60fe3fe90c4e7', 'field_60fe40100c4e8', 'field_60fe40240c4e9', 'field_60fe404f0c4ea', 'field_60fe40a90c4eb', 'field_60fe40b10c4ec', 'field_60fe40c70c4ed', 'field_60fe40d80c4ee', 'field_60fe40f20c4ef','field_61304403387ec', 'field_60fe41080c4f0', 'field_60fe41450c4f1', 'field_60fe41590c4f2', 'field_60fe416e0c4f3', '   field_60fe41920c4f4', 'field_60fe41a30c4f5', 'field_60fe41fd0c4f9', 'field_60fe41e80c4f8', 'field_60fe41c00c4f7', 'field_60fe42100c4fa', 'field_60fe42520c4fb', 'field_60fe425e0c4fc', 'field_60fe42730c4fd', 'field_60fe42870c4fe', 'field_60fe429e0c4ff'),
            // 'post_title'    => true,
            'submit_value' => __("Modifier le profil", 'acf'),
            'html_submit_button'  => '<input type="submit" class="acf-button-inscription-information" value="%s" />',
            'updated_message' => __("Vous venez de modifier votre profil", 'acf'),
            'html_updated_message'  => '<div id="message" class="updated"><p>%s</p></div>',
            'return' => '/reveur_info/' . $pseudo,
        ));

        ?>

    </div>

</div>

<?php get_footer(); ?>

