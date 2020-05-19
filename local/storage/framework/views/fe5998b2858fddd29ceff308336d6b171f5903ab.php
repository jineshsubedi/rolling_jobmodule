<?php $__env->startSection('heading'); ?>
Survey
<small>Detail Survey</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo e(url('/branchadmin/survey')); ?>">Surveys</a></li>
<li class="active">New Survey</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">New Survey</div>
                <div class="panel-body">
                    <h3><?php echo e($survey->title); ?></h3>
                    <hr>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Staff</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($answers as $k=>$answer): ?>
                                <tr>
                                    <td><?php echo e($k+1); ?></td>
                                    <td><?php echo e($answer->adjustment_staff->name); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($answer->created_at)->format('M d, Y H:i:s a')); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('survey.view', [$answer->survey_id, $answer->adjustment_staff_id])); ?>"
                                            class="btn btn-info"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <?php echo e($answers->links()); ?>

                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="<?php echo e(route('survey.index')); ?>" class="btn btn-sm btn-default">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function questionAnswers(id)
    {
        alert(id)
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>