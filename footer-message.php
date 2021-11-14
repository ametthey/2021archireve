

            </div><!-- #content -->

            <footer>


                <?php
                    if (! is_active_sidebar( 'my-footer-sidebar' )) {
                        return;
                    }
                ?>

                <?php dynamic_sidebar( 'my-footer-sidebar' ); ?>

            </footer>

        </div><!-- #page -->
        <!-- </div><!&#45;&#45; .wrapper &#45;&#45;> -->

        <?php wp_footer(); ?>
	</body>
</html>
