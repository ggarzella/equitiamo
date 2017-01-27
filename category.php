<?php get_header(); ?>

<div class="nav-menu-separator" id="blog">

    <div class="in-panel">

        <?php
            $query = equitiamo_get_blog_post();

            if ($query->have_posts()):

                equitiamo_paginate_links();

                while ($query->have_posts()):

                    $query->the_post();
        ?>
                        <div class="post-container">
                            <div class="col-md-12 col-xs-12 title">
                                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                            </div>
                            <?php get_template_part('includes/blog', 'details'); ?>
                            <div class="col-md-12 col-xs-12 content">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>

                    <?php

                    echo '<div class="col-md-12 col-xs-12 post-divisor"></div>';

                endwhile;

            endif;
        ?>

    </div>

</div>

<?php get_footer(); ?>