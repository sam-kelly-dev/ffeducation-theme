<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
global $post;
$title_text = $post->post_title;
$exploded = explode(" | ", $post->post_title);
$title_text = isset($exploded[1]) ? $exploded[1] : $title_text;
$collapse_target = "collapse" . $post->ID;
defined( 'ABSPATH' ) || exit;
global $i;
global $readmore;
?>
<article class="row" id="post-<?php the_ID(); ?>" style="margin-bottom: 2rem;">
	<div class="col-sm-12">
		<div class="row lesson-preview-header-bg-row" style="padding-top: .5rem; padding-bottom: .5rem;">
			<div class="container">
				<header class="entry-header row" id="heading-<?php the_ID(); ?>">
					<div class="col-3 col-md-2 text-right">
						<a class="expand-accordion" type="button" data-toggle="collapse" data-target="#<?php echo $collapse_target; ?>" aria-expanded="true" aria-controls="<?php echo $collapse_target; ?>" >
				    		<?php if ($readmore == '') { ?>
				    			<i class="indicator fa fa-caret-right" style="vertical-align: middle; padding-bottom: 1.5rem; letter-spacing: -4px;"></i>
				    		<?php } ?>
				    		<span style="font-size: 4rem; padding-top: 2rem; letter-spacing: -4px;" class="heading-font">0<?php echo $i ?></span>
				    	</a>
					</div>
					<div class="col-9 col-md-10">
						<a
							style="margin: 0px; padding: 0px;" 
							class="expand-accordion"
							type="button"
							data-toggle="collapse" data-target="#<?php echo $collapse_target; ?>" 
							aria-expanded="true" aria-controls="<?php echo $collapse_target; ?>"
						>
							<span style="padding-top: 1rem; font-size: 2rem; font-weight: bold; overflow-wrap: none;">
								<?php echo $title_text; ?>
							</span>
						</a>
						<?php echo apply_filters('excerpty', the_excerpt(), $readmore); ?>
					</div>
				</header><!-- .entry-header -->
			</div>
		</div>
		<div class="row">
			<div class="steps-preview-excerpt collapse entry-content" data-parent="#steps-accordion" style="padding: 1rem;" id="<?php echo $collapse_target; ?>">
				<div class="container" >
					<div>
						<?php echo apply_filters('preview_page_filter', $post->post_content); ?>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</article><!-- #post-## -->
