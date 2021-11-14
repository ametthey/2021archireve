<?php
    // CHANGE VALUE SOURCE
    $user_id_1 = get_current_user_id();
    $user = wp_get_current_user();
    $user_id_2 = $user->ID;
    $post_id = get_the_ID();

    $mypost = get_page_by_title('chevaldore', OBJECT, 'reveur_info');
    // print_r($mypost);

    if ( is_user_logged_in() ) {
        // echo '<div class="user--id">L\'ID de l\'utilisateur est ' . $user_id_1 . '';
        // echo '<div class="user--id">L\'ID de l\'utilisateur est ' . $user_id_2 . '<br>L\'ID de la page est ' . $page_id . '</div>';
        // echo $mypost;
    } else {
        // Silence is golden;
    }



?>
