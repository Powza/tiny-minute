<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tinyminute
 */

get_header(); ?>

<section class="section section__spacer">
	<div class="container-fluid container-fluid-fixed">
	<?php if ( have_posts() ) : ?>
		<div class="row">
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
	</div>
</section>

<?php get_footer();
