<?php get_header(); ?>
<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">

        <?php
            $args = array(
                'post_type'      => 'reve',
                'posts_per_page' => -1
            );
            $home_projects = new WP_Query( $args );
            if ( $home_projects->have_posts() ) : while ( $home_projects->have_posts() ) : $home_projects->the_post();
        ?>

        <?php endwhile; endif; wp_reset_postdata(); ?> <!-- WP_Query for CPT project -->

        <?php //echo do_shortcode(' [advanced_form form="form_602bcd072ff07"] '); ?>

            <div class="button--round round--black"></div>

            <div class="button--rounded"><p>CONNEXION</p></div>
            <div class="button--rounded rounded--black"><p>INSCRIPTION</p></div>

            <div class="button--rounded rounded--big"><p>RÊVE LUCIDE</p></div>
            <div class="button--rounded rounded--big rounded--black"><p>FAUX ÉVEIL</p></div>

            <div class="button--squared"><p>RÊVE LUCIDE</p></div>
            <div class="button--squared squared--black"><p>FAUX ÉVEIL</p></div>

            <div class="button--squared squared--big"><p>RÊVE LUCIDE</p></div>
            <div class="button--squared squared--big squared--black"><p>FAUX ÉVEIL</p></div>

    </main>
</div>


<?php get_sidebar(); ?>


<?php get_footer(); ?>
