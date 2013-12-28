<?php
/**
 * Template Name: Modelo Jobs
 */

get_header('jobs'); ?>

		<div id="primary">
		
			<div id="content">
						
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content','page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>