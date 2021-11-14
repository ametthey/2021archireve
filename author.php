<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <div class="author-bio">
            <h1><?php the_archive_title(); ?></h1>
            <p>
                <?php esc_html_e( 'The Author Bio: ' , '_themename'); ?>
                <?php echo the_author_meta( 'description' , $post->post_author ); ?>
            </p>
            <p>
                <?php esc_html_e( 'the Author login: ' , '_themename'); ?>
                <?php echo the_author_meta( 'user_login' , $post->post_author ); ?>
            </p>
            <p>
                <?php esc_html_e( 'The Author Password: ' , '_themename'); ?>
                <?php echo the_author_meta( 'user_pass' , $post->post_author ); ?>
            </p>
            <p>
                <?php esc_html_e( 'The Author Nicename: ' , '_themename'); ?>
                <?php echo the_author_meta( 'user_nicename' , $post->post_author ); ?>
            </p>
            <p>
                <?php esc_html_e( 'The Author Email: ' , '_themename'); ?>
                <?php echo the_author_meta( 'user_email' , $post->post_author ); ?>
            </p>
            <p>
                <?php esc_html_e( 'The Author Url: ' , '_themename'); ?>
                <?php echo the_author_meta( 'user_url' , $post->post_author ); ?>
            </p>
            <p>
                <?php esc_html_e( 'The Author Display Name: ' , '_themename'); ?>
                <?php echo the_author_meta( 'display_name' , $post->post_author ); ?>
            </p>
            <p>
                <?php esc_html_e( 'The Author Nickname', '_themename'); ?>
                <?php echo the_author_meta( 'nickname' , $post->post_author ); ?>
            </p>
            <p>
                <?php esc_html_e( 'The Author First Name', '_themename'); ?>
                <?php echo the_author_meta( 'first_name' , $post->post_author ); ?>
            </p>
            <p>
                <?php esc_html_e( 'The Author Last Name', '_themename'); ?>
                <?php echo the_author_meta( 'last_name' , $post->post_author ); ?>
            </p>
            <p>
                <?php esc_html_e( 'The Author User Level', '_themename'); ?>
                <?php echo the_author_meta( 'user_level' , $post->post_author ); ?>
            </p>
            <p>
                <?php esc_html_e( 'The Author User Level', '_themename'); ?>
                <?php echo the_author_meta( 'user_level' , $post->post_author ); ?>
            </p>
            <p>
                <?php esc_html_e( 'The Author Avatar', '_themename'); ?>
                <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
            </p>
            <p>
                get_edit_user_link
                <a href="<?php echo get_edit_user_link( get_the_author_meta( 'ID' ) ); ?>">
                  <?php _e( 'Edit', 'wptags' ); ?>
                </a>
            </p>
        </div>

        <hr>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/content-posts' , get_post_format() ); ?>

        <?php endwhile; endif;?>

        <p class="byline">
            From <?php the_author(); ?> ( <?php the_author_posts(); ?> ) |
            <?php the_author_link(); ?> |
            <?php the_author_posts_link(); ?> |
            Date: <?php the_time( 'F j, Y |' ); ?>
            <?php esc_html_e( 'Categories: ', 'wptags' ); ?>
            <?php the_category( ', ' ); ?>
            <?php the_tags( 'Tags:', ', ' ); ?>
        </p>

        <?php echo paginate_links(); ?>

        <p>Template: Author.php</p>
    </main>
</div>

<?php get_sidebar(); ?>


<?php get_footer(); ?>
