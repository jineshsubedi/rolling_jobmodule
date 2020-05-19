<?php $__env->startSection('heading'); ?>
New Department
            <small>Detail of New Department</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo e(url('/branchadmin/department')); ?>">Department</a></li>
            <li class="active">New Department</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">New Department</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(url('/branchadmin/department/save')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="box box-primary border p-10">
                                    <div class="box-header ui-sortable-handle">
                                        <i class="fa fa-briefcase" aria-hidden="true"></i> Department
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Department Title</label>

                                        <div class="col-md-9">
                                        
                                        <input type="text" id="title" name="title" value="<?php echo e(old('title')); ?>" placeholder="Department Title" class="form-control" />
                                        
                                        <?php if($errors->has('title')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('title')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        
                                        </div>
                                    </div>

                                    <div class="form-group<?php echo e($errors->has('leave_number') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Minimum Leave Allow</label>

                                        <div class="col-md-9">
                                        
                                        <input type="text" id="leave_number" name="leave_number" value="<?php echo e(old('leave_number')); ?>" placeholder="5" class="form-control" />
                                        
                                        <?php if($errors->has('leave_number')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('leave_number')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        
                                        </div>
                                    </div>

                                    <div class="form-group<?php echo e($errors->has('max_leave') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Maximum Leave Allow</label>

                                        <div class="col-md-9">
                                        
                                        <input type="text" id="max_leave" name="max_leave" value="<?php echo e(old('max_leave')); ?>" placeholder="5" class="form-control" />
                                        
                                        <?php if($errors->has('max_leave')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('max_leave')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        
                                        </div>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('staff') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Department Head</label>

                                        <div class="col-md-9">
                                        
                                        <select name="staff" id="staff" class="form-control">
                                            <option value="">Select Department Head</option>
                                            <?php foreach($staffs as $staff): ?>
                                            <?php if(old('staff') == $staff->id): ?>
                                            <option value="<?php echo e($staff->id); ?>" selected><?php echo e($staff->name); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                        
                                        <?php if($errors->has('staff')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('staff')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-primary border p-10">
                                    <div class="box-header ui-sortable-handle">
                                        Designation
                                    </div>
                                    <div id="designations">
                                    <?php $row = 0; ?>
                                    <?php if(is_array(old('designation'))): ?>
                                    <?php if(count(old('designation')) > 0): ?>
                                    <?php foreach(old('designation') as $key => $old): ?>
                                        <div id="designation_row<?php echo e($row); ?>" class="form-group row <?php echo e($errors->has('designation.'.$key.'.title') ? ' has-error' : ''); ?>">
                                        <div class="form-group col-md-5">
                                                <label class="col-md-3 control-label">TITLE</label>
                                                <div class="input-group col-md-9">
                                                    <input name="designation[<?php echo e($key); ?>][title]" class="form-control margin-top-10" placeholder="Designation Name" type="text">
                                                </div>
                                                <?php if($errors->has('designation.'.$key.'.title')): ?>
                                                    <span class="help-block">
                                                        <?php echo e($errors->first('designation.'.$key.'.title')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="col-md-3 control-label">TOR</label> 
                                                <div class="input-group col-md-9">
                                                    <input name="designation[<?php echo e($key); ?>][tor]" class="form-control margin-top-10" placeholder="Designation Name" type="file">
                                                </div>
                                                <?php if($errors->has('designation.'.$key.'.tor')): ?>
                                                    <span class="help-block">
                                                        <?php echo e($errors->first('designation.'.$key.'.tor')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-2">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-danger margin-top-10 delete_desc" onclick="$('#designation_row<?php echo e($row); ?>').remove();" data-toggle="tooltip" title="remove" type="button"><i class="fa fa-times"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    <?php $row++; ?>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php else: ?>
                                        <div id="designation_row<?php echo e($row); ?>" class="form-group row">
                                            <div class="form-group col-md-5">
                                                <label class="col-md-3 control-label">TITLE</label>
                                                <div class="input-group col-md-9">
                                                    <input name="designation[<?php echo e($row); ?>][title]" class="form-control margin-top-10" placeholder="Designation Name" type="text">
                                                </div>
                                                <?php if($errors->has('designation.'.$row.'.title')): ?>
                                                    <span class="help-block">
                                                        <?php echo e($errors->first('designation.'.$row.'.title')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label class="col-md-3 control-label">TOR</label> 
                                                <div class="input-group col-md-9">
                                                    <input name="designation[<?php echo e($row); ?>][tor]" class="form-control margin-top-10" placeholder="Designation Name" type="file">
                                                </div>
                                                <?php if($errors->has('designation.'.$row.'.tor')): ?>
                                                    <span class="help-block">
                                                        <?php echo e($errors->first('designation.'.$row.'.tor')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-2">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-danger margin-top-10 delete_desc" onclick="$('#designation_row<?php echo e($row); ?>').remove();" data-toggle="tooltip" title="remove" type="button"><i class="fa fa-times"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-right margin-top-10">
                                            <button id="btnAddDescription" type="button" class="btn btn-sm grey-mint pullri">Add Designation</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    Submit <i class="fa fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  var designation_row = '<?php echo e($row + 1); ?>';
  $('#btnAddDescription').on('click', function(){
    html = '<div id="designation_row'+designation_row+'" class="form-group row"><div class="form-group col-md-5"><label class="col-md-3 control-label">TITLE</label><div class="input-group col-md-9"><input name="designation['+designation_row+'][title]" class="form-control margin-top-10" placeholder="Designation Name" type="text"></div></div><div class="form-group col-md-5"><label class="col-md-3 control-label">TOR</label><div class="input-group col-md-9"><input name="designation['+designation_row+'][tor]" class="form-control margin-top-10" placeholder="Designation Name" type="file"></div></div><div class="col-md-2"><span class="input-group-btn"><button class="btn btn-danger margin-top-10 delete_desc" onclick="$(\'#designation_row'+designation_row+'\').remove();" data-toggle="tooltip" title="remove" type="button"><i class="fa fa-times"></i></button></span></div></div>';
    
    
    $('#designations').append(html);
      designation_row++;
  })
</script>
 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>