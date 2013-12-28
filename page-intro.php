<?php
/**
 * Template Name: Modelo Intro
 */

get_header('intro'); ?>

		<div id="primary">
		
			<div id="content">
						
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content','page' ); ?>

				<?php endwhile; // end of the loop. ?>
				
				
				<div id="box-intro">
				<aside class="link-widget-intro">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<div id="logo-solid" class="intro">
				<?php bloginfo( 'name' ); ?>
				</div>
				</a>
				</aside>
				
				<aside class="link-widget-intro">
				<a href="http://beta.brasa.art.br/ribeirolima/" rel="home">
				<div id="logo-ribeirolima">
				Ribeiro LimA AA Investimentos
				</div></a>
				</aside>
				
				</div>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer('intro'); ?>