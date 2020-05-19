<?php $__env->startSection('heading'); ?>
Test Exam Detail

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
            <h3 class="box-title">Test Exam</h3> 
        </div>
    <div class="box-body">
        <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('branchadmin.testexam.save')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="row">
              <div class="col-md-10">
                  <div class="form-group<?php echo e($errors->has('category') ? ' has-error' : ''); ?>">
                      <label class="col-md-2 control-label required">Exam category</label>
                      <div class="col-md-10">
                          <select class="form-control" name="category">
                            <option value="">Select Exam Category</option>
                              <?php foreach($categories as $category): ?>
                                <?php if(old('category') == $category->id): ?>
                                <option selected="selected" value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                <?php else: ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                <?php endif; ?>
                              <?php endforeach; ?>
                          </select>
                          <?php if($errors->has('category')): ?>
                              <span class="help-block">
                                  <strong><?php echo e($errors->first('category')); ?></strong>
                              </span>
                          <?php endif; ?>
                      </div>
                  </div>
                  <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                      <label class="col-md-2 control-label required">Exam Title</label>
                      <div class="col-md-10">
                          <input type="text" class="form-control" id="title" name="title" value="<?php echo e(old('title')); ?>">
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
                          <input type="text" class="form-control" id="seo_url" name="seo_url" value="<?php echo e(old('seo_url')); ?>">
                          <?php if($errors->has('seo_url')): ?>
                              <span class="help-block">
                                  <strong><?php echo e($errors->first('seo_url')); ?></strong>
                              </span>
                          <?php endif; ?>
                      </div>
                  </div>
                  <div class="form-group<?php echo e($errors->has('number_of_question') ? ' has-error' : ''); ?>">
                      <label class="col-md-2 control-label required">Number of Question</label>
                      <div class="col-md-10">
                          <input type="text" class="form-control" id="number_of_question" name="number_of_question" value="<?php echo e(old('number_of_question')); ?>">

                          <?php if($errors->has('number_of_question')): ?>
                              <span class="help-block">
                                  <strong><?php echo e($errors->first('number_of_question')); ?></strong>
                              </span>
                          <?php endif; ?>
                      </div>
                  </div>
                  <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                      <label class="col-md-2 control-label">Exam description</label>
                      <div class="col-md-10">
                          <textarea class="form-control" name="description"><?php echo e(old('description')); ?></textarea>
                          <?php if($errors->has('description')): ?>
                              <span class="help-block">
                                  <strong><?php echo e($errors->first('description')); ?></strong>
                              </span>
                          <?php endif; ?>
                      </div>
                  </div>
                  <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                      <label class="col-md-2 control-label required">Publish</label>
                      <div class="col-md-10">
                          <select class="form-control" name="status">
                            <option value="0">YES</option>
                            <option value="1">NO</option>
                          </select>
                          <?php if($errors->has('status')): ?>
                              <span class="help-block">
                                  <strong><?php echo e($errors->first('status')); ?></strong>
                              </span>
                          <?php endif; ?>
                      </div>
                  </div>
                  <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                      <label class="col-md-2 control-label">Image</label>
                      <div class="col-md-10">
                          <!-- <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="<?php echo e(asset('image/no-image.png')); ?> " alt="" title="" data-placeholder="<?php echo e(asset('image/no-image.png')); ?> " /></a> -->
                          <a href="#" id="uploadPictureBtn"><img width="100px;" id="blah" src="<?php echo e(asset('image/back.png')); ?>" data-toggle="tooltip" data-placement="right" title="click to upload new image"></a>
                          <div class="image_display">
                              <input type="file" name="image" id="imageUpload" onchange="readURL(this);">
                          </div>
                          <?php if($errors->has('image')): ?>
                              <span class="help-block">
                                  <strong><?php echo e($errors->first('image')); ?></strong>
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
<script>
    $('#uploadPictureBtn').click(function(e){
        e.preventDefault();
        $('#imageUpload').trigger('click');
    })
    function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>