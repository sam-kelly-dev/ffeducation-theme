<?php
/**
 * Template Name: Curriculum Template
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


<div class="wrapper" id="curriculum-page-wrapper" style="padding-top: 0px;">
	<div id="content">

		<div>

			<div class="content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'curriculum' ); ?>

					<?php endwhile; // end of the loop. ?>

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
		if (collapsed) {
			// it will collapse....
			$indicator.addClass('fa-caret-down').removeClass('fa-caret-right');
		} else {
			$indicator.removeClass('fa-caret-down').addClass('fa-caret-right');
		}

	});
</script>

<?php get_footer(); ?>
