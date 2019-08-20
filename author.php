<?php
/**
 * The template for displaying the author pages.
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package tinyminute
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>



	<section class="section section__spacer" id="author-wrapper">
		<div class="container-fluid container-fluid-fixed" id="content" tabindex="-1">

				<!-- Do the left sidebar check -->
				<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>


				<header class="page-header author-header">

					<?php
					$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug',
						$author_name ) : get_userdata( intval( $author ) );
					?>

					<?php if ( ! empty( $curauth->ID ) ) : ?>
						<?php echo get_avatar( $curauth->ID ); ?>
					<?php endif; ?>

					<dl>
						<?php if ( ! empty( $curauth->user_url ) ) : ?>
							<dt>Website</dt>
							<dd>
								<a href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_html( $curauth->user_url ); ?></a>
							</dd>
						<?php endif; ?>

						<?php if ( ! empty( $curauth->user_description ) ) : ?>
							<dt>Profile</dt>
							<dd><?php echo esc_html( $curauth->user_description ); ?></dd>
						<?php endif; ?>
					</dl>

					<h2>Posted by <?php echo esc_html( $curauth->nickname ); ?></h2>

				</header><!-- .page-header -->

				<ul>

					<!-- The Loop -->
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<li>
								<a rel="bookmark" href="<?php the_permalink() ?>" title="Permanent Link: <?php the_title(); ?>">
									<?php the_title(); ?></a>,
								<?php tinyminute_posted_on(); ?> in <?php the_category( '&' ); ?>
							</li>
						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

					<!-- End Loop -->

				</ul>

			<!-- The pagination component -->
			<?php tinyminute_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- Container end -->
	</section><!-- Wrapper end -->


<?php get_footer(); ?>
