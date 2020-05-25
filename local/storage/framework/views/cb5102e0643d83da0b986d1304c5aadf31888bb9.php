<?php $__env->startSection('heading'); ?>
Documents of <?php echo e($emp->firstname.' '.$emp->middlename.' '.$emp->lastname); ?>

           
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo e(url('/branchadmin/jobs')); ?>">Jobs</a></li>
            <li class="active"></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('assets/ckeditor/ckeditor.js')); ?>"></script>
 <div class="row">
     
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Detail of </div>
                <div class="panel-body">
                    <?php if(count($documents) > 0): ?>
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-md-12">
                            <h4>Client Document</h4>
                        </div>
                    </div>
                    <?php foreach($documents as $doc): ?>
                    <div class="row" id="document_<?php echo e($doc->id); ?>" style="margin-bottom: 15px; padding: 5px; border-bottom: 1px solid #cccccc;">
                        <div class="col-md-10">
                            <?php echo e($doc->title); ?>

                        </div>
                        <div class="col-md-2">
                            <button type="button" onclick="deleteFile('<?php echo e($doc->id); ?>')" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" id="testform" method="POST" action="<?php echo e(url('/branchadmin/jobs/file_upload/save')); ?>">
                       
                        <input type="hidden" name="applicant_id" value="<?php echo e($id); ?>">
                         <input type="hidden" name="job_id" value="<?php echo e($job_id); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                        <div class="col-md-12" id="file_field">
                        <?php $file_row = 0; ?>

                                <?php if(is_array(old('emp_file')) > 0): ?>
                                <?php if(count(old('emp_file')) > 0): ?>
                            

                            <?php foreach(old('emp_file') as $key => $old): ?>
                        <div id="row_<?php echo e($file_row); ?>" class="row">
                         <div class="col-md-5">
                            <div class="form-group <?php echo e($errors->has('emp_file.'.$key.'.title') ? ' has-error' : ''); ?>">
                                <label class="label-control required col-md-4">Document Title</label>
                                <div class="col-md-8">
                                    <input type="text" name="emp_file[<?php echo e($key); ?>][title]" class="form-control">
                                    <?php if($errors->has('emp_file.'.$key.'.title')): ?>
                                                    <span class="help-block">
                                                        <?php echo e($errors->first('emp_file.'.$key.'.title')); ?>

                                                    </span>
                                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                            
                            <div class="col-md-5">
                            <div class="form-group <?php echo e($errors->has('emp_file.'.$key.'.file') ? ' has-error' : ''); ?>">
                                <label class="label-control required col-md-4">Document</label>
                                <div class="col-md-8">
                                    <input type="file" name="emp_file[<?php echo e($key); ?>][file]" class="form-control">
                                    <?php if($errors->has('emp_file.'.$key.'.file')): ?>
                                                    <span class="help-block">
                                                        <?php echo e($errors->first('emp_file.'.$key.'.file')); ?>

                                                    </span>
                                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                         <button type="button" onclick="$('#row_<?php echo e($file_row); ?>').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
                        </div>
                    </div>
                    <?php $file_row++;?>
                               <?php endforeach; ?>
                               <?php endif; ?>
                               <?php else: ?>
                               <div id="row_<?php echo e($file_row); ?>" class="row">
                                 <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="label-control required col-md-4">File Title</label>
                                        <div class="col-md-8">
                                            <input type="text" name="emp_file[<?php echo e($file_row); ?>][title]" class="form-control">
                                           
                                        </div>
                                    </div>
                                </div>
                                    
                                    <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="label-control required col-md-4">File Title</label>
                                        <div class="col-md-8">
                                            <input type="file" name="emp_file[<?php echo e($file_row); ?>][file]" class="form-control">
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                 <button type="button" onclick="$('#row_<?php echo e($file_row); ?>').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
                                </div>
                            </div>
                               <?php endif; ?>
                               </div>
                               </div>
                       <div class="row">
                        <div class="col-md-12"> 
                            <button type="button" onclick="addFiles();" data-toggle="tooltip" title="Add More Files" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i>Add More Files</button>


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
   var row_file =  '<?php echo e($file_row + 1); ?>';
   function addFiles()
   {
    html = '<div id="row_'+row_file+'" class="row"><div class="col-md-5"><div class="form-group"><label class="label-control required col-md-4">File Title</label><div class="col-md-8"><input type="text" name="emp_file['+row_file+'][title]" class="form-control"> </div></div></div>';
                                    
    html += '<div class="col-md-5"><div class="form-group"><label class="label-control required col-md-4">File Title</label><div class="col-md-8"><input type="file" name="emp_file['+row_file+'][file]" class="form-control"></div></div></div>';
    html += '<div class="col-md-2"> <button type="button" onclick="$(\'#row_'+row_file+'\').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></div></div>';
    $('#file_field').append(html);
    row_file++;
   }

   function deleteFile(id)
   {
    var token = $('input[name=\'_token\']').val();
    if (id != '') {
        $.ajax({
            type: 'POST',
            url: '<?php echo e(url("/branchadmin/jobs/documents/delete")); ?>',
            data: 'id='+id+'&_token='+token,
            cache: false,
            success: function(html){
                if (html == 'Success') {
                    $('#document_'+id).remove();
                } else{
                    alert(html)
                }
                
               
            }
        });
    }
   }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>