<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package tinyminute
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}



add_filter( 'body_class', 'tinyminute_body_classes' );

if ( ! function_exists( 'tinyminute_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */
	function tinyminute_body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
}

// Removes tag class from the body_class array to avoid Bootstrap markup styling issues.
add_filter( 'body_class', 'tinyminute_adjust_body_class' );

if ( ! function_exists( 'tinyminute_adjust_body_class' ) ) {
	/**
	 * Setup body classes.
	 *
	 * @param string $classes CSS classes.
	 *
	 * @return mixed
	 */
	function tinyminute_adjust_body_class( $classes ) {

		foreach ( $classes as $key => $value ) {
			if ( 'tag' == $value ) {
				unset( $classes[ $key ] );
			}
		}

		return $classes;

	}
}

/**
 * Display navigation to next/previous post when applicable.
 */

add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');

function post_link_attributes($output) {
    $code = 'class="btn btn-blue-outline btn-round"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}

if ( ! function_exists ( 'tinyminute_post_nav' ) ) {
	function tinyminute_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		
		<nav class="container navigation post-navigation">
			<h2 class="sr-only">Post navigation</h2>
			<div class="row nav-links justify-content-between">
				<?php

					if ( get_previous_post_link() ) {
						previous_post_link( '<span class="nav-previous">%link</span>', '<i class="fa fa-angle-left"></i>&nbsp;%title', 'Previous post link' );
					}
					if ( get_next_post_link() ) {
						next_post_link( '<span class="nav-next">%link</span>', '%title&nbsp;<i class="fa fa-angle-right"></i>', 'Next post link' );
					}
				?>
			</div><!-- .nav-links -->
		</nav><!-- .navigation -->

		<?php
	}
}

// Remove “Category:”, “Tag:”, “Author:” from the_archive_title
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});

