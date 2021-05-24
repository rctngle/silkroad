<?php

$classes = get_body_class();
$classes[]=LANG;

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo silkroad_translate('enemies-in-war'); ?>: <?php echo silkroad_translate('chinas-mass-internment'); ?></title>

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

<header>
	<div class="logo">
		<a href="<?php echo site_url();?>"><img src="<?php bloginfo('template_directory');?>/assets/images/logo-amnesty-yellow@3x.png"></a>
	</div>
	<nav>
		<?php get_template_part('templates/nav/main-nav'); ?>
	</nav>

</header>

<section class="hero">
	<div class="media full image">
		<img role="presentation" alt="" src="<?php bloginfo('template_directory');?>/assets/images/feet_shadows.jpg">
		<div class="gradient"></div>
	</div>
	<div class="hero-content">
		<h1 class="main-title animate" data-delay="0">
			<?php echo silkroad_translate('enemies-in-war'); ?>
			<span><?php echo silkroad_translate('chinas-mass-internment'); ?></span>			
		</h1>
<!-- 		<h1 class="sub-title"></h1> -->
		<div class="main-points">
			<div class="animate" data-delay="1200">				
				<div class="image"><img src="<?php bloginfo('template_directory');?>/assets/temporary/bus022.jpg"></div>
				<p>Turkic Muslim people in the Xinjiang face Chinese government-directed <span>discrimination and persecution</span>.</p>
			</div>
			<div class="animate" data-delay="1600">				
				<div class="image"><img src="<?php bloginfo('template_directory');?>/assets/temporary/bus022.jpg"></div>
				<p>The objectives are to <span>eradicate Islamic religious beliefs</span> and Turkic Muslim ethno-cultural practices.</p>
			</div>
			<div class="animate" data-delay="2000">				
				<div class="image"><img src="<?php bloginfo('template_directory');?>/assets/temporary/bus022.jpg"></div>
				<p>More than <span>a million people</span> have been arbitrarily arrested, denied due process, and unlawfully interned.</p>
			</div>
		</div>
		<!-- <div id="sub-title" class="sub-title">
			<div class="row animate">
				<div class="dark">China’s</div>	
				<div class=""><span>Mass Internment</span></div>
				<div></div>
			</div>
			<div class="row">
				<div></div>
				<div class="animate"><span>Torture &amp;</span></div>	
				<div></div>
			</div>
			<div class="row">
				<div></div>
				<div class="animate"><span>Persecution</span></div>
				<div class="dark animate">of Muslims in Xinjiang</div>
			</div>			
			<div class="row">	
				<div></div>
				
			</div>
			
		</div> -->
	</div>

	<div class="scroll-down-continue animate" data-delay="2800" style="visibility: visible;">
		<img class="arrow-down-icon" src="<?php bloginfo('template_directory');?>/assets/images/ico-scroll.svg">
		<div class="meaning">
			<a href="#report-list-anchor">
				Report available in <strong><span>English</span>, <span>中文</span>, <span>हिन्दी</span>, <span>Español</span>, <span>Français</span>, <span>বাংলা</span>,<br/><span>Pусский</span>, <span>Português</span>, <span>Indonesian</span>, <span>日本語</span>, <span>عربي</span>, <span>الأويغور</span></strong> 
			</a>
		</div>
	</div>
</section>

