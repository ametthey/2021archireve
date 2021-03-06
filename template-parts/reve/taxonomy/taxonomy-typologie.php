<?php if ( $term_typologie ) : ?>
    <?php if ( $term_typologie->slug === 'cauchemar' ) : ?>
        <!-- CAUCHEMAR -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term_typologie->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/cauchemar.svg" alt="icon <?php echo esc_html( $term_typologie->slug ); ?>">
        </div>
    <?php endif; ?>

    <?php if ( $term_typologie->slug === 'reve-concomitant' ) : ?>
        <!-- REVE CONCOMITANT -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term_typologie->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/reve-concomitant.svg" alt="icon <?php echo esc_html( $term_typologie->slug ); ?>">
        </div>
    <?php endif; ?>

    <?php if ( $term_typologie->slug === 'reve-creatif' ) : ?>
        <!-- REVE CREATIF -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term_typologie->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/reve-creatif.svg" alt="icon <?php echo esc_html( $term_typologie->slug ); ?>">
        </div>
    <?php endif; ?>

    <?php if ( $term_typologie->slug === 'reve-dactualite' ) : ?>
        <!-- REVE D ACTUALITE -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term_typologie->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/reve-dactualite.svg" alt="icon <?php echo esc_html( $term_typologie->slug ); ?>">
        </div>
    <?php endif; ?>

    <?php if ( $term_typologie->slug === 'reve-lucide') : ?>
        <!-- REVE LUCIDE -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term_typologie->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/reve-lucide.svg" alt="icon <?php echo esc_html( $term_typologie->slug ); ?>">
        </div>
    <?php endif; ?>

    <?php if ( $term_typologie->slug === 'reve-premonitoire') : ?>
        <!-- REVE PREMONITOIRE -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term_typologie->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/reve-premonitoire.svg" alt="icon <?php echo esc_html( $term_typologie->slug ); ?>">
        </div>
    <?php endif; ?>

    <?php if ( $term_typologie->slug === 'reve-recurrent') : ?>
        <!-- REVE RECURRENT -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term_typologie->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/reve-recurrent.svg" alt="icon <?php echo esc_html( $term_typologie->slug ); ?>">
        </div>
    <?php endif; ?>

    <?php if ( $term_typologie->slug === 'reve-sexuel') : ?>
        <!-- REVE SEXUEL -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term_typologie->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/reve-sexuel.svg" alt="icon <?php echo esc_html( $term_typologie->slug ); ?>">
        </div>
    <?php endif; ?>

    <?php if ( $term_typologie->slug === 'reve-commun') : ?>
        <!-- REVE SEXUEL -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term_typologie->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/reve-commun.svg" alt="icon <?php echo esc_html( $term_typologie->slug ); ?>">
        </div>
    <?php endif; ?>
<?php endif; ?>
