<?php

add_filter('use_block_editor_for_post', '__return_false', 10);

include 'minerva/functions/remove-wordpress-ui.php';
include 'minerva/functions/minerva-cta.php';


// ██████████████████████████████████████████████ minerva admin menu
function minerva_create_builder_page() {
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
add_action('admin_menu', 'minerva_create_builder_page');



// Adiciona as ações do WordPress para processar o AJAX
add_action('wp_ajax_save_minerva_content', 'minerva_save_content');

// ██████████████████████████████████████████████

// save the content

// ██████████████████████████████████████████████

function minerva_save_content() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'minerva_save_content')) {
        wp_send_json_error(['message' => 'Nonce inválido.']);
        return;
    }
    if (!current_user_can('edit_pages')) {
        wp_send_json_error(['message' => 'Sem permissão para editar.']);
        return;
    }
    $post_id = intval($_POST['post_id']);
    $content = wp_kses_post($_POST['content']);
    if (update_post_meta($post_id, '_minerva_content', $content)) {
        wp_send_json_success(['message' => 'Conteúdo salvo com sucessxxxo!']);
    } else {
        wp_send_json_error(['message' => 'Erro ao salvar o conteúdo.']);
    }
}


// ██████████████████████████████████████████████

// minerva UI

// ██████████████████████████████████████████████

include 'minerva.php';

?>