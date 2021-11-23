<!-- <div class="content&#45;&#45;left filters"> -->
<!--  -->
<!--     <div class="content&#45;&#45;left&#45;close left&#45;&#45;filter"> -->
<!--         <img class="content&#45;&#45;left&#45;close&#45;button" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/closeButton.svg"> -->
<!--     </div> -->
<!--  -->
<!--     <div class="content&#45;&#45;left&#45;cover"> -->
<!--         <h3>filtres</h3> -->
<!--     </div> -->
<!--  -->
<!--     <h4 class="content&#45;left&#45;container&#45;title left&#45;&#45;filter">TagS<img class="tooltip&#45;icon" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/infoBulle.svg"> -->
<!--         <span class="tooltip&#45;text"><?php the_field( 'recherche_tag', 'option'  ); ?></span> -->
<!--     </h4> -->
<!--     <?php get_template_part('template&#45;parts/content/content', 'left&#45;tag'); ?> -->
<!--  -->
<!--     <div class="ui&#45;group lucidite&#45;&#45;container left&#45;&#45;filter"> -->
<!--         <h4 class="content&#45;left&#45;container&#45;title left&#45;&#45;filter">Niveau de lucidité <img class="tooltip&#45;icon" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/infoBulle.svg"> -->
<!--             <span class="tooltip&#45;text"><?php the_field( 'niveau_de_lucidite_tooltip', 'option'  ); ?></span> -->
<!--         </h4> -->
<!--         <div class="js&#45;radio&#45;button&#45;group"> -->
<!--  -->
<!--             <?php -->
<!--                 // https://designorbital.com/snippets/how&#45;to&#45;get&#45;all&#45;taxonomies&#45;for&#45;a&#45;post&#45;type/ -->
<!--                 $terms = get_terms( 'niveaudelucidite' ); -->
<!--                 $field_lucidite = the_field('niveau_de_lucidite_tooltip'); -->
<!--                 $o = 0; -->
<!--  -->
<!--                 foreach ( $terms as $term ) { -->
<!--  -->
<!--                     // EACH -->
<!--                     echo '<button class="button lucidite&#45;&#45;item button&#45;&#45;rounded ' . $term&#45;>slug . '" data&#45;filter=".' . $term&#45;>slug .'" aria&#45;hidden="true">' . $term&#45;>name . '</button>'; -->
<!--                     $o++; -->
<!--                 } -->
<!--             ?> -->
<!--  -->
<!--         </div> -->
<!--     </div> -->
<!--  -->
<!--     <div class="ui&#45;group lucidite&#45;&#45;container typopologie&#45;&#45;container left&#45;&#45;filter"> -->
<!--         <h4 class="content&#45;left&#45;container&#45;title left&#45;&#45;filter">Typologie de rêve <img class="tooltip&#45;icon" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/infoBulle.svg"> -->
<!--             <span class="tooltip&#45;text"><?php the_field( 'recherce_typologie_de_reves', 'option'  ); ?></span> -->
<!--         </h4> -->
<!--         <div class="js&#45;radio&#45;button&#45;group"> -->
<!--  -->
<!--             <?php -->
<!--                 $terms = get_terms( 'typologiedereve'); -->
<!--                 $o = 0; -->
<!--  -->
<!--                 foreach ( $terms as $term ) { -->
<!--  -->
<!--                     // EACH -->
<!--                     echo '<button class="button lucidite&#45;&#45;item typologie&#45;&#45;item button&#45;&#45;rounded ' . $term&#45;>slug . '" data&#45;filter=".' . $term&#45;>slug .'">' . $term&#45;>name . '</button>'; -->
<!--                     $o++; -->
<!--                 } -->
<!--             ?> -->
<!--  -->
<!--         </div> -->
<!--     </div> -->
<!--  -->
<!--     <div class="ui&#45;group calendrier&#45;&#45;container left&#45;&#45;filter"> -->
<!--         <h4 class="content&#45;left&#45;container&#45;title left&#45;&#45;filter">Période <img class="tooltip&#45;icon" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/infoBulle.svg"> -->
<!--             <span class="tooltip&#45;text"><?php the_field( 'recherche_periode', 'option'  ); ?></span> -->
<!--         </h4> -->
<!--         <div class="js&#45;radio&#45;button&#45;group"> -->
<!--             <?php get_template_part('template&#45;parts/content/content', 'left&#45;date'); ?> -->
<!--         </div> -->
<!--     </div> -->
<!--  -->
<!--     <?php // get_template_part('template&#45;parts/content/content', 'left&#45;lucidite'); ?> -->
<!--     <?php // get_template_part('template&#45;parts/content/content', 'left&#45;typologie'); ?> -->
<!--  -->
<!--     <!&#45;&#45; Supprimer les filtres  &#45;&#45;> -->
<!--     <div class="content&#45;&#45;left&#45;reset&#45;filters lucidite&#45;&#45;container left&#45;&#45;filter ui&#45;group"> -->
<!--         <div class="js&#45;radio&#45;button&#45;group"> -->
<!--             <h5 class="btn clear"><img class="content&#45;&#45;left&#45;close&#45;button" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/images/closeButton.svg">supprimer les filtres</h5> -->
<!--         </div> -->
<!--     </div> -->
<!-- </div> -->
