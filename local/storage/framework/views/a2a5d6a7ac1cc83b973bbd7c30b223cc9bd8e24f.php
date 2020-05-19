<?php $__env->startSection('heading'); ?>
Test Question

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Test Question</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Test Questions</h3> 
        </div>
      <div class="box-body">

        <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('branchadmin.testquestion.save')); ?>" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>

          <input type="hidden" name="test_exam_id" value="<?php echo e($id); ?>">
          <div class="row">
            <div class="col-md-10">
              <!-- questions  -->
              <div class="form-group<?php echo e($errors->has('question') ? ' has-error' : ''); ?>">
                  <label class="col-md-2 control-label required">Exam question</label>
                  <div class="col-md-10">
                      <input type="text" class="form-control" id="question" name="question" value="<?php echo e(old('question')); ?>">
                      <?php if($errors->has('question')): ?>
                          <span class="help-block">
                              <strong><?php echo e($errors->first('question')); ?></strong>
                          </span>
                      <?php endif; ?>
                  </div>
              </div>
              <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                  <label class="col-md-2 control-label">Image</label>

                  <div class="col-md-10">
                      <!-- <a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"><img src="<?php echo e(asset('image/back.png')); ?> " alt="" title="" data-placeholder="<?php echo e(asset('image/back.png')); ?> " /></a>
                      <input type="hidden" name="image" value="" id="input-image" /> -->
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
              <div class="form-group<?php echo e($errors->has('level') ? ' has-error' : ''); ?>">
                  <label class="col-md-2 control-label required">Difficulty Level</label>

                  <div class="col-md-10">
                      <input type="text" class="form-control" id="level" name="level" placeholder="50" value="<?php echo e(old('level')); ?>">

                      <?php if($errors->has('level')): ?>
                          <span class="help-block">
                              <strong><?php echo e($errors->first('level')); ?></strong>
                          </span>
                      <?php endif; ?>
                  </div>
              </div>
              <div class="form-group<?php echo e($errors->has('duration') ? ' has-error' : ''); ?>">
                  <label class="col-md-2 control-label">Exam duration</label>

                  <div class="col-md-10">
                    <input type="text" class="form-control" id="duration" name="duration" placeholder="120" value="<?php echo e(old('duration')); ?>">
                      
                      

                      <?php if($errors->has('duration')): ?>
                          <span class="help-block">
                              <strong><?php echo e($errors->first('duration')); ?></strong>
                          </span>
                      <?php endif; ?>
                  </div>
              </div>
              <!-- answers -->
              <?php $answer_row = 0;?>
              <div id="answers">
              <?php if(is_array(old('answer'))): ?>
                <?php if(count(old('answer')) > 0): ?>
                    <?php foreach(old('answer') as $key => $answer): ?>
                      <div class="row" id="answer_<?php echo e($answer_row); ?>">
                        <div  class="col-md-10">
                          <div class="form-group<?php echo e($errors->has('answer.'.$key.'.title') ? ' has-error' : ''); ?>">
                              <label class="col-md-3 control-label required">Answer</label>
                              <div class="col-md-7">
                              
                                <input type="text" name="answer[<?php echo e($answer_row); ?>][title]" value="<?php echo e($answer['title']); ?>" placeholder="" class="form-control" />
                                
                                <?php if($errors->has('answer.'.$key.'.title')): ?>
                                      <span class="help-block">
                                          <strong><?php echo e($errors->first('answer.'.$key.'.title')); ?></strong>
                                      </span>
                                  <?php endif; ?>
                                
                              </div>
                              <div class="col-md-2">
                                <select class="form-control" name="answer[<?php echo e($answer_row); ?>][correct]">
                                  <?php foreach($data['correct'] as $correct): ?>
                                  <?php if($correct['value'] == $answer['correct']): ?>
                                  <option selected="selected" value="<?php echo e($correct['value']); ?>"><?php echo e($correct['title']); ?></option>
                                  <?php else: ?>
                                  <option value="<?php echo e($correct['value']); ?>"><?php echo e($correct['title']); ?></option>
                                  <?php endif; ?>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <button class="btn btn-danger margin-top-6 delete_desc" onclick="$('#answer_<?php echo e($answer_row); ?>').remove();" data-toggle="tooltip" title="" type="button" data-original-title="remove"><i class="fa fa-times"></i></button>
                        </div>
                      </div>
                      <?php $answer_row++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
              <?php else: ?>
                <div class="row" id="answer_<?php echo e($answer_row); ?>">
                    <div  class="col-md-10">
                      <div class="form-group<?php echo e($errors->has('answers') ? ' has-error' : ''); ?>">
                        <label class="col-md-3 control-label required">Answer</label>
                        <div class="col-md-7">
                          <input type="text" name="answer[<?php echo e($answer_row); ?>][title]" value="" placeholder="" class="form-control" />
                        </div>
                        <div class="col-md-2">
                          <select class="form-control" name="answer[<?php echo e($answer_row); ?>][correct]">
                            <option value="1">Incorrect</option>
                            <option value="2">Correct</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <button class="btn btn-danger margin-top-6 delete_desc" onclick="$('#answer_<?php echo e($answer_row); ?>').remove();" data-toggle="tooltip" title="" type="button" data-original-title="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
              <?php endif; ?>
              </div>
                  <div class="row">
                    <div class="col-md-12 text-right margin-top-10">
                        <button id="addAnswer" type="button" class="btn btn-sm grey-mint pullri">Add More Answer</button>
                    </div>
                  </div>
            </div>
            <!-- submit button  -->
            <div class="form-group">
                <div class="col-md-10 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-fw fa-save"></i>Save
                    </button>
                </div>
            </div>
          </div>
        </form>
    </div><!-- /.box-body -->
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
<script type="text/javascript">
    var answer_row = '<?php echo e($answer_row + 1); ?>';
    $('#addAnswer').click(function(){
        var html = '<div class="row" id="answer_'+answer_row+'"><div  class="col-md-10"><div class="form-group"><label class="col-md-3 control-label required">Answer</label><div class="col-md-7"><input type="text" name="answer['+answer_row+'][title]" value="" placeholder="" class="form-control" /></div>';
            html += '<div class="col-md-2"><select class="form-control" name="answer['+answer_row+'][correct]"><option value="1">Incorrect</option><option value="2">Correct</option></select></div></div></div>';
            html += '<div class="col-md-2"><button class="btn btn-danger margin-top-6 delete_desc" onclick="$(\'#answer_'+answer_row+'\').remove();" data-toggle="tooltip" title="" type="button" data-original-title="remove"><i class="fa fa-times"></i></button></div></div>';
            $('#answers').append(html);
            answer_row++
    })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>