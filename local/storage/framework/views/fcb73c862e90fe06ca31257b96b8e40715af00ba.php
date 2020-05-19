<?php $__env->startSection('heading'); ?>
Training Detail
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Training Detail</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
      </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <a href="<?php echo e(url('staffs/td')); ?>" class="btn btn-info right">Go Back</a>
            <h3 class="box-title">Training Detail</h3>
        </div>
      <div class="box-body">
        <div class="form-group">
            <div style="border: 1px solid grey; padding: 10px;">
            <h4><u><?php echo e(\App\TrainingProgram::getTitle($training->program_id)); ?></u></h4>
                <p><span class="badge bg-green">Trainer: <?php echo e(\App\Trainer::getName($training->trainer_id)); ?></span></p>
                <p><span>Start Date: <?php echo e(\Carbon\Carbon::parse($training->from)->format('d M, Y')); ?></span></p>
                <p><span>End Date: <?php echo e(\Carbon\Carbon::parse($training->to)->format('d M, Y')); ?></span></p>
                <p><span>Budget: <?php echo e($training->budget); ?></span></p>
                <p><span>Venue: <?php echo e($training->venue); ?></span></p>
                <p><span>Total Particular: <?php echo e($training->total_participant); ?></span></p>
            </div>
            <hr>
            <h4>Training Itinery</h4>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Date</th>
                    <th>Topic</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Duration (Hour)</th>
                </tr>
                <?php foreach($itineries as $itinery): ?>
                <tr>
                    <td><?php echo e($itinery->date); ?></td>
                    <td><?php echo e($itinery->topic); ?></td>
                    <td><?php echo e($itinery->start_time); ?></td>
                    <td><?php echo e($itinery->end_time); ?></td>
                    <td><?php echo e($itinery->duration); ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <hr>
            <h4>Training Notice</h4>
            <div class="form-group row" style="padding: 5px; background-color: #b5ebf7">
                <div class="col-md-10">
                    <label for="Date of Publication">Date of Publication : </label>
                    <?php echo e($notice->date); ?>

                    <br>
                    <label for="Date of Submission">Date of Submission : </label>
                    <?php echo e($notice->submit_date); ?>

                    <div class="text-justify">
                        <?php echo e($notice->description); ?>

                    </div>
                </div>
                <div class="col-md-2">
                    <label for="attachment">Notice Attachment:</label><br>
                    <?php if($notice->document): ?>
                        <a href="<?php echo e(asset('image/'.$notice->document)); ?>" target="_blank">
                            <img src="<?php echo e(asset('image/ms-word.png')); ?>" width="50px;">
                        </a>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>