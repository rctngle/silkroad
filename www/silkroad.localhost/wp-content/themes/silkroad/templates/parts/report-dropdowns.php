<?php
$report_downloads_page = get_page_by_path('report-downloads');
?>

<div class="section-inner">
	<div class="section-title centered"><h2>Download the Report</h2></div>
	<div class="report-dropdowns">
		<?php if(have_rows('report_downloads', $report_downloads_page->ID)): ?>
			<?php while( have_rows('report_downloads', $report_downloads_page->ID) ) : the_row(); ?>

				<?php
					$language_slug = strtolower(get_sub_field('language_en'));
					$download_summary = get_sub_field('translation_download_summary');
					$download_full_report = get_sub_field('translation_download_full_report');
					$summary_document = get_sub_field('summary_document');
					$report_document = get_sub_field('report_document');
				?>

				<div class="<?php echo $language_slug; ?>">
					<?php if($summary_document && $report_document):?>
						<div dir="auto" class="title">
							<i class="fad fa-file-alt"></i> <strong><?php the_sub_field('language'); ?></strong> <i class="fal fa-chevron-down"></i>
						</div>
						<div class="download-links">
							<?php if ($download_summary && $summary_document): ?>
								<div dir="auto" class="download">
									<a href="<?php echo $summary_document['url']; ?>" target="_blank"><?php echo $download_summary; ?></a>
								</div>
							<?php endif; ?>

							<?php if ($download_full_report && $report_document): ?>
								<div dir="auto" class="download">
									<a href="<?php echo $report_document['url']; ?>" target="_blank"><?php echo $download_full_report; ?></a>
								</div>
							<?php endif; ?>
						</div>

					<?php elseif($download_summary && $summary_document):?>
						<a href="<?php echo $summary_document['url']; ?>" target="_blank" dir="auto" class="title">
							<i class="fad fa-file-alt"></i> <strong><?php the_sub_field('language'); ?></strong>
						</a>

					<?php endif;?>
	
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>