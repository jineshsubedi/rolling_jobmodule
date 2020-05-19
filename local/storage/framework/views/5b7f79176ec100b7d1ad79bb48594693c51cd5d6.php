<?php $__env->startSection('heading'); ?>
Training
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Training</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo e(route('supervisor.training-setup.create')); ?>" class="btn refreshbtn right btm10m"><i
            class="fa fa-fw fa-plus"></i>Add Training</a>
      </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Training</h3>
        </div>
      <div class="box-body">
        <table class="table table-borderd">
            <tr>
                <th>SN</th>
                <th>Title</th>
                <th>Type</th>
                <th>Location</th>
                <th>Start Date</th>
                <th>Start Time</th>
                <th>End Date</th>
                <th>End Time</th>
                <th>Action</th>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
              <input type="text" id="start_date" placeholder="Start Date" class="form-control" autocomplete="off" value="<?php echo e(request()->get('start_date')); ?>">
              </td>
              <td></td>
              <td>
              <input type="text" id="end_date" placeholder="End Date" class="form-control" autocomplete="off" value="<?php echo e(request()->get('end_date')); ?>">
              </td>
            </tr>
            <?php foreach($trainings as $k=>$t): ?>
            <tr>
                <td><?php echo e($k+1); ?></td>
                <td><?php echo e($t->title); ?></td>
                <td><?php echo e(\App\TrainingType::getTitle($t->training_type_id)); ?></td>
                <td><?php echo e($t->location); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($t->start_date)->format('d M, Y')); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($t->start_time)->format('h:i a')); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($t->end_date)->format('d M, Y')); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($t->end_time)->format('h:i a')); ?></td>
                <td>
                    <form action="<?php echo e(route('supervisor.training-setup.destroy', $t->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('DELETE'); ?>

                        <a href="<?php echo e(route('supervisor.training-setup.show', $t->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo e(route('supervisor.training-setup.edit', $t->id)); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="text-center">
            <?php echo e($trainings->links()); ?>

        </div>
      </div>
    </div>
  </div>
<script>
    $(function() {
      $('#start_date').datepicker({
        onSelect: function(date) {
          var start_date = $('#start_date').val();
          var end_date = $('#end_date').val();
          var page = '<?php echo e(request()->get("page")); ?>';
          var url = '<?php echo e(url("supervisor/training-setup/")); ?>?';
          if (page != '') {
            url += '&page='+page;
          }
          if (start_date != '') {
            url += '&start_date='+start_date;
          }
          if (end_date != '') {
            url += '&end_date='+end_date;
          }
          location = url;
        }
      });
      $('#end_date').datepicker({
        onSelect: function(date) {
          var start_date = $('#start_date').val();
          var end_date = $('#end_date').val();
          var page = '<?php echo e(request()->get("page")); ?>';
          var url = '<?php echo e(url("supervisor/training-setup/")); ?>?';
          if (page != '') {
            url += '&page='+page;
          }
          if (start_date != '') {
            url += '&start_date='+start_date;
          }
          if (end_date != '') {
            url += '&end_date='+end_date;
          }
          location = url;
        }
      });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>