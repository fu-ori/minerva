<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <?php wp_head(); ?>

        <title><?php wp_title('•', true, 'right'); ?></title>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    </head>
    <body <?php body_class(); ?>>