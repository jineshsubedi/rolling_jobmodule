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
                  <a  href="<?php echo e(route('staffs.mytraining.index')); ?>">Overview</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.mytraining.schedule')); ?>">Calendar/Schedule</a>
                </li>
                <li>
                  <a href="<?php echo e(route('staffs.mytraining.notice')); ?>">Training Notice</a>
                </li>
                <li class="active">
                  <a href="<?php echo e(route('staffs.mytraining.material')); ?>">Training Material</a>
                </li>
              </ul>
            </div>
            <div class="tab-content">
              <a href="<?php echo e(route('staffs.mytraining.material.create')); ?>" class="btn btn-info right">Add Material</a>
              <table class="table table-bordered table-striped">
                <tr>
                  <th>SN</th>
                  <th>Program</th>
                  <th>Published By</th>
                  <th>document</th>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <select id="filter_program" class="form-control">
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
                      <?php if($material->doc_type == 'doc' || $material->doc_type == 'docx'): ?>
                        <img src="<?php echo e(asset('image/ms-word.png')); ?>" width="50px;">
                      <?php endif; ?>
                      <?php if($material->doc_type == 'ppt' || $material->doc_type == 'pptx'): ?>
                        <img src="<?php echo e(asset('image/ppt.png')); ?>" width="50px;">
                      <?php endif; ?>
                      <?php if($material->doc_type == 'xls' || $material->doc_type == 'xlsx'): ?>
                        <img src="<?php echo e(asset('image/excel.png')); ?>" width="50px;">
                      <?php endif; ?>
                      <?php if($material->doc_type == 'pdf'): ?>
                        <img src="<?php echo e(asset('image/pdf_icon.png')); ?>" width="50px;">
                      <?php endif; ?>
                    </a>
                    <?php endif; ?>
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
  $('#filter_program').change(function(){
    var program = $(this).val();
    var staff_id = $('#filter_staff').val();
    var url = '<?php echo e(url("/staffs/mytraining/material?")); ?>';
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
    var url = '<?php echo e(url("/staffs/mytraining/material?")); ?>';
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