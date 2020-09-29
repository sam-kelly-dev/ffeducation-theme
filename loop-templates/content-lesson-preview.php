<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>">
	<div class="container">
		<header class="entry-header" id="heading-<?php the_ID(); ?>">
			<a style="margin-left: 0; padding-left: 0;" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-<?php the_ID(); ?>" aria-expanded="true" aria-controls="collapse-<?php the_ID(); ?>">
				
			<span class="h2 entry-title" style="padding-top: 1rem;"> <?php !!the_title( '', '' ); ?></span>
			</a>
			<?php apply_filters('excerpt_more', the_excerpt('')); ?>

		</header><!-- .entry-header -->

		<?php // echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

		<div class="entry-content collapse" data-parent="#lessons-accordion" id="collapse-<?php the_ID(); ?>">
			<?php echo apply_filters('preview_page_filter', $post->post_content); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">

			<!-- <?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?> -->

		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
