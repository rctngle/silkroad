<?php
$slug = get_post_field( 'post_name', get_post() );

$title = silkroad_translate_field(get_field('title_ml_text'));
$short_title = silkroad_translate_field(get_field('short_title_ml_text'));
$display_title = ($short_title) ? $short_title : $title;

$is_chapter = $args['is_chapter'];
$chapter_num = $args['chapter_num'];

?>
<li class="reportid-<?php echo get_the_ID(); ?>">
	<a href="#<?php echo $slug; ?>">
		<?php if ($is_chapter): ?>
			<h5><?php echo silkroad_translate('chapter-n', LANG, [$chapter_num]); ?></h5>
		<?php endif; ?>
		<?php echo $display_title; ?>
	</a>
</li>