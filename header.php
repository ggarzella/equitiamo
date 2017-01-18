<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
        <meta name="description" content="<?php bloginfo('description'); ?>" />

        <title><?php wp_title( '|', true, 'right' ); ?></title>

        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <?php wp_head(); ?>

        <script type="text/javascript" src="<?=get_template_directory_uri() ?>/js/header.js"></script>

    </head>

    <body data-spy="scroll" data-target="#my-navbar">
