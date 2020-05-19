<?php $__env->startSection('heading'); ?>
Training create
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Training create</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/select2/css/select2.min.css')); ?>">
<style>
.select2-container--default .select2-selection--multiple .select2-selection__choice{color:#fff;background-color:#006b9d;}</style>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Training</h3>
        </div>
      <div class="box-body">
      <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('staffs.training-setup.update', $training->id)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <?php echo method_field('PUT'); ?>

       <div class="row">
            <div class="col-md-10" id="multiCategory">
                <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label required">Title</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo e($training->title); ?>" placeholder="Training Title">
                        <?php if($errors->has('title')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('title')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('type') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label required">Type</label>
                    <div class="col-md-8">
                        <select name="training_type_id" id="training_type_id" class="form-control">
                            <option value="">Select Training Type</option>
                            <?php foreach($types as $type): ?>
                            <?php if($type->id == $training->training_type_id): ?>
                            <option value="<?php echo e($type->id); ?>" selected><?php echo e($type->title); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($type->id); ?>"><?php echo e($type->title); ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <?php if($errors->has('type')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('type')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('trainer') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label required">Trainer</label>
                    <div class="col-md-8">
                        <select name="trainer_id" id="trainer_id" class="form-control">
                            <option value="">Select Training trainer</option>
                            <?php foreach($trainers as $trainer): ?>
                            <?php if($trainer->id == $training->trainer_id): ?>
                            <option value="<?php echo e($trainer->id); ?>" selected><?php echo e($trainer->name); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($trainer->id); ?>"><?php echo e($trainer->name); ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <?php if($errors->has('trainer')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('trainer')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label required">description</label>
                    <div class="col-md-8">
                        <textarea name="description" id="training-description" class="form-control" placeholder="training detail"><?php echo e($training->description); ?></textarea>
                        <?php if($errors->has('description')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('description')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('location') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label required">Location</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="location" name="location" placeholder="Training Location" value="<?php echo e($training->location); ?>">
                        <?php if($errors->has('location')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('location')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('start_date') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label required">Start Date</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="start_date" name="start_date" value="<?php echo e($training->start_date); ?>" placeholder="Training Start Date">
                        <?php if($errors->has('start_date')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('start_date')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('start_time') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label required">Start Time</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control timepicker" id="start_time" name="start_time" value="<?php echo e($training->start_time); ?>" placeholder="Training Start Time">
                        <?php if($errors->has('start_time')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('start_time')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('end_date') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label required">End Date</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="end_date" name="end_date" value="<?php echo e($training->end_date); ?>" placeholder="Training End Date">
                        <?php if($errors->has('end_date')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('end_date')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('end_time') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label required">End Time</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control timepicker" id="end_time" name="end_time" value="<?php echo e($training->end_time); ?>" placeholder="Training End Time">
                        <?php if($errors->has('end_time')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('end_time')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php ($ids = json_decode($training->staffs)); ?>
                <div class="form-group<?php echo e($errors->has('staffs') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label required">Training Participants</label>
                    <div class="col-md-8">
                        <select name="staffs[]" id="staffs" class="form-control select2" multiple>
                            <option value="">Select Staff</option>
                            <?php foreach($staffs as $staff): ?>
                            <?php if(in_array($staff->id, $ids)): ?>
                            <option value="<?php echo e($staff->id); ?>" selected><?php echo e($staff->name); ?></option>
                            <?php else: ?> 
                            <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <?php if($errors->has('staffs')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('staffs')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('budget') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label required">Estimated Budget</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="budget" name="budget" value="<?php echo e($training->budget); ?>" placeholder="Training Budget">
                        <?php if($errors->has('budget')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('budget')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if(count($attachments) > 0): ?>
                <label class="col-md-12 control-label text-center">Attachments</label>
                <br>    <hr>
                    <?php foreach($attachments as $k=>$attachment): ?>
                        <div class="col-md-3" id="dataform<?php echo e($k); ?>">
                            <?php if($attachment->extension == 'docx' || $attachment->extension == 'doc'): ?>
                                <a href="<?php echo e(asset('image/'.$attachment->attachment)); ?>" target="_blank"><img src="<?php echo e(asset('image/ms-word.png')); ?>" width="100"></a>
                            <?php endif; ?>
                            <?php if($attachment->extension == 'pdf'): ?>
                                <a href="<?php echo e(asset('image/'.$attachment->attachment)); ?>" target="_blank"><img src="<?php echo e(asset('image/pdf_icon.png')); ?>" width="100"></a>
                            <?php endif; ?>
                            <?php if($attachment->extension == 'png'): ?>
                                <a href="<?php echo e(asset('image/'.$attachment->attachment)); ?>" target="_blank"><img src="<?php echo e(asset('image/'.$attachment->attachment)); ?>" width="100"></a>
                            <?php endif; ?>
                            <button type="button" class="btn btn-danger" onclick="removeDataForm(<?php echo e($k); ?>, <?php echo e($attachment->id); ?>)"><i class="fa fa-trash"></i></button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <div class="col-md-8">
                    <button type="button" class="btn btn-default right" onclick="addMoreDynamicFileForm()">Add More</button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-10 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-fw fa-save"></i>Save
                </button>
            </div>
        </div>
      </form>
      </div>
    </div>
  </div>
  <script src="<?php echo e(asset('assets/select2/js/select2.full.min.js')); ?>"></script>
  <script>
    $(function() {
        CKEDITOR.replace('training-description')
        $('#start_date').datepicker();
        $('#end_date').datepicker();
        $('.timepicker').timepicker({
            'showDuration': true,
            'timeFormat': 'H:i:s',
            'minTime': '07:00:00',
        });
        $('.select2').select2()
    });
  </script>

  <!-- dynamic file form  -->
<script>
var count = 0;
function addMoreDynamicFileForm()
{
    count++
    var formData = '<div class="form-group" id="fileform'+count+'"><label class="col-md-2 control-label required">Attachment</label><div class="col-md-8"><input type="file" class="form-control" id="training_file" name="training_file[]" value="<?php echo e(old('budget')); ?>" placeholder="Training attachment"></div><div class="col-md-2"><button type="button" class="btn btn-danger" onclick="removeFileForm('+count+')"><i class="fa fa-trash"></i></button></div></div>';
    $('#multiCategory').append(formData)
}
function removeFileForm(num)
{
    $('#fileform'+num).remove()
}
function removeDataForm(index, attachment_id)
{
    $('#dataform'+index).remove()
    var CSRF_TOKEN = $('input[name=\'_token\']').val();
    $.ajax({
        url: "<?php echo e(url('/staffs/training-setup/removeDynamicFile')); ?>",
        type: 'POST',
        data:{
            _token: CSRF_TOKEN,
            attachment_id: attachment_id,
        },
        dataType: 'JSON',
        success:function(data){
            console.log(data)
        },
        error:function(error){
            console.log(error)
        }
    });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>