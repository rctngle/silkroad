<?php

$languages = xinjiang_get_languages();

?>
<div class="language-nav">
	<span><img src="<?php bloginfo('template_directory');?>/assets/images/ico-language.svg"></span>
	<?php foreach($languages as $language => $term): ?>
		<a href="">			
			<?php echo xinjiang_translate($term->slug, $term->slug); ?>						
		</a>
	<?php endforeach; ?>
</nav>