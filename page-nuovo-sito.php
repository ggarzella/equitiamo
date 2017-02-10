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

    <style type="text/css">
        html, body, #wrapper {
            height:100%;
            width: 100%;
            margin: 0;
            padding: 0;
            border: 0;
            overflow: hidden;
        }

        #wrapper td {
            vertical-align: middle;
            text-align: center;
        }

        .centered {
            position: fixed;
            top: 50%;
            left: 50%;
            /* bring your own prefixes */
            transform: translate(-50%, -50%);
        }
    </style>

    <?php wp_head(); ?>

</head>

<body>
    <!--<table id="wrapper">
        <tr>
            <td>
                <img id="coming-soon" src="<?=get_template_directory_uri() ?>/images/logo-under-construction.png"/>
            </td>
        </tr>
    </table>-->
    <img id="coming-soon" class="centered" src="<?=get_template_directory_uri() ?>/images/logo-under-construction.png"/>
</body>
</html>