<?php

// Custom Meta Box
function custom_meta_box_tutorial(){
    add_meta_box(
        'custom-meta-box-fav-id',
        'What is your favorite ?',
        myFavMetaBox,
        'servicesUniqueId',
        'normal'
    );

    add_meta_box(
        'custom-meta-box-hated-id',
        'What is your hated ?',
        myHatedMetaBox,
        array('servicesUniqueId', 'sliderUniqueId'),
        'normal'
    );
}

add_action('add_meta_boxes', 'custom_meta_box_tutorial');

// Here $post is a global variable, don't change it.
function myFavMetaBox($post){
    ?>
    <label for="fav_food">Please type your fav food : </label>
    <p><input type="text" name="fav_food" id="fav_food" class="regular-text" placeholder="Food Name" value="<?php echo get_post_meta($post->ID, 'fav_food', true); ?>"></p>

    <label for="fav_actress">Please type your fav Actress : </label>
    <p><input type="text" name="fav_actress" id="fav_actress" class="regular-text" placeholder="Actress Name" value="<?php echo get_post_meta($post->ID, 'fav_actress', true); ?>"></p>
    <?php
}

function custom_meta_box_fav_save_and_update_result($post_id){
    update_post_meta($post_id, 'fav_food', $_POST['fav_food']);
    update_post_meta($post_id, 'fav_actress', $_POST['fav_actress']);
}

add_action('save_post', 'custom_meta_box_fav_save_and_update_result');

// Here $post is a global variable, don't change it.
function myHatedMetaBox($post){
    ?>
    <label for="hated_food">Please type your hated food : </label>
    <p><input type="text" name="hated_food" id="hated_food" class="regular-text" placeholder="Food Name" value="<?php echo get_post_meta($post->ID, 'hated_food', true); ?>"></p>

    <label for="hated_actress">Please type your hated Actress : </label>
    <p><input type="text" name="hated_actress" id="hated_actress" class="regular-text" placeholder="Actress Name" value="<?php echo get_post_meta($post->ID, 'hated_actress', true); ?>"></p>
    <?php
}

function custom_meta_box_hated_save_and_update_result($post_id){
    update_post_meta($post_id, 'hated_food', $_POST['hated_food']);
    update_post_meta($post_id, 'hated_actress', $_POST['hated_actress']);
}

add_action('save_post', 'custom_meta_box_hated_save_and_update_result');