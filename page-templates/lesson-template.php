<?php
/**
 * Template Name: Lesson Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
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


<div class="wrapper" id="full-width-page-wrapper" style="padding-top: 0px;">
	<div id="content">

		<div>

			<div class="content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'lesson' ); ?>

					<?php endwhile; // end of the loop. ?>


						<div class="container-fluid" style="padding-bottom: 2rem;">
						<?php
							global $post; 
							$this_menu_order = $post->menu_order;
 							$parentid = $post->ID;
							if ( is_page() && $post->post_parent )
								echo "";
							else
							 	$parentid = $post->ID;
	    				?>
	    				<?php
	    					$args = array(
	    						'parent' => $parentid,
		        				'sort_column' => 'menu_order', 
		        				'sort_order' => 'asc',
		        				'depth' => 1
	    					);
	    					$pages = get_pages($args);
	    					$i = 1;
	    				?>
	    					<div class="accordion" id="steps-accordion">
	    				<?php

	    					foreach($pages as $post) {
	    						$collapse_target = "collapse" . $post->ID;
	    						$readmore = "";
		    					get_template_part('loop-templates/content', 'lesson-preview');
	    						$i++;
	    					}
	    				?>
	    					</div>
	    				</div>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->
	    				<!-- GET SIBLINGS -->
	    				<?php
	    					// get all the children
	    					$args = [
	    						'post_type' => 'page', 
	    						'order' => 'ASC', 
	    						'orderby' => 'menu_order',
				                'category_name' => 'Modules'
	    					];
	    					$children = get_posts($args);
	    					$found_next_module = false;
	    					$found_last_module = false;

	    					$back_post = null;
	    					$back_text = "";
	    					$back_link = "";

	    					$forward_post = null;
	    					$forward_text = "";
	    					$forward_link = "";
	    					foreach($children as $child) {
	    						echo $child->post_title . "<br/>";
	    					}

	    					foreach($children as $child) {
	    						if ($this_menu_order > 0) {
	    							if ($this_menu_order - 1 == $child->menu_order && !$found_last_module) {
	    								$found_last_module = true;
	    								$back_post = $child;
	    								$back_text = "Previous Module";
	    								$back_link = get_the_permalink($child->ID);
	    							}
	    						}
	    						if (!$found_next_module && $child->menu_order == $this_menu_order + 1) {
	    							$found_next_module = true;
	    							$forward_post = $child;
	    							$forward_text = "Next Module";
	    							$forward_link = get_the_permalink($child->ID);
	    							// echo '<div class="next-module">';
	    							// get_template_part('loop-templates/content', 'module-preview');
	    							// echo '</div>';
	    						}
	    					}
	    					$colsize = "12";
	    					if ($found_last_module && $found_next_module) {
	    						$colsize = "6";
	    					}
	    					echo "<div class='row'>";
	    					if ($found_last_module) {
	    						$post = $back_post;
	    						$next_text = $back_text;
	    						$next_link = $back_link;
	    						echo "<div class='prev-module col-{$colsize}' style='padding:0;'>";
	    						get_template_part('loop-templates/content', 'module-preview');
	    						echo "</div>";
	    					}
	    					if ($found_next_module) {
	    						$post = $forward_post;
	    						$next_text = $forward_text;
	    						$next_link = $forward_link;
	    						echo "<div class='next-module col-{$colsize}' style='padding:0;'>";
	    						get_template_part('loop-templates/content', 'module-preview');
	    						echo "</div>";
	    					}
	    					echo "</div>";
	    				?>
	<div class="container-fluid film-footer">
		<div class="row text-center text-white">
			<div class="col">
				<div class="row justify-content-center">
					<div class="col-12 col-md-9 col-lg-8">
						<h2>Explore Online Activities!</h2>
						<div class="text-fixer">
							<p class="text-justify">Enjoy the film and want to dive deeper into the fungi kingdom! We’ve partnered with the Fungi Files to bring you interactive online activities that will leave you ready to be the next citizen scientist!</p>
						</div>
						<a href="/interactive-activities" class="btn btn-danger">
							Start Course
						</a>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="row justify-content-center">
					<div class="col-12 col-md-9 col-lg-8">
						<h2>Module Resources!</h2>
						<div class="text-fixer">
							<p class="text-justify">We've organized all of the clips by module to make them easier for you to find!</p>
						</div>
						<a href="/video-resources" class="btn btn-danger">
							Go To Clips
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- #full-width-page-wrapper -->
<script>
	jQuery('.accordion .expand-accordion').click(function () {
		jQuery('.indicator').removeClass('fa-caret-down').removeClass('fa-caret-right').addClass('fa-caret-right');
		var $row = jQuery(this).closest('.row');
		var $indicator = $row.find('.indicator');
		var collapsed = $row.find('a.expand-accordion').hasClass('collapsed');
		console.log('COLLAPSED IS ' + collapsed);
		if (collapsed) {
			// it will collapse....
			$indicator.addClass('fa-caret-down').removeClass('fa-caret-right');
		} else {
			$indicator.removeClass('fa-caret-down').addClass('fa-caret-right');
		}

	});
</script>

<?php get_footer(); ?>
