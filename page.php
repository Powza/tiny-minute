<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package tinyminute
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>

<?php while (have_posts()) : the_post(); ?>
	<main class="main">
		<section class="section section__spacer">
			<div class="container-fluid container-fluid-fixed">
				<?php the_content(); ?>
			</div>
		</section>
	</main>
<?php endwhile; ?>

<?php get_footer(); ?>
