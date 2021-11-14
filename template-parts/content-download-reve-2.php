<div class="container--reve-to-download">

    <button class="download-reve">Télécharger le rêve</button>

    <?php

    // $custom_post = 631;


    // get the user name
    // https://www.intelliwolf.com/get-author-id-from-post-id/
    $author_id = get_post_field( 'post_author', $custom_post );
    $author_name = get_the_author_meta( 'user_nicename', $author_id );

    // get the user_info page from the name
    echo '<div class="test-print-user-info">';
    echo "l'ID de l'auteur est $author_id";
    echo '<br>';
    echo "le nom de l'auteur est $author_name";
    echo '<br>';
    echo '</div>';


        $args = array(
            'author'        =>  $author_id,
            'post_type' => [ 'reveur_info', 'reve' ],
            // 'p' => $custom_post,
            'posts_per_page' => -1,
        );

        $home_projects = new WP_Query( $args );

        if ( $home_projects->have_posts() ) : $i = 0; while ( $home_projects->have_posts() ) : $home_projects->the_post(); $i++;

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


    ?>

            <div class="reve--to-print" id="reve--print<?php echo $i ?>">
                <table class="table--print" id="print--<?php echo $i; ?>">
                    <!-- 1 -->
                    <tr>
                        <td>Donnée du rêve</td>
                        <td>
                            <span class="article-header-author"><?php echo get_the_author_meta( 'nickname', false ); ?></span> - <span class="article-header-date"><?php echo get_the_date( 'd/m/Y' );?></span>
                        </td>
                        <td>Donnée du compte</td>
                        <td></td>
                    </tr>

                    <!-- 2 -->
                    <tr>
                        <td>Numéro du rêve</td>
                        <td><?php echo $i ?></td>
                        <td>Pseudo</td>
                        <td>
                            <?php the_author_meta( 'nickname' , false ); ?>
                        </td>
                    </tr>

                    <!-- 3 -->
                    <tr>
                        <td>Titre du rêve</td>
                        <td class="table--print-title"><?php echo get_the_title(); ?></p></td>
                        <td>Age</td>
                        <td><?php the_field( 'age' ); ?></td>
                    </tr>

                    <!-- 4 -->
                    <tr>
                        <td>Date</td>
                        <td><?php echo get_the_date( 'd/m/Y' );?></td>
                        <td>Genre</td>
                        <td></td>
                    </tr>

                    <!-- 5 -->
                    <tr>
                        <td>Typologie du rêve</td>
                        <td>
                            <?php if ( $term_typologie ) : ?>
                                <?php if ( $term_typologie->name === 'Cauchemar' ) : ?>
                                    <?php echo esc_html( $term_typologie->name ); ?>
                                <?php endif; ?>

                                <?php if ( $term_typologie->name === 'Rêve Concomitant' ) : ?>
                                    <?php echo esc_html( $term_typologie->name ); ?>
                                <?php endif; ?>

                                <?php if ( $term_typologie->name === 'Rêve Créatif' ) : ?>
                                    <?php echo esc_html( $term_typologie->name ); ?>
                                <?php endif; ?>

                                <?php if ( $term_typologie->name === 'Rêve d\'actualité' ) : ?>
                                    <?php echo esc_html( $term_typologie->name ); ?>
                                <?php endif; ?>

                                <?php if ( $term_typologie->name === 'Rêve lucide') : ?>
                                    <?php echo esc_html( $term_typologie->name ); ?>
                                <?php endif; ?>

                                <?php if ( $term_typologie->name === 'Rêve prémonitoire') : ?>
                                    <?php echo esc_html( $term_typologie->name ); ?>
                                <?php endif; ?>

                                <?php if ( $term_typologie->name === 'Rêve Récurrent') : ?>
                                    <?php echo esc_html( $term_typologie->name ); ?>
                                <?php endif; ?>

                                <?php if ( $term_typologie->name === 'Rêve sexuel') : ?>
                                    <?php echo esc_html( $term_typologie->name ); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td>Physiologie: femme/homme</td>
                        <td>
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
                        <td>
                            <?php
                                $phy_value = get_field( 'genre_physiologie' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 7 -->
                    <tr>
                        <td>Modalité du sommeil</td>
                        <td>coucou</td>
                        <td>Attirance: femme/homme</td>
                            <td>&nbsp;</td>
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
                        <td></td>
                        <td></td>
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
                        <td><?php the_field( 'langes_maternelles' ); ?></td>
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
                        <td><?php the_field( 'pays_denfance' ); ?></td>
                    </tr>

                    <!-- 11 -->
                    <tr>
                        <td>Souvenir du rêve</td>
                        <td></td>
                        <td>Milieux</td>
                        <td></td>
                    </tr>

                    <!-- 12 -->
                    <tr>
                        <td>Où?</td>
                        <td><?php the_field( 'ou' ); ?></td>
                        <td>Origine: modeste/aisé</td>
                        <td>
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
                        <td>
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
                        <td>Rapport au travail</td>
                        <td></td>
                    </tr>

                    <!-- 14 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>travailleur/patron</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'rapport_au_travail_metier' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 15 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>indépendant/salarié</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'rapport_au_travail_type' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 16 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>ne travaille pas</td>
                        <td><?php
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
                        <td></td>
                        <td></td>
                        <td>Relation à un paysage</td>
                        <td></td>
                    </tr>

                    <!-- 18 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Enfance: ville/campagne</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_enfance_ville_campagne' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 19 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Enfance: plaine/montagne</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_enfance_plaine_montage' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 20 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Enfance: Zone humide/zone sèche</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_enfance_humide_seche' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 21 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Actuelle: ville/campagne</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_actuelle_ville_campagne' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 22 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Actuelle: plaine/montagne</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_actuelle_plaine_montage' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 23 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Actuelle: Zone humide/zone sèche</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_actuelle_humide_seche' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 24 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Attirance</td>
                        <td></td>
                    </tr>

                    <!-- 25 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>ville/campagne</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'attirance_ville_campagne' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 26 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>plaine/montagne</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'attirance_plaine_montagne' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 27 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>zone humide/zone sèche</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'attirance_humide_seche' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                        <td></td>
                    </tr>

                    <!-- 28 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Foi spirituelle</td>
                        <td></td>
                    </tr>

                    <!-- 29 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>origine</td>
                        <td><?php the_field( 'foi_spirituel_origine' ); ?></td>
                    </tr>

                    <!-- 30 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Actuelle</td>
                        <td><?php the_field( 'foi_spirituel_actuelle' ); ?></td>
                    </tr>

                    <!-- 31 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Relation au sommeil</td>
                        <td></td>
                    </tr>

                    <!-- 32 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>bon sommeil/dormeur précaire</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_au_sommeil_bon_mauvais' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 33 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>j'aime dormir/je m'en passe</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_au_sommeil_appreciation_du_sommeil' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 34 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Relation aux rêves</td>
                        <td></td>

                    </tr>

                    <!-- 35 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>rêveur riche / peu rêveur</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_aux_reves_reveur_non' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>

                    <!-- 36 -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>essentiel/ je m'en passe</td>
                        <td>
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

