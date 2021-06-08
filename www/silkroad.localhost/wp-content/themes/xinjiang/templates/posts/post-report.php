<?php

$slug = get_post_field( 'post_name', get_post() );

$is_chapter = $args['is_chapter'];
$chapter_num = $args['chapter_num'];
$is_intro = $args['is_intro'];
$idx = $args['idx'];


$classes = ['report', 'depth-' . $args['depth']];

if ($args['report_content_type_terms'] && $args['report_content_type_terms']) {
	foreach($args['report_content_type_terms'] as $term) {
		$classes[] = 'content-type-' . $term->slug;
		if($term->slug == 'legal-text'){
			$is_legal_text = true;
		}
	}

}
$header_image_size = get_field('header_image_size');
$header_image_classes = ['media', 'illustration'];
$header_image_classes[]=$header_image_size;
if($header_image_size == 'cover'){
	$header_image_classes[]=get_field('header_image_placement');	
}

?>

<?php if($is_intro && $args['depth'] === 0 && $idx == 0):?>
	<article class="<?php echo implode(' ', $classes); ?>" data-rootparent="<?php echo $args['root_parent']; ?>" data-subparent="<?php echo $args['sub_parent']; ?>">

		<?php if($is_chapter || $is_intro):?>			
			<?php if(has_post_thumbnail()):?>
				<div class="<?php echo implode(' ', $header_image_classes);?>">					
					<div class="image"><?php the_post_thumbnail('2048x2048');?></div>
				</div>
			<?php endif;?>
		<?php endif;?>

		<div class="content-box">
			<div class="section-title">
				<h1><?php echo xinjiang_translate('enemies-in-war'); ?></h1>
				<h2><?php echo xinjiang_translate('chinas-mass-internment'); ?></h2>
			</div>
		</div>	
	</article>

	<div id="report-nav-scroller" class="scroller">
		<div class="scroller-outer">
			<div class="scroller-inner">
				<?php xinjiang_report_display_nav(0, 0, 0);?>
				<div class="padder"></div>
			</div>
		</div>	
		<div class="gradient right scroller-next">
			<div class="button" style="background-image: url(<?php bloginfo('template_directory');?>/assets/images/ico-arrow-right-white.svg)"></div>
		</div>
		<div class="gradient left scroller-prev">
			<div class="button" style="background-image: url(<?php bloginfo('template_directory');?>/assets/images/ico-arrow-left-white.svg)"></div>
		</div>

	</div>


	


	<article class="<?php echo implode(' ', $classes); ?>" data-rootparent="<?php echo $args['root_parent']; ?>" data-subparent="<?php echo $args['sub_parent']; ?>">

		<a class="anchor" name="<?php echo $slug; ?>"></a>
		<div class="content-box">
			<?php if ($is_chapter): ?>
				<div class="section-title">
					<h1><?php echo xinjiang_translate('chapter-n', LANG, [$chapter_num]); ?></h1>
					<h2><?php echo xinjiang_translate_field(get_field('title_ml_text')); ?></h2>
				</div>
			<?php elseif($args['depth'] == 0):?>
				<h2><?php echo xinjiang_translate_field(get_field('title_ml_text')); ?></h2>
			<?php elseif($is_legal_text):?>
				<div class="legal-text-title">
					<h3><i class="fal fa-balance-scale"></i> Legal Reference</h3>
					<p><?php echo xinjiang_translate_field(get_field('title_ml_text')); ?></p>
					<div class="expand">
						<i class="fas fa-caret-down"></i>
						<i class="fas fa-caret-up"></i>
					</div>
				</div>
			<?php else:?>

				<h3><?php echo xinjiang_translate_field(get_field('title_ml_text')); ?> <div class="expand"><i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></div></h3>
			<?php endif; ?>

			<?php echo xinjiang_translate_field(get_field('content_ml_rich_text')); ?>		
		</div>
	</article>

<?php else: ?>

	<article class="<?php echo implode(' ', $classes); ?> <?php if ($args['idx'] == 0 && $args['root_parent_slug'] !== 'recommendations'): ?>expanded<?php endif; ?>" data-rootparent="<?php echo $args['root_parent']; ?>" data-subparent="<?php echo $args['sub_parent']; ?>" data-idx="<?php echo $args['idx']; ?>">
		<a class="anchor" name="<?php echo $slug; ?>"></a>

		<?php if($is_chapter || $is_intro):?>
			<?php if(has_post_thumbnail()):?>
				<div class="<?php echo implode(' ', $header_image_classes);?>">
					<?php
						$post_thumbnail_id = get_post_thumbnail_id();
						$post_thumbnail_alt = get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true);
					?>			
					<div class="image"><?php echo wp_get_attachment_image( $post_thumbnail_id, '2048x2048', false, ['alt' => $post_thumbnail_alt] ); ?></div>
				</div>
			<?php endif;?>
		<?php endif;?>


		<div class="content-box">
			<?php if ($is_chapter): ?>
				<div class="section-title">
					<h1><?php echo xinjiang_translate('chapter-n', LANG, [$chapter_num]); ?></h1>
					<h2><?php echo xinjiang_translate_field(get_field('title_ml_text')); ?></h2>
				</div>
			<?php elseif($args['depth'] == 0):?>
				<h2><?php echo xinjiang_translate_field(get_field('title_ml_text')); ?></h2>
			<?php else:?>
				<h3><?php echo xinjiang_translate_field(get_field('title_ml_text')); ?> <div class="expand"><i class="fas fa-caret-down"></i><i class="fas fa-caret-up"></i></div></h3>
			<?php endif; ?>

			<?php echo xinjiang_translate_field(get_field('content_ml_rich_text')); ?>		

			<?php if ($args['depth'] == 1): ?>
				<?php

				$boxes_query = new WP_Query([
					'post_type' => 'report',
					'posts_per_page' => 10,
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'post_parent' => $args['post_id'],
				]);

				// echo "<pre>";
				// print_r($boxes_query->posts);
				// echo "</pre>";

				?>
				<?php if ($boxes_query->have_posts()): ?>
					<?php while($boxes_query->have_posts()): $boxes_query->the_post(); ?>

						<?php
						$terms = get_the_terms($post_id, 'report_content_types');
						
						$is_legal_text = false;
						$is_text_box = false;

						$box_classes = [];
						if ($terms && is_array($terms) && count($terms) > 0) {
							foreach($terms as $term) {
								$box_classes[] = $term->slug;
								if ($term->slug == 'legal-text'){
									$is_legal_text = true;
								} else if ($term->slug == 'text-box') {
									$is_text_box = true;
								}

							}
						}	
						?>

						<div class="<?php echo implode(' ', $box_classes); ?>">

							<div class="title">
								<?php if($is_legal_text):?>
									<h4><i class="fal fa-balance-scale"></i> Legal Reference</h4>
								<?php endif; ?>

								<h3><?php echo xinjiang_translate_field(get_field('title_ml_text')); ?></h3>
							</div>
							
							<?php echo xinjiang_translate_field(get_field('content_ml_rich_text')); ?>
						</div>
					<?php endwhile; ?>

					<?php
					$boxes_query->reset_postdata();
					wp_reset_postdata();
					?>
				<?php endif; ?>

			<?php endif; ?>
		</div>

	</article>


<?php endif; ?>