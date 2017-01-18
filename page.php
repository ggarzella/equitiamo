<?php get_header(); ?>

<?php equitiamo_show_menu('equitiamo-page'); ?>

<div class="full-panel" id="page">

    <img class="img-responsive" src="<?=get_template_directory_uri()."/images/11-2.jpg"?>"/>

</div>

<div class="container-fluid">

    <div class="row">

        <div class="col-md-12 full-panel single">

            <div class="in-panel" id="attivita">

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

        </div>

    </div>

<?php get_footer(); ?>