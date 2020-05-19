<?php $__env->startSection('heading'); ?>
Staff Asset
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Staff Asset </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="row">
      <div class="col-md-12">
        <a href="<?php echo e(route('staffs.obstaff.create')); ?>" class="btn refreshbtn right btm10m"><i
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
                <th>Accept</th>
                <th>Return</th>
                <th>Action</th>
            </tr>
            <?php foreach($assets as $k=>$myAsset): ?>
            <tr>
                <td><?php echo e($k+1); ?></td>
                <td><?php echo e(\App\ObType::getTitle($myAsset->type)); ?></td>
                <td><?php echo e($myAsset->particular); ?></td>
                <td><?php echo e(\App\Adjustment_staff::getName($myAsset->staff_id)); ?></td>
                <td>
                  <?php if($myAsset->from_status == 0): ?>
                    <button type="button" class="btn btn-info" onclick='assetStatus(<?php echo e($myAsset->id); ?>, "accept")'>Accept</button>
                  <?php else: ?>
                    <label class="bg bg-blue">Accepted</label>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if($myAsset->from_status == 1): ?>
                    
                  <?php if($myAsset->to_status == 0): ?>
                    <button type="button" class="btn btn-default" onclick='assetStatus(<?php echo e($myAsset->id); ?>, "return")'>Return</button>
                  <?php else: ?>
                    <label class="bg bg-yellow">Accepted</label>
                  <?php endif; ?>
                  <?php endif; ?>
                </td>
                <td>
                    <a href="javascript:void(0)" class="btn btn-default" onclick="opneModel('<?php echo e($myAsset->id); ?>')"><i class="fa fa-eye"></i></a>
                </td>
            </tr>
            <!-- staff asset model  -->
            <div class="modal fade" id="modal-staff-asset-<?php echo e($myAsset->id); ?>">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="rating-title">Asset Detail</h4>
                  </div>
                  <div class="model-body">
                    <div class="row">
                      <div class="col-md-10 col-md-offset-1">
                          <h4><?php echo e(\App\Adjustment_staff::getName($myAsset->staff_id)); ?></h4>
                          <p><?php echo e(\App\Department::getTitle($myAsset->department_id)); ?></p>
                          <p><?php echo e(\App\ObType::getTitle($myAsset->type)); ?></p>
                          <p><?php echo e($myAsset->particular); ?></p>
                          <?php if($myAsset->from_status==1): ?>
                            <p><span>From: <?php echo e(\Carbon\Carbon::parse($myAsset->from)->format('d M, Y')); ?></span></p>
                            <?php if($myAsset->to_status==1): ?>
                            <p><span>To: 
                              <?php if($myAsset->to): ?>
                              <?php echo e(\Carbon\Carbon::parse($myAsset->to)->format('d M, Y')); ?>

                              <?php endif; ?></span>
                            </p>
                            <?php endif; ?>
                          <?php endif; ?>
                          <p><?php echo e($myAsset->detail); ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="model-footer"><br><br></div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
        </table>
        <div class="text-center">
            <?php echo e($assets->links()); ?>

        </div>
      </div>
    </div>
  </div>
<script>
  function opneModel(id){
    $('#modal-staff-asset-'+id).modal('show');
  }
  function assetStatus(id, type)
  {
    var token = $('input[name=\'_token\']').val();
    $.ajax({
        type: 'post',
        url: '<?php echo e(route("staffs.myasset.updateStatus")); ?>',
        data: {
          _token : token,
          id : id,
          type: type
        },
        cache: false,
        success: function(data){
            console.log(data)
            location.reload();
        },
        error: function(error){
            console.log(error)
        }
    });
  }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>