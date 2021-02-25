<?php

$classes = get_body_class();


?>

<!DOCTYPE html>
<html>
<head>
	<title>Silk Road</title>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/build/styles/screen.css?t=<?php echo time(); ?>" />
	<script src="<?php bloginfo('template_directory');?>/build/scripts/scripts.js?t=<?php echo time(); ?>"></script>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory');?>/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory');?>/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory');?>/favicon-16x16.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory');?>/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory');?>/favicon-16x16.png">
	<script src="https://kit.fontawesome.com/2780ca6f1b.js" crossorigin="anonymous"></script>

	<?php wp_head(); ?>

	<meta property="og:title" content="" />
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:description" content="">
	<meta property="og:description" content="">
	<meta name="twitter:title" content="">	
	<meta name="twitter:image" content="" />
	<meta property="og:image" content="" />
</head>

<body class="<?php echo implode(' ', $classes); ?>">

<nav>
	<div>Amnesty Logo</div>
	
	<h1><?php echo silkroad_translate('human-rights-exposed'); ?></h1>
	<h2><?php echo silkroad_translate('an-investigation-into-human-rights-violations'); ?></h2>

	<hr />

	<?php get_template_part('templates/nav/main-nav'); ?>
	
	<hr />

	<?php get_template_part('templates/nav/language-nav'); ?>
</nav>

