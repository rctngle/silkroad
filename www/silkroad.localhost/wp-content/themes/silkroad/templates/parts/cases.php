<?php

$cases_query = new WP_Query([
	'post_type' => 'case',
	'posts_per_page' => -1,
    // 'orderby' => 'rand',

]);

?>
<div class="content-box section-title centered">

	<h1>Missing and Detained People</h1>		
	<div class="cases-download-container">
		<a target="_blank" href="#">
			<div class="icon">
				<img src="<?php bloginfo('template_directory');?>/assets/images/ico-download.svg">
			</div>
			<div class="label">Download<br/>this data</div>
		</a>
	</div>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>

<div id="cases-scroller" class="scroller grabbable">
	<div class="gradient right swiper-button-next">
		<div class="button" style="background-image: url(<?php bloginfo('template_directory');?>/assets/images/ico-arrow-right.svg)"></div>
	</div>
	<div class="gradient left swiper-button-prev">
		<div class="button" style="background-image: url(<?php bloginfo('template_directory');?>/assets/images/ico-arrow-left.svg)"></div>
	</div>
	<div class="scroller-outer">
		<div class="scroller-inner">	
			<?php while($cases_query->have_posts()): $cases_query->the_post(); ?>
				<?php get_template_part('templates/posts/post', get_post_type()); ?>
			<?php endwhile; ?>
			<?php wp_reset_postdata() ?>
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