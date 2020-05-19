<?php $__env->startSection('heading'); ?>
Training
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Training</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo e(route('staffs.training.create')); ?>" class="btn refreshbtn right btm10m"><i
            class="fa fa-fw fa-plus"></i>Add Training</a>
      </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Training</h3>
        </div>
      <div class="box-body">
        <table class="table table-borderd">
            <tr>
                <th>SN</th>
                <th>Program</th>
                <th>Trainer</th>
                <th>From</th>
                <th>To</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php foreach($trainings as $k=>$training): ?>
            <tr>
                <td><?php echo e($k+1); ?></td>
                <td><?php echo e(\App\TrainingProgram::getTitle($training->program_id)); ?></td>
                <td><?php echo e(\App\Trainer::getName($training->trainer_id)); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($training->from)->format('d M, Y')); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($training->to)->format('d M, Y')); ?></td>
                <td>
                    <?php echo e($training->status); ?>

                </td>
                <td>
                    <form action="<?php echo e(route('staffs.training.destroy', $training->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('DELETE'); ?>

                        <a href="<?php echo e(route('staffs.training.show', $training->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo e(route('staffs.training.edit', $training->id)); ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure?')"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="text-center">
            <?php echo e($trainings->links()); ?>

        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>