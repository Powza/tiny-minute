<?php
/**
 * The template for displaying archive pages
 *
 * @package tinyminute
 */

get_header(); ?>

	<section class="section section__spacer__slim section__intro">
		<div class="section__background section__overlay" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/explore-header-bg.jpg');"></div>
		<div class="container-fluid container-fluid-fixed">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<div class="section__title section__title__center">
						<h1>Explore</h1>
						<p>Check out some of the awesome projects we've worked on.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section section__spacer__slim explore">
		<div class="container-fluid container-fluid-fixed-extended">
		<?php
			$portfolio_post_type = array(
				'post_type' 		=> 'portfolio_post_type',
				'posts_per_page' 	=> -1,
			);
			$loop = new WP_Query( $portfolio_post_type );
		?>
		<?php if ( $loop->have_posts() ) : ?>
			<div class="row">
			    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
		    	<div class="col-md-6">
		    		<div class="explore__preview">
						<a class="explore__link" href="<?php the_permalink() ?>" title="View <?php the_title(); ?>">
							<div class="explore__wrap">
								<div class="explore__image">
									<?php if ( !empty( has_post_thumbnail( $post->ID ) ) ): ?>
									<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
									<div class="explore__pic lazy" data-bg="url(<?php echo $image[0]; ?>)"></div>
									<?php else: ?>
									<div class="explore__pic"></div>
									<?php endif; ?>
								</div>
		                    </div>
	                    </a>
	                    <div class="explore__info">
                            <h2><a href="<?php the_permalink() ?>" title="View <?php the_title(); ?>"><?php the_title(); ?></a></h2>
                            <small><?php the_field('project_area'); ?></small>
                        </div>
	        		</div>
	        	</div>
			    <?php endwhile; ?>
			</div>
	    <?php wp_reset_postdata(); ?>
	    <?php else : ?>
		    <p><?php 'No projects found'; ?></p>
		<?php endif; ?>
	</section>

	<section class="section section__spacer__slim">
		<div class="container-fluid container-fluid-fixed">
			<div class="row">
				<div class="col-md-4">
					<img class="lazy" data-src="<?php echo get_template_directory_uri(); ?>/assets/img/illustrations/superhero.svg">
				</div>
				<div class="col-md-8 align-self-center">
                    <div class="section__title">
                        <span>Getting Started</span>
                        <h2>Like what you see?</h2>
                    </div>
                    <p>We're proud of all our work and delivering a wow experience to our clients. Let us be the one to deliver that experience to you.</p>
					<br><a class="btn btn-blue-outline btn-round" href="<?php echo get_home_url(); ?>/contact/">Let's Get Started</a>
				</div>
			</div>
		</div>
	</section>



<?php get_footer();
