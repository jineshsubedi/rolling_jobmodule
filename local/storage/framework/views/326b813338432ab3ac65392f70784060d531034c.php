<?php $__env->startSection('heading'); ?>
Training
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Training</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo e(route('staffs.training-setup.index')); ?>" class="btn refreshbtn right btm10m"><i
            class="fa fa-fw fa-arrow-left"></i>Go back</a>
      </div>
    </div>
    <div class="box">
      <div class="box-body">
        <h3><?php echo e(ucwords($training->title)); ?></h3>
        <p>location: <?php echo e($training->location); ?></p>
        <div class="row">
            <div class="col-md-6">
            Start Date: <?php echo e(\Carbon\Carbon::parse($training->start_date)->format('d M, Y')); ?>

            </div>
            <div class="col-md-6">
            End Date: <?php echo e(\Carbon\Carbon::parse($training->end_date)->format('d M, Y')); ?>

            </div>
            <div class="col-md-6">
            Start Time: <?php echo e(\Carbon\Carbon::parse($training->start_time)->format('h:i a')); ?>

            </div>
            <div class="col-md-6">
            End Time: <?php echo e(\Carbon\Carbon::parse($training->end_time)->format('h:i a')); ?>

            </div>
        </div>
        <br>
        <label>Detail:</label>
        <div class="well">
        <?php echo $training->description; ?>

        </div>
        <?php ($trainer = \App\Trainer::getTrainer($training->trainer_id)); ?>
        <label for="">Trainer: <?php echo e($trainer->name); ?></label>
        <br>
        <label for="">Participants:</label>
        <?php ($participants = json_decode($training->staffs)); ?>
        <div>
            <?php foreach($staffs as $staff): ?>  
            <?php if($participants && in_array($staff->id, $participants)): ?>
            <span class="label label-success"><?php echo e($staff->name); ?></span> 
            <?php endif; ?>  
            <?php endforeach; ?>   
        </div>
        <br>
        <br>
        <label for="">Attachments:</label>
        <div>
            <?php foreach($attachments as $attachment): ?>  
              <div class="col-md-2">
                  <?php if($attachment->extension == 'docx' || $attachment->extension == 'doc'): ?>
                      <a href="<?php echo e(asset('image/'.$attachment->attachment)); ?>" target="_blank"><img src="<?php echo e(asset('image/ms-word.png')); ?>" width="100"  style="object-fit: contain;width: 80px;eight: 80px;"></a>
                  <?php endif; ?>
                  <?php if($attachment->extension == 'pdf'): ?>
                      <a href="<?php echo e(asset('image/'.$attachment->attachment)); ?>" target="_blank"><img src="<?php echo e(asset('image/pdf_icon.png')); ?>" width="100" style="object-fit: contain;width: 80px;eight: 80px;"></a>
                  <?php endif; ?>
                  <?php if($attachment->extension == 'png'): ?>
                      <a href="<?php echo e(asset('image/'.$attachment->attachment)); ?>" target="_blank"><img src="<?php echo e(asset('image/'.$attachment->attachment)); ?>" width="100" style="object-fit: contain;width: 80px;eight: 80px;"></a>
                  <?php endif; ?>
              </div> 
            <?php endforeach; ?>  
        </div>
        <br>
        <div class="clearfix"></div>
        <label for="">Feedbacks:</label>
        <div id="feedback">
        <?php ($feedbacks = \App\TrainingFeedback::getAllFeedback($training->id)); ?>
        <?php if($feedbacks): ?>
        <?php foreach($feedbacks as $feedback): ?>
        <div class="row">
          <div class="col-md-3">
            <?php if($feedback->staff->image): ?>
            <img src="<?php echo e(asset('image/'.$feedback->staff->image)); ?>" class="img-circle" style="object-fit:contain; width:50px; height:50px;"> <?php echo e($feedback->staff->name); ?>

            <?php else: ?>
            <img src="<?php echo e(asset('image/noimage.png')); ?>" class="img-circle" style="object-fit:contain; width:50px; height:50px;"> <?php echo e($feedback->staff->name); ?>

            <?php endif; ?>
          </div>
          <div class="col-md-7" style="border: 1px solid #e4e4e4; border-radius: 5px;padding: 10px 5px 2px 5px;">
            <p><?php echo e($feedback->comment); ?></p>
          </div>
          <div class="col-md-2">
            <a href="<?php echo e(route('staffs.training-setup_feedback.deleteFeedback', $feedback->id)); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </div>
          </div>
          <br>
        <?php endforeach; ?>
        <?php else: ?> 
        <p class="alert alert-info">No feedback yet</p>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>