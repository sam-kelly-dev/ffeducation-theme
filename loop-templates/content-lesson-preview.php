<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
global $post;
$title_text = explode(" | ", $post->post_title)[1];
defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>">
	<div class="container">
		<header class="entry-header" id="heading-<?php the_ID(); ?>">
			<a style="margin-left: 0; padding-left: 0;" class="btn btn-link">
			<span class="h2 entry-title" style="padding-top: 1rem;"> <?php echo $title_text; ?></span>
			</a>
			<?php apply_filters('excerpt_more', the_excerpt('')); ?>

		</header><!-- .entry-header -->

		<?php // echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
		<!--
		<div class="entry-content" id="collapse-<?php the_ID(); ?>">
			<?php echo apply_filters('preview_page_filter', $post->post_content); ?>
		</div>
		-->
		<!-- .entry-content -->

		<footer class="entry-footer">

			<!-- <?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?> -->

		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
