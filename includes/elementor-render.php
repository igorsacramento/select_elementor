<?php

function is_select_render($settings)
{
	$class_alig = array(
		'preview-select',
		'is-d-flex',
	);

	if ($settings['layout_direction'] == 'row') {
		$class_alig[] = 'is-direction-row';
		$class_alig[] = 'is-align-center';

		if ($settings['layout_align_h'] == 'start_h') {
			$class_alig[] = 'is-j-content-left';
		}

		if ($settings['layout_align_h'] == 'center_h') {
			$class_alig[] = 'is-j-content-center';
		}

		if ($settings['layout_align_h'] == 'end_h') {
			$class_alig[] = 'is-j-content-rigth';
		}
	}

	if ($settings['layout_direction'] == 'column') {
		$class_alig[] = 'is-direction-column';
		$class_alig[] = 'is-j-content-center';

		if ($settings['layout_align_h'] == 'start_h') {
			$class_alig[] = 'is-align-start';
		}

		if ($settings['layout_align_h'] == 'center_h') {
			$class_alig[] = 'is-align-center';
		}

		if ($settings['layout_align_h'] == 'end_h') {
			$class_alig[] = 'is-align-end';
		}
	}

	$class_alig = preg_replace('/\s+/', ' ', implode(' ', array_filter($class_alig)))

?>

	<div class="widget-select-elementor">
		<div class="<?php echo esc_attr($class_alig); ?>">
			<?php if ($settings['text_show'] == 'yes') : ?>
				<label for="" class="text-select-elementor">
					<?php echo $settings['text_text'] ?>
				</label>
			<?php endif; ?>

			<select name="<?php echo esc_attr($settings['select_name']) ?>" id="<?php echo esc_attr($settings['select_id']) ?>" class="select-elementor <?php echo esc_attr($settings['select_class']) ?>">
				<?php if ($settings['select_init_show'] == 'yes') : ?>
					<option value=""><?php echo $settings['select_init_text'] ?></option>
				<?php endif; ?>
				<?php if ($settings['list']) : ?>
					<?php foreach ($settings['list'] as $item) : ?>
						<option value="<?php echo $item['list_value'] ?>">
							<?php echo $item['list_title'] ?>
						</option>
					<?php endforeach; ?>
				<?php endif; ?>
			</select>

			<?php if ($settings['button_show'] == 'yes') : ?>
				<button type="button" class="button button-class">
					<?php echo $settings['button_text'] ?>
				</button>
			<?php endif; ?>
		</div>
	</div>
<?php
}
