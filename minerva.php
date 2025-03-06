<?php

function minerva_ui() {
    // Verifica se o post_id foi passado
    if (!isset($_GET['post_id'])) {
        echo '<h2>Erro: Nenhuma página selecionada.</h2>';
        return;
    }

    // Obtém o post_id e o conteúdo armazenado
    $post_id = intval($_GET['post_id']);
    $minerva_content = get_post_meta($post_id, '_minerva_content', true);

    // Exibe a interface do Minerva
    echo '<div class="minerva-ui">';
    echo '<div id="minerva-editor">' . (!empty($minerva_content) ? $minerva_content : '') . '</div>';
    echo '<div id="minerva-blocks">
    <ul>
    <li class="draggable-block" draggable="true" data-content="<p>Novo Parágrafo</p>">Parágrafo</li>
    <li class="draggable-block" draggable="true" data-content="<h2>Título Novo</h2>">Título</li>
    </ul>
    </div>';
    echo '</div><button id="minerva-go">publicar</button>';

    // Enfileira o script JavaScript principal
    wp_enqueue_style('minerva-ui', get_template_directory_uri() . '/minerva/minerva-ui.css', array(), null, 'all');
    wp_enqueue_script('minerva-editor', get_template_directory_uri() . '/minerva/minerva.js', array('jquery'), null, true);

    // Passa dados do PHP para o JavaScript
    wp_localize_script('minerva-editor', 'minervaData', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'post_id'  => $post_id,
        'nonce'    => wp_create_nonce('minerva_save_content')
    ));
}

?>