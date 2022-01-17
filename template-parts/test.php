
    <div id="container--test">
    <?php
        // $author_id = get_post_field( 'post_author', $custom_post );
        // $author_name = get_the_author_meta( 'user_nicename', $author_id );

        $args = array(
            'post_type' => array('reve', 'reveur_info'),
            'posts_per_page' => -1,
            // 'orderby' => 'date',
            'order'   => 'DESC',
        );
        $argsReve = array(
            'post_type' => 'reveur_info',
            'posts_per_page' => -1,
            // 'orderby' => 'date',
            'order'   => 'DESC',
        );

        $home_projects = new WP_Query( $argsReve );

        $the_count = $reves_projects->found_posts;
        $count = $the_count + 1;

        var_dump( $count );

        if ( $home_projects->have_posts() ) : $i = 0; $count; while ( $home_projects->have_posts() ) : $home_projects->the_post(); $i++; $count--;

    ?>

        <h1>L'année est <?php the_date( 'Y' ); ?> et son auteur <?php echo get_the_author_meta( 'nickname', false ); ?></h1>



    <?php endwhile; endif; wp_reset_postdata(); ?> <!-- WP_Query for CPT project -->
    </div>
