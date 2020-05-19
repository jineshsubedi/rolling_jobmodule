<?php $__env->startSection('heading'); ?>
Asset Setting Edit
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Asset Setting Edit</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Asset Setting Edit</h3>
        </div>
      <div class="box-body">
      <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('branchadmin.onboard_setting.update', $setting->id)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <?php echo method_field('PUT'); ?>

       <div class="row">
            <div class="col-md-10" id="multiCategory">
                <div class="form-group<?php echo e($errors->has('particular') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Particular</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="particular" name="particular" value="<?php echo e($setting->particular); ?>" placeholder="Event particular">
                        <?php if($errors->has('particular')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('particular')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('type') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">type</label>
                    <div class="col-md-8">
                        <select name="type" id="type" class="form-control">
                            <option value="">Select Type</option>
                            <?php foreach($types as $type): ?>
                            <?php if($type->id == $setting->type): ?>
                            <option value="<?php echo e($type->id); ?>" selected><?php echo e($type->title); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($type->id); ?>"><?php echo e($type->title); ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <?php if($errors->has('type')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('type')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-info" onclick="editType()"><i class="fa fa-edit"></i></button>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('department') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Department</label>
                    <div class="col-md-8">
                        <select name="department" id="department" class="form-control">
                            <option value="">Select Department</option>
                            <?php foreach($departments as $department): ?>
                                <option value="<?php echo e($department->id); ?>" <?php if($department->id == $setting->department_id): ?> selected <?php endif; ?>><?php echo e($department->title); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if($errors->has('department')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('department')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-10 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-fw fa-save"></i>Save
                </button>
            </div>
        </div>
      </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="editTypeModel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Type</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" id="testform" method="POST">
                    <?php echo csrf_field(); ?>

                    <div id="obtype">
                        <div class="row" id="obtype_1">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Title</label>
                                    <div class="col-md-8">
                                        <input type="hidden" id="type_id" value="<?php echo e($setting->type); ?>">
                                        <input type="text" class="form-control" name="type_title" id="type_title" value="<?php echo e(\App\ObType::getTitle($setting->type)); ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <?php /* <button type="button"class="btn btn-danger" onclick="removeTypeForm(1)"><i class="fa fa-trash"></i></button> */ ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-3">
                            <button type="button" id="saveObTypeBtn" class="btn btn-primary">
                                Submit <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
  <script>
      function editType()
      {
        $('#editTypeModel').modal('show');
      }
      $('#saveObTypeBtn').click(function(){
        var token = $("input[name=\"_token\"]").val();
        var id = $('#type_id').val();
        var title = $('#type_title').val();
        $.ajax({
            url: '<?php echo e(url("/branchadmin/onboard_type/update")); ?>',
            type: 'POST',
            data: {
                _token : token,
                id : id,
                title : title,
            },
            cache: false,
            success: function(data){
                location.reload();                
            },
            error: function(error){
            }
        });
      })
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>