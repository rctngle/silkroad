<?php

$cases_page = silkroad_get_post_by_slug('page', 'missing-and-detained-people');

$cases_query = new WP_Query([
	'post_type' => 'case',
	'posts_per_page' => -1,
    'orderby' => 'rand',
]);

$download_this_data_url = get_field('download_this_data_url', 'options');

?>
<div class="content-box section-title centered">

	<h1><?php echo silkroad_translate_field(get_field('title_ml_text', $cases_page->ID)); ?></h1>		
	
	<?php if ($download_this_data_url): ?>
		<div class="cases-download-container">
			<a target="_blank" href="<?php echo $download_this_data_url; ?>">
				<div class="icon">
					<img src="<?php bloginfo('template_directory');?>/assets/images/ico-download.svg">
				</div>
				<div class="label"><?php echo silkroad_translate('download-this-data'); ?></div>
			</a>
		</div>
	<?php endif; ?>

	<div>
		<?php echo silkroad_translate_field(get_field('content_ml_rich_text', $cases_page->ID)); ?>
	</div>
</div>

<div id="cases-scroller" class="scroller grabbable">
	<div class="gradient right scroller-next">
		<div class="gradient-inner"></div>
		<div class="button" style="background-image: url(<?php bloginfo('template_directory');?>/assets/images/ico-arrow-right.svg)"></div>
	</div>
	<div class="gradient left scroller-prev">
		<div class="gradient-inner"></div>
		<div class="button" style="background-image: url(<?php bloginfo('template_directory');?>/assets/images/ico-arrow-left.svg)"></div>
	</div>
	<div class="scroller-outer">
		<div class="scroller-inner">	
			<?php while($cases_query->have_posts()): $cases_query->the_post(); ?>
				<?php get_template_part('templates/posts/post', get_post_type()); ?>
			<?php endwhile; ?>
			<?php wp_reset_postdata() ?>
			<div class="padder"></div>
		</div>
	</div>
</div>

<div id="cases-pager">
	<?php while($cases_query->have_posts()): $cases_query->the_post(); ?>
		<?php get_template_part('templates/parts/case-pager'); ?>
	<?php endwhile; ?>
	<?php wp_reset_postdata() ?>

</div>

<?php /* if ($cases_query->have_posts()): ?>
	<div class="section-inner-full">	
		<div class="cases">
			<?php for($i = 0; $i < 20; $i++):?>			
				<?php while($cases_query->have_posts()): $cases_query->the_post(); ?>
					<?php get_template_part('templates/posts/post', get_post_type()); ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata() ?>
			<?php endfor;?>	
		</div>
		<div class="gradient">
			<div class="button" style="background-image: url(https://iran-shutdown.amnesty.org/wp-content/themes/amnesty-iran-internet-shutdown/assets/images/btn-victim-next.png)"></div>
		</div>
		<div class="gradient left">
			<div class="button" style="background-image: url(https://iran-shutdown.amnesty.org/wp-content/themes/amnesty-iran-internet-shutdown/assets/images/btn-victim-prev.png)"></div>
		</div>
	</div>
<?php endif; */?>