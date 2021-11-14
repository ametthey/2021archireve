<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <h1>
            <?php esc_html_e( 'The Search Results are:' , '_themename'  ); ?>
            <?php echo get_search_query(); ?>
        </h1>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/content' , 'search' ); ?>

        <?php endwhile; endif; ?>

        <p>Template: Search.php</p>
    </main>
</div>

<?php get_footer(); ?>
