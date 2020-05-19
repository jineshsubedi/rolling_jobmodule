<table>
<tr>
    <th>Staff</th>
    <th>Date</th>
    <th>Title</th>
    <th>Duration</th>
    <th>Estimated Duration</th>
    <th>Total</th>
    <th>Idle</th>
</tr>
<?php foreach($productivity as $p): ?>
<?php foreach($p['tasks'] as $k=>$task): ?>
<tr>
    <?php if($k==0): ?>
        <td rowspan="<?php echo e(count($p['tasks'])); ?>"><?php echo e($p['name']); ?></td>
    <?php else: ?> 
        <td></td>
    <?php endif; ?>
    <?php if($k==0): ?>
        <td rowspan="<?php echo e(count($p['tasks'])); ?>"><?php echo e($p['date']); ?></td>
    <?php else: ?> 
        <td></td>
    <?php endif; ?>
    <td>
        <?php echo e($task->description); ?>

    </td>
    <td>
        <?php echo e($task->duration); ?>

    </td>
    <td>
        <?php echo e($task->estimated_duration); ?>

    </td>
    <?php if($k==0): ?>
        <td rowspan="<?php echo e(count($p['tasks'])); ?>"><?php echo e($p['total']); ?></td>
    <?php else: ?> 
        <td></td>
    <?php endif; ?>
    <?php if($k==0): ?>
        <td rowspan="<?php echo e(count($p['tasks'])); ?>"><?php echo e($p['idle']); ?></td>
    <?php else: ?> 
        <td></td>
    <?php endif; ?>
</tr>
<?php endforeach; ?>
<?php endforeach; ?>
</table>