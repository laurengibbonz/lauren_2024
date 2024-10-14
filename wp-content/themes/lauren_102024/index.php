<?php
/**
 * @package WordPress
 * @subpackage Lauren
 */
?>
<?php get_header(); ?>

<?php
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android"); ?>
<div class="scenes" id="content">

<header id="home__header" class="scene scene--fadein">
<!-- <h1><?php bloginfo('name'); ?></h1> -->
<!-- <h3><?php bloginfo('description'); ?></h3> -->
<h3 class="headline">Lauren Gibbons Frank is a designer, teacher, and coder sculpting data-driven experiences that inspire.</h3>
</header>

<div id="video">
<video autoplay loop>
  <source src="https://laurengibbons.com/wp-content/uploads/2024/08/GibbonsFrank.mp4" type="video/mp4">
  <source src="https://laurengibbons.com/wp-content/uploads/2024/08/GibbonsFrank.mp4" type="video/ogg">
  Your browser does not support the video tag.
</video>
</div>

<?php 
	$args = 
	array(
	'post_type' => 'work',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'orderby' => 'date',
	'order' => 'DESC',
	'post__not_in' => array(2, 212)
	);
		 
$query = new WP_Query($args);
if ( $query->have_posts() ) :
	echo '<div class="scene scene--fadeinup">';
	while ( $query->have_posts() ) :
		$query->the_post();
		echo '<div class="item">';
		echo '<a href="'.get_the_permalink($post->ID).'">';
		$image = get_the_post_thumbnail($post->ID, 'half');
		echo $image;
		echo '<h4 class="caption">'.get_the_title().'</h4>';
		echo '</a></div>';
	endwhile;
	wp_reset_postdata();
endif; ?>

</div>
<?php get_footer(); ?>