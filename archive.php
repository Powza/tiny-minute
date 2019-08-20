<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tinyminute
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<section class="section section__spacer" id="archive-wrapper">
	<div class="container-fluid container-fluid-fixed" id="content" tabindex="-1">
		<?php if ( have_posts() ) : ?>
		<div class="row row-eq-height">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="col-md-6">
					<?php
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'loop-templates/content', get_post_format() );
					?>
				</div>
			<?php endwhile; ?>
		</div>
		<?php else : ?>
			<?php get_template_part( 'loop-templates/content', 'none' ); ?>
		<?php endif; ?>
		<!-- The pagination component -->
		<?php tinyminute_pagination(); ?>
	</div><!-- Container end -->
</section><!-- Wrapper end -->

<?php get_footer(); ?>
