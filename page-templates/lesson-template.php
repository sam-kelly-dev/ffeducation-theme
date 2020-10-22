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

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'lesson' ); ?>

					<?php endwhile; // end of the loop. ?>


						<div class="container-fluid" style="padding-bottom: 2rem;">
						<?php
							global $post; 
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
