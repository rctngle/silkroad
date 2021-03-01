<?php

$slug = get_post_field( 'post_name', get_post() );

$is_chapter = $args['is_chapter'];
$chapter_num = $args['chapter_num'];
$is_legal_text = false;
$classes = ['report', 'depth-' . $args['depth']];

if ($args['report_content_type_terms'] && $args['report_content_type_terms']) {
	foreach($args['report_content_type_terms'] as $term) {
		$classes[] = 'content-type-' . $term->slug;
		// if($term->slug == 'legal-text'){
		// 	$is_legal_text = true;
		// } else {
		// 	$classes[]='concatenate';			
		// }
	}

}



?>

<article class="<?php echo implode(' ', $classes); ?>">
	<?php if($is_chapter):?>

	<div class="bw-inlay">
		<img src="<?php bloginfo('template_directory');?>/assets/images/inlay.jpg">
	</div>



	<?php endif;?>
	<a name="<?php echo $slug; ?>"></a>
	<div class="content-box">
		<?php if ($is_chapter): ?>
			<div class="section-title">
				<h1><?php echo silkroad_translate('chapter-n', LANG, [$chapter_num]); ?></h1>
				<h2><?php echo silkroad_translate_field(get_field('title_ml_text')); ?></h2>
			</div>
		<?php elseif($args['depth'] == 0):?>
			<h2><?php echo silkroad_translate_field(get_field('title_ml_text')); ?></h2>
		<?php else:?>
			<h3><?php echo silkroad_translate_field(get_field('title_ml_text')); ?> <div class="expand"><i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></div></h3>
		<?php endif; ?>
		<?php echo silkroad_translate_field(get_field('content_ml_rich_text')); ?>		
		<!-- <?php if(!$is_legal_text):?>
			<div class="continue"><p><a href="">Continue reading</a></p></div>
		<?php endif;?> -->
	</div>
</article>
