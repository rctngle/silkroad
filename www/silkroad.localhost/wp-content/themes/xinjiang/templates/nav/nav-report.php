<?php
$slug = get_post_field( 'post_name', get_post() );

$title = xinjiang_translate_field(get_field('title_ml_text'));
$short_title = xinjiang_translate_field(get_field('short_title_ml_text'));
$display_title = ($short_title) ? $short_title : $title;

$is_chapter = $args['is_chapter'];
$is_intro = $args['is_intro'];
$is_conclusion = $args['is_conclusion'];
$chapter_num = $args['chapter_num'];

?>


<a href="#<?php echo $slug; ?>">
	<span class="active-marker"></span>
	<?php if ($is_chapter): ?>		
		<span class="horizontal-chapter-number"><?php echo $chapter_num;?>. </span>
	<?php endif; ?>

	<?php echo $display_title; ?>

	<?php if ($is_chapter || $is_intro || $is_conclusion): ?>			
		<?php if(has_post_thumbnail()):?>
			<div class="image">
				<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium');?>"/>
			</div>
		<?php endif;?>
	<?php endif; ?>
	<?php /* <div class="expand">
		<i class="fal fa-chevron-down"></i>
	</div> */?>
</a>

