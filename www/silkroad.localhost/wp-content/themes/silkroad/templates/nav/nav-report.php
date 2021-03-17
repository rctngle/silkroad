<?php
$slug = get_post_field( 'post_name', get_post() );

$title = silkroad_translate_field(get_field('title_ml_text'));
$short_title = silkroad_translate_field(get_field('short_title_ml_text'));
$display_title = ($short_title) ? $short_title : $title;

$is_chapter = $args['is_chapter'];
$is_intro = $args['is_intro'];
$chapter_num = $args['chapter_num'];

?>


<a href="#<?php echo $slug; ?>">
	<?php if ($is_chapter): ?>
		<h5><?php echo silkroad_translate('chapter-n', LANG, [$chapter_num]); ?></h5>
	<?php else:?>
		<!-- <h5>&nbsp;</h5> -->
	<?php endif; ?>

	<?php echo $display_title; ?>

	<?php if ($is_chapter || $is_intro): ?>			
		<?php if(has_post_thumbnail()):?>
			<div class="image">
				<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium');?>"/>
			</div>
		<?php endif;?>
	<?php endif; ?>
</a>

