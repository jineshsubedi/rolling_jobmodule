<?php $__env->startSection('heading'); ?>
New Suggestion
<small>Detail of New Suggestion</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo e(url('/supervisor/suggestions')); ?>">Suggestion</a></li>
<li class="active">New Suggestion</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="panel panel-default">
        <div class="panel-heading">New Suggestion</div>
        <div class="panel-body">
          <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(url('/supervisor/suggestions/save')); ?>">
            <?php echo csrf_field(); ?>

            <div class="row">
              <div class="col-md-6">
                <div class="box box-primary border p-10">
                  
                  <div class="form-group<?php echo e($errors->has('sugestion_for') ? ' has-error' : ''); ?>">
                    <label class="col-md-3 control-label">Suggestion For</label>
                    <div class="col-md-9">
                      
                      <select class="form-control" name="suggestion_for">
                        <?php foreach($datas['categories'] as $category): ?>
                        <?php if($category->id == old('suggestion_for')): ?>
                        <option selected="selected" value="<?php echo e($category->id); ?>"> <?php echo e($category->title); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($category->id); ?>"> <?php echo e($category->title); ?></option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                      
                      <?php if($errors->has('suggestion_for')): ?>
                      <span class="help-block">
                        <strong><?php echo e($errors->first('suggestion_for')); ?></strong>
                      </span>
                      <?php endif; ?>
                      
                    </div>
                  </div>
                  <div class="form-group<?php echo e($errors->has('hide_name') ? ' has-error' : ''); ?>">
                    <label class="col-md-3 control-label">Hide Name</label>
                    <div class="col-md-9">
                      
                      <input type="radio" name="hide_name" id="hide_name" value="1"><label>Yes</label>
                      
                      
                      <?php if($errors->has('hide_name')): ?>
                      <span class="help-block">
                        <strong><?php echo e($errors->first('hide_name')); ?></strong>
                      </span>
                      <?php endif; ?>
                      
                    </div>
                  </div>
                  <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                    <label class="col-md-3 control-label">Description</label>
                    <div class="col-md-9">
                      
                      <textarea id="description" name="description" class="form-control"><?php echo e(old('description')); ?></textarea>
                      
                      <?php if($errors->has('description')): ?>
                      <span class="help-block">
                        <strong><?php echo e($errors->first('description')); ?></strong>
                      </span>
                      <?php endif; ?>
                      
                    </div>
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
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>