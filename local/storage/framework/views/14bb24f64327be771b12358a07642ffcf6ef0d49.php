<?php $__env->startSection('heading'); ?>
Training Create
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Training Create</li>
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
            <h3 class="box-title">Create Training</h3>
        </div>
        <div class="box-body">
            <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('staffs.training.update', $training->id)); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <?php echo method_field('PUT'); ?>

            <div class="col-md-10" style="border:1px solid #e6e6e6; border-radius: 5px; padding: 20px;">
                <h4>Training Detail</h4>
                <div class="form-group">
                    <label class="col-md-2 control-label required">Program/Course</label>
                    <div class="col-md-10">
                        <select name="program_id" id="program_id" class="form-control select2">
                            <option value="">Select Program</option>
                            <?php foreach($programs as $program): ?>
                            <option value="<?php echo e($program->id); ?>" <?php if($training->program_id == $program->id): ?> selected <?php endif; ?>><?php echo e($program->title); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if($errors->has('program_id')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('program_id')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label required">Trainer</label>
                    <div class="col-md-10">
                        <select name="trainer_id" id="trainer_id" class="form-control select2">
                            <option value="">Select Trainer</option>
                            <?php foreach($trainers as $trainer): ?>
                            <option value="<?php echo e($trainer->id); ?>" <?php if($training->trainer_id == $trainer->id): ?> selected <?php endif; ?>><?php echo e($trainer->name); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if($errors->has('trainer_id')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('trainer_id')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-md-4 required">Start Date</label>
                            <div class="col-md-8">
                                <input type="text" name="from" id="from" class="form-control datepicker" autocomplete="off" value="<?php echo e($training->from); ?>">
                                <?php if($errors->has('from')): ?>
                                    <span class="text-danger">
                                        <strong><?php echo e($errors->first('from')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <label class="col-md-4 required">End Date</label>
                            <div class="col-md-8">
                                <input type="text" name="to" id="to" class="form-control datepicker" autocomplete="off" value="<?php echo e($training->to); ?>">
                                <?php if($errors->has('to')): ?>
                                    <span class="text-danger">
                                        <strong><?php echo e($errors->first('to')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 required">Status</label>
                    <div class="col-md-10">
                        <select name="status" id="status" class="form-control select2">
                            <option value="">Select Status</option>
                            <option value="1" <?php if($training->status == 1): ?> selected <?php endif; ?>>Participant Invited</option>
                            <option value="1" <?php if($training->status == 2): ?> selected <?php endif; ?>>Participant Completed</option>
                            <option value="1" <?php if($training->status == 3): ?> selected <?php endif; ?>>Completed</option>
                        </select>
                        <?php if($errors->has('status')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('status')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label class="col-md-4 required">Total Participation</label>
                        <div class="col-md-8">
                            <select name="level" id="level" class="form-control select2">
                                <option value="">Select Level</option>
                                <?php foreach($positions as $position): ?>
                                <option value="<?php echo e($position->id); ?>" <?php if($training->level == $position->id): ?> selected <?php endif; ?>><?php echo e($position->title); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if($errors->has('level')): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('level')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div> 
                    </div>

                    <div class="col-md-6" style="margin-top: 10px;">
                        <label class="col-md-4 required">Estimated Budget</label>
                        <div class="col-md-8">
                            <input type="text" name="budget" id="budget" class="form-control" value="<?php echo e($training->budget); ?>">
                            <?php if($errors->has('budget')): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('budget')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div> 
                    </div>
                    
                    <div class="col-md-6" style="margin-top: 10px;">
                        <label class="col-md-4">Venue</label>
                        <div class="col-md-8">
                            <input type="text" name="venue" id="venue" class="form-control" value="<?php echo e($training->venue); ?>">
                            <?php if($errors->has('venue')): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('venue')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div> 
                    </div>

                    <div class="col-md-6" style="margin-top: 10px;">
                        <label class="col-md-4 required">Total Participation</label>
                        <div class="col-md-8">
                            <input type="text" name="total_participant" id="total_participant" class="form-control" value="<?php echo e($training->total_participant); ?>">
                            <?php if($errors->has('total_participant')): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('total_participant')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div> 
                    </div>
                </div>
                <hr>
                <h4>Training Itinery</h4>
                <button class="btn btn right" type="button" onclick="addItineryForm()"><i class="fa fa-plus"> Add More</i></button>
                <table class="table table-bordered table-striped" id="training_itinery">
                    <tr>
                        <th>Date</th>
                        <th>Topic</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Duration</th>
                        <th>Action</th>
                    </tr>
                    <?php if(count($itineries) > 0): ?>
                        <?php foreach($itineries as $itinery): ?>
                        <tr id="itinery_old_form<?php echo e($itinery->id); ?>">
                            <input type="hidden" name="itinery_id[]" value="<?php echo e($itinery->id); ?>">
                            <td>
                                <input type="text" name="itinery_old_date[]" class="form-control datepicker" value="<?php echo e($itinery->date); ?>">
                            </td>
                            <td>
                                <input type="text" name="old_topic[]" class="form-control" value="<?php echo e($itinery->topic); ?>">
                            </td>
                            <td>
                                <input type="time" name="old_start_time[]" class="form-control" value="<?php echo e($itinery->start_time); ?>">
                            </td>
                            <td>
                                <input type="time" name="old_end_time[]" class="form-control" value="<?php echo e($itinery->end_time); ?>">
                            </td>
                            <td>
                                <input type="text" name="old_duration[]" class="form-control" value="<?php echo e($itinery->duration); ?>">
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning" onclick="removeItineryOldForm(1)"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                    <tr id="itinery_form1">
                        <input type="hidden" name="itinery_id[]" value="">
                        <td>
                            <input type="text" name="itinery_date[]" class="form-control datepicker">
                        </td>
                        <td>
                            <input type="text" name="topic[]" class="form-control">
                        </td>
                        <td>
                            <input type="time" name="start_time[]" class="form-control">
                        </td>
                        <td>
                            <input type="time" name="end_time[]" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="duration[]" class="form-control">
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning" onclick="removeItineryForm(1)"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
                <hr>
                <h4>Training Notice</h4>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-md-4 required">Notice Date</label>
                            <div class="col-md-8">
                                <input type="hidden" name="notice_id" value="<?php echo e($notice->id); ?>">
                                <input type="text" name="notice_date" id="notice_date" class="form-control datepicker" autocomplete="off" value="<?php echo e($notice->date); ?>">
                                <?php if($errors->has('notice_date')): ?>
                                    <span class="text-danger">
                                        <strong><?php echo e($errors->first('notice_date')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <label class="col-md-4 required">Date of Submission</label>
                            <div class="col-md-8">
                                <input type="text" name="submit_date" id="submit_date" class="form-control datepicker" autocomplete="off" value="<?php echo e($notice->submit_date); ?>">
                                <?php if($errors->has('submit_date')): ?>
                                    <span class="text-danger">
                                        <strong><?php echo e($errors->first('submit_date')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label required">Description</label>
                    <div class="col-md-10">
                        <textarea name="description" id="description" class="form-control" rows="5"><?php echo e($notice->description); ?></textarea>
                        <?php if($errors->has('description')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('description')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label required">Attach Document</label>
                    <div class="col-md-10">
                        <input type="file" name="document" class="form-control">
                        <a href="<?php echo e(asset('image/'.$notice->document)); ?>" target="_blank">
                            <img src="<?php echo e(asset('image/ms-word.png')); ?>" width="100px;">
                        </a>
                        <?php if($errors->has('document')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('document')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-info" ><i class="fa fa-paper-plane-o"> Submit</i></button>
                    <a href="<?php echo e(route('staffs.training.index')); ?>" class="btn btn-warning"><i class="fa fa-times"> Cancel</i></a>
                </div>
            </div>
            </form>
        </div>
    </div>
  </div>
  <script>
      $('.datepicker').datepicker();
      $('.select2').select2();
      var count = 1;
      function addItineryForm()
      {
        count++;
        var html = '<tr id="itinery_form'+count+'"><td><input type="text" name="itinery_date[]" class="form-control datepicker"></td><td><input type="text" name="topic[]" class="form-control"></td><td><input type="time" name="start_time[]" class="form-control"></td><td><input type="time" name="end_time[]" class="form-control"></td><td><input type="text" name="duration[]" class="form-control"></td><td><button type="button" class="btn btn-warning" onclick="removeItineryForm('+count+')"><i class="fa fa-trash"></i></button></td></tr>'
        $('#training_itinery').append(html);
      }
      function removeItineryForm(id)
      {
        $('#itinery_form'+id).remove();
      }
      function removeItineryOldForm(id)
      {
        $('#itinery_old_form'+id).remove();
      }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>