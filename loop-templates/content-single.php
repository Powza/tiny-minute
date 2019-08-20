<?php
/**
 * Single post partial template.
 *
 * @package tinyminute
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">Pages:',
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php tinyminute_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
