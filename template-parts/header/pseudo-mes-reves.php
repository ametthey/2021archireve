<div class="site-header-user">
    <div id="left--connexion" class="left--filter button--rounded left--connexion-user">
        <a href="<?php echo $home_url . '/reveur_info/' . $pseudo; ?>">
            <p><?php echo $pseudo; ?></p>
        </a>
    </div>
    <div id="left--inscription" class="left--filter button--rounded left--inscription">
        <a href="<?php echo esc_url( get_permalink(  get_page_by_title('back-office', OBJECT , 'page')) ); ?>">
            <p>Mes rêves</p>
        </a>
    </div>
</div>
