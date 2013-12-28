<?php
/**
 * Template Name: Modelo Home
 */

get_header('home'); ?>

		<div id="primary">
		
			<div id="content">
						
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content','home' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>