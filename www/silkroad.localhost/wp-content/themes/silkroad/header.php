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


	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory');?>/assets/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory');?>/assets/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory');?>/assets/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php bloginfo('template_directory');?>/assets/favicons/manifest.json">
	<link rel="mask-icon" href="<?php bloginfo('template_directory');?>/assets/favicons/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#ffc40d">
	<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>

	<meta property="og:title" content="" />
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:description" content="">
	<meta property="og:description" content="">
	<meta name="twitter:title" content="">	
	<meta name="twitter:image" content="" />
	<meta property="og:image" content="" />
</head>

<body dir="auto" class="<?php echo implode(' ', $classes); ?>">

<header>
	<div class="logo">
		<a href="<?php echo site_url();?>"><img src="<?php bloginfo('template_directory');?>/assets/images/logo-amnesty-yellow@3x.png"></a>
	</div>
	<nav>
		<?php get_template_part('templates/nav/main-nav'); ?>
		<?php get_template_part('templates/nav/language-nav'); ?>
	</nav>

</header>

<section class="hero">
	<div class="media full image">
		<img role="presentation" alt="" src="<?php bloginfo('template_directory');?>/assets/images/Brothers-of-the-Gun.jpg">
		<div class="gradient"></div>
	</div>
	<div class="hero-content">
		<h1 class="main-title"><?php echo silkroad_translate('human-rights-exposed'); ?></h1>
		<h1 class="sub-title"><?php echo silkroad_translate('an-investigation-into-human-rights-violations'); ?></h1>
	</div>
</section>

