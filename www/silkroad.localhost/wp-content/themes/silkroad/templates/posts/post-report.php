<?php

$is_chapter = $args['is_chapter'];
$chapter_num = $args['chapter_num'];

$classes = ['report'];

if ($args['report_content_type_terms'] && $args['report_content_type_terms']) {
	foreach($args['report_content_type_terms'] as $term) {
		$classes[] = 'content-type-' . $term->slug;
	}
}

?>
<article class="<?php echo implode(' ', $classes); ?>">
	<div class="content-box">

		<?php if ($is_chapter): ?>
			<div class="section-title">
				<h1><?php echo silkroad_translate('chapter-n', LANG, [$chapter_num]); ?></h1>
				<h2><?php echo silkroad_translate_field(get_field('title_ml_text')); ?></h2>
			</div>
		<?php else:?>
			<h3><?php echo silkroad_translate_field(get_field('title_ml_text')); ?></h3>
		<?php endif; ?>
		<?php echo silkroad_translate_field(get_field('content_ml_rich_text')); ?>		
	</div>
</article>