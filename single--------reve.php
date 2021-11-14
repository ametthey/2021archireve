<?php
if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) { // Execute code if user is logged in or user is the author
    acf_form_head();
    wp_deregister_style( 'wp-admin' );
}

    /*
     * Template Name: Single New Reve
     *
     */

get_header(); ?>

<?php
/* Show the edit button to the post author only */
$current_user = wp_get_current_user(); // Just in case it is not set anywhere else
if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) { ?>
<a class='post-edit-button' href="<?php echo get_permalink() ?>?action=edit">Edit Post</a>
<?php }

 if (isset($_GET['action'])) {
        if($_GET['action'] == 'edit') { ?>
            <div class="acf-edit-post">
            <!-- Put the edit form code from the next step here -->
            </div>
        <?php }
    }

  if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
        echo "<div class='acf-edit-post'>";
            acf_form (array(
                'field_groups' => array(216,19), // Same ID(s) used before
                'form' => true,
                'return' => '%post_url%',
                'submit_value' => 'Save Changes',
                'post_title' => true,
                // 'post_content' => true,
            ));
        echo "</div>";
    }

?>



<?php get_footer(); ?>
