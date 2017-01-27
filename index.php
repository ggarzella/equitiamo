<?php get_header(); ?>

<div class="container-fluid">

	<div class="row">

		<div class="col-xs-12 col-md-12 nopadding">

			<?php equitiamo_show_menu('equitiamo-index'); ?>

			<?php get_template_part('includes/index', 'carousel'); ?>

				<div id="attivita">
					<div class="in-panel">
						<h2><?php show_title('attivita'); ?></h2>
						<p><?php show_post('attivita'); ?></p>
						<?php
							$query = equitiamo_get_child_list_query('attivita');

							$counter = 0;

							if ($query->have_posts()):

								while ($query->have_posts()):

									$query->the_post();

									if ($counter % 2 == 0) echo '<div class="row">';

							?>
								<div class="col-xs-12 col-md-6">
									<div class="box-lined">
										<h3><strong><?php the_title(); ?></strong></h3>
										<p>
											<?php the_content(); ?>
										</p>
									</div>
								</div>

							<?php
									$counter++;

									if ($counter % 2 == 0 || $counter == $query->post_count ) echo '</div>';

								endwhile;

							endif;
						?>
					</div>
				</div>

				<div id="contatti">
					<div class="mask">
						<div class="in-panel">
							<h2><?php show_title('contatti'); ?></h2>
							<p><?php show_post('contatti'); ?></p>
						</div>
					</div>
				</div>

				<div id="dove-siamo">
					<div class="in-panel">
						<h2><?php show_title('dove-siamo'); ?></h2>
						<p><?php show_post('dove-siamo'); ?></p>
						<div class="googlemap_wrap">
							<iframe frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJOzOxQ9mW1RIRTpznuONLClw&key=AIzaSyDCe0tVLZDuRPqAY4Z-thW0dqgka0_P1fo" allowfullscreen></iframe>
						</div>
					</div>
				</div>

				<div id="prezzi">
					<div class="mask">
						<div class="in-panel">
							<h2><?php show_title('prezzi'); ?></h2>
							<p><?php show_post('prezzi'); ?></p>
						</div>
					</div>
				</div>

			<?php get_footer(); ?>

		</div>

	</div>