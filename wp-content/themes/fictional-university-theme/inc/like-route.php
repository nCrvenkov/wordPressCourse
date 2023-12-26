<?php

add_action('rest_api_init', 'universityLikeRoutes');

function universityLikeRoutes(){
    register_rest_route('university/v1', 'manageLike', array(
        'methods' => 'POST',
        //which function we want to use:
        'callback' => 'createLike'
    ));

    register_rest_route('university/v1', 'manageLike', array(
        'methods' => 'DELETE',
        //which function we want to use:
        'callback' => 'deleteLike'
    ));
}


function createLike($data){
    if(is_user_logged_in()){
        $professor = sanitize_text_field($data['professorId']); // passed in ajax data property

        $existQueryy = new WP_Query(array(
            'author' => get_current_user_id(),
            'post_type' => 'like',
            'meta_query' => array(
              array(
                'key' => 'liked_professor_id',
                'compare' => '=',
                'value' => $professor
              )
            )
          ));

        if($existQueryy->found_posts == 0 && get_post_type($professor) == 'professor'){

            // you can return like this because of wp_inser_post
            return wp_insert_post(array(
                'post_type' => 'like',
                'post_status' => 'publish',
                'post_title' => 'Second test',
                'meta_input' => array(
                    'liked_professor_id' => $professor // custom field
                )
            ));
        }
        else{
            die("Invalid professor id");
        }
    }
    else{
        die("Only logged in users can create a like.");
    }
    
}

function deleteLike($data){
    $likeId = sanitize_text_field($data['like']);
    if(get_current_user_id() == get_post_field('post_author', $likeId) && get_post_type($likeId) == 'like'){
        wp_delete_post($likeId, true);
        return 'Congrats, like deleted.';
    }
    else{
        die("You do not have permission to delete that.");
    }
}