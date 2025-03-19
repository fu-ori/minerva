<?php

include 'ai/functions/custom-css.php';
include 'ai/functions/phosphor-icons.php';
include 'ai/functions/wordpress-ui.php';
include 'ai/functions/wordpress-minerva.php';
include 'ai/functions/wordpress-ajax.php';

// ████████████████████████████ Page Builder

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
    echo '<div id="minerva-stage">' . (!empty($minerva_content) ? $minerva_content : '') . '</div>';
    echo '<div id="minerva-allblocks">
    <ul>
    <li class="draggable-block" draggable="true" data-content="<p>Novo Parágrafo</p>">Parágrafo</li>
    <li class="draggable-block" draggable="true" data-content="<h2>Título Novo</h2>">Título</li>
    </ul>
    </div>';
    echo '<ul id="minerva-nav">
    <li><button id="minerva-blocks"><i class="ph ph-circles-three-plus"></i></button></li>
    <li><button id="minerva-go"><i class="ph ph-cloud-arrow-up"></i></button></li>
    </ul>';

    // add scripts and ajax
    wp_enqueue_style('minerva-ui', get_template_directory_uri() . '/ai/minerva.css', array(), rand(), 'all');
    wp_enqueue_script('minerva', get_template_directory_uri() . '/ai/minerva.js', array('jquery'), rand(), 'null, true');
    wp_localize_script('minerva', 'minervaData', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'post_id'  => $post_id,
        'nonce'    => wp_create_nonce('minerva_save_content')
    ));

}

// ████████████████████████████████████████████████████████

?>