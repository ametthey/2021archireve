<?php get_header( 'cat' ); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <h1><?php single_cat_title( 'The Category Is: ' ); ?></h1>

        <h1><?php the_archive_title(); ?></h1>
        <p><?php echo category_description(); ?></p>

        <hr>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/content-posts' , get_post_format() ); ?>

        <?php endwhile; endif;?>

        <?php echo paginate_links(); ?>


        <p>Template: Category.php</p>
    </main>
</div>

<?php get_sidebar(); ?>


<?php get_footer(); ?>
