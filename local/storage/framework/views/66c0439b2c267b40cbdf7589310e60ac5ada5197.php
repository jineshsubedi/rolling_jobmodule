<?php $__env->startSection('heading'); ?>
Training and Development
<small>Training and Development</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Training and Development</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/select2/css/select2.css')); ?>">
<style>
    .select2-selection__rendered{line-height: 20px !important;}
</style>
<script src="<?php echo e(asset('assets/select2/js/select2.js')); ?>"></script>
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
                <li>
                  <a href="<?php echo e(route('staffs.td.cost')); ?>">Training Cost</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.td.notice')); ?>">Training Notice</a>
                </li>
                <li class="active">
                  <a href="<?php echo e(route('staffs.td.material')); ?>">Training Material</a>
                </li>
              </ul>
            </div>
            <div class="tab-content">
              <table class="table table-bordered table-striped">
                <tr>
                  <th>SN</th>
                  <th>Program</th>
                  <th>Published By</th>
                  <th>document</th>
                  <th>Action</th>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <select id="filter_program" class="form-control select2">
                      <option value="">Select Program</option>
                      <?php foreach($programs as $program): ?>
                      <option value="<?php echo e($program->id); ?>" <?php if($program->id == $data['filter_program']): ?> selected <?php endif; ?>><?php echo e($program->title); ?></option>
                      <?php endforeach; ?>
                    </select>
                  </td>
                  <td>
                    <select id="filter_staff" class="form-control select2">
                      <option value="">Select Staff</option>
                      <?php foreach($staffs as $staff): ?>
                      <option value="<?php echo e($staff->id); ?>" <?php if($staff->id == $data['filter_staff']): ?> selected <?php endif; ?>><?php echo e($staff->name); ?></option>
                      <?php endforeach; ?>
                    </select>
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <?php foreach($materials as $k=>$material): ?>
                <tr>
                  <td><?php echo e($k+1); ?></td>
                  <td>
                    <?php if($material->type == 1): ?>
                    <?php echo e($material->title); ?>

                    <?php elseif($material->type == 2): ?>
                    <?php echo e(\App\TrainingProgram::getTitle($material->program_id)); ?>

                    <?php else: ?>
                    <?php endif; ?>
                  </td>
                  <td><?php echo e(\App\Adjustment_staff::getName($material->publish_by)); ?></td>
                  <td>
                    <?php if($material->document): ?>
                    <a href="<?php echo e(asset('image/'.$material->document)); ?>" target="_blank">
                          <img src="<?php echo e(asset('image/ms-word.png')); ?>" width="50px;">
                      </a>
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if($material->approval == 0): ?>
                    <a href="<?php echo e(route('staffs.td.material.approve', $material->id)); ?>" class="btn btn-info"><i class="fa fa-thumbs-up"></i></a>
                    <a href="<?php echo e(route('staffs.td.material.disapprove', $material->id)); ?>" class="btn btn-warning"><i class="fa fa-thumbs-down"></i></a>
                    <?php elseif($material->approval==1): ?>
                    <span class="badge bg-green">Approved</span>
                    <?php elseif($material->approval == 2): ?>p
                    <span class="badge bg-red">Rejected</span>
                    <?php else: ?>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
              </table>
              <div class="text-center">
                <?php echo e($materials->links()); ?>

              </div>
            </div>
          </div>
        </div>
    </div>
<div>
<script>
  $('.datepicker').datepicker();
  $('.select2').select2();
  $('#filter_program').change(function(){
    var program = $(this).val();
    var staff_id = $('#filter_staff').val();
    var url = '<?php echo e(url("/staffs/td/material?")); ?>';
    if(program != ''){
      url += '&filter_program='+program;
    }
    if(staff_id != ''){
      url += '&filter_staff='+staff_id;
    }
    
    location = url;
  })
  $('#filter_staff').change(function(){
    var staff_id = $(this).val();
    var program = $('#filter_program').val();
    var url = '<?php echo e(url("/staffs/td/material?")); ?>';
    if(program != ''){
      url += '&filter_program='+program;
    }
    if(staff_id != ''){
      url += '&filter_staff='+staff_id;
    }
    
    location = url;
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>