<div class="tagsearch--container left--filter">
    <div class="tagsearch-wrapper">
        <input type="text" class="tagsearch" placeholder="RECHERCHER UN TAG..." />
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/loupe.svg">
    </div>
</div>

<?php
    echo '<div class="tagitems--container js-radio-button-group left--filter">';
        $args = array(
            'orderby' => 'date',
            'order'   => 'DESC',
            'post_type'      => 'reve',
            'posts_per_page' => -1,
        );
        $home_projects = new WP_Query( $args );
        if ( $home_projects->have_posts() ) : $i = 0; while ( $home_projects->have_posts() ) : $home_projects->the_post(); $i++;

            $tagString = get_field( 'tag' );
            $tagArray = explode(",", str_replace(" ","",$tagString));
            shuffle( $tagArray );

            foreach ( $tagArray as $tag ) {
                echo '<button class="button tagitem button--squared no-button-style ' . $tag . '" data-filter=".' . $tag .'" aria-hidden="true" ><h4>' .  $tag . '</h4></button>';
            }

        endwhile; endif; wp_reset_postdata();

    echo '</div>';
?>
