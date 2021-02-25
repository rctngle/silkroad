<?php
$report_downloads_page = get_page_by_path('report-downloads');
?>

<div class="section-inner">
	<?php if(have_rows('report_downloads', $report_downloads_page->ID)): ?>
		<?php while( have_rows('report_downloads', $report_downloads_page->ID) ) : the_row(); ?>

			<?php
			$language_slug = strtolower(get_sub_field('language_en'));
			$download_summery = get_sub_field('translation_download_summary');
			$download_full_report = get_sub_field('translation_download_full_report');

			$summary_document = get_sub_field('summary_document');
			$report_document = get_sub_field('report_document');
			?>

			<div class="<?php echo $language_slug; ?>">
				<h4><?php the_sub_field('language'); ?></h4>
				
				<?php if ($download_summery && $summary_document): ?>
					<a href="<?php echo $summary_document['url']; ?>" target="_blank"><?php echo $download_summery; ?></a>
				<?php endif; ?>

				<?php if ($download_full_report && $report_document): ?>
					<a href="<?php echo $report_document['url']; ?>" target="_blank"><?php echo $download_full_report; ?></a>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>