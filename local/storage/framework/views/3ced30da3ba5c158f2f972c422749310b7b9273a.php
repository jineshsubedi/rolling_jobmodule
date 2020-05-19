<?php $__env->startSection('heading'); ?>
Branch Admin
<span class="bold blueclr">Detail of Branch Admin</span>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Edit Profile</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="panel panel-default">
        <div class="panel-heading">Edit Profile</div>
        <div class="panel-body">
          <form method="POST" action="<?php echo e(url('/branchadmin/updateprofile')); ?>" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo e($datas['branchadmin']->id); ?>">
                     <?php echo csrf_field(); ?>

                <div class="row profile">
                    <div class="col-md-6 col-sm-6">
                        <div class="box box-solid">
                            
                                <div class="box-title p-10 blueclr">
                                    <i class="fa fa-calendar"></i> Personal Details
                                </div>
                           
                            <div class="portlet-body p-10">
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                                    <img src="<?php echo e(asset($datas['image'])); ?>" alt="" title="" />
                                                    <a id="btn_change" class="col-md-12 btn btn-primary"><i class="fa fa-upload"></i>Change Picture</a>

                                                </div>
                                                 
                                            </div>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label required">Name </label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="name" placeholder="Employee Name" value="<?php echo e($datas['branchadmin']->name); ?>" type="text">
                                            <?php if($errors->has('name')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('f_name') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Father's Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="f_name" placeholder="Father Name" type="text" value="<?php echo e($datas['branchadmin']->f_name); ?>">
                                             <?php if($errors->has('f_name')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('f_name')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('dob') ? ' has-error' : ''); ?>">
                                        <label class="control-label col-md-3">Date of Birth</label>
                                        <div class="col-md-9">
                                            
                                                <input class="form-control datepicker" name="dob" value="<?php echo e($datas['branchadmin']->dob); ?>" type="text">
                                                 <?php if($errors->has('dob')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('dob')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                                
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('education_level') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Education Qualification</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="education_level" name="education_level">
                                              <option value="">Select Education level</option>
                                              <?php foreach($datas['education_level'] as $education_level): ?>
                                                <?php if($education_level->id == $datas['branchadmin']->education_level): ?>
                                                <option selected="selected" value="<?php echo e($education_level->id); ?>"><?php echo e($education_level->name); ?></option>
                                                <?php else: ?>
                                                 <option value="<?php echo e($education_level->id); ?>"><?php echo e($education_level->name); ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                             <?php if($errors->has('education_level')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('education_level')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('faculty') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Faculty</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="faculty" id="faculty">
                                              <?php foreach($datas['faculty'] as $faculty): ?>
                                              <?php if($faculty->id == $datas['branchadmin']->faculty): ?>
                                              <option selected="selected" value="<?php echo e($faculty->id); ?>"><?php echo e($faculty->name); ?></option>
                                              <?php else: ?>
                                              <option value="<?php echo e($faculty->id); ?>"><?php echo e($faculty->name); ?></option>
                                              <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                             <?php if($errors->has('faculty')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('faculty')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Gender</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="gender">
                                              <?php foreach($datas['gender'] as $gender): ?>
                                                <?php if($gender['value'] == $datas['branchadmin']->gender): ?>
                                                <option selected="selected" value="<?php echo e($gender['value']); ?>"><?php echo e($gender['Title']); ?></option>
                                                <?php else: ?>
                                                 <option value="<?php echo e($gender['value']); ?>"><?php echo e($gender['Title']); ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                             <?php if($errors->has('gender')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('gender')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('marital_status') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Marital Status</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="marital_status">
                                              <?php foreach($datas['marital_status'] as $marital_status): ?>
                                                <?php if($marital_status['value'] == $datas['branchadmin']->marital_status): ?>
                                                <option selected="selected" value="<?php echo e($marital_status['value']); ?>"><?php echo e($marital_status['Title']); ?></option>
                                                <?php else: ?>
                                                 <option value="<?php echo e($marital_status['value']); ?>"><?php echo e($marital_status['Title']); ?></option>
                                                <?php endif; ?>
                                              <?php endforeach; ?>
                                            </select>
                                             <?php if($errors->has('marital_status')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('marital_status')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Phone</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="phone" placeholder="Contact Number" value="<?php echo e($datas['branchadmin']->phone); ?>" type="text">
                                             <?php if($errors->has('phone')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('phone')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('temporary_address') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Local Address</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="temporary_address" id="temporary_address"><?php echo e($datas['branchadmin']->temporary_address); ?></textarea>
                                             <?php if($errors->has('temporary_address')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('temporary_address')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('permanent_address') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Permanent Address</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="permanent_address" id="permanent_address"><?php echo e($datas['branchadmin']->permanent_address); ?></textarea>
                                             <?php if($errors->has('permanent_address')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('permanent_address')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                   
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="box box-solid">
                         
                                <div class="box-title p-10 greenclr">
                                    <i class="fa fa-calendar"></i> Company Details
                                </div>
                            
                            
                            <div class="portlet-body p-10">
                                <div class="form-body">
                                  
                                    <div class="form-group <?php echo e($errors->has('bank_name') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Bank Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="bank_name" placeholder="Current bank_name" value="<?php echo e($datas['branchadmin']->bank_name); ?>" type="text">
                                             <?php if($errors->has('bank_name')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('bank_name')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('account_number') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Bank Account Number</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="account_number" placeholder="Current account_number" value="<?php echo e($datas['branchadmin']->account_number); ?>" type="text">
                                             <?php if($errors->has('account_number')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('account_number')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box box-solid tp10m">
                            
                                <div class="box-title p-10">
                                    <i class="fa fa-calendar"></i> Documents
                                </div>
                            
                            <div class="portlet-body p-10">
                                <div class="form-body">
                                    <div class="form-group <?php echo e($errors->has('resume') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Resume</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="resume" value="" type="file">
                                             <?php if($errors->has('resume')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('resume')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-5" id="resume_row">
                                            <?php if($datas['branchadmin']->resume != ''): ?>
                                            <a class="btn btn-warning" onclick="deleteFile('<?php echo e($datas['branchadmin']->id); ?>','resume')"> <i class="fa fa-minus-circle"></i> Remove</a> 
                                            <a href="<?php echo e(asset('/image/'.$datas['branchadmin']->resume)); ?>" target="_blank" class="btn btn-primary" download="download">Download <i class="fa fa-cloud-download"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('offer_letter') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Offer Letter</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="offer_letter" value="" type="file">
                                             <?php if($errors->has('offer_letter')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('offer_letter')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-5" id="offer_letter_row">
                                            <?php if($datas['branchadmin']->offer_letter != ''): ?>
                                            <a  class="btn btn-warning" onclick="deleteFile('<?php echo e($datas['branchadmin']->id); ?>','offer_letter')"> <i class="fa fa-minus-circle"></i> Remove</a> 
                                            <a href="<?php echo e(asset('/image/'.$datas['branchadmin']->offer_letter)); ?>" target="_blank" class="btn btn-primary" download="download">Download <i class="fa fa-cloud-download"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('contract') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">Contract Paper</label>
                                        <div class="col-md-4">
                                            <input class="form-control" name="contract" value="" type="file">
                                             <?php if($errors->has('contract')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('contract')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-5" id="contract_row">
                                            <?php if($datas['branchadmin']->contract != ''): ?>
                                            <a class="btn btn-warning" onclick="deleteFile('<?php echo e($datas['branchadmin']->id); ?>','contract')"> <i class="fa fa-minus-circle"></i> Remove</a> 
                                            <a href="<?php echo e(asset('/image/'.$datas['branchadmin']->contract)); ?>" target="_blank" class="btn btn-primary" download="download">Download <i class="fa fa-cloud-download"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group <?php echo e($errors->has('id_proof') ? ' has-error' : ''); ?>">
                                        <label class="col-md-3 control-label">ID Proof</label>
                                        <div class="col-md-4">
                                           <input class="form-control" name="id_proof" value="" type="file">
                                            <?php if($errors->has('id_proof')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('id_proof')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-5" id="id_proof_row">
                                            <?php if($datas['branchadmin']->id_proof != ''): ?>
                                            <a class="btn btn-warning" onclick="deleteFile('<?php echo e($datas['branchadmin']->id); ?>','id_proof')"> <i class="fa fa-minus-circle"></i> Remove</a> 
                                            <a href="<?php echo e(asset('/image/'.$datas['branchadmin']->id_proof)); ?>" target="_blank" class="btn btn-primary" download="download">Download <i class="fa fa-cloud-download"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="box box-info box-solid">
                            <div class="box-header with-border">
                                <div class="box-title">
                                    <i class="fa fa-calendar"></i> History
                                </div>
                            </div>
                            <div class="portlet-body p-10">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label">Designation</label>
                                        <div class="col-md-3" id="resume_row">
                                            <b>Promoted Date</b>
                                        </div>
                                    </div>
                                    <?php foreach($datas['employment_history'] as $history): ?>
                                    <div class="form-group">
                                        <label class="col-md-5 control-label"><?php echo e($history->designation); ?></label>
                                        <div class="col-md-3" id="resume_row">
                                            <?php echo e(\Carbon\Carbon::parse($history->promoted_date)->format('d M, Y')); ?>

                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    
                   
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" data-loading-text="Submitting..." class="btn sendbtn">
                                            Submit <i class="fa fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  

<script type="text/javascript">

 $(function() {

  $('.datepicker').datepicker();
  $('#joindate').datepicker();
});

</script>


<script type="text/javascript">
  $('#education_level').on('change', function(){

        var data = $(this).val();
        var token = $('input[name=\'_token\']').val();
        if (data != '') {
            $.ajax({
        type: 'POST',
        url: '<?php echo e(url("/branchadmin/getfaculty")); ?>',
        data: 'id='+data+'&_token='+token,
        cache: false,
        success: function(html){
            $('#faculty').html(html);
           
        }
    });
        } else{
            $('#faculty').html('<option value="">Select Faculty</option>');
        }
  })
</script>


<script type="text/javascript">
    function deleteFile(id,title)
    {
        var token = $('input[name=\'_token\']').val();
        if (id != '' && title != '') {
             $.ajax({
                type: 'POST',
                url: '<?php echo e(url("/branchadmin/deleteFile")); ?>',
                data: 'id='+id+'&_token='+token+'&title='+title,
                cache: false,
                success: function(data){
                    if (data == 'Success') {
                        $('#'+title+'_row').html('');
                    }
                    
                   
                }
        });
         }
    }
</script>

<script type="text/javascript">
      $('#btn_change').on('click', function() {
        $('#upload_form').remove();
        var url = "<?php echo e(url('/branchadmin/uploadimage')); ?>";
        $('body').prepend('<form enctype="multipart/form-data" action="'+url+'" id="upload_form" method="POST" style="display: none;"><input type="file" id="file" name="file" value="" /><input type="text" name="_token" value="<?php echo e(csrf_token()); ?>" /></form>');

        $('#upload_form #file').trigger('click');
        if (typeof timer != 'undefined') {
              clearInterval(timer);
          }

          timer = setInterval(function() {
            if ($('#upload_form #file').val() != '') {
              clearInterval(timer);
                $('#upload_form').submit();
                }
          }, 500);

      });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>