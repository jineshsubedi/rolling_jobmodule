<?php $__env->startSection('heading'); ?>
 Exit Interview of <?php echo e($data->staffs_name); ?>

<small>Detail of Edit Exit Interview</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo e(url('/staffs/interview')); ?>">Exit Interview</a></li>
<li class="active">Detail</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Exit Interview of <?php echo e($data->staffs_name); ?></div>
                <div class="panel-body">

                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td><strong>Interview of:</strong></td>
                                <td><?php echo e($data->staffs_name); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Interview Received Date:</strong></td>
                                <td><?php echo e($data->interview_date); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Interview Received By:</strong></td>
                                <td><?php echo e($data->received_by); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Service Trnure:</strong></td>
                                <td><?php echo e($data->service_tenure); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="row">
                            <div class="col-md-12 bg-gray" style="padding: 10px;">
                                <h3 style="margin: 0px;">Interview Questions and Answers</h3>
                            </div>
                        </div>
                        <?php ($questions = json_decode($data->description)); ?>
                        <?php if(is_array($questions)): ?>
                    <table class="table table-bordered table-hover">
                        <tbody>
                         <?php foreach($questions as $question): ?>
                            <tr>
                                <td><strong><?php echo e($question->question); ?></strong></td>
                                
                            </tr>
                            <tr>
                                
                                <td><?php echo e($question->answer); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <div class="row">
                            <div class="col-md-12 bg-gray" style="padding: 10px;">
                                <div class="alert-info">
                                    Sorry no any question answer found.
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                   

                    
        </div>
    </div>
</div>
</div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>