<?php $__env->startSection('heading'); ?>
Notice
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Notice</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo e(route('staffs.notice.create')); ?>" class="btn refreshbtn right btm10m"><i
            class="fa fa-fw fa-plus"></i>Add Notice</a>
      </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Notice</h3>
        </div>
      <div class="box-body">
        <table class="table table-borderd">
            <tr>
                <th>SN</th>
                <th>Title</th>
                <th>Publish Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
            <?php foreach($notices as $k=>$notice): ?>
            <tr>
                <td><?php echo e($k+1); ?></td>
                <td><?php echo e($notice->title); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($notice->publish_date)->format('d M, Y')); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($notice->to_date)->format('d M, Y')); ?></td>
                <td>
                    <form action="<?php echo e(route('staffs.notice.destroy', $notice->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('DELETE'); ?>

                        <a href="<?php echo e(route('staffs.notice.show', $notice->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo e(route('staffs.notice.edit', $notice->id)); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="text-center">
            <?php echo e($notices->links()); ?>

        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>