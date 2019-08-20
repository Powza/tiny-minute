<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package tinyminute
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<section class="no-results not-found">

	<header class="page-header">

		<h1 class="page-title">Nothing Found</h1>

	</header><!-- .page-header -->

	<div class="page-content">

		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', array(
	'a' => array(
		'href' => array(),
	),
) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
			<?php
				get_search_form();
		else : ?>

			<p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>
			<?php
				get_search_form();
		endif; ?>
	</div><!-- .page-content -->
	
</section><!-- .no-results -->
