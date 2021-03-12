<article>
	<div class="preview">
		<div class="slideshow" data-idx="0">
			<div class="slide"><?php the_post_thumbnail();?></div>
			<?php
				$gallery = get_field('images_documents');
			?>

			<?php if ($gallery && is_array($gallery) && count($gallery) > 0): ?>
				<?php foreach($gallery as $media): ?>

					<?php 
						$preview = get_field('preview', $media['ID']);
					?>

					<?php if ($media['type'] == 'image'): ?>
						<div class="slide"><img src="<?php echo esc_url($media['sizes']['large']); ?>" alt="<?php echo esc_attr($media['alt']); ?>" /></div>
					<?php elseif ($preview): ?>
						<div class="slide"><img src="<?php echo esc_url($preview['sizes']['large']); ?>" alt="<?php echo esc_attr($preview['alt']); ?>" /></div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
			<div class="controls">
				<div class="prev"><i class="fal fa-chevron-left"></i></div>
				<div class="next"><i class="fal fa-chevron-right"></i></div>
			</div>
		</div>
		<div class="case">
			
			<h3><?php echo silkroad_translate_field(get_field('name_ml_text')); ?></h3>
			<div>
			<h5>Reference Code:</h5>
			<h5 style="color: #000"><?php the_field('reference_code'); ?></h5>
			</div>
			<div>
				<h5>Profession: </h5>
				<?php echo silkroad_translate_field(get_field('profession_ml_text')); ?>
			</div>

			<div>
				<h5>Date of Birth: </h5>
				<?php the_field('date_of_birth'); ?>
			</div>

			<div>
				<h5>Hometown: </h5>
				<?php echo silkroad_translate_field(get_field('hometown_ml_text')); ?>
			</div>
			
			<div>
				<h5>Last Seen: </h5>
				<?php the_field('last_seen_date') ?>
			</div>
			<div>
				<h5>Being Held At:</h5>
				<?php echo silkroad_translate_field(get_field('where_held_ml_text')); ?>
			</div>
			<div class="full">
				<h5>Real Reason for Arrest or Detention: </h5>
				<?php echo silkroad_translate_field(get_field('reason_for_arrest_or_detention_suspected_ml_text')); ?>
			</div>
			
			<div class="full">
				<h5>Official Reason for Arrest or Detention: </h5>
				<?php echo silkroad_translate_field(get_field('reason_for_arrest_or_detention_official_ml_text')); ?>
			</div>
			

			
			
			<div class="full">
				<h5>Quote or Personal Detail:</h5>
				<?php echo silkroad_translate_field(get_field('quote_or_personal_detail_ml_text')); ?>
			</div>

			<!-- 
				<h5>Summary:</h5>
				<?php echo silkroad_translate_field(get_field('summary_ml_rich_text')); ?> -->
			
		</div>
	</div>
	<div class="modal">
		


		

	</div>
	
</article>