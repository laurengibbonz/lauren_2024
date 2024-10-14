<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Lauren 2024
 */
get_header(); ?>
<header class="single__title scene scene--fadein">
	<h2><?php the_title(); ?></h2>
		<?php if(get_field('location')) {
			echo '<h3 class="location">';
			echo get_field('location');
			echo '</h3>';
		} ?>
		<?php if(get_field('headline')) {
			echo '<h4 class="headline">';
			echo get_field('headline');
			echo '</h4>';
		} ?>

</header>
