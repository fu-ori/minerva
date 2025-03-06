<?php
get_header();

// Obtém o ID da página atual
$post_id = get_the_ID();

// Recupera o conteúdo salvo no banco de dados
$minerva_content = get_post_meta($post_id, '_minerva_content', true);

?>
<style>
    body{
        font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }
</style>
<section>
    <?php
    // Se houver conteúdo salvo pelo editor Minerva, exibe ele
    if (!empty($minerva_content)) {
        echo '<div id="minerva-content">' . $minerva_content . '</div>';
    } else {
        // Se não houver conteúdo salvo, exibe o conteúdo padrão do post
        the_content();
    }
    ?>
</section>

<?php get_footer(); ?>
