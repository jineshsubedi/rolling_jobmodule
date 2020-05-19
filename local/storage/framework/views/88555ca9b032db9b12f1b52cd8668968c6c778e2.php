<?php $__env->startSection('heading'); ?>
Staff Asset
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Staff Asset </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo e(route('supervisor.obstaff.create')); ?>" class="btn refreshbtn right btm10m"><i
            class="fa fa-fw fa-plus"></i>Add Staff Asset</a>
      </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Staff Asset</h3>
        </div>
      <div class="box-body">
        <table class="table table-borderd">
            <tr>
                <th>SN</th>
                <th>Type</th>
                <th>Particular</th>
                <th>Staff</th>
                <th>From</th>
                <th>To</th>
                <th>Action</th>
            </tr>
            <tr>
              <td></td>
              <td>
                <select class="form-control" id="filter_type">
                  <option value="">Select Type</option>
                  <?php foreach($types as $type): ?>
                  <option value="<?php echo e($type->id); ?>" <?php if($type->id == $data['filter_type']): ?> selected <?php endif; ?>><?php echo e($type->title); ?></option>
                  <?php endforeach; ?>  
                </select>
              </td>
              <td>
                <select class="form-control" id="filter_particular">
                  <option value="">Select Particular</option>
                  <?php foreach($particulars as $p): ?>
                  <option value="<?php echo e($p->particular); ?>" <?php if($p->particular == $data['filter_particular']): ?> selected <?php endif; ?>><?php echo e($p->particular); ?></option>
                  <?php endforeach; ?>  
                </select>
              </td>
              <td>
                <select class="form-control" id="filter_staff">
                  <option value="">Select Staff</option>
                  <?php foreach($staffs as $staff): ?>
                  <option value="<?php echo e($staff->id); ?>" <?php if($staff->id == $data['filter_staff']): ?> selected <?php endif; ?>><?php echo e($staff->name); ?></option>
                  <?php endforeach; ?>  
                </select>
              </td>
              <td><input type="text" class="form-control datepicker" value="<?php echo e($data['filter_from']); ?>" id="filter_from"></td>
              <td><input type="text" class="form-control datepicker" value="<?php echo e($data['filter_to']); ?>" id="filter_to"></td>

              <td>
                <button class="btn btn-default" type="button" onclick="filterButton()"><i class="fa fa-search"></i> Filter</button>
              </td>
            </tr>
            <?php foreach($obstaffs as $k=>$obstaff): ?>
            <tr>
                <td><?php echo e($k+1); ?></td>
                <td><?php echo e(\App\ObType::getTitle($obstaff->type)); ?></td>
                <td><?php echo e($obstaff->particular); ?></td>
                <td><?php echo e(\App\Adjustment_staff::getName($obstaff->staff_id)); ?></td>
                <td><?php echo e(\Carbon\Carbon::parse($obstaff->from)->format('d M, Y')); ?></td>
                <td>
                  <?php if($obstaff->to): ?>
                  <?php echo e(\Carbon\Carbon::parse($obstaff->to)->format('d M, Y')); ?>

                  <?php endif; ?>
                </td>
                <td>
                    <form action="<?php echo e(route('supervisor.obstaff.destroy', $obstaff->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('DELETE'); ?>

                        <a href="<?php echo e(route('supervisor.obstaff.edit', $obstaff->id)); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div class="text-center">
            <?php echo e($obstaffs->links()); ?>

        </div>
      </div>
    </div>
  </div>
<script>
  function filterButton()
  {
    var url = '<?php echo e(url('supervisor/department/obstaff?')); ?>'
    var filter_type = $('#filter_type').val()
    var filter_staff = $('#filter_staff').val()
    var filter_particular = $('#filter_particular').val()
    var filter_from = $('#filter_from').val()
    var filter_to = $('#filter_to').val()

    if(filter_type != '')
    {
      url += '&filter_type='+filter_type;
    }
    if(filter_staff != '')
    {
      url += '&filter_staff='+filter_staff;
    }
    if(filter_particular != '')
    {
      url += '&filter_particular='+filter_particular;
    }
    if(filter_from != '')
    {
      url += '&filter_from='+filter_from;
    }
    if(filter_to != '')
    {
      url += '&filter_to='+filter_to;
    }
    console.log(url)
    location = url;
  }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>