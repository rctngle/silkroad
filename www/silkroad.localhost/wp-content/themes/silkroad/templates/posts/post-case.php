<article>
	<div class="preview">
		<div class="image"></div>
		<div class="case">
			
			<h4><?php echo silkroad_translate_field(get_field('name_ml_text')); ?></h4>
			<h5>Reference Code:</h5>
			<h5><?php the_field('reference_code'); ?></h5>
			
		</div>
	</div>
	<div class="modal">
		<div>
			Reference Code: 
			<?php the_field('reference_code'); ?>
		</div>

		<div>
			Name: 
			<?php echo silkroad_translate_field(get_field('name_ml_text')); ?>
		</div>

		<div>
			Profession: 
			<?php echo silkroad_translate_field(get_field('profession_ml_text')); ?>
		</div>

		<div>
			Date of Birth: 
			<?php the_field('date_of_birth'); ?>
		</div>

		<div>
			Hometown: 
			<?php echo silkroad_translate_field(get_field('hometown_ml_text')); ?>
		</div>
		
		<div>
			Last Seen: 
			<?php echo silkroad_translate_field(get_field('last_seen_ml_text')); ?>
		</div>

		<div>
			Real Reason for Arrest or Detention: 
			<?php echo silkroad_translate_field(get_field('reason_for_arrest_or_detention_real_ml_text')); ?>
		</div>
		
		<div>
			Official Reason for Arrest or Detention: 
			<?php echo silkroad_translate_field(get_field('reason_for_arrest_or_detention_official_ml_text')); ?>
		</div>
		

		<div>
			Being Held At:
			<?php echo silkroad_translate_field(get_field('where_held_ml_text')); ?>
		</div>
		
		<div>
			Quote or Personal Detail:
			<?php echo silkroad_translate_field(get_field('quote_or_personal_detail_ml_text')); ?>
		</div>

		<div>
			Summary:
			<?php echo silkroad_translate_field(get_field('summary_ml_rich_text')); ?>
		</div>


		<?php
		$gallery = get_field('images_documents');
		?>

		<?php if ($gallery && is_array($gallery) && count($gallery) > 0): ?>
			<?php foreach($gallery as $media): ?>

				<?php 
				$preview = get_field('preview', $media['ID']);
				?>

				<?php if ($media['type'] == 'image'): ?>
					<img src="<?php echo esc_url($media['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($media['alt']); ?>" />
				<?php elseif ($preview): ?>
					<img src="<?php echo esc_url($preview['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($preview['alt']); ?>" />
					<a href="<?php echo esc_url($media['url']); ?>" target="_blank">Download</a>
				<?php else: ?>
					<a href="<?php echo esc_url($media['url']); ?>" target="_blank">Download</a>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>

	</div>
	
</article>