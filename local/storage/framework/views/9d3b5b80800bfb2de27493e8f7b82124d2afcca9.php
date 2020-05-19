<?php $__env->startSection('heading'); ?>
Trainer
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Trainer</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo e(route('branchadmin.trainer.create')); ?>" class="btn refreshbtn right btm10m"><i
            class="fa fa-fw fa-plus"></i>Add Trainer</a>
      </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Trainer</h3>
        </div>
      <div class="box-body">
        <table class="table table-borderd">
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Rate</th>
                <th>Charge By</th>
                <th>Action</th>
            </tr>
            <?php foreach($trainers as $k=>$t): ?>
            <tr>
                <td><?php echo e($k+1); ?></td>
                <td><?php echo e($t->name); ?></td>
                <td><?php echo e($t->designation); ?></td>
                <td><?php echo e($t->rate); ?></td>
                <td>
                <?php if($t->charge_type == 1): ?>
                Per Training
                <?php elseif($t->charge_type == 2): ?>
                Per Session
                <?php elseif($t->charge_type == 3): ?>
                Per Hour
                <?php endif; ?>
                </td>
                <td>
                    <form action="<?php echo e(route('branchadmin.trainer.destroy', $t->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('DELETE'); ?>

                        <a href="<?php echo e(route('branchadmin.trainer.edit', $t->id)); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="text-center">
            <?php echo e($trainers->links()); ?>

        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>