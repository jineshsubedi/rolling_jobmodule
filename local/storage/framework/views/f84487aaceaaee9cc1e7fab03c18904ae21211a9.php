<?php $__env->startSection('heading'); ?>
Training Program
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Training Program</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo e(route('staffs.training_program.create')); ?>" class="btn refreshbtn right btm10m"><i
            class="fa fa-fw fa-plus"></i>Add Training Program</a>
      </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Training Program</h3>
        </div>
      <div class="box-body">
        <table class="table table-borderd">
            <tr>
                <th>SN</th>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php foreach($programs as $k=>$program): ?>
            <tr>
                <td><?php echo e($k+1); ?></td>
                <td><?php echo e($program->title); ?></td>
                <td><?php echo e($program->status==1?'InActive':'Active'); ?></td>
                <td>
                    <form action="<?php echo e(route('staffs.training_program.destroy', $program->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('DELETE'); ?>

                        <a href="<?php echo e(route('staffs.training_program.edit', $program->id)); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="text-center">
            <?php echo e($programs->links()); ?>

        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>