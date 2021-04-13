<?php
/**
 * Template Name: Resources Template
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

				<main class="site-main" id="main" role="main" style="margin-top: 3rem; padding-top: 1rem;">

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

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
