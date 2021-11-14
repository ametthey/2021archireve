<?php acf_form_head(); ?>
<?php
$pseudo = $current_user->user_nicename;
get_header(); ?>




<div class="content--home content--profil content--reve">

    <div class="profil--header">
        <h1><?php echo $pseudo; ?></h1>
        <a href="<?php echo esc_url( get_permalink( 199 ) ); ?>">
            <h3 class="button--rounded rounded--big">Modifier le profil</h3>
        </a>
    </div>

    <!-- Titre du rêve -->
    <?php // the_field( 'titre_du_reve' ); ?>

    <!-- Date du rêve -->
    <?php // the_field( 'date_du_reve' ); ?>

    <!-- Typologie de rêve -->
    <?php $typologie_de_reve = get_field( 'typologie_de_reve' ); ?>
    <?php $term = get_term_by( 'id', $typologie_de_reve, 'typologiedereve' ); ?>
    <?php if ( $term ) : ?>
        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
    <?php endif; ?>

    <!-- Niveau de lucidité -->
    <?php $niveau_de_lucidite = get_field( 'niveau_de_lucidite' ); ?>
    <?php $term = get_term_by( 'id', $niveau_de_lucidite, 'niveaudelucidite' ); ?>
    <?php if ( $term ) : ?>
        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
    <?php endif; ?>

    <!-- Tag -->
    <?php $tag = get_field( 'tag' ); ?>
    <?php if ( $tag ) : ?>
        <?php $get_terms_args = array(
            'taxonomy' => 'customtag',
            'hide_empty' => 0,
            'include' => $tag,
        ); ?>
        <?php $terms = get_terms( $get_terms_args ); ?>
        <?php if ( $terms ) : ?>
            <?php foreach ( $terms as $term ) : ?>
                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>


    <!-- Choix du contenu -->
    <?php if ( have_rows( 'choix_du_contenu' ) ): ?>
        <?php while ( have_rows( 'choix_du_contenu' ) ) : the_row(); ?>
            <?php if ( get_row_layout() == 'texte_uniquement' ) : ?>
                <?php the_sub_field( 'texte' ); ?>
            <?php elseif ( get_row_layout() == 'texte_&_dessin' ) : ?>
                <?php the_sub_field( 'texte' ); ?>
                <?php $dessin = get_sub_field( 'dessin' ); ?>
                <?php if ( $dessin ) : ?>
                    <img src="<?php echo esc_url( $dessin['url'] ); ?>" alt="<?php echo esc_attr( $dessin['alt'] ); ?>" />
                <?php endif; ?>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php else: ?>
        <?php // no layouts found ?>
    <?php endif; ?>

    <?php acf_form(); ?>
</div>


<?php get_footer(); ?>
