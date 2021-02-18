<?php

$languages = silkroad_get_languages();

?>
<nav>
	<?php foreach($languages as $language => $term): ?>
		<a href="?l=<?php echo $language; ?>"><?php echo silkroad_translate($term->slug, $term->slug); ?></a>
	<?php endforeach; ?>
</nav>