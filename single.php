<?php get_header(); ?>

<div class="nav-menu-separator">

    <div class="in-panel" id="single">

        <?php

            if ( have_posts() ):

                while (have_posts()):

                the_post();
        ?>
                <div class="post-container">
                    <div class="col-md-12 col-xs-12 title">
                        <h2><?php the_title(); ?></h2>
                    </div>
                    <?php get_template_part('includes/blog', 'details'); ?>
                    <div class="col-md-12 col-xs-12 content">
                        <p><?php the_content(); ?></p>

                        <?php //comments_template('/comments_template.php'); ?>

                    </div>
                </div>
        <?php

                endwhile;

            endif;

        ?>

    </div>

</div>

<?php get_footer(); ?>