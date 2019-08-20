<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/*-----------------------------------------------------------------------------------*/
/*  Create Shortcodes
/*-----------------------------------------------------------------------------------*/

// [testimonials limit="1"]
function client_testimonials( $atts ) {
	ob_start();
	// Attributes
	$atts = shortcode_atts( array(
		'limit' 	=> '99',
		'post_id'	=> null
	), $atts );
	// check if the flexible content field has rows of data
	if( have_rows('testimonials', $atts['post_id']) ):
	    // loop through the rows of data
	    $count = 1;
	    ?>
	    <section class="section section__spacer__slim">
	    	<div class="container-fluid container-fluid-fixed">
			    <div class="testimonials">
				    <?php
				    while ( have_rows('testimonials', $atts['post_id']) ) : the_row();
				    	$count++;
				    	if($count > esc_attr($atts['limit'])):
				    	else:
					    ?>
					    <div class="row row-eq-height">
					    	<div class="col-md-3">
					    		<img class="testimonials__logo" src="<?php the_sub_field('logo'); ?>" />
					    	</div>
						    <div class="col-md-9">
						        <blockquote class="blockquote">
						        	<p><?php the_sub_field('body'); ?></p>
						        	<footer class="blockquote-footer"><?php the_sub_field('name'); ?> in <?php the_sub_field('area'); ?></footer>
						    	</blockquote>
						    </div>
						</div>
					    <?php
					    endif;
				    endwhile;
				    ?>
				</div>
			</div>
		</section>
	    <?php
	endif;
	return ob_get_clean();
}
add_shortcode( 'testimonials', 'client_testimonials' );

// [projects limit="1"]
function client_projects( $atts ) {
	ob_start();
	// define attributes and their defaults
    extract( shortcode_atts( array (
        'type'           => 'portfolio_post_type',
        'category'       => null,
        'posts'          => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'author'         => null,
    ), $atts ) );
    
    // define query parameters based on attributes
    $args = array(
        'post_type'         => $type,
        'posts_per_page'    => $posts,
        'orderby'           => $orderby,
        'order'             => $order,
        'author'            => $author,
    );
    $loop = new WP_Query( $args );
    echo '<div class="accomplishments__slider">';
    while ( $loop->have_posts() ) : $loop->the_post();
    ?>
    <div class="accomplishments__item">
		<a class="explore__link" href="<?php the_permalink(); ?>">
			<div class="explore__wrap">
				<div class="explore__image">
					<?php if ( !empty( has_post_thumbnail() ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
					<div class="explore__pic lazy" data-bg="url(<?php echo $image[0]; ?>)"></div>
					<?php else: ?>
					<?php endif; ?>
				</div>
	        </div>
		</a>
	</div>
	<?php
	endwhile;
	echo '</div>';
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode( 'projects', 'client_projects' );

// [sitemap]
function sitemap( $atts ) {
	ob_start();
	// Attributes
	$atts = shortcode_atts( array(
		'limit' 	=> '99',
		'post_id'	=> null
	), $atts );
	// check if the flexible content field has rows of data
	?>
	<div class="row sitemap">
		<div class="col-md-6">

			<div class="card">
				<div class="card-header">
				    Pages
				</div>
				<div class="card-body">
					<ul class="list-unstyled">
						<?php
							$args = array(
							    'title_li' => null,
							);
							wp_list_pages($args);
						?>
						<li><a href="<?php echo get_home_url(); ?>/explore">Explore</a></li>
					</ul>
				</div>
			</div>

			<?php
				$args = array(
				    'post_type' => 'portfolio_post_type',
				);
				$loop = new WP_Query($args);
				if( $loop->have_posts() ) :
				?>
				<div class="card">
					<div class="card-header">
						Portfolio
					</div>
					<div class="card-body">
						<ul class="list-unstyled">
							<?php
							while($loop->have_posts()): $loop->the_post();
							?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php
							endwhile;
							?>
						</ul>
					</div>
				</div>
				<?php
				endif;
				wp_reset_query();
			?>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
				    Categories
				</div>
				<div class="card-body">
					<ul class="list-unstyled">
						<?php
							$args = array(
							    'title_li' => null,
							    'show_count'=> 1,
							    'echo' => 0
							);
							$categories = wp_list_categories($args);
							$categories = preg_replace('/<\/a> \(([0-9]+)\)/', ' <span class="count">(\\1)</span></a>', $categories);
							echo $categories;
						?>
					</ul>
				</div>
			</div>
			<?php
				$args = array(
				    'orderby' => 'date',
				);
				$loop = new WP_Query( $args );
				if( $loop->have_posts() ) :
				?>
				<div class="card">
					<div class="card-header">
						Posts
					</div>
					<div class="card-body">
						<ul class="list-unstyled">
							<?php
							while ( $loop->have_posts() ) : $loop->the_post();
							?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php
							endwhile;
							?>
						</ul>
					</div>
				</div>
				<?php
				endif;
				wp_reset_query();
			?>
		</div>
	</div>

	<?php
	return ob_get_clean();
}
add_shortcode( 'sitemap', 'sitemap' );