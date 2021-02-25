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
	<div class="section-inner">		
		<?php while($cases_query->have_posts()): $cases_query->the_post(); ?>
			<?php get_template_part('templates/posts/post', get_post_type()); ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata() ?>
	</div>
<?php endif; ?>