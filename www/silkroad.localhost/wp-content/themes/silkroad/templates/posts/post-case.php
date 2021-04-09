<article class="swiper-slide">
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
						<div class="slide">
							<a target="_blank" href="<?php echo $media['sizes']['large'];?>"><img src="<?php echo esc_url($media['sizes']['large']); ?>" alt="<?php echo esc_attr($media['alt']); ?>" /></a>
							<?php if($media['caption']):?>
								<p class="caption"><a target="_blank" href="<?php echo $media['sizes']['large'];?>"><?php echo $media['caption'];?></a></p>
							<?php endif;?>
						</div>

					<?php elseif ($preview): ?>
						<div class="slide">
							<img src="<?php echo esc_url($preview['sizes']['large']); ?>" alt="<?php echo esc_attr($preview['alt']); ?>" />
							<?php if($media['caption']):?>
								<p class="caption"><?php echo $caption;?></p>
							<?php endif;?>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>

			<?php if(get_field('images_documents')):?>
				<div class="controls">
					<div class="prev"><i class="far fa-chevron-left"></i></div>
					<div class="next"><i class="far fa-chevron-right"></i></div>
				</div>
			<?php endif;?>
		</div>
		<div class="case">
		
			<h3><?php echo silkroad_translate_field(get_field('name_ml_text')); ?></h3>
			
			<div>
				<h5>Profession</h5>
				<?php echo silkroad_translate_field(get_field('profession_ml_text')); ?>
			</div>

			<div>
				<h5>Date of Birth</h5>
				<?php the_field('date_of_birth'); ?>
			</div>

			<div>
				<h5>Hometown</h5>
				<?php echo silkroad_translate_field(get_field('hometown_ml_text')); ?>
			</div>
			
			<div>
				<h5>Last Seen</h5>
				<?php the_field('last_seen_date') ?>
			</div>
			<div>
				<h5>Assumed Location</h5>
				<?php echo silkroad_translate_field(get_field('where_held_ml_text')); ?>
			</div>
			<div class="ethnicity">
				<h5>Ethnicity</h5>
				<?php echo silkroad_translate_field(get_field('ethnicity_ml_text')); ?>
			</div>
			
			<div class="full">
				<h5>Real Reason for Arrest or Detention</h5>
				<p><?php echo silkroad_translate_field(get_field('reason_for_arrest_or_detention_suspected_ml_text')); ?></p>
			</div>
			
			<div class="full">
				<h5>Official Reason for Arrest or Detention</h5>
				<p><?php echo silkroad_translate_field(get_field('reason_for_arrest_or_detention_official_ml_text')); ?></p>
			</div>
			
		
			<?php if(get_field('quote_or_personal_detail_ml_text') && strlen(silkroad_translate_field(get_field('quote_or_personal_detail_ml_text'))) > 0):?>
				<div class="full"><p><?php echo silkroad_translate_field(get_field('quote_or_personal_detail_ml_text')); ?></p></div>
			<?php endif;?>
			

			<div class="full summary">
				<?php if(get_field('summary_ml_rich_text') && strlen(silkroad_translate_field(get_field('summary_ml_rich_text'))) > 0):?>
					<?php echo silkroad_translate_field(get_field('summary_ml_rich_text')); ?>
				<?php else:?>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
				<?php endif;?>
				

			</div>
			<div class="read-more"><span>Read More</span> <i class="fas fa-caret-down"></i></div>
		</div>
	</div>	
</article>