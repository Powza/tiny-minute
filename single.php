<?php
/**
 * The template for displaying all single posts.
 *
 * @package tinyminute
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>
<section class="section section__spacer" id="single-wrapper">
	<div class="container-fluid container-fluid-fixed" id="content" tabindex="-1">
		<div class="row">

		<?php get_template_part( 'loop-templates/content', 'single' ); ?>

		<?php tinyminute_post_nav(); ?>

		</div><!-- .row -->
	</div><!-- Container end -->
</section><!-- Wrapper end -->

<section class="section section__spacer" id="single-wrapper">
	<div class="container-fluid container-fluid-fixed" id="content" tabindex="-1">

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

	</div><!-- Container end -->
</section><!-- Wrapper end -->

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
