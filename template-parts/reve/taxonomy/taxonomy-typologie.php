<?php if ( $term_typologie ) : ?>
    <?php if ( $term_typologie->name === 'Cauchemar' ) : ?>
        <!-- CAUCHEMAR -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term_typologie->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/cauchemar.svg">
        </div>
    <?php endif; ?>

    <?php if ( $term_typologie->name === 'Rêve Concomitant' ) : ?>
        <!-- REVE CONCOMITANT -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term_typologie->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/reve-concomitant.svg">
        </div>
    <?php endif; ?>

    <?php if ( $term_typologie->name === 'Rêve Créatif' ) : ?>
        <!-- REVE CREATIF -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term_typologie->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/reve-creatif.svg">
        </div>
    <?php endif; ?>

    <?php if ( $term_typologie->name === 'Rêve d\'actualité' ) : ?>
        <!-- REVE D ACTUALITE -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term_typologie->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/reve-dactualite.svg">
        </div>
    <?php endif; ?>

    <?php if ( $term_typologie->name === 'Rêve lucide') : ?>
        <!-- REVE LUCIDE -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term_typologie->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/reve-lucide.svg">
        </div>
    <?php endif; ?>

    <?php if ( $term_typologie->name === 'Rêve prémonitoire') : ?>
        <!-- REVE PREMONITOIRE -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term_typologie->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/reve-premonitoire.svg">
        </div>
    <?php endif; ?>

    <?php if ( $term_typologie->name === 'Rêve Récurrent') : ?>
        <!-- REVE RECURRENT -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term_typologie->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/reve-recurrent.svg">
        </div>
    <?php endif; ?>

    <?php if ( $term_typologie->name === 'Rêve sexuel') : ?>
        <!-- REVE SEXUEL -->
        <div class="article-taxonomies--typologie border-right-<?php echo esc_html( $term_typologie->slug ); ?>">
        <img class="article-taxonomies--typologie-icone" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/reve-sexuel.svg">
        </div>
    <?php endif; ?>
<?php endif; ?>
