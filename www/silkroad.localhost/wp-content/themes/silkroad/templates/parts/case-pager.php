<?php 

$thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
$image_cropped = get_field('image_cropped');
if ($image_cropped) {
	$thumb_url = $image_cropped['sizes']['thumbnail'];
}

?>
<div class="case-pagination-item">

	<div class="image">
		<a href="#case-<?php the_field('reference_code'); ?>">
			<img src="<?php echo $thumb_url; ?>"/>
		</a>
	</div>
</div>