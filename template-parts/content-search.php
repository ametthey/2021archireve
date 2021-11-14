<?php
  /*
  * Template-parts calling for the Loop content
  */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="post">

    <h2>The type of the content is <?php echo get_post_type(); ?></h2>

    <header class="entry-header">
        <h2 class="search-title">
            <a href="<?php the_permalink(); ?>">
                <?php echo get_post_type(); ?>
                <?php the_title(); ?>
            </a>
        </h2>
    </header>

    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>
</article>
