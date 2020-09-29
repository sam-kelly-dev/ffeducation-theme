<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div>
		<div class="container" style="height: 100%;">
			<?php the_title( '<h1 class="entry-title"><strong>', '</strong></h1>' ); ?>
		</div>

	</div><!-- .entry-header -->

	<div class="entry-content container">
		<!--
		<div class="entry-meta">

			<?php understrap_posted_on(); ?>

		</div>
		-->
		<!-- .entry-meta -->
		<div style="padding-top: 3rem; padding-bottom: 3rem;">
			<?php the_content(); ?>
		</div>
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer container">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</div><!-- #post-## -->
