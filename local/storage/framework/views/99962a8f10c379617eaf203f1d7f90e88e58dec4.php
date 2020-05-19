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
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Notice</h3>
        </div>
      <div class="box-body">
        <div style="border:1px solid grey; border-radius: 5px; margin: 0 auto; width: 90%; padding: 10px;">
            <h3><?php echo e(isset($notice) ? $notice->title : ''); ?></h3>
            <p>Publish Date: <?php echo e(\Carbon\Carbon::parse($notice->publish_date)->format('d M, Y')); ?></p>
            <p>To Date: <?php echo e(\Carbon\Carbon::parse($notice->to_date)->format('d M, Y')); ?></p>
            <p style="text-align: justify;"><?php echo e(isset($notice) ? $notice->description : ''); ?></p>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>