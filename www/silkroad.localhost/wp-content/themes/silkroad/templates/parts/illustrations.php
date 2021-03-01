<?php

$images = [
	'illustrations-01.jpg',
	'illustrations-02.jpg',
	'illustrations-03.jpg',
	'illustrations-04.jpg',
	'illustrations-05.jpg',
	'illustrations-06.jpg',
	'illustrations-07.jpg',
	'illustrations-08.jpg',
	'illustrations-09.jpg',
	'illustrations-10.jpg',
];

$num_images = (mt_rand(0, 1) == 0) ? 1 : 3;

$classes = ['image'];

if($num_images == 3){
	$classes[]='staggered';
}

?>

<article class="<?php echo implode(' ', $classes);?>">
	<?php for ($i=0; $i<$num_images; $i++): ?>
		<img src="<?php echo get_template_directory_uri(); ?>/assets/illustrations/<?php echo $images[mt_rand(0, count($images)-1)]; ?>" />
	<?php endfor; ?>
</article>