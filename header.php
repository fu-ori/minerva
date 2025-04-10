<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="light">
    <head>
        <?php wp_head(); ?>

        <title>
            <?php
            if (is_front_page() || is_home()) {
                echo get_bloginfo('name') . ' • ' . get_bloginfo('description');
            } else {
                echo wp_title('•', true, 'right') . get_bloginfo('name');
            }
            ?>
        </title>

        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/engine/bulma-1.0.2.css">
    </head>
    <body <?php body_class(); ?>>