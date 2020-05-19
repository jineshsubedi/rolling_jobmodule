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
        <a href="<?php echo e(route('staffs.training.index')); ?>" class="btn refreshbtn right btm10m"><i
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
        <label for="">Trainer: <?php echo e($trainer->name); ?> (<?php echo e($trainer->designation); ?>)</label>
        <br>
        <label for="">Participants</label>
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
              <div class="col-md-3">
                  <?php if($attachment->extension == 'docx' || $attachment->extension == 'doc'): ?>
                      <a href="<?php echo e(asset('image/'.$attachment->attachment)); ?>" target="_blank"><img src="<?php echo e(asset('image/ms-word.png')); ?>" width="100"></a>
                  <?php endif; ?>
                  <?php if($attachment->extension == 'pdf'): ?>
                      <a href="<?php echo e(asset('image/'.$attachment->attachment)); ?>" target="_blank"><img src="<?php echo e(asset('image/pdf_icon.png')); ?>" width="100"></a>
                  <?php endif; ?>
                  <?php if($attachment->extension == 'png'): ?>
                      <a href="<?php echo e(asset('image/'.$attachment->attachment)); ?>" target="_blank"><img src="<?php echo e(asset('image/'.$attachment->attachment)); ?>" width="100"></a>
                  <?php endif; ?>
              </div> 
            <?php endforeach; ?>   
        </div>
        <br>
        <hr><br>
        <?php if(!\App\Training::checkStaffForTraining($training->id)): ?>
        <br><br>
        <label for="">COMMENT SECTION</label>
        <form action="<?php echo e(route('staffs.training.saveFeedback', $training->id)); ?>" method="post">
        <?php echo csrf_field(); ?>

          <div class="row">
            <div class="form-group">
              <label for="feedback" class="col-md-2">feedback</label>
              <div class="col-md-8">
                <textarea name="comment" id="comment" class="form-control" placeholder="comment"></textarea>
              </div>
              <div class="col-md-2">
                <input type="submit" value="Send" class="btn btn-primary">
              </div>
            </div>
          </div>
        </form>
        <?php endif; ?>
        <br>
        <?php ($feedbacks = \App\TrainingFeedback::getMyFeedback($training->id)); ?>
        <?php if($feedbacks): ?>
          <?php foreach($feedbacks as $feedback): ?>
          <div class="row">
          <div class="col-md-2">
            <?php if($feedback->staff->image): ?>
            <img src="<?php echo e(asset('image/'.$feedback->staff->image)); ?>" class="img-circle" style="object-fit:contain; width:50px; height:50px;"> <?php echo e($feedback->staff->name); ?>

            <?php else: ?>
            <img src="<?php echo e(asset('image/noimage.png')); ?>" class="img-circle" style="object-fit:contain; width:50px; height:50px;"> <?php echo e($feedback->staff->name); ?>

            <?php endif; ?>
          </div>
          <div class="col-md-8" style="    border: 1px solid #d6d6d6;border-radius: 2px;padding: 10px 0 10px 5px">
            <p><?php echo e($feedback->comment); ?></p>
          </div>
          <div>
            <a href="<?php echo e(route('staffs.training_feedback.deleteFeedback', $feedback->id)); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </div>
          </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>