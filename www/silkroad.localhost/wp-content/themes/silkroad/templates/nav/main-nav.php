<?php

$chapters_query = new WP_Query([
	'post_type' => 'report',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'tax_query' => [
		[
			'taxonomy' => 'report_content_types',
			'field' => 'slug',
			'terms' => 'chapter',
		]
	],
]);

?>

<?php if ($chapters_query->have_posts()): ?>
	<?php $chapter_counter = 0; ?>
	<?php while($chapters_query->have_posts()): $chapters_query->the_post(); ?>
		<?php $slug = get_post_field( 'post_name', get_post() ); ?>
		<div>
			<a href="#<?php echo $slug; ?>">
				<?php echo silkroad_translate('chapter-n', LANG, [$chapter_counter+1]); ?>
				<br />
				<?php echo silkroad_translate_field(get_field('title_ml_text')); ?>
			</a>
		</div>
		<?php $chapter_counter++; ?>
	<?php endwhile; ?>
	<?php wp_reset_postdata() ?>
<?php endif; ?>

