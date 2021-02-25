<?php

$testimonies_query = new WP_Query([
	'post_type' => 'testimony',
	'posts_per_page' => -1,
]);

?>

<?php if ($testimonies_query->have_posts()): ?>
	<div class="section-inner">
		<?php while($testimonies_query->have_posts()): $testimonies_query->the_post(); ?>
			<?php get_template_part('templates/posts/post', get_post_type()); ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata() ?>
	</div>
<?php endif; ?>