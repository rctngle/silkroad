<?php

$video_page = xinjiang_get_post_by_slug('page', 'video');

?>
<section id="video">
	<div class="section-inner">	
		
		<div class="columns">
			
			<div class="text">
				<h3><?php echo xinjiang_translate_field(get_field('title_ml_text', $video_page->ID)); ?></h3>

				<div>

					<?php echo xinjiang_translate_field(get_field('content_ml_rich_text', $video_page->ID)); ?>
				</div>
			</div>
			<div class="video-container">
				<div class="embed">
					<div class="embed__outline">
						<img alt="" src="<?php bloginfo('template_directory');?>/assets/images/video-outline.svg">
					</div>
					<?php echo xinjiang_translate_field(get_field('video_ml_oembed', $video_page->ID)); ?>
				</div>
				
				<p class="media-caption">
					Bound and blindfolded inmates, likely Uighurs, being transferred at a train station in Xinjiang in 2018.
				</p>
			</div>
		</div>
	</div>		
</section>