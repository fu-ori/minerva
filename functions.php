<?php

include 'minerva/functions/remove-wordpress-ui.php';
include 'minerva/functions/minerva-menus.php';
include 'minerva/functions/wordpress-ajax.php';
include 'minerva/functions/phosphor-icons.php';

// ██████████████████████████████████████████████

// minerva creator UI

// ██████████████████████████████████████████████
add_filter('use_block_editor_for_post', '__return_false', 10);
function minerva_ui() 
{

    // defaults
    if (!isset($_GET['post_id'])) {
        echo '<h2>Erro: Nenhuma página selecionada.</h2>';
        return;
    }
    $post_id = intval($_GET['post_id']);
    $minerva_content = get_post_meta($post_id, '_minerva_content', true);

    // minerva blocks and stage
    echo '<div class="minerva-ui">';
    echo '<div id="minerva-stage">' . (!empty($minerva_content) ? $minerva_content : '') . '</div>';
    echo '<div id="minerva-blocks">
    <ul>
    <li class="draggable-block" draggable="true" data-content="<p>Novo Parágrafo</p>">Parágrafo</li>
    <li class="draggable-block" draggable="true" data-content="<h2>Título Novo</h2>">Título</li>
    </ul>
    </div>';
    echo '</div><button id="minerva-go">publicar</button>';

    // add scripts and ajax
    wp_enqueue_style('minerva-ui', get_template_directory_uri() . '/minerva/minerva-ui.css?v01', array(), null, 'all');
    wp_enqueue_script('minerva', get_template_directory_uri() . '/minerva/minerva.js?v01', array('jquery'), null, true);
    wp_localize_script('minerva', 'minervaData', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'post_id'  => $post_id,
        'nonce'    => wp_create_nonce('minerva_save_content')
    ));

}

?>