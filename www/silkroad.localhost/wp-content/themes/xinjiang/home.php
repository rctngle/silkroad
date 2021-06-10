<?php get_header(); ?>

<main>

	<section id="introduction-section">
		<a name="introduction"></a>
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
	
	<section id="cases-section">
		<a name="cases"></a>
		<?php get_template_part('templates/parts/cases'); ?>
			
	</section>
	
	<?php /*
	<?php get_template_part('templates/parts/video'); ?>
	*/ ?>

	<section id="take-action-section" class="take-action-container">
		<a name="take-action"></a>
		<?php get_template_part('templates/parts/call-to-action'); ?>			
	</section>



	<section name="report-section" id="report-section">
		<a name="report"></a>

		
		<!-- <div class="call-out center">
			<div class="inner">
				
				<div class="statement">
					<h2>All interviews with former camp detainees and other witnesses were conducted on the condition that Amnesty International refrain from publishing the interviewee’s name and/or any information that could be used to identify the interviewee, the interviewee’s family or anyone else who might be at risk if they were to be identified. Pseudonyms are used in all cases.</h2>
				</div>
			</div>
		</div>
		 -->
		<?php get_template_part('templates/parts/report'); ?>
	</section>

	<section id="take-action-bottom" class="take-action-container">
		<?php get_template_part('templates/parts/call-to-action'); ?>			
	</section>
	<section id="credit"><div class="inner"><p>Design and development by <a target="_blank" href="https://rectangle.design">Rectangle</a></p></div></section>
</main>

<?php get_footer(); ?>