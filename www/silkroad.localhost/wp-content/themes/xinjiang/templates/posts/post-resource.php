<article>
	<h1><?php echo xinjiang_translate_field(get_field('title_ml_text')); ?></h1>
	<div><?php echo xinjiang_translate_field(get_field('description_ml_rich_text')); ?></div>

	<?php if (have_rows('documents')): ?>
		<?php while( have_rows('documents') ) : the_row(); ?>

			<?php

			$language = xinjiang_translate_field(get_sub_field('language_ml_text'));
			$document = get_sub_field('document');


			$document_cloud_url = ($document) ? $document['documentcloud_url'] : false;
			$document_file = ($document) ? $document['document'] : false;

			?>
			<div class="<?php echo $language_slug; ?>">
				<?php the_sub_field('language'); ?>

				<?php if ($document_cloud_url): ?>
					<a href="<?php echo $document_cloud_url; ?>" target="_blank"><?php echo xinjiang_translate('document-cloud'); ?></a>
				<?php endif; ?>

				<?php if ($document_file): ?>
					<a href="<?php echo $document_file['url']; ?>" target="_blank"><?php echo xinjiang_translate('download'); ?></a>
				<?php endif; ?>

			</div>
		<?php endwhile; ?>
	<?php endif; ?>

</article>