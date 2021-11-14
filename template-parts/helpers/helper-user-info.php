<?php
    // CHANGE VALUE SOURCE
    $user_id_1 = get_current_user_id();
    $user = wp_get_current_user();
    $user_id_2 = $user->ID;
    $user_metadata = get_user_meta( $user_id_2 );
    $user_nicename = $user->nicename;
    $post_id = get_the_ID();
    $author_id = get_the_author_meta('ID');


    if ( is_user_logged_in() ) {
        echo '<div class="container--user-data">';
        echo '<label class="switch">';
        echo '<input type="checkbox">';
        echo '<span class="slider round"></span>';
        echo '</label>';
        echo '<div class="user--data">L\'ID de l\'utilisateur est ' . $user_id_2;
        echo '<br>L\'ID de la page est ' . $page_id;
        echo '<br>Le slug de l\'utilisateur est ' . $user_nicename;
        echo '</div>';
        echo '</div>';
    } else {
        // Silence is golden;
    }

    echo '<pre class="container--user-meta">';
    echo print_r($user_metadata);
    echo '</pre>';
?>
