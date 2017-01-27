<?php get_header(); ?>

<?php equitiamo_show_menu('equitiamo-page'); ?>

<div id="page">

    <img class="img-responsive" src="<?=get_template_directory_uri()."/images/11-2.jpg"?>"/>

</div>

<div class="container-fluid">

    <div class="in-panel" id="single">

        <?php

            if ( have_posts() ):

                while (have_posts()):

                the_post();
        ?>
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_content(); ?></p>
        <?php

                endwhile;

            endif;

        ?>

    </div>

<?php get_footer(); ?>