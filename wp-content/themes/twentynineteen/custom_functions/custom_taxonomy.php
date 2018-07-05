<?php

function custom_taxonomy(){

    $labels = array(
        'name'  => 'custom taxonomy'
    );

    $args = array(
        'hierarchical'  => true,
        'labels'        => $labels,
        'query_var'     => true
    );

    register_taxonomy( 'CustomTaxo', 'post', $args );

}

add_action('init', 'custom_taxonomy');