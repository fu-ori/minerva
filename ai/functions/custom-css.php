<?php

function add_style() {
    wp_enqueue_style('my-style', get_stylesheet_uri(), array(), time());
}
add_action('wp_enqueue_scripts', 'add_style'); 

?>
