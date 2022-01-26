<div class="container--cover container--apropos-cover">
    <h3 class="title--apropos-cover">A PROPOS</h3>
    <div class="cover--credits">

        <p>©  ARCHIREVE2021</p>

        <?php $contact_vertical = get_field( 'contact_vertical', 'option' ); ?>
        <?php if ( $contact_vertical ) : ?>
            <div class="separator">–</div>
            <a href="<?php echo esc_url( $contact_vertical) ; ?>">contact</a>
        <?php endif; ?>

        <?php $instagram_vertical = get_field( 'instagram_vertical', 'option' ); ?>
        <?php if ( $instagram_vertical ) : ?>
            <div class="separator">–</div>
            <a href="<?php echo esc_url( $instagram_vertical) ; ?>">instagram</a>
        <?php endif; ?>
    </div>

</div>

<div class="apropos--elements is-hidden">
    <div class="apropos-close is-hidden">
        <img class="" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/closeButtonWhite.svg">
    </div>

    <div data-scroll-container class="content--apropos-fading-container">

        <?php  get_template_part( 'template-parts/apropos/content', 'right-propos-1' ); ?>
        <?php  get_template_part( 'template-parts/apropos/content', 'right-propos-2' ); ?>
        <?php  get_template_part( 'template-parts/apropos/content', 'right-propos-3' ); ?>
        <?php  get_template_part( 'template-parts/apropos/content', 'right-propos-4' ); ?>
        <?php  get_template_part( 'template-parts/apropos/content', 'right-propos-5' ); ?>
        <?php  get_template_part( 'template-parts/apropos/content', 'right-propos-6' ); ?>

    </div>
</div>
