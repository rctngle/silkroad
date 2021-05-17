<?php get_header(); ?>

<main>
	<section id="introduction">
		<div class="section-inner">
			<article>
				<div class="content-box columns">
					<?php get_template_part('templates/parts/introduction'); ?>
					<?php get_template_part('templates/parts/report-list'); ?>
				</div>
			</article>
		</div>
	</section>
	<?php /* <section id="report-dropdowns"><?php get_template_part('templates/parts/report-dropdowns'); ?></section> */?>
	<?php /* <section id="map"><?php get_template_part('templates/parts/map'); ?></section> */?>
	
	<section id="cases">
		<a name="cases-anchor"></a>
		<?php get_template_part('templates/parts/cases'); ?>
			
	</section>
	<section id="video"><?php get_template_part('templates/parts/video-example'); ?></section>

	<section id="take-action">
		<a name="take-action-anchor"></a>
		<?php get_template_part('templates/parts/call-to-action'); ?>			
	</section>
	<section name="report" id="report">
		<a name="report-anchor"></a>
		<div class="what-is-the-report">
			<h3>What is the Report?</h3>
			<div class="stats">
				<div class="stat">
					<div class="icon"><img src="<?php bloginfo('template_directory');?>/assets/images/Amnesty Icons-09.svg"></div>
					<h2>Details of Human rights violations committed by China</h2>
					<p class="date media-caption">Between 2017 &mdash; 2021</p>
				</div>
				<div class="stat">
					<div class="icon"><img src="<?php bloginfo('template_directory');?>/assets/images/Amnesty Icons-53.svg"></div>
					<h2>A product of field and remote research</h2>
					<p class="date media-caption">Conducted October 2019 &mdash; April 2021</p>
				</div>
				<div class="stat">
					<div class="icon people"><img src="<?php bloginfo('template_directory');?>/assets/images/Amnesty Icons-16.svg"></div>
					<h2>Testimonial evidence from 70 survivors and witnesses</h2>
				</div>
			</div>
		</div>
		<div class="call-out">
			<div class="inner">
				<div class="blur">
					<img src="<?php bloginfo('template_directory');?>/assets/images/blurred-face.png">
					<p class="media-caption">[Interviewee X7]</p>
				</div>
				<div class="statement">
					<h2>As a result of security concerns, nearly all survivor and witness interviews were conducted on the condition that Amnesty International refrain from publishing the interviewee’s name and/or any information that could be used to identify the interviewee, the interviewee’s family, or anyone else who might be at risk if they were to be identified. Pseudonyms have been used in all cases.</h2>
				</div>
			</div>
		</div>
		
		<?php get_template_part('templates/parts/report'); ?>
	</section>

</main>

<?php get_footer(); ?>