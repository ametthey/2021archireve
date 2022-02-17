<?php get_header( 'home' ); ?>

<div id="page">
    <div id="container--filtres">
        <?php get_template_part('template-parts/filtres'); ?>
    </div>

    <?php get_template_part('template-parts/filtres-popup'); ?>

    <div id="container--reves">
        <h3 class="container--cover container--reves-cover is-hidden">LES RÊVES</h3>

        <?php get_template_part('template-parts/reve'); ?>
    </div>

    <div id="container--apropos">
        <?php get_template_part('template-parts/apropos'); ?>
    </div>
</div>

<?php get_footer(); ?>
