<?php

$cta_page = xinjiang_get_post_by_slug('page', 'call-to-action');
$share_title = xinjiang_translate('social-media-text');

?>
<div class="media image">
	
	<?php echo wp_get_attachment_image(1907, '2048x2048', false, ['alt' => ''] ); ?></div>
	<div class="gradient"></div>
</div>
<div class="section-inner">


	<div class="content-box section-title centered">
		<h1><?php echo xinjiang_translate_field(get_field('title_ml_text', $cta_page->ID)); ?></h1>
	</div>
	
	<div class="cta-body content-box">
		<div class="take-action__quote">
			<h2>“[Chinese authorities] are looking for any excuse to sentence you” <span>&mdash; a detainee’s relative</span></h2>
		</div>
		<div class="cta-text">
			
			<?php echo xinjiang_translate_field(get_field('content_ml_rich_text', $cta_page->ID)); ?>			
		</div>

		<a href="http://www.twitter.com/intent/tweet?text=<?php echo urlencode($share_title); ?>" target="_blank" class="take-action-button">Take Action</a>

		<iframe src="<?php echo xinjiang_translate('call-to-action-widget'); ?>"></iframe>
	</div>
</div>