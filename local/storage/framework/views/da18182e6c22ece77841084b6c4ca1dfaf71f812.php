<?php $__env->startSection('heading'); ?>
Traveler Position Create
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Traveler Position Create</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
        <div class="box-title">
            <h3>Traveler Position Create</h3>
        </div>
      <div class="box-body">
      <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('branchadmin.traveler_position.store')); ?>">
        <?php echo csrf_field(); ?>

       <div class="row">
            <div class="col-md-10" id="multiCategory">
                <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Title</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="title" name="title[]" value="<?php echo e(old('title')); ?>">
                        <?php if($errors->has('title')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('title')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-2"><a href="javascript:void(0)" onclick="removeNewForm(0)"><i class="fa fa-trash"></i></a></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <a href="javascript:void(0)" class="btn btn-info pull-right" onclick="addMore()">Add More</a>
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
  <script>
var count = 1;
function addMore()
{
    var html = '<div class="form-group" id="newform'+count+'"><label class="col-md-2 control-label required">Title</label><div class="col-md-8"><input type="text" class="form-control" id="name" name="title[]"></div><div class="col-md-2"><a href="javascript:void(0)" onclick="removeNewForm('+count+')"><i class="fa fa-trash"></i></a></div></div>';
    count++;
    $('#multiCategory').append(html);
}
function removeNewForm(id)
{
    $('#newform'+id).remove();
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>