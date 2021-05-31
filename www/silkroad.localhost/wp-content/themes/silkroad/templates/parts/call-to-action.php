<?php

$cta_page = silkroad_get_post_by_slug('page', 'call-to-action');

?>
<div class="section-inner">
	<div class="content-box section-title centered">
		<h1><?php echo silkroad_translate_field(get_field('title_ml_text', $cta_page->ID)); ?></h1>
		<h1 class="sub-title"></h1>	
	</div>
	<div class="media image">
		<img role="presentation" alt="" src="<?php bloginfo('template_directory');?>/assets/images/mensell.jpg">
		<div class="gradient"></div>
	</div>

	<div class="content-box cta-body">
		<div class="section-title centered">
			
			<div>
				<?php echo silkroad_translate_field(get_field('content_ml_rich_text', $cta_page->ID)); ?>
			</div>

			<div class="take-action-button">
				Take Action
			</div>
		</div>

		<iframe src="<?php echo silkroad_translate('call-to-action-widget'); ?>"></iframe>
	</div>
</div>