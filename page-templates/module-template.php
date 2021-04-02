<?php
/**
 * Template Name: Module Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<?php if ( is_front_page() ) : ?>
  <?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>


<div class="wrapper" id="full-width-page-wrapper" style="padding-top: 0px;">

	<div id="content">

		<div>

			<div class="content-area" id="primary">

				<main class="site-main" id="main" role="main">
					<?php $modules = []; $this_menu_order = $post->menu_order; ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php global $post; $modules[] = $post; ?>
						<?php get_template_part( 'loop-templates/content', 'module' ); ?>

					<?php endwhile; // end of the loop. ?>
						<div class="container" style="padding-bottom: 2rem;">
						<?php
							global $post; 
 							$parentid = $post->ID;
							// echo $string;
	    				?>
	    				<?php
	    					$args = array(
	    						'parent' => $parentid,
		        				'sort_column' => 'menu_order', 
		        				'sort_order' => 'asc',
		        				'depth' => 1
	    					);
	    					$pages = get_pages($args);
	    				?>
	    					<h2 style="padding-bottom: 1rem;">The Lessons:</h2>
	    					<div class="accordion" id="lessons-accordion">
	    				<?php
	    					$i = 1;
	    					foreach($pages as $post) {
	    						$readmore = "Start Lesson";
		    					get_template_part('loop-templates/content', 'lesson-preview');
	    						$i++;
	    					}
	    				?>
	    					</div>
	    				</div>
	    				<!-- GET SIBLINGS -->
	    				<?php
	    					// get all the children
	    					$args = ['post_type' => 'page', 'post_parent' => $post->post_parent, 'order' => 'ASC', 'orderby' => 'menu_order'];
	    					$children = get_pages($args);
	    					$found_next_module = false;
	    					foreach($children as $child) {
	    						if (!$found_next_module && $child->menu_order == $this_menu_order + 1) {
	    							$found_next_module = true;
	    							$post = $child;
	    							$next_text = "Go to next module";
	    							$next_link = get_the_permalink($child->ID);
	    							echo '<div class="next-module">';
	    							get_template_part('loop-templates/content', 'module-preview');
	    							echo '</div>';
	    						}
	    					}
	    				?>


				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->
 
</div><!-- #full-width-page-wrapper -->
<?php get_footer(); ?>
