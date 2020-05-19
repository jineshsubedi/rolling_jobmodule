<?php $__env->startSection('heading'); ?>
Event
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Event</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Event</h3>
        </div>
      <div class="box-body">
        <div>
            <?php if(isset($event)): ?>
            <div style="border: 1px solid #b2fde7; padding: 10px; border-radius: 5px;">
              <p><h3><?php echo e(ucwords($event->title)); ?></h3></p>
              <p>Start Date: <?php echo e(\Carbon\Carbon::parse($event->from)->format('d M, Y')); ?></p>
              <p>End Date: <?php echo e(\Carbon\Carbon::parse($event->to)->format('d M, Y')); ?></p>
              <?php if($event->attachment): ?>
              <a href="<?php echo e(asset('image/'.$event->attachment)); ?>" target="_blank"><img src="<?php echo e(asset('image/'.$event->attachment)); ?>" width="250px;"></a>
              <?php endif; ?>
              <p class="text-justify"><?php echo e($event->description); ?></p>
            </div>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>