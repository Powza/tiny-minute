<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package tinyminute
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
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
	    	<div class="explore__info__wrap">
	        	<h2><a href="<?php the_permalink() ?>" title="View <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	        	<?php if ( 'post' == get_post_type() ) : ?>
	        	<small><?php echo get_the_date(); ?></small>
	        	<?php else: ?>
	        	<?php if( get_field('project_area') ) { ?>
					<small><?php echo get_field('project_area'); ?></small>
				<?php } ?>
	        	<?php endif; ?>
	        	<p><?php the_excerpt(); ?></p>
	        </div>
	    </div>
	</div>
</article><!-- #post-## -->
