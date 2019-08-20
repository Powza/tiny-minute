<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package tinyminute
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="comments-area" id="comments">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

		<h3 class="comments-title">
			
			<?php
				$comments_number = get_comments_number();
				if ( 1 === (int)$comments_number ) {
					printf(
						/* translators: %s: post title */
						esc_html( 'One comment on &ldquo;%s&rdquo;', 'comments title' ),
						'<span>' . get_the_title() . '</span>'
					);
				} else {
					printf( // WPCS: XSS OK.
						/* translators: 1: number of comments, 2: post title */
						esc_html('%1$s comments on &ldquo;%2$s&rdquo;'),
						number_format_i18n( $comments_number ),
						'<span>' . get_the_title() . '</span>'
					);
				}
			?>

		</h3><!-- .comments-title -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through. ?>
			
			<nav class="comment-navigation" id="comment-nav-above">
				
				<h1 class="screen-reader-text">Comment navigation</h1>
				
				<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous"><?php previous_comments_link( '&larr; Older Comments' ); ?></div>
				<?php }
					if ( get_next_comments_link() ) { ?>
					<div class="nav-next"><?php next_comments_link( 'Newer Comments &rarr;' ); ?></div>
				<?php } ?>

			</nav><!-- #comment-nav-above -->

		<?php endif; // check for comment navigation. ?>

		<ul class="commentlist">
			<?php wp_list_comments( 'type=comment&callback=tinyminute_comment' ); ?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through. ?>
			
			<nav class="comment-navigation" id="comment-nav-below">
				
				<h1 class="screen-reader-text">Comment navigation</h1>
				
				<?php if ( get_previous_comments_link() ) { ?>
					<div class="nav-previous"><?php previous_comments_link( '&larr; Older Comments' ); ?></div>
				<?php }
					if ( get_next_comments_link() ) { ?>
					<div class="nav-next"><?php next_comments_link( 'Newer Comments &rarr;' ); ?></div>
				<?php } ?>

			</nav><!-- #comment-nav-below -->
			
		<?php endif; // check for comment navigation. ?>

	<?php endif; // endif have_comments(). ?>

	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>

		<p class="no-comments">Comments are closed.</p>

	<?php endif; ?>

	<?php comment_form(); // Render comments form. ?>

</div><!-- #comments -->
