<?php

$slug = get_post_field( 'post_name', get_post() );

$is_chapter = $args['is_chapter'];
$chapter_num = $args['chapter_num'];
$is_intro = $args['is_intro'];
$idx = $args['idx'];

$is_legal_text = false;
$classes = ['report', 'depth-' . $args['depth']];

if ($args['report_content_type_terms'] && $args['report_content_type_terms']) {
	foreach($args['report_content_type_terms'] as $term) {
		$classes[] = 'content-type-' . $term->slug;
		if($term->slug == 'legal-text'){
			$is_legal_text = true;
		}
	}

}

?>


<?php if($is_intro && $args['depth'] === 0 && $idx == 0):?>

	<article class="<?php echo implode(' ', $classes); ?>" data-rootparent="<?php echo $args['root_parent']; ?>" data-subparent="<?php echo $args['sub_parent']; ?>">
		<a class="anchor" name="<?php echo $slug; ?>"></a>

		<?php if($is_chapter || $is_intro):?>
			<?php if(has_post_thumbnail()):?>
				<div class="media illustration">					
					<div class="image"><?php the_post_thumbnail('2048x2048');?></div>
				</div>
			<?php endif;?>
		<?php endif;?>

		<div class="content-box">
			<div class="section-title">
				<h1>Report</h1>
				<h2>Xinjiang: Eventual Report Title</h2>
			</div>
		</div>	
	</article>

	<div id="report-nav-scroller" class="scroller">
		<div class="scroller-outer">
			<div class="scroller-inner">
				<?php silkroad_report_display_nav(0, 0, 0);?>
			</ul>
		</div>
	</div>

	<?php /*
	<div class="gradient right report-swiper-button-next">
		<div class="button" style="background-image: url(<?php bloginfo('template_directory');?>/assets/images/ico-arrow-right-white.svg)"></div>
	</div>
	<div class="gradient left report-swiper-button-prev">
		<div class="button" style="background-image: url(<?php bloginfo('template_directory');?>/assets/images/ico-arrow-left-white.svg)"></div>
	</div>
	*/ ?>

	<article class="<?php echo implode(' ', $classes); ?>" data-rootparent="<?php echo $args['root_parent']; ?>" data-subparent="<?php echo $args['sub_parent']; ?>">
		<div class="content-box">
			<?php if ($is_chapter): ?>
				<div class="section-title">
					<h1><?php echo silkroad_translate('chapter-n', LANG, [$chapter_num]); ?></h1>
					<h2><?php echo silkroad_translate_field(get_field('title_ml_text')); ?></h2>
				</div>
			<?php elseif($args['depth'] == 0):?>
				<h2><?php echo silkroad_translate_field(get_field('title_ml_text')); ?></h2>
			<?php elseif($is_legal_text):?>
				<div class="legal-text-title">
					<h3><i class="fal fa-balance-scale"></i> Legal Reference</h3>
					<p><?php echo silkroad_translate_field(get_field('title_ml_text')); ?></p>
					<div class="expand">
						<i class="fas fa-caret-down"></i>
						<i class="fas fa-caret-up"></i>
					</div>
				</div>
			<?php else:?>

				<h3><?php echo silkroad_translate_field(get_field('title_ml_text')); ?> <div class="expand"><i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></div></h3>
			<?php endif; ?>

			<?php echo silkroad_translate_field(get_field('content_ml_rich_text')); ?>		
		</div>
	</article>

<?php else: ?>


	<article class="<?php echo implode(' ', $classes); ?>" data-rootparent="<?php echo $args['root_parent']; ?>" data-subparent="<?php echo $args['sub_parent']; ?>">
		<a class="anchor" name="<?php echo $slug; ?>"></a>

		<?php if($is_chapter || $is_intro):?>
			<?php if(has_post_thumbnail()):?>
				<div class="media illustration">
					
					<div class="image"><?php the_post_thumbnail('2048x2048');?></div>
					
				</div>
			<?php endif;?>
		<?php endif;?>


		<div class="content-box">
			<?php if ($is_chapter): ?>
				<div class="section-title">
					<h1><?php echo silkroad_translate('chapter-n', LANG, [$chapter_num]); ?></h1>
					<h2><?php echo silkroad_translate_field(get_field('title_ml_text')); ?></h2>
				</div>
			<?php elseif($args['depth'] == 0):?>
				<h2><?php echo silkroad_translate_field(get_field('title_ml_text')); ?></h2>
			<?php elseif($is_legal_text):?>
				<div class="legal-text-title">
					<h4><i class="fal fa-balance-scale"></i> Legal Reference</h4>
					<p><?php echo silkroad_translate_field(get_field('title_ml_text')); ?></p>
					<div class="expand">
						<i class="fas fa-caret-down"></i>
						<i class="fas fa-caret-up"></i>
					</div>
				</div>
			<?php else:?>

				<h3><?php echo silkroad_translate_field(get_field('title_ml_text')); ?> <div class="expand"><i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></div></h3>
			<?php endif; ?>

			<?php echo silkroad_translate_field(get_field('content_ml_rich_text')); ?>		
		</div>

		<?php if($post->post_name == 'background'):?>

			<section id="map"><?php get_template_part('templates/parts/map'); ?></section>
		<?php endif;?>

	</article>


<?php endif; ?>