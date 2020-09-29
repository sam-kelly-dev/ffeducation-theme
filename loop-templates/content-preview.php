<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
global $post;
global $next_text;
$exploded = explode(" | ", $post->post_title);
// echo var_dump($exploded);
$title_num = substr($exploded[0], -2);
$title_text = $exploded[1];
?>

<article class="module-preview" style="padding-top: 1rem; padding-bottom: 1rem; background-image: url(<?php echo the_post_thumbnail_url( $post->ID, 'large'); ?>); background-position: 0px 50%; background-size: cover;" class="text-white" id="post-<?php the_ID(); ?>">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">

				<header class="entry-header text-white">
					<div class="row">
						<div class="col-md-12">
							<a class="header-link" href="<?php echo get_permalink($post->ID); ?>">
								<span class="h1 inline-block" style="padding-right: 3rem;"><?php echo $title_num; ?></span>
								<div class="h3 entry-title" style="padding-top: .5rem;"><?php echo $title_text; ?></div>
							</a>
						</div>
					</div>

				</header><!-- .entry-header -->

				<?php // echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

				<div class="entry-content text-white">
					<?php !!the_excerpt(); ?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">

					<!-- <?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?> -->

				</footer><!-- .entry-footer -->
			</div>
			<div class="col-sm-3 d-flex align-items-end">
							<div class="text-white align-items-end" style="padding-bottom: 1rem;"><a class="next-module-link" style="font-size: 1.5rem;" href="#"><?php if (isset($next_text)) { echo $next_text; } ?></a></div>
			</div>
		</div>
	</div>
</article><!-- #post-## -->
