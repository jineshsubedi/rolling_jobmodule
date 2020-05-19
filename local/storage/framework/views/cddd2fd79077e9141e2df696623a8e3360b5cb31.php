<?php $__env->startSection('heading'); ?>
Staff Probation
<small>List of staff Probation</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Staff Probation</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
            <table class="table table-borderd">
                <tr>
                    <th>SN</th>
                    <th>Staff</th>
                    <th>Designation</th>
                    <th>Probation End Date</th>
                    <th>Action</th>
                </tr>
                <?php foreach($staffs as $k=>$staff): ?>
                <tr>
                  <td><?php echo e($k+1); ?></td>
                  <td><?php echo e($staff->name); ?></td>
                  <td><?php echo e(\App\Designation::getTitle($staff->designation)); ?></td>
                  <td><?php echo e(\Carbon\Carbon::parse($staff->probation_end_date)->format('d M, Y')); ?></td>
                  <td>
                  <?php if(!\App\ProbationEvaluation::checkSupervisorEvaluation($staff->id)): ?>
                    <a href="<?php echo e(url('/supervisor/probation_evaluation/'.$staff->id.'/evaluate')); ?>" class="btn btn-info">Evaluate</a>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
            </table>
            </div>
            <div class="text-center">
            </div>
        </div>
    </div>
<div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>