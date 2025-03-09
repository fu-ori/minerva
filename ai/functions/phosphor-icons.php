<?php

function enqueue_phosphor_icons() {
    wp_enqueue_script('phosphor-icons', 'https://unpkg.com/@phosphor-icons/web@2.1.1', array(), null, true);
}

add_action('wp_enqueue_scripts', 'enqueue_phosphor_icons');
add_action('admin_enqueue_scripts', 'enqueue_phosphor_icons');

?>