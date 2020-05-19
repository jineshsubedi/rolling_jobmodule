<?php $__env->startSection('heading'); ?>
Staff Asset
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Staff Asset</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
        <div class="box-title">
            <h3>Staff Asset</h3>
        </div>
      <div class="box-body">
      <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('staffs.obstaff.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

       <div class="row">
            <div class="col-md-6" id="multiCategory">
                <div class="form-group<?php echo e($errors->has('type') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label required">Type</label>
                    <div class="col-md-10">
                        <select name="type" id="obType" class="form-control">
                            <option value="">Select Type</option>
                            <?php foreach($types as $type): ?>
                            <option value="<?php echo e($type->id); ?>"><?php echo e($type->title); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if($errors->has('type')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('type')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('particular') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label required">Particular</label>
                    <div class="col-md-10">
                        <select name="particular" id="particular" class="form-control">
                            <option value="">Select type</option>
                        </select>
                    </div>
                    <?php if($errors->has('type')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('type')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="form-group<?php echo e($errors->has('staff') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label required">staff</label>
                    <div class="col-md-10">
                        <select name="staff" id="staff" class="form-control">
                            <option value="">Select staff</option>
                            <?php foreach($staffs as $staff): ?>
                            <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if($errors->has('staff')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('staff')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label">Detail</label>
                    <div class="col-md-10">
                        <textarea name="detail" id="detail" class="form-control"><?php echo e(old('detail')); ?></textarea>
                        <?php if($errors->has('detail')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('detail')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group<?php echo e($errors->has('to') ? ' has-error' : ''); ?>">
            <label class="col-md-2"></label>
            <div class="col-md-10">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-fw fa-save"></i>Save
                </button>
            </div>
        </div>
      </form>
      </div>
    </div>
  </div>
  <script>
      $('.datepicker').datepicker();
      $('#obType').change(function(){
        var type = $(this).val();
        var token = $('input[name=\'_token\']').val();
        $.ajax({
            type: 'get',
            url: '<?php echo e(route("staffs.obstaff.getParticularByType")); ?>',
            data: '_token='+token+'&type='+type,
            cache: false,
            success: function(data){
                $('#particular').html('<option value="">Select Particular</option>');
                $.each(data.data, function(index, value){
                    $('#particular')
                        .append($("<option></option>")
                        .attr("value",value.particular)
                        .text(value.particular));
                });
            },
            error: function(error){
                console.log(error)
            }
        });
      })
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>