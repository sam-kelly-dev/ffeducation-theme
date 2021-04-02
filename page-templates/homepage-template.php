<?php
/**
 * Template Name: Homepage Template
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="full-height" style="height: 80vh; background: blue; background-image: url(<?php echo the_post_thumbnail_url( $post->ID, 'large'); ?>); background-size: cover; background-position-y: -150px;">
	<div class="container d-flex" style="height: 100%;">
		<div class="row align-items-center">
			<div class="col-sm-12">
				<div style="padding-top: 2rem; font-size: 1.8rem;" class="text-white">
					Are you ready to<br/> explore the magic that<br/> lives beneath your feet?
				</div>
				<div style="padding-top: 3rem;">
					<a href="./the-film" class="btn btn-danger btn-lg"><strong>Start Watching</strong></a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="featured-bar text-center" style="background: black;">
	<div class="container">
		<img src="/wp-content/uploads/2020/09/featured_in.png">
	</div>
</div>
<div class="wrapper" id="full-width-page-wrapper">

	<div id="content">

			<div class="content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'homepage' ); ?>

					<?php endwhile; // end of the loop. ?>
					<!--
					<div class="container" style="padding-top: 1rem; padding-bottom: 1.5rem;">
						<h2 id="modules">The Modules:</h2>
					</div>
					-->
					<div class="the-modules">
						<?php query_posts('category_name=featured&post_type=page&order=ASC'); ?>
						<?php $i = 0; ?>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php
						$readmore = "Explore Module";
						if ($i == 0) {
							$readmore = "View Film";
						} else if ($i == 1) {
							$readmore = "Start Learning";
						} else {
							$readmore = "Explore Activities";
						}
						echo "<div class='homepage-module-preview'>";
						get_template_part( 'loop-templates/content', 'preview' ); 
						echo "</div>";
						?>
						<?php $i++; ?>
						<?php endwhile; endif; ?>
					</div>
					<div id="teachers" class="the-teachers">
						<div class="container">
							<h2 class="text-white">Your Mycology Teachers:</h2>
						</div>
						<div class="container-fluid" style="padding-top: 3rem;">
							<div class="row text-white text-center">
								<div class="col-md-4">
									<img src="/wp-content/uploads/2020/09/teacher1.png" />
									<h3 style="padding-top: 2rem; padding-bottom: 3rem;">William Padilla Brown</h3>
								</div>
								<div class="col-md-4">
									<img src="/wp-content/uploads/2020/09/teacher2.png" />
									<h3 style="padding-top: 2rem; padding-bottom: 3rem;">Giuliana Furci</h3>
								</div>
								<div class="col-md-4">
									<img src="/wp-content/uploads/2020/09/teacher3.png" />
									<h3 style="padding-top: 2rem; padding-bottom: 3rem;">Paul Stamets</h3>
								</div>
							</div>
						</div>
					</div>
					<div class="the-quote" style="padding-top: 5rem; padding-bottom: 5rem;">
						<div class="container text-center">
							<blockquote class="wp-block-pullquote is-style-default">
								<p>
									There is a feeling, the pulse of eternal knowledge.<br/>
									When you sense the oneness, you are with us.<br/>
									We brought life to Earth... We are - mushrooms.
								</p>
								<cite>"The Mushrooms" in Fantastic Fungi</cite>
							</blockquote>
						</div>
					</div>
				</main><!-- #main -->

			</div><!-- #primary -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
