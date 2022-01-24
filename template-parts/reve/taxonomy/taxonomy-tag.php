    <div class="article-taxonomies--tag list">
        <?php

            $tagString = get_field( 'tag' );
            $tagArray = explode(",", str_replace(" ","",$tagString));

            foreach( $tagArray as $tag ) :
                echo '<div class="button--squared"><p class="taxonomy-tag ' . $tag . '" data-filter="tag">' . esc_html( $tag ) . '</p></div>';
            endforeach;

        ?>
    </div>
