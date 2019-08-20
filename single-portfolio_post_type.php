<?php
/**
 * The template for displaying all single posts
 *
 * @package tinyminute
 */

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<main class="main">
		<section class="section section__spacer__slim project_details">
			<div class="container-fluid container-fluid-fixed">
				<div class="row flex-column-reverse flex-md-row">
					<div class="col-md-8 offset-md-2 align-self-center">
						<h1><?php the_title(); ?></h1>
						<?php echo the_excerpt(); ?>
						<div class="row row-eq-height">
							<div class="col-md-4">
								<h3>Client</h3>
								<p><?php the_field('project_client'); ?></p>
							</div>
							<div class="col-md-4">
								<h3>Area</h3>
								<p><?php the_field('project_area'); ?></p>
							</div>
							<div class="col-md-4">
								<h3>Services</h3>
								<ul>
								<?php 
							    foreach((get_the_category()) as $category){
							        echo '<li>'.$category->name.'</li>';
							    }
								?>
								</ul>
							</div>
						</div>
						<a class="btn btn-blue btn-round" href="<?php the_field('project_url'); ?>" target="_blank">See Live Project</a>
					</div>
				</div>
			</div>
		</section>
		<?php if ( !empty( has_post_thumbnail( $post->ID ) ) ): $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
		<section class="section section__spacer__large">
			<div class="section__background section__background" style="background-image: url('<?php echo $image[0]; ?>');"></div>
		</section>
		<?php endif; ?>
		<section class="section section__spacer__slim explore">
			<div class="container-fluid container-fluid-fixed-extended">
				<?php the_content(); ?>
			</div>
		</section>
		<section class="section section__spacer__slim project_details">
			<div class="container-fluid container-fluid-fixed">
				<div class="project_details__logo">
					<img class="lazy" data-src="<?php the_field('project_logo'); ?>">
				</div>
			</div>
		</section>
		<section class="section section__spacer__slim project_details">
			<div class="container-fluid container-fluid-fixed">
				<?php tinyminute_post_nav(); ?>
			</div>
		</section>
	</main>

	<?php endwhile; else: ?>
<?php endif; ?>

<?php get_footer();
