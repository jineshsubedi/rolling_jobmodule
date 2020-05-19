<?php $__env->startSection('heading'); ?>
Training Type
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Training Type</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo e(route('staffs.training_type.create')); ?>" class="btn refreshbtn right btm10m"><i
            class="fa fa-fw fa-plus"></i>Add Training Type</a>
      </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Training Type</h3>
        </div>
      <div class="box-body">
        <table class="table table-borderd">
            <tr>
                <th>SN</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
            <?php foreach($trainings as $k=>$t): ?>
            <tr>
                <td><?php echo e($k+1); ?></td>
                <td><?php echo e($t->title); ?></td>
                <td>
                    <form action="<?php echo e(route('staffs.training_type.destroy', $t->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('DELETE'); ?>

                        <a href="<?php echo e(route('staffs.training_type.edit', $t->id)); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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