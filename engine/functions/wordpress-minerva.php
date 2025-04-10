<?php

function add_minerva_menu() {
    add_menu_page(
        'Minerva',
        'Minerva',  
        'edit_pages',
        'minerva',
        'minerva_ui',
        'dashicons-admin-generic',
        20
    );
}
add_action('admin_menu', 'add_minerva_menu');

function add_minerva_cta($post)
{
    $minerva_url = admin_url('admin.php?page=minerva&post_id=' . $post->ID);
    echo '<div style="text-align: center; padding: 20px;">';
    echo '<a href="' . esc_url($minerva_url) . '" class="button button-large" style="font-size: 18px; padding: 12px 24px;">Open Minerva</a>';
    echo '</div>';
}
function minerva_custom_editor(){add_action('edit_form_after_title', 'add_minerva_cta'); }
add_action('admin_init', 'minerva_custom_editor');

?>