<div data-scroll-section class="propos--section propos--section-5 propos--section-texte">
<!-- <div class="propos&#45;&#45;section propos&#45;&#45;section&#45;5 propos&#45;&#45;section&#45;texte"> -->
    <h1 class="huge">contact</h1>
    <div class="propos-links">
        <a href="mailto:<?php the_field( 'contact__mail', 'option' ); ?>"><h1><?php the_field( 'contact__mail', 'option' ); ?></h1></a>
        <a href="<?php the_field( 'contact_instagram', 'option' ); ?>" target="_blank"><h1> @archireve</h1></a>
        <a href="<?php the_field( 'contact_newsletter', 'option' ); ?>" target="_blank"><h1>Newsletter</h1></a>
    </div>
    <h2 class="colored-hover"><?php the_field( 'contact', 'option' ); ?></h2>
</div>



