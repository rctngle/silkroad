<?php
$slug = get_post_field( 'post_name', get_post() );
?>
<li>
	<a href="#<?php echo $slug; ?>"><?php the_title(); ?></a>
</li>