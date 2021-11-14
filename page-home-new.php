<?php /* Template Name: Home New */ ?>
<?php get_header( 'home' ); ?>

<div id="container--filtres">
    <?php get_template_part('template-parts/filtres'); ?>
</div>


<div id="container--reves">
    <h3 class="container--cover container--reves-cover is-hidden">LES RÊVES</h3>

    <?php get_template_part('template-parts/container-reves'); ?>
</div>

<div id="container--apropos">
    <?php get_template_part('template-parts/apropos'); ?>
</div>


<?php get_footer(); ?>
