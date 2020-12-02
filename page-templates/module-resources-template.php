<?php
/**
 * Template Name: Module Resources Template
 *
 * Template for displaying the film stuff
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header('dark');
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() ) : ?>
  <?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>


<div class="wrapper" id="full-width-page-wrapper" style="padding-top: 0px; margin-top: 1rem;">
	
	<div id="content">

		<div>

			<div class="content-area" id="primary">

				<main class="site-main" id="main" role="main" style="margin-top: 1rem; padding-top: 1rem;">

					<div class="container">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php the_title('<h2><strong>', '</strong></h2>'); get_template_part( 'loop-templates/content', 'homepage' ); ?>

					<?php endwhile; // end of the loop. ?>
					</div>
					<div class="the-modules">
						<?php query_posts('category_name=modules&post_type=page&order=ASC'); ?>
						<?php $i = 0; ?>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php
						$readmore = "Explore Module";
						if ($i == 0) {
							$readmore = "View Film";
						} else if ($i == 1) {
							$readmore = "Start Learning";
						} else {
							$readmore = "Explore Activities";
						}
						echo "<div class='homepage-module-preview'>";
						get_template_part( 'loop-templates/content', 'module-resources' ); 
						echo "</div>";
						?>
						<?php $i++; ?>
						<?php endwhile; endif; ?>
					</div>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->
	<div class="container-fluid film-footer">
		<div class="row text-center text-white">
			<div class="col">
				<div class="row justify-content-center">
					<div class="col-12 col-md-10 col-lg-8">
						<h2>Explore Online Activities!</h2>
						<div class="text-fixer">
							<p class="text-justify">Enjoy the film and want to dive deeper into the fungi kingdom! We’ve partnered with the Fungi Files to bring you interactive online activities that will leave you ready to be the next citizen scientist!</p>
						</div>
						<a href="#" class="btn btn-danger">
							Start Course
						</a>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="row justify-content-center">
					<div class="col-12 col-md-10 col-lg-8">
						<h2>Module Resources!</h2>
						<div class="text-fixer">
							<p>We've organized all of the clips by module to make them easier for you to find!</p>
						</div>
						<a href="#" class="btn btn-danger">
							Go To Clips
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
