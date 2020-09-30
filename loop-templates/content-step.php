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
$grandparent_post = get_post($parent_post->post_parent);
$thumbnail = get_the_post_thumbnail_url($parent_id, 'large');
?>

<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div style="background-image: url(<?php echo $thumbnail ?>); background-size: cover; background-position: -10px -200px; height: 60vh;">
		<div class="container d-flex" style="height: 100%;">
			<div class="row align-items-center">
				<div>
					<h4 class="text-white"><?php echo $grandparent_post->post_title; ?></h4>
					<h3 class="text-white"><?php echo $parent_post->post_title; ?></h3>
					<?php the_title( '<h1 class="entry-title text-white"><strong>', '</strong></h1>' ); ?>
				</div>
				</div>
		</div>
	</div><!-- .entry-header --><!-- .entry-header -->

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
