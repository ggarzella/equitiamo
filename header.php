<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
        <meta name="description" content="<?php bloginfo('description'); ?>" />

        <title><?php wp_title( '|', true, 'right' ); ?></title>

        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <?php wp_head(); ?>
        <script type="text/javascript" src="<?=get_template_directory_uri() ?>/js/header.js"></script>

    </head>

    <body>

        <div class="container-fluid">

            <div class="row">

                <div class="col-xs-12 col-md-12 nopadding">

                    <?php if(is_home()): ?>

                        <div class="row" id="logo-container">

                            <div class="col-md-4 col-xs-4 col-md-offset-4 col-xs-offset-4">

                                <img class="img-responsive" src="<?=get_template_directory_uri() ?>/images/logo.png">

                            </div>

                        </div>

                    <?php endif; ?>

                    <div class="row navbar-container">

                        <div class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2"/>

                            <?php is_home() ? equitiamo_show_menu('equitiamo-index') : equitiamo_show_menu('equitiamo-page'); ?>
                        </div>

                    </div>
