<?php
  /*
  * Template-parts calling for the Loop content
  */
?>

<p>Template: Content-project.php</p>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <!-- the title and link -->
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <!-- the post&#45;thumbnail | no link -->
        <?php the_post_thumbnail( 'thumbnail' ); ?>
    </header>

    <div class="entry-content">
        <!-- the content  -->
        <?php the_content(); ?>

        <!-- edit the post -->
        <?php edit_post_link( esc_html_e( 'Editer', '_themename' ), '<p>' , '</p>' , null, 'edit-post-link'); ?>

        <!-- the skills tags -->
        <p>My skills are: <?php the_terms($post->ID,  'skill' );?></p>

    </div>

</article>
