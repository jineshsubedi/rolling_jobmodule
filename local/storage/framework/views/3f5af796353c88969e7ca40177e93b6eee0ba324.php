<?php $__env->startSection('heading'); ?>
Training and Development
<small>Training and Development</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Training and Development</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <div class="box-header with-border">
              <ul class="nav nav-tabs">
                <li>
                  <a  href="<?php echo e(route('staffs.td.index')); ?>">Overview</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.td.schedule')); ?>">Calendar/Schedule</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.td.evaluation')); ?>">Feedback/Evaluation</a>
                </li>
                <li class="active">
                  <a href="<?php echo e(route('staffs.td.cost')); ?>">Training Cost</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.td.notice')); ?>">Training Notice</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.td.material')); ?>">Training Material</a>
                </li>
              </ul>
            </div>
            <div class="tab-content">
              <div class="row">
                <div class="col-md-2">
                  <select name="filter_year" id="filter_year" class="form-control select2">
                    <option value="">Select Year</option>
                    <?php ($date = Date('Y')); ?>
                    <?php for($i=0;$i<10;$i++): ?>
                    <?php ($value = $date - $i); ?>
                    <option value="<?php echo e($value); ?>" <?php if($data['filter_year'] == $value): ?> selected <?php endif; ?>><?php echo e($value); ?></option>
                    <?php endfor; ?>
                  </select>
                </div>
                <div class="col-md-2">
                  <select name="filter_month" id="filter_month" class="form-control select2">
                    <?php foreach($data['month'] as $k=>$month): ?>
                      <option value="<?php echo e($month['id']); ?>" <?php if($data['filter_month'] == $month['id']): ?> selected <?php endif; ?>><?php echo e($month['title']); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
              </div>
              <div class="clearfix"><br></div>
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Cost Table</h4>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                      <i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <tr>
                      <th>Total Training </th>
                      <th>Total Invited</th>
                      <th>Total Participant</th>
                      <th>Total Absent</th>
                      <th>Total Cost</th>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Charts</h4>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                      <i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="col-md-12 row">
                    <div class="col-md-6">
                      <h4>Training Vs Participants Trend</h4>
                    </div>
                    <div class="col-md-6">
                      <h4>Program/Course Trend</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Cost Table Statistics</h4>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                      <i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <table class="table table-bordered table-striped">
                    <tr>
                      <th>Department</th>
                      <th>Total Number of Invited Participant</th>
                      <th>Total Number of Course/program attended by the Department</th>
                      <th>Total Number of Participants</th>
                      <th>Total Number of Absent Participants</th>
                      <th>Total Cost </th>
                      <th>Trainer Cost</th>
                      <th>Cost per employee</th>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
<div>
<script>
  $('.datepicker').datepicker();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>