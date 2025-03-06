<?php

function minerva_cta($post)
{
    $minerva_url = admin_url('admin.php?page=minerva&post_id=' . $post->ID);
    echo '<div style="text-align: center; padding: 20px;">';
    echo '<a href="' . esc_url($minerva_url) . '" class="button button-large" style="font-size: 18px; padding: 12px 24px;">Open Minerva</a>';
    echo '</div>';
}
function minerva_custom_editor(){add_action('edit_form_after_title', 'minerva_cta'); }
add_action('admin_init', 'minerva_custom_editor');

?>