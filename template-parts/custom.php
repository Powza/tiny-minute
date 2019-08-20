<?php
/**
 * Template Name: Custom
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
		<?php the_content(); ?>
	</main>
<?php endwhile; ?>

<?php get_footer(); ?>
