<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tinyminute
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action('body_top'); ?>
<header class="header">
	<div class="container-fluid container-fluid-fixed">
		<div class="row">
			<div class="col-12 col-lg-3 align-self-center">
				<div class="header__logo">
					<a href="<?php echo get_home_url(); ?>" title="Tiny Minute Website Design & Development">
						<svg viewBox="0 0 697 119" xmlns="http://www.w3.org/2000/svg"><path id="logo" d="M244.6 67.76c14.18-22.41 28.35-44.83 42.55-67.22-4.53 16.81-9.12 33.61-13.68 50.42 6.77.32 13.55.65 20.34.96-13.34 22.17-26.62 44.38-39.96 66.55 4.41-17.04 8.89-34.06 13.32-51.1-7.52.14-15.05.3-22.57.39zM484.5 20.5h16.75v78c-7.88.01-15.76 0-23.63 0-7.31-19.38-14.3-38.88-21.82-58.18.82 8.21 1.94 16.42 1.96 24.69-.03 11.16.01 22.33-.02 33.49h-16.48c-.02-26-.02-52 0-78h22.99c7.51 19.71 15.07 39.4 22.52 59.14-3.27-19.55-2.04-39.42-2.27-59.14zM556.5 20.5h18.75c.01 16.83-.02 33.67.01 50.5.13 6.88-1.4 14.09-5.87 19.51-5.17 6.3-13.41 9.43-21.41 9.75-8.84.51-18.55-.74-25.39-6.87-5.73-5.1-8.25-12.86-8.3-20.37-.09-17.51-.03-35.02-.03-52.52H533c.01 17.54-.02 35.09.01 52.63.08 4.7 1.46 10.41 6.29 12.35 4.5 1.71 10.46 1.5 13.98-2.13 2.45-2.8 3.17-6.65 3.22-10.27 0-17.53-.01-35.05 0-52.58zM.5 20.5h59.55c-.63 4.83-1.23 9.67-1.87 14.5H39v63.5H20.5c-.01-21.17 0-42.33 0-63.5-6.67-.01-13.33.01-20 0V20.5zM67.26 98.5c-.02-26-.02-52 0-78h18.48c.02 26 .01 52 .01 78-6.16.01-12.33-.01-18.49 0zM100 20.5h22.99c7.5 19.54 14.85 39.14 22.43 58.65-3.15-19.4-1.95-39.09-2.16-58.65H160v78c-7.9-.01-15.8.03-23.7-.02-7.22-19.63-14.55-39.21-21.88-58.8 2.96 19.48 1.91 39.2 2.08 58.82H100v-78zM166.05 20.55c6.78-.1 13.56-.03 20.34-.05 4.75 11.34 9.53 22.67 14.26 34.01 4.7-11.36 9.52-22.66 14.25-34.01h19.71c-8.21 16.33-16.69 32.53-24.95 48.83-.38 9.7-.04 19.45-.16 29.17H191c-.01-9.21.01-18.43 0-27.64.02-1.06-.23-2.04-.77-2.95-8.07-15.78-16.24-31.52-24.18-47.36zM322.56 20.5H346c3.85 17.3 7.69 34.61 11.47 51.93 3.88-17.25 7.17-34.64 10.86-51.93 7.87.07 15.75-.14 23.61.11 1.7 25.99 3.91 51.95 5.71 77.93-6.12-.11-12.25.04-18.37-.09-.36-20.14-2.55-40.28-1.51-60.43-4 17.39-7.74 34.84-11.71 52.23-5.88-.02-11.76.04-17.64-.03-3.9-17.55-8.63-34.92-12.14-52.55.89 20.29-.47 40.56-1.32 60.83-6.09-.01-12.18.03-18.26-.02 2.06-25.99 3.97-51.99 5.86-77.98zM408.5 20.5H427v78h-18.5v-78zM582 20.5c19.92 0 39.84.01 59.76-.01-.62 4.84-1.21 9.68-1.85 14.51-6.38 0-12.77-.01-19.16 0-.01 21.17.02 42.34-.01 63.5h-18.48c-.03-21.16 0-42.33-.01-63.5-6.75-.01-13.5 0-20.25 0 0-4.83-.01-9.67 0-14.5zM648.75 20.5c16.01-.01 32.02 0 48.03 0-.72 4.49-1.33 8.99-1.97 13.49-9.11.03-18.21-.01-27.31.02 0 6.08-.01 12.16 0 18.24 7.92.01 15.84-.01 23.76.01-.02 4.41-.01 8.82-.01 13.24-7.92 0-15.83-.01-23.75 0-.01 6.5 0 13 0 19.5h29.25v13.5h-48v-78z"/></svg>
					</a>
				</div>
				<div class="header__mobilebtn d-lg-none">
					<div class="header__bar"></div>
				</div>
			</div>
			<div class="col-12 col-lg-9 align-self-center d-none d-md-block">
				<nav class="header__navbar">
					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class' 	=> 'sm sm-clean',
						'menu_id'		=> 'main-menu',
						'container'		=> 'ul'
					) ); ?>
				</nav>
			</div>
		</div>
	</div>
</header>
<nav class="mobile__menu d-lg-none">
	<?php wp_nav_menu( array(
		'theme_location' => 'primary',
		'menu_class' 	=> 'sm sm-clean',
		'menu_id'		=> 'main-menu',
		'container'		=> 'ul'
	) ); ?>
</nav>
<?php
	if(
		!is_front_page() &&
		!is_404() &&
		!is_singular('portfolio_post_type') &&
		!is_post_type_archive('portfolio_post_type')
	) {
?>
<section class="section section__spacer__slim section__intro">
	<?php
		$id = get_queried_object_id();
	?>
	<?php if ( !empty( has_post_thumbnail($id) ) && !is_search() ): $image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' ); ?>
	<div class="section__background section__overlay" style="background-image: url('<?php echo $image[0]; ?>');"></div>
	<?php endif; ?>
	<div class="container-fluid container-fluid-fixed">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="section__title section__title__center">
					<h1>
						<?php
							if (is_archive() && !is_author()) {
								the_archive_title();
							}
							elseif(!is_front_page() && is_home()) {
								single_post_title();
							}
							elseif(is_author()) {
								the_author_meta('nickname');
							}
							elseif(is_search()) {
								echo '<h1>Search</h1>';
							}
							else {
								the_title();
							}
						?>
					</h1>
					<?php
						if (is_archive() && !is_author()) {
							the_archive_description();
						} elseif (!has_excerpt()) {
					    	the_archive_description();
					    	if(is_single()) {
					    		echo '<p>'.get_the_date().'</p>';
					    	}
						} elseif (is_search()) {
						} else {
					    	the_excerpt();
						}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
	}
?>

