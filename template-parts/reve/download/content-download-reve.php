<div class="container--reve-to-download is-selected">

    <?php
        // $author_id = get_post_field( 'post_author', $custom_post );
        // $author_name = get_the_author_meta( 'user_nicename', $author_id );

        $args = array(
            'post_type' => array('reve', 'reveur_info'),
            'posts_per_page' => -1,
            // 'orderby' => 'date',
            'order'   => 'DESC',
        );
        $argsReve = array(
            'post_type' => 'reve',
            'posts_per_page' => -1,
            // 'orderby' => 'date',
            'order'   => 'DESC',
        );

        $reves_projects = new WP_Query( $argsReve );

        $home_projects = new WP_Query( $args );

        $the_count = $reves_projects->found_posts;
        $count = $the_count + 1;

        var_dump( $count );

        if ( $home_projects->have_posts() ) : $i = 0; $count; while ( $home_projects->have_posts() ) : $home_projects->the_post(); $i++; $count--;

        // TYPOLOGIE
        $typologie_de_reve = get_field( 'typologie_de_reve' );
        $term_typologie = get_term_by( 'id', $typologie_de_reve, 'typologiedereve' );
        set_query_var( 'term_typologie', $term_typologie );

        // LUCIDITE
        $niveau_de_lucidite = get_field( 'niveau_de_lucidite' );
        $term_lucidite = get_term_by( 'id', $niveau_de_lucidite, 'niveaudelucidite' );
        set_query_var( 'term_lucidite', $term_lucidite );

        // TAG
        $tagElement = get_field( 'tag' );
        $get_terms_args = array(
            'taxonomy' => 'customtag',
            'hide_empty' => 0,
            'include' => $tag,
        );
        $tags = get_the_terms( $post->ID, 'customtag' );

        $name = get_the_author_meta( 'nickname', false );

    ?>

        <?php
            if ( get_post_type() == 'reve' ) {
                echo '<div class="reve--to-print post-type-reve" id="reve--print' . $i . '" data-post="post-type-reve" data-number="' . $i . '" data-name="' . $name . '" data-numerotation="' . $count . '">';
                echo '<table class="table--print" id="print--' . $i . '">';
            } else if ( get_post_type() == 'reveur_info' ) {
                echo '<div class="reve--to-print post-type-reveur-info" id="reve--print-one" data-post="post-type-reveur-info" data-number="one" data-name="' . $name . '">';
                echo '<table class="table--print" id="print--' . $i . '">';
            }
        ?>
                    <!-- 1 -->
                    <tr>
                        <td>Donnée du rêve</td>
                        <td>
                            <?php
                                if ( get_post_type() == 'reve' ) {
                                    echo 'reve';
                                } else if ( get_post_type() == 'reveur_info' ) {
                                    echo 'reveur_info';
                                }
                            ?>
                        </td>
                        <td>Donnée du compte</td>
                        <td></td>
                    </tr>

                    <!-- 2 -->
                    <tr>
                        <td>Numéro du rêve</td>
                        <td><?php echo $count ?></td>
                        <td>Pseudo</td>
                        <td class="table-pseudo">
                            <?php echo get_the_author_meta( 'nickname', false ); ?>
                        </td>
                    </tr>

                    <!-- 3 -->
                    <tr>
                        <td>Titre du rêve</td>
                        <td class="table--print-title"><?php echo get_the_title(); ?></p></td>
                        <td>Age</td>
                        <td class="table-age"><?php the_field( 'age' ); ?></td>
                    </tr>

                    <!-- 4 -->
                    <tr>
                        <td>Date</td>
                        <td><?php echo the_field('date_du_reve'); ?></td>
                        <td colspan="2">Genre</td>
                    </tr>

                    <!-- 5 -->
                    <tr>
                        <td>Typologie du rêve</td>
                        <td>
                            <?php if ( $term_typologie ) : ?>
                                <?php if ( $term_typologie->name === 'Actualité' ) : ?>
                                    <?php echo esc_html( $term_typologie->name ); ?>
                                <?php endif; ?>

                                <?php if ( $term_typologie->name === 'Cauchemar' ) : ?>
                                    <?php echo esc_html( $term_typologie->name ); ?>
                                <?php endif; ?>

                                <?php if ( $term_typologie->name === 'Commun' ) : ?>
                                    <?php echo esc_html( $term_typologie->name ); ?>
                                <?php endif; ?>

                                <?php if ( $term_typologie->name === 'Concomitant' ) : ?>
                                    <?php echo esc_html( $term_typologie->name ); ?>
                                <?php endif; ?>

                                <?php if ( $term_typologie->name === 'Créatif' ) : ?>
                                    <?php echo esc_html( $term_typologie->name ); ?>
                                <?php endif; ?>

                                <?php if ( $term_typologie->name === 'Prémonitoire') : ?>
                                    <?php echo esc_html( $term_typologie->name ); ?>
                                <?php endif; ?>

                                <?php if ( $term_typologie->name === 'Récurrent') : ?>
                                    <?php echo esc_html( $term_typologie->name ); ?>
                                <?php endif; ?>

                                <?php if ( $term_typologie->name === 'Sexuel') : ?>
                                    <?php echo esc_html( $term_typologie->name ); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td>Physiologie: femme/homme</td>
                        <td class="table-physiologie">
                            <?php
                                $phy_value = get_field( 'genre_physiologie' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 6 -->
                    <tr>
                        <td>Niveau de lucidité du rêve</td>
                        <td>
                            <!-- niveau de lucidité -->
                            <?php if ( $term_lucidite ) : ?>
                            <?php echo esc_html( $term_lucidite->name ); ?>
<?php endif; ?>
                        </td>
                        <td>Ressenti: femme/home</td>
                        <td class="table-ressenti">
                            <?php
                                $phy_value = get_field( 'genre_physiologie' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 7 -->
                    <tr>
                        <td colspan="2">Modalité du sommeil</td>
                        <td>Attirance: femme/homme</td>
                        <td class="table-attirance">
                            <?php
                                $phy_value = get_field( 'genre_attirance' );
                                echo round( (int)$phy_value, -1 );
                            ?>
                        </td>
                    </tr>

                    <!-- 8  -->
                    <tr>
                        <td>
                            Humeur
                        </td>
                        <td>
                            <?php $sommeil = get_field( 'sommeil' ); ?>
                            <?php if ( $sommeil ) : ?>
                                <?php $get_terms_args = array(
                                    'taxonomy' => 'modalite_sommeil',
                                    'hide_empty' => 0,
                                    'include' => $sommeil,
                                ); ?>
                                <?php $terms = get_terms( $get_terms_args ); ?>
                                <?php if ( $terms ) : ?>
                                    <?php foreach ( $terms as $term ) : ?>
                                        <?php echo esc_html( $term->name ); ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td colspan="2"></td>
                    </tr>

                    <!-- 9 -->
                    <tr>
                        <td>Sens</td>
                        <td>
                            <?php $sens = get_field( 'sens' ); ?>
                            <?php if ( $sens ) : ?>
                                <?php $get_terms_args = array(
                                    'taxonomy' => 'modalite_sens',
                                    'hide_empty' => 0,
                                    'include' => $sens,
                                ); ?>
                                <?php $terms = get_terms( $get_terms_args ); ?>
                                <?php if ( $terms ) : ?>
                                    <?php foreach ( $terms as $term ) : ?>
                                        <?php echo esc_html( $term->name ); ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td>Langues maternelle</td>
                        <td class="table-langue"><?php the_field( 'langes_maternelles' ); ?></td>
                    </tr>

                    <!-- 10 -->
                    <tr>
                        <td>Lieu</td>
                        <td>
                            <?php $lieu = get_field( 'lieu' ); ?>
                            <?php if ( $lieu ) : ?>
                                <?php $get_terms_args = array(
                                    'taxonomy' => 'modalite_lieu',
                                    'hide_empty' => 0,
                                    'include' => $lieu,
                                ); ?>
                                <?php $terms = get_terms( $get_terms_args ); ?>
                                <?php if ( $terms ) : ?>
                                    <?php foreach ( $terms as $term ) : ?>
                                        <?php echo esc_html( $term->name ); ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endif; ?>

                        </td>
                        <td>Pays d'enfance</td>
                        <td class="table-pays-enfance"><?php the_field( 'pays_denfance' ); ?></td>
                    </tr>

                    <!-- 11 -->
                    <tr>
                        <td colspan="2">Souvenir du rêve</td>
                        <td colspan="2">Milieux</td>
                    </tr>

                    <!-- 12 -->
                    <tr>
                        <td>Où?</td>
                        <td><?php the_field( 'ou' ); ?></td>
                        <td>Origine: modeste/aisé</td>
                        <td class="table-milieu-origine">
                            <?php
                                $phy_value = get_field( 'milieux_origine' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 12 -->
                    <tr>
                        <td>Quand?</td>
                        <td><?php the_field( 'quand' ); ?></td>
                        <td>Actuel: modeste/aisé</td>
                        <td class="table-milieu-actuel">
                            <?php
                                $phy_value = get_field( 'milieux_actuel' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 13 -->
                    <tr>
                        <td>Comment?</td>
                        <td><?php the_field( 'comment' ); ?></td>
                        <td colspan="2">Rapport au travail</td>
                    </tr>

                    <!-- 14 -->
                    <tr>
                        <td id="start" rowspan="8" colspan="2"><?php the_field( 'contenu_texte' ); ?></td>
                        <td>travailleur/patron</td>
                        <td class="table-travail-1">
                            <?php
                                $phy_value = get_field( 'rapport_au_travail_metier' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 15 -->
                    <tr>
                        <td>indépendant/salarié</td>
                        <td class="table-travail-2">
                            <?php
                                $phy_value = get_field( 'rapport_au_travail_type' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 16 -->
                    <tr>
                        <td>ne travaille pas</td>
                        <td class="table-travail-3"><?php
                                $value_travail = get_field( 'ne_travaille_pas' );
                                if ( $value_travail ) {
                                    echo 'Ne travaille pas';
                                } else {
                                    echo 'Travaille';
                                }
                            ?>
                        </td>
                    </tr>

                    <!-- 17 -->
                    <tr>
                        <td colspan="2">Relation à un paysage</td>
                    </tr>

                    <!-- 18 -->
                    <tr>
                        <td>Enfance: ville/campagne</td>
                        <td class="table-paysage-enfance">
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_enfance_ville_campagne' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 19 -->
                    <tr>
                        <td>Enfance: plaine/montagne</td>
                        <td class="table-relief-enfance">
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_enfance_plaine_montage' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 20 -->
                    <tr>
                        <td>Enfance: Zone humide/zone sèche</td>
                        <td class="table-zone-enfance">
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_enfance_humide_seche' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 21 -->
                    <tr>
                        <td>Actuelle: ville/campagne</td>
                        <td class="table-paysage-actuel">
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_actuelle_ville_campagne' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <!-- 22 -->
                    <tr>
                        <td colspan="2" rowspan="15" id="start-dessin" style="background-image: url('<?php the_field( 'contenu_dessin' ); ?>')">
                            <img width="0" height="0" src="<?php the_field( 'contenu_dessin' ); ?>">
                        </td>
                        <td>Actuelle: plaine/montagne</td>
                        <td class="table-relief-actuel">
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_actuelle_plaine_montage' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 23 -->
                    <tr>

                        <td>Actuelle: Zone humide/zone sèche</td>
                        <td class="table-zone-actuel">
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_actuelle_humide_seche' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 24 -->
                    <tr>

                        <td colspan="2">Attirance</td>
                    </tr>

                    <!-- 25 -->
                    <tr>

                        <td>ville/campagne</td>
                        <td class="table-attirance-paysage">
                            <?php
                                $phy_value = get_field( 'attirance_ville_campagne' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 26 -->
                    <tr>

                        <td>plaine/montagne</td>
                        <td class="table-relief-attirance">
                            <?php
                                $phy_value = get_field( 'attirance_plaine_montagne' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 27 -->
                    <tr>

                        <td>zone humide/zone sèche</td>
                        <td class="table-zone-attirance">
                            <?php
                                $phy_value = get_field( 'attirance_humide_seche' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 28 -->
                    <tr>

                        <td colspan="2">Foi spirituelle</td>
                    </tr>

                    <!-- 29 -->
                    <tr>

                        <td>origine</td>
                        <td class="table-foi-origine"><?php the_field( 'foi_spirituel_origine' ); ?></td>
                    </tr>

                    <!-- 30 -->
                    <tr>

                        <td>Actuelle</td>
                        <td class="table-foi-actuelle"><?php the_field( 'foi_spirituel_actuelle' ); ?></td>
                    </tr>

                    <!-- 31 -->
                    <tr>

                        <td colspan="2">Relation au sommeil</td>
                    </tr>

                    <!-- 32 -->
                    <tr>

                        <td>bon sommeil/dormeur précaire</td>
                        <td class="table-sommeil-dodo">
                            <?php
                                $phy_value = get_field( 'relation_au_sommeil_bon_mauvais' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 33 -->
                    <tr>

                        <td>j'aime dormir/je m'en passe</td>
                        <td class="table-sommeil-dodo-2">
                            <?php
                                $phy_value = get_field( 'relation_au_sommeil_appreciation_du_sommeil' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 34 -->
                    <tr>

                        <td colspan="2">Relation aux rêves</td>

                    </tr>

                    <!-- 35 -->
                    <tr>

                        <td>rêveur riche / peu rêveur</td>
                        <td class="table-relation-reve-1">
                            <?php
                                $phy_value = get_field( 'relation_aux_reves_reveur_non' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 36 -->
                    <tr>

                        <td>essentiel/ je m'en passe</td>
                        <td class="table-relation-reve-2">
                            <?php
                                $phy_value = get_field( 'relation_aux_reves_important_non' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                </table>
            </div>







    <?php endwhile; endif; wp_reset_postdata(); ?> <!-- WP_Query for CPT project -->
</div>

