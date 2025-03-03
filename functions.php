<?php

// Desativa o Gutenberg e ativa o Editor Clássico
add_filter('use_block_editor_for_post', '__return_false', 10);

function minerva_replace_editor_with_button($post)
{
    // Obtém a URL da página do Minerva Builder
    $minerva_url = admin_url('admin.php?page=minerva&post_id=' . $post->ID);

    echo '<div style="text-align: center; padding: 20px;">';
    echo '<a href="' . esc_url($minerva_url) . '" class="button button-large" style="font-size: 18px; padding: 12px 24px;">Open Minerva</a>';
    echo '</div>';
}

// Remove o editor de texto padrão e insere o botão "Minerva"
function minerva_custom_editor()
{
    add_action('edit_form_after_title', 'minerva_replace_editor_with_button');
}
add_action('admin_init', 'minerva_custom_editor');

// Criar a página do Minerva Builder no admin
function minerva_create_builder_page() {
    add_menu_page(
        'Minerva',      // Nome da página
        'Minerva',      // Nome no menu
        'edit_pages',           // Permissão necessária
        'minerva',      // Slug da página
        'minerva_builder_callback', // Função que renderiza o editor
        'dashicons-admin-generic',  // Ícone do menu (opcional)
        20                      // Posição no menu
    );
}
add_action('admin_menu', 'minerva_create_builder_page');

// Renderizar a página do Minerva Builder
function minerva_builder_callback() {
    if (!isset($_GET['post_id'])) {
        echo '<h2>Erro: Nenhuma página selecionada.</h2>';
        return;
    }

    $post_id = intval($_GET['post_id']);
    
    echo '<div class="wrap">';
    echo '<h1>Minerva</h1>';
    echo '<p>Editando a página ID: ' . esc_html($post_id) . '</p>';
    echo '<div id="minerva-editor" style="border: 1px solid #ccc; padding: 20px; background: #f9f9f9;">';
    echo '<p>Aqui será carregado o novo editor visual...</p>';
    echo '</div>';
    echo '</div>';

    // Adicione um script para iniciar o editor futuramente
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("minerva-editor").innerHTML = "<h2>Editor Minerva Carregado!</h2>";
        });
    </script>';
}

?>