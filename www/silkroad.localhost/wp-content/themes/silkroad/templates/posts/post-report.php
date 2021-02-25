<?php

$is_chapter = $args['is_chapter'];
$chapter_num = $args['chapter_num'];

?>
<article class="report">
	<div class="content-box">

		<?php if ($is_chapter): ?>
			<h3><?php echo silkroad_translate('chapter-n', LANG, [$chapter_num]); ?>
		<?php endif; ?>
		<h3><?php echo silkroad_translate_field(get_field('title_ml_text')); ?></h3>
		<?php echo silkroad_translate_field(get_field('content_ml_rich_text')); ?>		
	</div>
</article>
