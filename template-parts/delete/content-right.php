<div class="content--right">
    <div class="content--right-oriented">
        <div class="right--credits">
            <?php $footer_message = '&copy; ' . ' ' . get_bloginfo( 'name' ); ?>
            <p><?php echo apply_filters( '_themename_footer_message', $footer_message ); ?></p>
            <a class="credits--contact" href="mailto:archireve@archireve.com" target="_blank">contact</a>
            <a href="https://www.instagram.com/archireve/" target="_blank">instagram</a>
        </div>

        <h3>A PROPOS</h3>
    </div>

    <?php get_template_part( 'template-parts/content/content', 'right-propos' ); ?>
</div>
