<?php

function add_style() {
    wp_enqueue_style('my-style', get_stylesheet_uri(), array(), time());
}
add_action('wp_enqueue_scripts', 'add_style'); 

function add_bulma( $hook ) {
    if ( isset($_GET['page']) && $_GET['page'] === 'minerva' ) {
        global $wp_styles;

        if ( isset( $wp_styles ) ) {
            foreach ( $wp_styles->queue as $handle ) {
                wp_dequeue_style( $handle );
                wp_deregister_style( $handle );
            }
        }

        wp_enqueue_style( 'bulma-css', 'https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css', array(), '1.0.2' );
    }
}
add_action( 'admin_enqueue_scripts', 'add_bulma', 9999 );

?>
