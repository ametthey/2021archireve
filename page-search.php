<?php /* Template Name: Search and Filter */ ?>
<?php get_header( 'home' ); ?>

<div id="container--filtres">
    <!-- <h3 class="container&#45;&#45;cover container&#45;&#45;filtres&#45;cover">FILTRES</h3> -->

    <!-- <div class="filtres&#45;&#45;list is&#45;hidden filters"> -->
    <!-- </div> -->
</div>


<div id="container--reves">
    <h3 class="container--cover container--reves-cover is-hidden">LES RÊVES</h3>

    <?php get_template_part('template-parts/container-reves'); ?>
</div>

<div id="container--apropos">
    <div class="container--cover container--apropos-cover">
        <h3>A PROPOS</h3>

        <div class="cover--credits">
            <p>©  ARCHIREVE2021</p>
            <div class="separator">–</div>
            <a href="#">contact</a>
            <div class="separator">–</div>
            <a href="#">instagram</a>
        </div>

    </div>

    <div class="apropos--elements is-hidden">
        <div class="apropos-close is-hidden">
            <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/closeButtonWhite.svg">
        </div>

        <div data-scroll-container class="content--apropos-fading-container">

            <?php get_template_part( 'template-parts/content/content', 'right-propos-1' ); ?>
            <?php get_template_part( 'template-parts/content/content', 'right-propos-2' ); ?>
            <?php get_template_part( 'template-parts/content/content', 'right-propos-3' ); ?>
            <?php get_template_part( 'template-parts/content/content', 'right-propos-4' ); ?>
            <?php get_template_part( 'template-parts/content/content', 'right-propos-5' ); ?>
            <?php get_template_part( 'template-parts/content/content', 'right-propos-6' ); ?>
            <?php // get_template_part( 'template-parts/content/content', 'right-propos-7' ); ?>

        </div>

    </div>
</div>


<?php get_footer(); ?>
