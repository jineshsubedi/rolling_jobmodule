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
                <li class="active">
                  <a  href="<?php echo e(route('staffs.td.index')); ?>">Overview</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.td.schedule')); ?>">Calendar/Schedule</a>
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
              <h4>My Training:</h4>
              <table class="table table-bordered table-striped">
                <tr>
                    <th>SN</th>
                    <th>Program</th>
                    <th>Trainer</th>
                    <th>Level</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php foreach($mytraining as $k=>$training): ?>
                <tr>
                    <td><?php echo e($k+1); ?></td>
                    <td><?php echo e(\App\TrainingProgram::getTitle($training->program_id)); ?></td>
                    <td><?php echo e(\App\Trainer::getName($training->trainer_id)); ?></td>
                    <td><?php echo e(\App\TravelerPosition::getTitle($training->level)); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($training->from)->format('d M, Y')); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($training->to)->format('d M, Y')); ?></td>
                    <td>
                        <?php echo e(\App\TrainingStatus::getTitle($training->status)); ?>

                    </td>
                    <td>
                        <a href="<?php echo e(route('staffs.training.show', $training->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
              </table>
              
              <h4>Upcomming Training:</h4>
              <table class="table table-borderd table-striped">
                  <tr>
                      <th>SN</th>
                      <th>Program</th>
                      <th>Trainer</th>
                      <th>From</th>
                      <th>To</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                  <tr>
                    <td></td>
                    <td>
                      <select id="filter_data_program" class="form-control">
                        <option value="">Select Program</option>
                        <?php foreach($programs as $program): ?>
                        <option value="<?php echo e($program->id); ?>"><?php echo e($program->title); ?></option>
                        <?php endforeach; ?>
                      </select>
                    </td>
                    <td></td>
                    <td>
                      <input type="text" id="filter_start_date" class="form-control datepicker" autocomplete="off" placeholder="<?php echo e(Date('Y-m-d')); ?>">
                    </td>
                    <td>
                      <input type="text" id="filter_end_date" class="form-control datepicker" autocomplete="off" placeholder="<?php echo e(Date('Y-m-d')); ?>">
                    </td>
                    <td></td>
                    <td></td>
                  </tr>
                  <?php foreach($up_training as $k=>$training): ?>
                  <tr>
                      <td><?php echo e($k+1); ?></td>
                      <td><?php echo e(\App\TrainingProgram::getTitle($training->program_id)); ?></td>
                      <td><?php echo e(\App\Trainer::getName($training->trainer_id)); ?></td>
                      <td><?php echo e(\Carbon\Carbon::parse($training->from)->format('d M, Y')); ?></td>
                      <td><?php echo e(\Carbon\Carbon::parse($training->to)->format('d M, Y')); ?></td>
                      <td>
                          <?php echo e(\App\TrainingStatus::getTitle($training->status)); ?>

                      </td>
                      <td>
                          <a href="<?php echo e(route('staffs.training.show', $training->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                      </td>
                  </tr>
                  <?php endforeach; ?>
              </table>
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