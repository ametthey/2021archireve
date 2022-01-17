<?php
  /*
  * Template-parts calling for the Loop content
  */
?>

<p>Template: Content-single-project.php</p>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>


        </header>

        <div class="entry-content">
            <a href="<?php the_permalink(); ?>">
                <?php esc_html_e( 'The Thumbnail: ', '_themename' ); ?>
                <?php the_post_thumbnail( 'thumbnail' ); ?>
            </a>

            <a href="<?php the_permalink(); ?>">
                <?php the_content(); ?>
            </a>

            <p>
                Skills:
                <?php the_terms( $post->ID, 'skill' );?>
            </p>

            <p>
                <a href="<?php the_field( 'url' ); ?>" class="button">
                    <?php esc_html_e( 'Visit the Site', '_themename'  ); ?>
                </a>
            </p>
        </div>

    </article>

