<?php $__env->startSection('heading'); ?>
Staff Survey
<small>List of Staff Survey</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Staff Survey</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="row">
        </div>
        <div class="box">
            <div class="box-header">
                <h3>Survey View</h3>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <?php foreach($questions as $question): ?>
                    <div class="form-group" id="action_form_<?php echo e($question->id); ?>">
                        <label><?php echo e($question->label); ?></label>
                        <div class="form-input" style="border-bottom: 1px solid #eae2e2; padding: 10px;">
                            <?php $answer = \App\SurveyAnswer::getAnswer($question->id); ?>
                            <?php if($answer): ?>
                            <?php if($question->type=='file'): ?>
                            <?php 
                            $ext = strtolower(substr(strchr($answer->description,"."),1)); 
                            ?>
                            <?php if($ext=='jpg' || $ext=='jpeg' || $ext=='png'): ?>
                            <a href="<?php echo e(asset('/image/'.$answer->description)); ?>" target="_blank">
                                <img src="<?php echo e(asset('/image/'.$answer->description)); ?>" alt="" width="100px;">
                            </a>
                            <?php elseif($ext=='doc' || $ext=='docx' || $ext=='pdf'): ?>
                            <a href="<?php echo e(asset('/image/'.$answer->description)); ?>" target="_blank">
                                <i class="fa fa-file-text-o" style="font-size: 50px;"></i>
                            </a>
                            <?php endif; ?>
                            <?php else: ?>
                            <?php echo e($answer->description); ?>

                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div><!-- /.box-body -->
            <div class="box-header">
                <a href="<?php echo e(route('supervisor.survey.index')); ?>" class="btn btn-sm btn-info"> Go Back</a>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>