<?php $__env->startSection('heading'); ?>
Asset Create
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Asset Create</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Asset create</h3>
        </div>
      <div class="box-body">
      <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('branchadmin.onboard_setting.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

       <div class="row">
            <div class="col-md-10" id="multiCategory">
                <div class="form-group<?php echo e($errors->has('particular') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Particular</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="particular" name="particular" value="<?php echo e(old('particular')); ?>" placeholder="Particular">
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
                        <select name="type" id="obType" class="form-control">
                            <option value="">Select Type</option>
                            <?php foreach($types as $type): ?>
                            <option value="<?php echo e($type->id); ?>" <?php if(old('type') == $type->id): ?> selected <?php endif; ?>><?php echo e($type->title); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if($errors->has('type')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('type')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-info" type="button" onclick="addMoreType()"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('department') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Department</label>
                    <div class="col-md-8">
                        <select name="department" id="department" class="form-control">
                            <option value="">Select Department</option>
                            <?php foreach($departments as $department): ?>
                            <option value="<?php echo e($department->id); ?>"><?php echo e($department->title); ?></option>
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


<div class="modal fade" id="addMoreModel">
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
                                        <input type="text" class="form-control" name="type_title[]">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button"class="btn btn-danger" onclick="removeTypeForm(1)"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="shiftErrors" class="col-md-6"></div>
                        <div class="col-md-12 text-right margin-top-10">
                            <button onclick="addType()" type="button" class="btn btn-sm grey-mint pullri">Add More Type</button>
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
    var count = 1;
    function addMoreType()
    {
        $('#addMoreModel').modal('show');
    }
    function addType()
    {
        count++;
        var html = '<div class="row" id="obtype_'+count+'"><div class="col-md-8"><div class="form-group"><label class="col-md-2 control-label">Title</label><div class="col-md-8"><input type="text" class="form-control" name="type_title[]"></div><div class="col-md-2"><button type="button"class="btn btn-danger" onclick="removeTypeForm('+count+')"><i class="fa fa-trash"></i></button></div></div></div></div>';
        $('#obtype').append(html);
    }
    function removeTypeForm(num)
    {
        $('#obtype_'+num).remove();
    }
    $('#saveObTypeBtn').click(function(){
        var token = $("input[name=\"_token\"]").val();
        var type = $("input[name='type_title[]']").map(function(){return $(this).val();}).get();
        $.ajax({
            url: '<?php echo e(url("/branchadmin/onboard_type/save")); ?>',
            type: 'POST',
            data: {
                _token : token,
                type : type,
            },
            cache: false,
            success: function(data){
                console.log(data)
                location.reload();                
            },
            error: function(error){
                console.log(error)
                var errorText = '';
                    $.each(error.responseJSON, function(index, value){
                    errorText += '<br>'+'<span style="color:red;">'+value+'</span>'
                })
                $('#shiftErrors').html(errorText);
            }
        });
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>