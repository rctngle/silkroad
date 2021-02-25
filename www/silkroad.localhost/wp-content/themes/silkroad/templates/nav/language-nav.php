<?php

$languages = silkroad_get_languages();

?>
<div class="language-nav">
	<?php foreach($languages as $language => $term): ?>
		<a href="?l=<?php echo $language; ?>">
			<img src="<?php bloginfo('template_directory');?>/assets/images/ico-language.svg">
			<?php echo silkroad_translate($term->slug, $term->slug); ?>						
		</a>
	<?php endforeach; ?>
</nav>