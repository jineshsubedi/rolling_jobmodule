<?php $__env->startSection('heading'); ?>
Test Category Detail

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Tasks</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Test Category</h3> 
        </div>
    <div class="box-body">
        
      <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('branchadmin.testcategory.update', $category->id)); ?>">
        <?php echo csrf_field(); ?>

       <?php echo method_field('PUT'); ?>

       <div class="row">
            <div class="col-md-10">
                <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label required">Exam Title</label>

                    <div class="col-md-10">
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo e($category->title); ?>">

                        <?php if($errors->has('title')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('title')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('seo_url') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label required">Seo Url</label>

                    <div class="col-md-10">
                        <input type="text" class="form-control" id="seo_url" name="seo_url" value="<?php echo e($category->seo_url); ?>">

                        <?php if($errors->has('seo_url')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('seo_url')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                    <label class="col-md-2 control-label">Exam description</label>

                    <div class="col-md-10">
                        <textarea class="form-control" name="description"><?php echo e($category->description); ?></textarea>
                        

                        <?php if($errors->has('description')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('description')); ?></strong>
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
<script type="text/javascript">
  $('#title').blur(function(){
        var data = $(this).val();
       
        var se_url = data.replace(/ /g,"-");
       
        $('#seo_url').val(se_url);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>