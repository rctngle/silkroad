<?php

$resources_query = new WP_Query([
	'post_type' => 'resource',
	'posts_per_page' => -1,
]);

?>

<h1><?php echo xinjiang_translate('resources'); ?></h1>

<?php if ($resources_query->have_posts()): ?>
	<?php while($resources_query->have_posts()): $resources_query->the_post(); ?>
		<?php get_template_part('templates/posts/post', get_post_type()); ?>
	<?php endwhile; ?>
	<?php wp_reset_postdata() ?>
<?php endif; ?>
