<?php

$cases_query = new WP_Query([
	'post_type' => 'case',
	'posts_per_page' => -1,
]);

?>
<div class="content-box section-title centered">
	<h1>Cases</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>

<?php if ($cases_query->have_posts()): ?>
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
			<div class="button" style="background-image: url(https://iran-shutdown.amnesty.org/wp-content/themes/amnesty-iran-internet-shutdown/assets/images/btn-victim-next.png)">
	        </div>
        </div>
	</div>
<?php endif; ?>