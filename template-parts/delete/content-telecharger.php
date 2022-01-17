<div class="container--reve-to-download">
    <?php
    // get the user name
    // https://www.intelliwolf.com/get-author-id-from-post-id/

    // $post_id = get_the_ID();
    $post_id = 135;
    $author_id = get_post_field( 'post_author', $post_id );
    $author_name = get_the_author_meta( 'user_nicename', $author_id );

        $args = array(
            'author'        =>  $author_id,
            'post_type' => [ 'reveur_info', 'reve' ],
            'p' => $post_id,
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
                <table class="table--print-reve" id="print--<?php echo $i; ?>">
                    <tr>
                        <td>Donnée du rêve</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp;Numéro du rêve</td>
                        <td><?php echo $i ?></td>
                    </tr>
                    <tr>
                        <td>Titre du rêve</td>
                        <td class="table--print-title"><?php echo get_the_title(); ?></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><?php echo get_the_date( 'd/m/Y' );?></td>
                    </tr>
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
                    </tr>
                    <tr>
                        <td>Niveau de lucidité du rêve</td>
                        <td>
                        <!-- niveau de lucidité -->
                        <?php if ( $term_lucidite ) : ?>
                            <?php echo esc_html( $term_lucidite->name ); ?>
                        <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Modalité du sommeil</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Aliments</td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;Humeur</td>
                        <td>
                        <?php $hummeur = get_field( 'hummeur' ); ?>
                        <?php if ( $hummeur ) : ?>
                            <?php $get_terms_args = array(
                                'taxonomy' => 'modalite_humeur',
                                'hide_empty' => 0,
                                'include' => $hummeur,
                            ); ?>
                            <?php $terms = get_terms( $get_terms_args ); ?>
                            <?php if ( $terms ) : ?>
                                <?php foreach ( $terms as $term ) : ?>
                                   <?php echo esc_html( $term->name ); ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;Sens</td>
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
                    </tr>
                    <tr>
                        <td>&nbsp;Lieu</td>
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
                    </tr>
                    <tr>
                        <td>Souvenir du rêve&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;Où ?</td>
                        <td><?php the_field( 'ou' ); ?></td>
                    </tr>
                    <tr>
                        <td>Quand ?&nbsp;</td>
                        <td><?php the_field( 'quand' ); ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;Comment ?</td>
                        <td><?php the_field( 'comment' ); ?></td>
                    </tr>
                </table>
            </div>
    <?php endwhile; endif; wp_reset_postdata(); ?> <!-- WP_Query for CPT project -->

    <?php
        $args = array(
            'author'        =>  $author_id,
            'post_type' => 'reveur_info',
            'posts_per_page' => -1,
        );
        $home_projects = new WP_Query( $args );
        if ( $home_projects->have_posts() ) : $i = 0; while ( $home_projects->have_posts() ) : $home_projects->the_post(); $i++;
    ?>
            <div class="reve--to-print" id="author--print<?php echo $i ?>">
                <table class="table--print-author" id="author--<?php echo $i; ?>">
                    <tr>
                        <td>Données du compte</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp;Pseudo</td>
                        <td><?php echo $author_name; ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;Age</td>
                        <td><?php the_field( 'age' ); ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;Genre</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Physiologie: Femme / Homme&nbsp;</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'genre_physiologie' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Ressenti: Femme / Homme&nbsp;</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'genre_ressenti' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;Attirance: Femme / Homme</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'genre_attirance' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Langue Maternelle&nbsp;</td>
                        <td><?php the_field( 'langes_maternelles' ); ?></td>
                    </tr>
                    <tr>
                        <td>Pays d'enfance&nbsp;</td>
                        <td><?php the_field( 'pays_denfance' ); ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;Milieux</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Origine: Modeste / Aisée&nbsp;</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'milieux_origine' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;Actuel: Modeste / Aisée</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'milieux_actuel' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Rapport au travail&nbsp;</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Travailleur / Patron&nbsp;</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'rapport_au_travail_metier' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Indépendant / Salarié&nbsp;</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'rapport_au_travail_type' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;Ne travaille pas</td>
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
                    <tr>
                        <td>&nbsp;Relation à un paysage</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;Enfance: Ville / Campagne</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_enfance_ville_campagne' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;Enfance: Plaine / Campagne</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_enfance_plaine_montage' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;Enfance: Zone humide / Zone sèche</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_enfance_humide_seche' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Actuelle: Ville / Campagne&nbsp;</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_actuelle_ville_campagne' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Actuelle:&nbsp; Plaine / Campagne&nbsp;</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_actuelle_ville_campagne' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Actuelle: Zone humide / Zone sèche&nbsp;</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_a_un_paysage_actuelle_humide_seche' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Attirance: Ville / Campagne&nbsp;</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp;Attirance: Plaine / Campagne</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'attirance_ville_campagne' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;Attirance: Zone humide / Zone sèche</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'attirance_plaine_montagne' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Foi spirituelle&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;Origine</td>
                        <td><?php the_field( 'foi_spirituel_origine' ); ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;Actuelle</td>
                        <td><?php the_field( 'foi_spirituel_actuelle' ); ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;Relation au sommeil</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Bon sommeil / Dormeur précaire&nbsp;</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_au_sommeil_bon_mauvais' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>J'aime dormir / Je m'en passe&nbsp;</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_au_sommeil_appreciation_du_sommeil' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Relation aux rêves&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;Rêve riche / Peu rêveur</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_aux_reves_reveur_non' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;Essentiel / Je m'en passe</td>
                        <td>
                            <?php
                                $phy_value = get_field( 'relation_aux_reves_important_non' );
                                echo round( (int)$phy_value, -1);
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </div>
    <?php endwhile; endif; wp_reset_postdata(); ?> <!-- WP_Query for CPT project -->
</div>
