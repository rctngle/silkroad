<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post();  ?>
		<?php if (is_singular()): ?>
			<?php if (get_post_type() == 'page'): ?>
				<?php get_template_part('templates/pages/page', get_post_field( 'post_name', get_post() )); ?>
			<?php else: ?>
				<?php get_template_part('templates/posts/post', get_post_type()); ?>
			<?php endif; ?>
		<?php else: ?>
			<?php get_template_part('templates/previews/preview', get_post_type()); ?>
		<?php endif; ?>
	<?php endwhile; ?>
	<?php get_template_part('templates/nav/pagination'); ?>
<?php else: ?>
	<h1>No results</h1>
<?php endif; ?>
