<?php
/*
 * Template Name: nouveau rêve
 */

if ( is_user_logged_in() || current_user_can('publish_posts') ) { // Execute code if user is logged in
    ob_get_clean();
    acf_form_head();
    wp_deregister_style( 'wp-admin' );
}

if ( ! ( is_user_logged_in() || current_user_can('publish_posts') ) ) {
    echo '<p>You must be a registered author to post.</p>';
} else {
     acf_form(array(
         'post_id' => 'new_post',
         'field_groups' => array(216,19), // Used ID of the field groups here.
         'post_title' => false, // This will show the title filed
         'post_content' => false, // This will show the content field
         'form' => true,
         'new_post' => array(
             'post_type' => 'reve',
             'post_status' => 'publish' // You may use other post statuses like draft, private etc.
         ),
         'return' => '%post_url%',
         'submit_value' => 'PUBLIER',
     ));
}
?>

<?php do_shortcode( '[acfe_form name="nouveau-reve"]' ); ?>


<?php get_footer(); ?>
