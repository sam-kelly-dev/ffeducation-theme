<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $post;
$parent_id = $post->post_parent;
$parent_post = get_post($post->post_parent);
?>

<div <?php post_class(); ?> id="post-<?php the_ID(); ?>" style="margin-top: 1rem; padding-top: 1rem;">
	<!--
	<div style="background-image: url(<?php echo the_post_thumbnail_url( $post->ID, 'large'); ?>); background-size: cover; background-position: -10px -200px; height: 60vh;">
		<div class="container d-flex" style="height: 100%;">
			<div class="row align-items-center text-white">
				<div class="text-white col-12">
					<h3 class="text-white"><a href="<?php the_permalink($parent_id); ?>" class="title-crumb text-white"><?php echo $parent_post->post_title; ?></a></h3>
					<?php the_title( '<h1 class="entry-title"><strong>', '</strong></h1>' ); ?>
				</div>
			</div>
		</div>
	</div>
	-->
	<!-- .entry-header --><!-- .entry-header -->
	<div class="container">
		<?php the_title( '<h1 class="entry-title"><strong>', '</strong></h1>' ); ?>
	</div>
	<div class="entry-content container">
		<!--
		<div class="entry-meta">

			<?php understrap_posted_on(); ?>

		</div>
		-->
		<!-- .entry-meta -->
		<div>
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
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer container">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</div><!-- #post-## -->
