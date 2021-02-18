<?php

$cases_query = new WP_Query([
	'post_type' => 'case',
	'posts_per_page' => -1,
]);

?>

<?php if ($cases_query->have_posts()): ?>
	<?php while($cases_query->have_posts()): $cases_query->the_post(); ?>
		<?php get_template_part('templates/posts/post', get_post_type()); ?>
	<?php endwhile; ?>
	<?php wp_reset_postdata() ?>
<?php endif; ?>