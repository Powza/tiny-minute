<?php
/**
 * Template Name: Homepage
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
		<section class="section hero d-flex">
			<div class="hero__background">
				<div class="hero__image" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/img/home-bg.jpg');"></div>
			</div>
			<div class="container-fluid container-fluid-fixed">
				<div class="row h-100">
					<div class="col-md-5 col-lg-6 align-self-center">
						<div class="hero__text">
							<h1>
								<span>A Digital Team Driven By</span>
								Results<br>Experience &<br>Relationships
							</h1>
							<p>Specializing in website design and development.</p>
							<a href="<?php echo get_home_url(); ?>/explore/" class="btn btn-white btn-round" title="Explore Portfolio">See The Work</a>
							<a href="<?php echo get_home_url(); ?>/about/" class="btn btn-white-outline btn-round" title="About Tiny Minute">Learn More</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="section section__spacer services">
			<div class="container-fluid container-fluid-fixed">
				<div class="section__title section__title__center">
					<span>Services</span>
					<h2>Why choose us?</h2>
				</div>
				<div class="services__wrap">
					<div class="row">
						<div class="col-12 col-md-4">
							<div class="services__item">
								<?php get_template_part('/assets/img/icons/code.svg'); ?>
								<h3>Web Development</h3>
								<p>Bring your big ideas to life with the latest cutting-edge technology bringing a seamless experience to visitors.</p>
							</div>
						</div>
						<div class="col-12 col-md-4">
							<div class="services__item">
								<?php get_template_part('/assets/img/icons/layers.svg'); ?>
								<h3>Web Design</h3>
								<p>Give your business a fresh new and exciting appearance that's adaptable to virtually any capable device.</p>
							</div>
						</div>
						<div class="col-12 col-md-4">
							<div class="services__item">
								<?php get_template_part('/assets/img/icons/content_updates.svg'); ?>
								<h3>Content Updates</h3>
								<p>Need help with creating, updating, and changing website content? We can deliver fast top quality results.</p>
							</div>
						</div>
						<div class="col-12 col-md-4">
							<div class="services__item">
								<?php get_template_part('/assets/img/icons/site_speed.svg'); ?>
								<h3>Site Speed</h3>
								<p>Did you know site speed does more for conversions than it does for rankings? Let us tune your site for speed.</p>
							</div>
						</div>
						<div class="col-12 col-md-4">
							<div class="services__item">
								<?php get_template_part('/assets/img/icons/seo.svg'); ?>
								<h3>Search Engine Optimization</h3>
								<p>SEO is an essential part of your website to get seen on search engines like Google, Bing, and Yahoo. Keywords, linking, domain...</p>
							</div>
						</div>
						<div class="col-12 col-md-4">
							<div class="services__item">
								<?php get_template_part('/assets/img/icons/site_support.svg'); ?>
								<h3>Site Support</h3>
								<p>Not sure where to begin? Contact us for professional advice on your current website or start a new project.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="text-center">
					<a href="<?php echo get_home_url(); ?>/services/" class="btn btn-blue btn-round" title="View Tiny Minute Services">View Services</a>
				</div>
			</div>
		</section>
		<section class="section section__spacer accomplishments">
			<div class="container-fluid container-fluid-fixed">
				<div class="row">
	    			<div class="col-md-5">
						<div class="section__title">
							<span>Explore</span>
							<h2>What we accomplished</h2>
						</div>
						<p>First impressions really do count. Especially in the short attention-spanned digital age. Whilst it's got to look good and capture your attention, we believe digital projects need to engage - and that takes more than just a pretty interface.</p>
						<br><a class="btn btn-blue btn-round" href="<?php echo get_home_url(); ?>/explore/" title="Explore Portfolio">Explore Projects</a>
					</div>
					<div class="col-md-6 col-pull-right">
						<?php echo do_shortcode('[projects posts="3" orderby="rand"]'); ?>
					</div>
				</div>
			</div>
		</section>
		<section class="section section__spacer testimonials-home">
			<div class1="section__background section__overlay lazy" data-bg1="url(<?php echo get_template_directory_uri(); ?>/assets/img/testimonials-bg.jpg)"></div>
			<div class="container-fluid container-fluid-fixed">
				<div class="section__title section__title__center">
					<span>Testimonials</span>
					<h2>What our clients say</h2>
				</div>
				<div class="row">
					<div class="col-md-8 offset-md-2">
						<div class="testimonials-home__slider">
							<div class="testimonials-home__wrap">
								<?php
									if( have_rows('testimonials', 163) ):
									    // loop through the rows of data
									    $count = 0;
									    while ( have_rows('testimonials', 163) ) : the_row();
									    	$count++;
									    	if($count > esc_attr(5)):
									    	else:
										    ?>
										        <blockquote class="blockquote">
                                                    <footer class="blockquote-footer"><?php the_sub_field('name'); ?> in <?php the_sub_field('area'); ?> <img class="testimonials__logo lazy" data-src="<?php the_sub_field('logo'); ?>" /></footer>
										        	<p class="mb-0"><?php the_sub_field('body'); ?></p>
										    	</blockquote>
										    <?php
										    endif;
									    endwhile;
									endif;
								?>
							</div>
                        </div>
                    </div>
				</div>
			</div>
		</section>
	</main>
<?php endwhile; ?>

<?php get_footer(); ?>
