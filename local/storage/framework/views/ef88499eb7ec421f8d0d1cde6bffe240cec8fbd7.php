<?php $__env->startSection('heading'); ?>
Staff Survey
<small>List of Staff Servey</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Staff Servey</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <?php /*  <a href="<?php echo e(url('/branchadmin/survey/addnew')); ?>" class="btn btn-primary right"><i
        class="fa fa-fw fa-plus"></i>Add New Survey</a> */ ?>

    </div>

    <div class="box">
      <div class="box-header">

      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>SN</th>
              <th>Title</th>
              <th>Survey Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($surveys as $k=>$survey): ?>
            <tr>
              <td><?php echo e($k+1); ?></td>
              <td><?php echo e($survey->survey->title); ?></td>
              <td><?php echo e(\Carbon\Carbon::parse($survey->created_at)->format('d M, Y')); ?></td>
              <td>
                <a href="<?php echo e(route('supervisor.survey.action', $survey->survey_id)); ?>" class="btn btn-sm btn-info"> <i
                    class="fa fa-eye"></i></a>
                <a href="<?php echo e(route('supervisor.survey.delete', $survey->survey_id)); ?>" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure you want to delete?');"> <i class="fa fa-trash"></i></a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <?php echo e($surveys->links()); ?>

          </tfoot>
        </table>

      </div><!-- /.box-body -->
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>