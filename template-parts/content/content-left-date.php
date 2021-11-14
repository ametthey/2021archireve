<div id="calendrier--container">
    <div class="swiper-container swiper-container-date">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <?php

                // Empty array to push all the dates of the reves
                $years = array();

                $args = array(
                    'orderby' => 'date',
                    'order'   => 'DESC',
                    'post_type'      => 'reve',
                    'posts_per_page' => -1,
                );
                $home_projects = new WP_Query( $args );
                if ( $home_projects->have_posts() ) : $i = 0; while ( $home_projects->have_posts() ) : $home_projects->the_post(); $i++;


                $years_dates = get_the_date( 'Y' );

                // Push all the dates in the empty array
                array_push( $years, $years_dates );

                // Si l'année est 2001, alors affiché juste les années ou il y a des articles
                endwhile; endif; wp_reset_postdata();

                // return array without duplicate values
                $years = array_unique($years);

                // Convert array values from string to integrer
                $years_num = array_map('intval', $years);

                // Sort the array in ascending numerical order
                // https://www.w3schools.com/php/php_arrays_sort.asp
                sort($years_num);

                // Counter to loop with ascending numerical order
                $counter = 0;

                foreach( $years_num as $year ) {

                    ?>

                    <div class="swiper-slide">
                        <div class="calendrier--item">
                            <h4><?php echo $year; ?></h4>
                            <div class="calendrier--mois">

                                <button data-filter="<?php echo esc_attr( ".janvier" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "janvier" . $year ); ?>">jan</button>
                                <button data-filter="<?php echo esc_attr( ".fevrier" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "fevrier" . $year ); ?>">fév</button>
                                <button data-filter="<?php echo esc_attr( ".mars" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "mars" . $year ); ?>">mar</button>
                                <button data-filter="<?php echo esc_attr( ".avril" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "avril" . $year ); ?>">avr</button>
                                <button data-filter="<?php echo esc_attr( ".mai" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "mai" . $year ); ?>">mai</button>
                                <button data-filter="<?php echo esc_attr( ".juin" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "juin" . $year ); ?>">juin</button>
                                <button data-filter="<?php echo esc_attr( ".juillet" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "juillet" . $year ); ?>">juillet</button>
                                <button data-filter="<?php echo esc_attr( ".aout" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "aout" . $year ); ?>">aoû</button>
                                <button data-filter="<?php echo esc_attr( ".septembre" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "septembre" . $year ); ?>">sep</button>
                                <button data-filter="<?php echo esc_attr( ".octobre" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "octobre" . $year ); ?>">oct</button>
                                <button data-filter="<?php echo esc_attr( ".novembre" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "novembre" . $year ); ?>">nov</button>
                                <button data-filter="<?php echo esc_attr( ".decembre" . $year ); ?>" aria-hidden="true" class="button mois--item button--round round--white <?php echo esc_attr( "decembre" . $year ); ?>">dec</button>
                                <!-- <button data&#45;filter="<?php echo esc_attr( ".01" . $year ); ?>" aria&#45;hidden="true" class="button mois&#45;&#45;item button&#45;&#45;round round&#45;&#45;white <?php echo esc_attr( "01" . $year ); ?>">jan</button> -->
                                <!-- <button data&#45;filter="<?php echo esc_attr( ".02" . $year ); ?>" aria&#45;hidden="true" class="button mois&#45;&#45;item button&#45;&#45;round round&#45;&#45;white <?php echo esc_attr( "02" . $year ); ?>">fév</button> -->
                                <!-- <button data&#45;filter="<?php echo esc_attr( ".03" . $year ); ?>" aria&#45;hidden="true" class="button mois&#45;&#45;item button&#45;&#45;round round&#45;&#45;white <?php echo esc_attr( "03" . $year ); ?>">mar</button> -->
                                <!-- <button data&#45;filter="<?php echo esc_attr( ".04" . $year ); ?>" aria&#45;hidden="true" class="button mois&#45;&#45;item button&#45;&#45;round round&#45;&#45;white <?php echo esc_attr( "04" . $year ); ?>">avr</button> -->
                                <!-- <button data&#45;filter="<?php echo esc_attr( ".05" . $year ); ?>" aria&#45;hidden="true" class="button mois&#45;&#45;item button&#45;&#45;round round&#45;&#45;white <?php echo esc_attr( "05" . $year ); ?>">mai</button> -->
                                <!-- <button data&#45;filter="<?php echo esc_attr( ".06" . $year ); ?>" aria&#45;hidden="true" class="button mois&#45;&#45;item button&#45;&#45;round round&#45;&#45;white <?php echo esc_attr( "06" . $year ); ?>">juin</button> -->
                                <!-- <button data&#45;filter="<?php echo esc_attr( ".07" . $year ); ?>" aria&#45;hidden="true" class="button mois&#45;&#45;item button&#45;&#45;round round&#45;&#45;white <?php echo esc_attr( "07" . $year ); ?>">juillet</button> -->
                                <!-- <button data&#45;filter="<?php echo esc_attr( ".08" . $year ); ?>" aria&#45;hidden="true" class="button mois&#45;&#45;item button&#45;&#45;round round&#45;&#45;white <?php echo esc_attr( "08" . $year ); ?>">aoû</button> -->
                                <!-- <button data&#45;filter="<?php echo esc_attr( ".09" . $year ); ?>" aria&#45;hidden="true" class="button mois&#45;&#45;item button&#45;&#45;round round&#45;&#45;white <?php echo esc_attr( "09" . $year ); ?>">sep</button> -->
                                <!-- <button data&#45;filter="<?php echo esc_attr( ".10" . $year ); ?>" aria&#45;hidden="true" class="button mois&#45;&#45;item button&#45;&#45;round round&#45;&#45;white <?php echo esc_attr( "10" . $year ); ?>">oct</button> -->
                                <!-- <button data&#45;filter="<?php echo esc_attr( ".11" . $year ); ?>" aria&#45;hidden="true" class="button mois&#45;&#45;item button&#45;&#45;round round&#45;&#45;white <?php echo esc_attr( "11" . $year ); ?>">nov</button> -->
                                <!-- <button data&#45;filter="<?php echo esc_attr( ".12" . $year ); ?>" aria&#45;hidden="true" class="button mois&#45;&#45;item button&#45;&#45;round round&#45;&#45;white <?php echo esc_attr( "12" . $year ); ?>">dec</button> -->

                            </div>
                        </div>
                    </div>

                    <?php

                    $counter = $counter + 1;

                }

                ?>



        </div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev swiper-date-button-prev">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/fleche-gauche.svg" alt="">
        </div>
        <div class="swiper-button-next swiper-date-button-next">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/fleche-droite.svg" alt="">
        </div>
    </div>

</div>
