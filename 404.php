<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package tinyminute
 */

get_header(); ?>

	<main class="main">
		<section class="section section__spacer__slim">
			<div class="container-fluid container-fluid-fixed">
				<div class="row">
					<div class="col-md-6 align-self-center">
						<h2>Oops!</h2>
						<p>We can't seem to find the page you're looking for.</p>
						<h3>Error code: 404</h3>
					</div>
					<div class="col-md-6">
						<img class="lazy" data-src="<?php echo get_template_directory_uri(); ?>/assets/img/illustrations/error.svg">
					</div>
				</div>
				<?php get_search_form(); ?>
			</div>
		</section>
	</main>

<?php get_footer(); ?>