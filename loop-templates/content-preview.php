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
$title_text = $exploded[1];
$isComingSoon = in_category('Coming Soon');
$opacity = $isComingSoon ? 0.5 : 1;
if ($i == 0) {
	$title_text = "The Film";
} else if ($i == 1) {
	$title_text = "The Curriculum";
} else {
	$title_text = "Interactive Activites";
}
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
									<div class="h1 entry-title" style="padding-top: .5rem; opacity: <?php echo $opacity; ?>"><div style="display: inline-block; background-color: rgba(0,0,0,0.5); padding-left: 1rem; padding-right: 1rem; text-decoration: none;"><?php echo $title_text; ?></div></div>
								<?php if (!$isComingSoon) { ?>
								</a>
								<?php } ?>
							</div>
						</div>

					</header><!-- .entry-header -->

					<?php // echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

					<div class="entry-content text-white">
						<?php 
							if ($isComingSoon) {
								echo "<div style='opacity: $opacity;'>";
								the_excerpt();
								echo "</div>";
								// echo "<div class='text-right'><span style='opacity: $opacity;' class='coming-soon h3'>Coming Soon</span></div>";
							} else {
								// echo "<span style='opacity: $opacity;'>". apply_filters('excerpty', the_excerpt(), $readmore). "</span>";
								if ($i == 0) {;
									echo "<a class='btn btn-primary read-more-link' href='./the-film/'>View Film</a>";
								} else if ($i == 1) { //curriculum
									echo "&nbsp;<span style='opacity: $opacity'><a class='btn btn-primary read-more-link' href='./curriculum/'>Start Learning</a><a class='btn btn-primary read-more-link' href='./video-resources/'>Video Resources</a></span>";
								} else {
									echo "<a class='btn btn-primary read-more-link' href='./interactive-activities/'>Explore Activities</a>";
								}
							}
						?>
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
