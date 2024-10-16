<div class="overlay-navigation">
	<div class="overlay__text">
<?php $args = array(
	'post_type' => 'work',
	'post_status' => 'publish',
	'posts_per_page' => 6,
	'orderby' => 'date',
	'order' => 'DESC'
	);
$query = new WP_Query( $args );
if ( $query->have_posts() ) :
	while ( $query->have_posts() ) :
	$query->the_post();
	echo '<h3><a href="'.get_the_permalink($post->ID).'">'.get_the_title().'</a></h3>';
	endwhile;
endif; ?>
	<?php echo '<h3><a href="'.get_the_permalink(2).'">'.get_the_title(2).'</a></h3>' ?>
	</div>
</div>