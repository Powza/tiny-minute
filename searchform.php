<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package tinyminute
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label class="sr-only" for="s">Search</label>
	<div class="input-group">
		<input class="field form-control" id="s" name="s" type="text" placeholder="Search website &hellip;" value="<?php the_search_query(); ?>">
		<div class="input-group-append">
			<input class="submit btn btn-blue" id="searchsubmit" name="submit" type="submit" value="Search">
		</div>
	</div>
</form>
