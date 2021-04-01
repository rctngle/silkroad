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

<div><a href="#introduction-anchor">Introduction</a></div>
<div><a href="#cases-anchor">Cases</a></div>
<div><a href="#report-anchor">Report</a></div>
<div><a href="#conclusions-anchor">Conclusions</a></div>
<div><a href="#recommendations-anchor">Recommendations</a></div>
<div class="take-action"><a href="#take-action-anchor">Take Action</a></div>

<?php if ($chapters_query->have_posts()): ?>
	<?php $chapter_counter = 0; ?>
	<?php while($chapters_query->have_posts()): $chapters_query->the_post(); ?>
		<?php $slug = get_post_field( 'post_name', get_post() ); ?>
		<?php /* <div>
			<a href="#<?php echo $slug; ?>">
				<?php echo silkroad_translate('chapter-n', LANG, [$chapter_counter+1]); ?>								
			</a>
			<div class="nav-tooltip">
				<?php echo silkroad_translate_field(get_field('title_ml_text')); ?>
			</div>
		</div> */?>
		
		<?php $chapter_counter++; ?>
	<?php endwhile; ?>
	<?php wp_reset_postdata() ?>
<?php endif; ?>

