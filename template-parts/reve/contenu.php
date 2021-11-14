<p> <?php the_field( 'contenu_texte' ); ?> </p>
<?php if( get_field('contenu_dessin') ): ?>
    <img src="<?php the_field( 'contenu_dessin' ); ?>" alt="">
<?php endif; ?>

<?php the_field( 'upload_image' ); ?>
