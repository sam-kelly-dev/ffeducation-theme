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
global $next_link;
global $readmore;
global $i;
$exploded = explode(" | ", $post->post_title);
// echo var_dump($exploded);
$title_num = $exploded[0];
$title_num = str_replace("Module ", "", $title_num);
$title_text = get_the_title();
$isComingSoon = in_category('Coming Soon');
$opacity = $isComingSoon ? 0.5 : 1;
?>
<div style="background-image: url(<?php echo the_post_thumbnail_url( $post->ID, 'large'); ?>); background-position: 0px 50%; background-size: cover;">
	<article style="padding-top: 3rem; padding-bottom: 3rem;" class="module-preview" class="text-white" id="post-<?php the_ID(); ?>">
		<div class="container">
			<div class="row">
				<div class="col-sm-9">

					<header class="entry-header text-white">
						<div class="row">
							<div class="col-md-12">
								<?php if (!$isComingSoon) { ?>
								<a class="header-link" href="<?php echo get_permalink($post->ID); ?>" style="opacity: <?php echo $opacity; ?>">
								<?php } ?>
									<!-- <span class="h1 inline-block" style="padding-right: 3rem; opacity: <?php echo $opacity; ?>"><?php echo $title_num; ?></span> -->
									<div class="h1 entry-title" style="padding-top: .5rem; opacity: <?php echo $opacity; ?>"><?php echo $title_text; ?></div>
								<?php if (!$isComingSoon) { ?>
								</a>
								<?php } ?>
							</div>
						</div>

					</header><!-- .entry-header -->

					<?php // echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

					<div class="entry-content text-white row align-items-center">
						<div class="col-12 col-md-6 col-lg-8 text-left">
							<?php
								echo "<span style='opacity: $opacity;'>". the_excerpt() . "</span>";
							?>
						</div>
						<div class="col-12 col-md-6 col-lg-4 text-right">
							<a style="font-size: 1.2rem;" class='btn btn-primary read-more-link' href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div>
					</div><!-- .entry-content -->

					<footer class="entry-footer">

						<!-- <?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?> -->

					</footer><!-- .entry-footer -->
				</div>
				<div class="col-sm-3 d-flex align-items-end">
					<div class="text-white align-items-end" style="padding-bottom: 1rem;">
						<?php if ($isComingSoon) { ?>
						<span class="next-module-link" style="font-size: 1.5rem; opacity: <?php echo $opacity; ?>;" href="<?php echo $next_link; ?>"><?php if (isset($next_text)) { echo $next_text; } ?></span>
						<?php } else { ?>
						<a class="next-module-link" style="font-size: 1.5rem; opacity: <?php echo $opacity; ?>;" href="<?php echo $next_link; ?>"><?php if (isset($next_text)) { echo $next_text; } ?></a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</article>
</div><!-- #post-## -->
