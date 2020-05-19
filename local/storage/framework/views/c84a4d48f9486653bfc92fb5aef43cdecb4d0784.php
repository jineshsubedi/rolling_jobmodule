<option value="">Select Designation</option>
<?php if(count($datas) > 0): ?>

	<?php foreach($datas as $data): ?>
		<option value="<?php echo e($data->id); ?>"><?php echo e($data->title); ?></option>
	<?php endforeach; ?>
<?php endif; ?>