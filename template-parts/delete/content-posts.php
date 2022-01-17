<?php
  /*
  * Template-parts calling for the Loop content
  */
?>

<p>Template: Content-posts.php</p>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

        <span class="dashicons dashicons-format-<?php echo get_post_format( $post->ID ); ?>"></span>

        <h2><a href="<?php esc_url( the_permalink() );?>"><?php the_title(); ?></a></h2>

        <div class="byline">
            <?php esc_html_e( 'Author:' , '_themename'); ?><?php the_author_posts_link(); ?>
            <br>
            <?php esc_html_e( 'Author bio:' ,'_themename' ); ?><?php the_author_meta( 'description' , $post->post_author ); ?>
            <br>
            Date: <?php the_time( 'j F Y' );?>
        </div>
    </header>

    <div class="entry-content">
        <?php the_content( 'Read More' ); ?>
    </div>

</article>
