<?php $__env->startSection('heading'); ?>
Staff Survey
<small>List of Staff Survey</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Staff Survey</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <a href="<?php echo e(url('/branchadmin/survey/addnew')); ?>" class="btn btn-primary right"><i
                    class="fa fa-fw fa-plus"></i>Add New Survey</a>
        </div>

        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <?php /*  <th>Branch</th>  */ ?>
                            <th>Title</th>
                            <th>Publish Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($surveys as $k=>$survey): ?>
                        <tr>
                            <td><?php echo e($k+1); ?></td>
                            <?php /*  <td><?php echo e($survey->branch->name); ?></td> */ ?>
                            <td><?php echo e($survey->title); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($survey->publish_date)->format('d M, Y')); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($survey->end_date)->format('d M, Y')); ?></td>
                            <td>
                                <form action="<?php echo e(route('survey.delete', $survey->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>

                                    <?php echo e(method_field('DELETE')); ?>

                                    <a href="<?php echo e(route('survey.showSurveyGivenList', $survey->id)); ?>"
                                        class="btn btn-sm btn-info"><i
                                            class="fa fa-eye"></i><?php echo e(count(\App\SurveyAnswer::countSurveyDone($survey->id))); ?></a>
                                    <a href="<?php echo e(route('survey.edit', $survey->id)); ?>" class="btn btn-sm btn-warning"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>