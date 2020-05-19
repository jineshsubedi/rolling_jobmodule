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
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo e(route('staffs.event.create')); ?>" class="btn refreshbtn right btm10m"><i
            class="fa fa-fw fa-plus"></i>Add Event</a>
      </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Event</h3>
        </div>
      <div class="box-body">
        <table class="table table-borderd">
            <tr>
                <th>SN</th>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
            <?php foreach($events as $k=>$event): ?>
            <tr>
                <td><?php echo e($k+1); ?></td>
                <td><?php echo e($event->title); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($event->from)->format('d M, Y')); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($event->to)->format('d M, Y')); ?></td>
                <td>
                    <form action="<?php echo e(route('staffs.event.destroy', $event->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('DELETE'); ?>

                        <a href="<?php echo e(route('staffs.event.show', $event->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo e(route('staffs.event.edit', $event->id)); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="text-center">
            <?php echo e($events->links()); ?>

        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>