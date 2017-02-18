<?php get_header(); ?>

<div id="page" class="mainContent full-panel">

    <img class="img-responsive" src="<?=get_template_directory_uri()."/images/11-2.jpg"?>"/>

    <div class="in-panel">

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

<?php get_footer(); ?>