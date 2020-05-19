<?php $__env->startSection('heading'); ?>
Training Material
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Training Material</li>
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
        <div class="box-header with-border">
            <h3 class="box-title">Training Material</h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('staffs.mytraining.material.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="col-md-10" style="border:1px solid #e6e6e6; border-radius: 5px; padding: 20px;">
                <h4>Training Material</h4>
                <div class="form-group">
                    <label class="col-md-2 required">Material Type</label>
                    <div class="col-md-10">
                        <select name="type" id="material_type" class="form-control select2">
                            <option value="">Select Type</option>
                            <option value="1" <?php if(old('type') == 1): ?> selected <?php endif; ?>>Presentation</option>
                            <option value="2" <?php if(old('type') == 2): ?> selected <?php endif; ?>>Training</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="program">
                    <label class="col-md-2 control-label required">Program/Course</label>
                    <div class="col-md-10">
                        <select name="program_id" id="program_id" class="form-control select2">
                            <option value="">Select Program</option>
                            <?php foreach($programs as $program): ?>
                            <option value="<?php echo e($program->id); ?>" <?php if(old('program_id') == $program->id): ?> selected <?php endif; ?>><?php echo e($program->title); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if($errors->has('program_id')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('program_id')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group" id="presentation">
                    <label class="col-md-2 control-label required">Title</label>
                    <div class="col-md-10">
                        <input type="text" name="title" class="form-control" value="<?php echo e(old('title')); ?>">
                        <?php if($errors->has('title')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('title')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label required">Document</label>
                    <div class="col-md-10">
                        <input type="file" name="document" class="form-control">
                        <?php if($errors->has('document')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('document')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-info" ><i class="fa fa-paper-plane-o"> Submit</i></button>
                    <a href="<?php echo e(route('staffs.mytraining.material')); ?>" class="btn btn-warning"><i class="fa fa-times"> Cancel</i></a>
                </div>
            </div>
            </form>
        </div>
    </div>
  </div>
  <script>
      $('.datepicker').datepicker();
      $('.select2').select2();
      $('#material_type').change(function(){
        var type = $(this).val();
        if(type == 1)
        {
            $('#presentation').show();
        }else{
            $('#presentation').hide();
        }
        if(type == 2)
        {
            $('#program').show();
        }else{
            $('#program').hide();
        }
      })
      var old_type = $('#material_type').val();
      if(old_type == 1)
        {
            $('#presentation').show();
        }else{
            $('#presentation').hide();
        }
        if(old_type == 2)
        {
            $('#program').show();
        }else{
            $('#program').hide();
        }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>