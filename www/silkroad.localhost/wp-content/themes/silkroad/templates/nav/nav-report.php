<?php
$slug = get_post_field( 'post_name', get_post() );
?>
<li class="reportid-<?php echo get_the_ID(); ?>">
	<a href="#<?php echo $slug; ?>"><?php the_title(); ?></a>
</li>