<?php
/**
 * The template for displaying search results pages.
 *
 * @package tinyminute
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>


<section class="section section__spacer" id="search-wrapper">
	<div class="container-fluid container-fluid-fixed" id="content" tabindex="-1">
		<?php if ( have_posts() ) : ?>

			<?php get_search_form(); ?><br>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'loop-templates/content', 'search' );
				?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'loop-templates/content', 'none' ); ?>

		<?php endif; ?>

		<!-- The pagination component -->
		<?php tinyminute_pagination(); ?>

	</div><!-- Container end -->
</section><!-- Wrapper end -->

<?php get_footer(); ?>
