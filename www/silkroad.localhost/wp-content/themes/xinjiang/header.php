<?php

$classes = get_body_class();
$classes[]=LANG;

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo xinjiang_translate('enemies-in-war'); ?>: <?php echo xinjiang_translate('chinas-mass-internment'); ?></title>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-M8CGWDS');</script>
	<!-- End Google Tag Manager -->

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
	<script src="https://kit.fontawesome.com/09200ef171.js" crossorigin="anonymous"></script>

</head>

<body dir="auto" class="<?php echo implode(' ', $classes); ?> horizontal-nav">
<a name="introduction-anchor"></a>

<header class="">
	<div class="logo">
		<a href="<?php echo site_url();?>"><img src="<?php bloginfo('template_directory');?>/assets/images/logo-amnesty-yellow@3x.png"></a>
	</div>
	<nav>
		<?php get_template_part('templates/nav/main-nav'); ?>
	</nav>
	<div class="mobile-nav-toggle">
		<img src="<?php bloginfo('template_directory');?>/assets/images/hamburger.svg">
	</div>
</header>

<section class="hero">
	<div class="media full image">
		<?php echo wp_get_attachment_image(1892, '2048x2048', false, ['alt' => ''] ); ?></div>

		
		<div class="gradient"></div>
	</div>
	<div class="hero-content">
		<div class="main-title-mobile">
			<h1 class="animate" data-delay="0">
				<?php echo xinjiang_translate('enemies-in-war'); ?>
			</h1>
			<h2 class="animate" data-delay="1000"><?php echo xinjiang_translate('chinas-mass-internment'); ?></h2>
		</div>
		<h1 class="main-title animate" data-delay="0">
			<?php echo xinjiang_translate('enemies-in-war'); ?>
			<span><?php echo xinjiang_translate('chinas-mass-internment'); ?></span>			
		</h1>
		<div class="introduction__credit animate" data-delay="1200">Illustrations by <a target="_blank" href="https://mollycrabapple.com">Molly Crabapple</a></div>
		<?php /* 
		<div class="main-points">
			<div class="animate" data-delay="1200">				
				<p>Turkic Muslim people in the Xinjiang face Chinese government-directed <span>discrimination and persecution</span>.</p>
			</div>
			<div class="animate" data-delay="1600">				
				<p>The objectives are to <span>eradicate Islamic religious beliefs</span> and Turkic Muslim ethno-cultural practices.</p>
			</div>
			<div class="animate" data-delay="2000">				
				<p>More than <span>a million people</span> have been arbitrarily arrested, denied due process, and unlawfully interned.</p>
			</div>
		</div> */?>
	</div>

	<div class="scroll-down-continue animate" data-delay="1200" style="visibility: visible;">
		<img class="arrow-down-icon" src="<?php bloginfo('template_directory');?>/assets/images/ico-scroll.svg">
		<div class="meaning">
			<a id="report-list-link" href="#report-list-anchor">
				Report available in <strong><span>English</span>, <span>中文</span>, <span>हिन्दी</span>, <span>Español</span>, <span>Français</span>, <span>বাংলা</span>,<br/><span>Pусский</span>, <span>Português</span>, <span>Indonesian</span>, <span>日本語</span>, <span>عربي</span>, <span>الأويغور</span></strong> 
			</a>
		</div>
	</div>
</section>

