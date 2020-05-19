<?php $__env->startSection('heading'); ?>
Report of <?php echo e($datas['job_title']); ?> 
           
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo e(url('/branchadmin/jobs')); ?>">Jobs</a></li>
            <li class="active">Report of <?php echo e($datas['job_title']); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('assets/ckeditor/ckeditor.js')); ?>"></script>
 <div class="row">
      <?php if(count($errors)): ?>
                <div class="row">
            <div class="col-xs-12">
            <div class="alert alert-danger">
             <?php foreach($errors->all() as $error): ?>
              <?php echo e('* : '.$error); ?></br>
             <?php endforeach; ?>
                </div>
            </div>

          </div>
       <?php endif; ?>
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Report of <?php echo e($datas['job_title']); ?></div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" id="testform" method="POST" action="<?php echo e(url('/branchadmin/jobs/report/update')); ?>">
                        <input type="hidden" name="id" value="<?php echo e($datas['id']); ?>">
                        <input type="hidden" name="jobs_id" value="<?php echo e($datas['jobs_id']); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                         <div class="col-md-12">
                        <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab-application" data-toggle="tab">Application Report</a></li>
                                <li><a href="#tab-written" data-toggle="tab">Written Report</a></li>
                                <li><a href="#tab-group" data-toggle="tab">Group Discussion Report</a></li>
                                <li><a href="#tab-interview" data-toggle="tab">Final Interview Report</a></li>
                                <li><a href="#tab-selection" data-toggle="tab">Final Selection Report</a></li>
                                
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-application">
                                    <div class="form-group<?php echo e($errors->has('afile_name') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label">Application File Name</label>

                            <div class="col-md-10">
                               
                                <input type="text" class="form-control" name="afile_name" value="<?php echo e($datas['afile_name']); ?>">
                                

                                <?php if($errors->has('afile_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('afile_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('application_file') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label">Application Report File</label>

                            <div class="col-md-10" id="application_file_div">
                                <?php if($datas['athumb'] != ''): ?>
                                <div id="application_file"  style="width: 100px; position: relative;">
                                    <i class="fa fa-remove" onClick="deleteFile('<?php echo e($datas["id"]); ?>','application_file')" style="color: RED; font-size: 18px; position: absolute; top: 1px; right: 1px; cursor: pointer;"></i>
                                    <img src="<?php echo e(asset($datas['athumb'])); ?>">
                                </div>
                                <?php else: ?>
                                <input type="file" class="form-control" name="application_file" value="">
                                <?php endif; ?>

                                <?php if($errors->has('application_file')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('application_file')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-2 control-label">Application Report</label>

                            <div class="col-md-10">
                               <textarea class="form-control" id="application_detail" name="application_detail"><?php echo e($datas['application_detail']); ?></textarea>

                                <script>
      
       
                                    CKEDITOR.replace('application_detail',
                                    {
                                        filebrowserBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html")); ?>',
                                        filebrowserImageBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Images")); ?>',
                                        filebrowserFlashBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Flash")); ?>',
                                        filebrowserUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files")); ?>',
                                        filebrowserImageUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images")); ?>',
                                        filebrowserFlashUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash")); ?>',
                                        enterMode: CKEDITOR.ENTER_BR
                                    });
                                   
                                    
                                 
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-written">
                        <div class="form-group<?php echo e($errors->has('wfile_name') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label"> File Name</label>

                            <div class="col-md-10">
                               
                                <input type="text" class="form-control" name="wfile_name" value="<?php echo e($datas['wfile_name']); ?>">
                                

                                <?php if($errors->has('wfile_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('wfile_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('written_file') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label">Written Report File</label>

                            <div class="col-md-10" id="written_file_div">
                                <?php if($datas['wthumb'] != ''): ?>
                                <div id="written_file"  style="width: 100px; position: relative;">
                                    <i class="fa fa-remove" onClick="deleteFile('<?php echo e($datas["id"]); ?>','written_file')" style="color: RED; font-size: 18px; position: absolute; top: 1px; right: 1px; cursor: pointer;"></i>
                                    <img src="<?php echo e(asset($datas['wthumb'])); ?>">
                                </div>
                                <?php else: ?>
                                <input type="file" class="form-control" name="written_file" value="">
                                <?php endif; ?>

                                <?php if($errors->has('written_file')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('written_file')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-2 control-label">Written Report</label>

                            <div class="col-md-10">
                               <textarea class="form-control" id="written_detail" name="written_detail"><?php echo e($datas['written_detail']); ?></textarea>

                                <script>
      
       
                                    CKEDITOR.replace('written_detail',
                                    {
                                        filebrowserBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html")); ?>',
                                        filebrowserImageBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Images")); ?>',
                                        filebrowserFlashBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Flash")); ?>',
                                        filebrowserUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files")); ?>',
                                        filebrowserImageUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images")); ?>',
                                        filebrowserFlashUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash")); ?>',
                                        enterMode: CKEDITOR.ENTER_BR
                                    });
                                   
                                    
                                 
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-group">
                       
                        <div class="form-group<?php echo e($errors->has('gfile_name') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label"> File Name</label>

                            <div class="col-md-10">
                               
                                <input type="text" class="form-control" name="gfile_name" value="<?php echo e($datas['gfile_name']); ?>">
                                

                                <?php if($errors->has('gfile_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('gfile_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('group_file') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label">Group Report File</label>

                            <div class="col-md-10" id="group_file_div">
                                <?php if($datas['gthumb'] != ''): ?>
                                <div id="group_file"  style="width: 100px; position: relative;">
                                    <i class="fa fa-remove" onClick="deleteFile('<?php echo e($datas["id"]); ?>','group_file')" style="color: RED; font-size: 18px; position: absolute; top: 1px; right: 1px; cursor: pointer;"></i>
                                    <img src="<?php echo e(asset($datas['gthumb'])); ?>">
                                </div>
                                <?php else: ?>
                                <input type="file" class="form-control" name="group_file" value="">
                                <?php endif; ?>

                                <?php if($errors->has('group_file')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('group_file')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-2 control-label">Group Report</label>

                            <div class="col-md-10">
                               <textarea class="form-control" id="group_detail" name="group_detail"><?php echo e($datas['group_detail']); ?></textarea>

                                <script>
      
       
                                    CKEDITOR.replace('group_detail',
                                    {
                                        filebrowserBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html")); ?>',
                                        filebrowserImageBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Images")); ?>',
                                        filebrowserFlashBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Flash")); ?>',
                                        filebrowserUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files")); ?>',
                                        filebrowserImageUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images")); ?>',
                                        filebrowserFlashUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash")); ?>',
                                        enterMode: CKEDITOR.ENTER_BR
                                    });
                                   
                                    
                                 
                                </script>
                            </div>
                        </div>
                    </div>

                 
                    <div class="tab-pane" id="tab-interview">
                        
                        <div class="form-group<?php echo e($errors->has('ifile_name') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label"> File Name</label>

                            <div class="col-md-10">
                               
                                <input type="text" class="form-control" name="ifile_name" value="<?php echo e($datas['ifile_name']); ?>">
                                

                                <?php if($errors->has('ifile_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('ifile_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('interview_file') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label">Interview Report File</label>

                            <div class="col-md-10" id="interview_file_div">
                                <?php if($datas['ithumb'] != ''): ?>
                                <div id="interview_file"  style="width: 100px; position: relative;">
                                    <i class="fa fa-remove" onClick="deleteFile('<?php echo e($datas["id"]); ?>','interview_file')" style="color: RED; font-size: 18px; position: absolute; top: 1px; right: 1px; cursor: pointer;"></i>
                                    <img src="<?php echo e(asset($datas['ithumb'])); ?>">
                                </div>
                                <?php else: ?>
                                <input type="file" class="form-control" name="interview_file" value="">
                                <?php endif; ?>

                                <?php if($errors->has('interview_file')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('interview_file')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-2 control-label">interview Report</label>

                            <div class="col-md-10">
                               <textarea class="form-control" id="interview_detail" name="interview_detail"><?php echo e($datas['interview_detail']); ?></textarea>

                                <script>
      
       
                                    CKEDITOR.replace('interview_detail',
                                    {
                                        filebrowserBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html")); ?>',
                                        filebrowserImageBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Images")); ?>',
                                        filebrowserFlashBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Flash")); ?>',
                                        filebrowserUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files")); ?>',
                                        filebrowserImageUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images")); ?>',
                                        filebrowserFlashUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash")); ?>',
                                        enterMode: CKEDITOR.ENTER_BR
                                    });
                                   
                                    
                                 
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab-selection">
                        
                        <div class="form-group<?php echo e($errors->has('ffile_name') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label"> File Name</label>

                            <div class="col-md-10">
                               
                                <input type="text" class="form-control" name="ffile_name" value="<?php echo e($datas['ffile_name']); ?>">
                                

                                <?php if($errors->has('ffile_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('ffile_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('final_file') ? ' has-error' : ''); ?>">
                            <label class="col-md-2 control-label">Selection Report File</label>

                            <div class="col-md-10" id="final_file_div">
                                <?php if($datas['fthumb'] != ''): ?>
                                <div id="final_file"  style="width: 100px; position: relative;">
                                    <i class="fa fa-remove" onClick="deleteFile('<?php echo e($datas["id"]); ?>','final_file')" style="color: RED; font-size: 18px; position: absolute; top: 1px; right: 1px; cursor: pointer;"></i>
                                    <img src="<?php echo e(asset($datas['fthumb'])); ?>">
                                </div>
                                <?php else: ?>
                                <input type="file" class="form-control" name="final_file" value="">
                                <?php endif; ?>

                                <?php if($errors->has('final_file')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('final_file')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-2 control-label">selection Report</label>

                            <div class="col-md-10">
                               <textarea class="form-control" id="final_detail" name="final_detail"><?php echo e($datas['final_detail']); ?></textarea>

                                <script>
      
       
                                    CKEDITOR.replace('final_detail',
                                    {
                                        filebrowserBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html")); ?>',
                                        filebrowserImageBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Images")); ?>',
                                        filebrowserFlashBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Flash")); ?>',
                                        filebrowserUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files")); ?>',
                                        filebrowserImageUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images")); ?>',
                                        filebrowserFlashUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash")); ?>',
                                        enterMode: CKEDITOR.ENTER_BR
                                    });
                                   
                                    
                                 
                                </script>
                            </div>
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
</div>
<script type="text/javascript">
$.fn.tabs = function() {
  var selector = this;
  
  this.each(function() {
    var obj = $(this); 
    
    $(obj.attr('href')).hide();
    
    $(obj).click(function() {
      $(selector).removeClass('selected');
      
      $(selector).each(function(i, element) {
        $($(element).attr('href')).hide();
      });
      
      $(this).addClass('selected');
      
      $($(this).attr('href')).show();
      
      return false;
    });
  });

  $(this).show();
  
  $(this).first().click();
};
</script>
<script type="text/javascript">
    function deleteFile(id,field)
    {
        if (id != '' & field != '') {
            var token = $('input[name=\'_token\']').val();
            $.ajax({
              type: 'POST',
              url: '<?php echo e(url("admin/jobs/report/deleteFile")); ?>',
              data: 'id='+id+'&field='+field+'&_token='+token,
              success: function(data){

                var datas = data.split('|');
                if(datas[0] == 'success'){
                  $('#'+field).remove();
                  $('#'+field+'_div').append('<input type="file" class="form-control" name="'+field+'" value="">')
                }
                else
                {
                 
               alert($datas[1]);   
                }
              } 
            });
        } else{
            alert('Sorry We could not receive required Datas')
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>