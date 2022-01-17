<?php
    function changeDate( $user_id ){
        global $wpdb;

        $format = 'Y-m-d H:i:s'; // Format that wordpress uses to save dates

        // Using $wpdb grab all of the posts that we want to update

        $post_type = 'reveur_info'; //change this to your custom post type
        $post_status = 'publish'; // we only want to change published posts
        $query = "SELECT ID, post_date, post_date_gmt FROM $wpdb->posts WHERE post_type = '$post_type' AND post_status = '$post_status'";
        $posts = $wpdb->get_results( $query );

        // This loop will handle the date changing using wp_update_post
        echo '<script>console.log("';
        foreach( $posts as $post ){

            $id = $post->ID;
            $old_date = $post->post_date;

            echo $old_date . ' ';

            // get the old dates
            $old_date = $post->post_date;
            $old_gmt_date = $post->post_date_gmt;
            //
            // // create the new dates and correctly format the new date before saving it to the database
            $new_date = date( $format, strtotime( '-5 year' , strtotime( $old_date ) ) );
            $new_date_gmt = date( $format, strtotime( '-4 year' , strtotime( $old_gmt_date ) ) );

            $new_values = array (
                'ID' => $id,
                'post_date' => $new_date,
                'post_date_gmt' => $new_date_gmt
            );

            wp_update_post( $new_values );

        }
        echo '");</script>';
        return;
    }
    add_action( 'user_register', 'changeDate', 10, 1 );
