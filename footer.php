<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="container">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer text-white" id="colophon">
					<div class="row">
						<div class="col-lg-6" style="padding-bottom: 3rem; padding-top: 2rem;">
							<div class="h3"><strong>Stay Connected</strong></div>
							<div style="padding-top: 2rem; padding-right: 5rem; font-size: 1.5rem;">
								You'll be the first to know about upcoming events and learning opportunities
							</div>
							<form style="padding-top: 2rem;">
								<div class="form-row">
									<div class="col-auto">
								      <label class="sr-only" for="inlineFormInputGroup">Email address</label>
								      <div class="input-group mb-2">
								        <input type="text" class="form-control form-control-lg" id="inlineFormInputGroup" placeholder="Username">
								      </div>
								    </div>
								    <div class="col-auto">
								      <button type="submit" class="btn btn-danger mb-2 btn-lg">Subscribe</button>
								    </div>
								</div>
							</form>
						</div>
						<div class="col-lg-3" style="padding-bottom: 3rem; padding-top: 2rem;">
							<div class="h3" style="padding-bottom: 2rem;"><strong>Navigate</strong></div>
							<?php
								wp_nav_menu( array( 
								    'theme_location' => 'footer-nav-menu',
								    'menu_class' => 'list-unstyled',
								    'container_class' => 'footer-nav-menu-container-class' ) ); 
								?>
						</div>
						<div class="col-lg-3" style="padding-bottom: 3rem;">
							<img src="/wp-content/uploads/2020/09/partners.png" />
						</div>
					</div>
					<div class="site-info">

						<!-- <?php understrap_site_info(); ?> -->

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>
<script>
function checkScroll(){
    var startY = jQuery('.navbar').height() * 2; //The point where the navbar changes in px
    var top = jQuery(window).scrollTop();
    if(top > startY){
        jQuery('.navbar').addClass("scrolled");
    }else{
        jQuery('.navbar').removeClass("scrolled");
    }
}
jQuery(document).ready(function(){
    if(jQuery('.navbar').length > 0){
        jQuery(window).on("scroll load resize", function(){
            checkScroll();
        });
    }
})
</script>
</body>

</html>

