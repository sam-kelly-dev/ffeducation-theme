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


$pagelist = get_pages('sort_column=menu_order&sort_order=ASC&category_name=curriculum');
$pages = array();
foreach ($pagelist as $page) {
   $pages[] += $page->ID;
}

$current = array_search(get_the_ID(), $pages);
$prevID = $pages[$current-1];
$nextID = $pages[$current+1];

?>

<div <?php post_class(); ?> id="post-<?php the_ID(); ?>" style="padding-top: 1rem;">

	<div style="background-image: url(<?php echo the_post_thumbnail_url( $post->ID, 'large'); ?>); background-size: cover; background-position: -10px -200px; height: 25vh;">
		<div class="container d-flex" style="height: 100%;">
		</div>
	</div><!-- .entry-header --><!-- .entry-header -->

	<div class="entry-content">
		<!-- .entry-meta -->
		<div>
			<div style="padding-top: 3rem; padding-bottom: 3rem;" class="container">
				<div class="row justify-content-center">
					<div class="col col-sm-12 col-md-10 col-lg-9">
						<?php the_title( '<h1 class="entry-title"><strong>', '</strong></h1>' ); ?>
						<!-- <h3><span class="iconify" data-icon="si-glyph:mushrooms" data-inline="false"></span></h3> -->
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<div class="navigation container-fluid">
				<?php getPrevNextPages('curriculum'); ?>
			</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer container">

		<?php // understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</div><!-- #post-## -->
