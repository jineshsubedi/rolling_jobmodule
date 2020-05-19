<?php $__env->startSection('heading'); ?>
Branch Setting
<span class="blueclr bold">List of Branch Setting</span>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li class="active">Branch Setting</li>
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
      <div class="box-body">
        <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(url('/branchadmin/setting/update')); ?>" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>

          <input type="hidden" name="id" value="<?php echo e($data['branch']->id); ?>">
          <div class="col-md-8 btm10m">
             <div class="form-group">
              <label class="col-md-2 control-label required">Official Email</label>
              <div class="col-md-10">
               <input type="text" name="email" class="form-control" value="<?php echo e($data['branch']->email); ?>">               
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label required">Revenue Uploader</label>
              <div class="col-md-10">
                <select class="form-control" name="revenue" id="revenue">
                    <option value="0">Select Staff</option>
                  <?php foreach($data['staffs'] as $staff): ?>
                  <?php if($data['branch']->revenue == $staff->id): ?>
                  <option selected="selected" value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                  <?php else: ?>
                  <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
                
                
              </div>
            </div>
            

            <div class="form-group">
              <label class="col-md-2 control-label required">Client Handeler</label>
              <div class="col-md-10">
                <select class="form-control" name="client" id="client">
                    <option value="0">Select Department</option>
                  <?php foreach($data['department'] as $department): ?>
                  <?php if($data['branch']->client == $department->id): ?>
                  <option selected="selected" value="<?php echo e($department->id); ?>"><?php echo e($department->title); ?></option>
                  <?php else: ?>
                  <option value="<?php echo e($department->id); ?>"><?php echo e($department->title); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label required">Canteen Handeler</label>
              <div class="col-md-10">
                <select class="form-control" name="canteen" id="canteen">
                    <option value="0">Select Department</option>
                  <?php foreach($data['department'] as $department): ?>
                  <?php if($data['branch']->canteen == $department->id): ?>
                  <option selected="selected" value="<?php echo e($department->id); ?>"><?php echo e($department->title); ?></option>
                  <?php else: ?>
                  <option value="<?php echo e($department->id); ?>"><?php echo e($department->title); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
                
                
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-2 control-label required">Performance Rater</label>
              <div class="col-md-10">
                <select class="form-control" name="rater" id="rater">
                    <option value="0">Select Staff</option>
                  <?php foreach($data['staffs'] as $staff): ?>
                  <?php if($data['branch']->performance_rater == $staff->id): ?>
                  <option selected="selected" value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                  <?php else: ?>
                  <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <!-- attendance handler  -->
            <div class="form-group">
              <label class="col-md-2 control-label required">Attendance Handler</label>
              <div class="col-md-10">
                <select class="form-control" name="attendance_handler" id="attendance_handler">
                    <option value="0">Select Staff</option>
                  <?php foreach($data['staffs'] as $staff): ?>
                  <?php if($data['branch']->attendance_handler == $staff->id): ?>
                  <option selected="selected" value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                  <?php else: ?>
                  <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <!-- hr handler  -->
            <div class="form-group">
              <label class="col-md-2 control-label required">hr Handler</label>
              <div class="col-md-10">
                <select class="form-control" name="hr_handler" id="hr_handler">
                    <option value="0">Select Staff</option>
                  <?php foreach($data['staffs'] as $staff): ?>
                  <?php if($data['branch']->hr_handler == $staff->id): ?>
                  <option selected="selected" value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                  <?php else: ?>
                  <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <!-- staff handler  -->
            <div class="form-group">
              <label class="col-md-2 control-label required">Staff Handler</label>
              <div class="col-md-10">
                <select class="form-control" name="staff_handler" id="staff_handler">
                    <option value="0">Select Staff</option>
                  <?php foreach($data['staffs'] as $staff): ?>
                  <?php if($data['branch']->staff_handler == $staff->id): ?>
                  <option selected="selected" value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                  <?php else: ?>
                  <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <!-- survey handler  -->
            <div class="form-group">
              <label class="col-md-2 control-label required">Survey Handler</label>
              <div class="col-md-10">
                <select class="form-control" name="survey_handler" id="survey_handler">
                    <option value="0">Select Staff</option>
                  <?php foreach($data['staffs'] as $staff): ?>
                  <?php if($data['branch']->survey_handler == $staff->id): ?>
                  <option selected="selected" value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                  <?php else: ?>
                  <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <!-- training handler  -->
            <div class="form-group">
              <label class="col-md-2 control-label required">Training Handler</label>
              <div class="col-md-10">
                <select class="form-control" name="training_handler" id="training_handler">
                    <option value="0">Select Staff</option>
                  <?php foreach($data['staffs'] as $staff): ?>
                  <?php if($data['branch']->training_handler == $staff->id): ?>
                  <option selected="selected" value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                  <?php else: ?>
                  <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <!-- account handler  -->
            <div class="form-group">
              <label class="col-md-2 control-label required">account Handler</label>
              <div class="col-md-10">
              <div class="row">
                <div class="col-md-6">
                  <select class="form-control" name="account_handler" id="account_handler">
                      <option value="0">Select Staff</option>
                    <?php foreach($data['staffs'] as $staff): ?>
                    <?php if($data['branch']->account_handler == $staff->id): ?>
                    <option selected="selected" value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                    <?php else: ?>
                    <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="col-md-3 control-label required">Signature</label>
                  <div class="col-md-9">
                    <input type="file" name="image" id="imageUpload" class="form-control" onchange="readURL(this);">
                    <?php if($data['branch']->account_handler_signature): ?>
                    <?php ($image = $data['branch']->account_handler_signature); ?>
                    <?php else: ?>
                    <?php ($image = 'image-png.png'); ?>
                    <?php endif; ?>
                    <img width="100px;" id="blah" src="<?php echo e(asset('image/'.$image)); ?>">
                  </div>
                </div>
              </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label required">Salary Calculate</label>
              <div class="col-md-10">
                <select class="form-control" name="salary_calculate" id="salary_calculate">
                    
                  <?php foreach($data['ne'] as $ne): ?>
                  <?php if($data['branch']->salary_calculate == $ne['value']): ?>
                  <option selected="selected" value="<?php echo e($ne['value']); ?>"><?php echo e($ne['title']); ?></option>
                  <?php else: ?>
                  <option value="<?php echo e($ne['value']); ?>"><?php echo e($ne['title']); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

             <div class="form-group">
              <label class="col-md-2 control-label required">Client Rating Required</label>
              <div class="col-md-10">
                <select class="form-control" name="client_comment" id="client_comment">
                    
                  <?php foreach($data['yesno'] as $yesno): ?>
                  <?php if($data['branch']->client_comment == $yesno['value']): ?>
                  <option selected="selected" value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                  <?php else: ?>
                  <option value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <?php ($class= 'none'); ?>
            <?php if($data['branch']->client_comment == 1): ?>
            <?php ($class = 'block'); ?>
            <?php endif; ?>

            <div id="cc_type" class="form-group" style="display: <?php echo e($class); ?>">
              <label class="col-md-2 control-label required">Client Rating Time</label>
              <div class="col-md-10">
                <select class="form-control" name="performance_rating_type" id="performance_rating_type">
                  <?php foreach($data['client_rating'] as $client_rating): ?>
                  <?php if($data['branch']->comment_type == $client_rating['value']): ?>
                  <option selected="selected" value="<?php echo e($client_rating['value']); ?>"><?php echo e($client_rating['title']); ?></option>
                  <?php else: ?>
                  <option value="<?php echo e($client_rating['value']); ?>"><?php echo e($client_rating['title']); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div id="cc_type" class="form-group" style="display: <?php echo e($class); ?>">
              <label class="col-md-2 control-label required">Performance Rating Time</label>
              <div class="col-md-10">
                <select class="form-control" name="comment_type" id="comment_type">
                  <option value="0">Select Duration</option>
                  <?php foreach($data['performance_rating'] as $performance_rating): ?>
                  <?php if($data['branch']->performance_rating_type == $performance_rating['value']): ?>
                    <option value="<?php echo e($performance_rating['value']); ?>" selected ><?php echo e($performance_rating['title']); ?></option>
                  <?php else: ?>
                    <option value="<?php echo e($performance_rating['value']); ?>" ><?php echo e($performance_rating['title']); ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>


            <div class="box box-primary border">
              <div class="box-title p-10">
              <i class="fa fa-briefcase"></i> Performance Valuation Parameters 
            </div>
            <div id="performances" class="p-10">
              
              <?php $row = 0;?>
              <?php if(count($data['performances']) > 0): ?>
              
              <?php ($titles = ['Task','KPIs','Discipline','Punctuality','Subordinate Rating', 'Achievement']); ?>
              <?php ($performances = $data['performances']); ?>
              <?php foreach($performances as $performance): ?>
             
              <div id="performance_row<?php echo e($row); ?>" class="form-group">
                
                  <div class="col-md-4"><input type="hidden" name="performance[<?php echo e($row); ?>][p_id]" value="<?php echo e($performance->id); ?>"><input type="text" <?php if(in_array($performance->title,$titles)): ?> readonly="readonly" <?php endif; ?> name="performance[<?php echo e($row); ?>][title]" class="form-control" placeholder="Performance Title" value="<?php echo e($performance->title); ?>"></div>
                  <div class="col-md-4">
                    <select class="form-control" name="performance[<?php echo e($row); ?>][duration]">
                      <?php foreach($data['duration'] as $duration): ?>
                      <?php if($performance->duration == $duration['value']): ?>
                      <option selected="selected" value="<?php echo e($duration['value']); ?>"><?php echo e($duration['title']); ?></option>
                      <?php else: ?>
                      <option value="<?php echo e($duration['value']); ?>"><?php echo e($duration['title']); ?></option>
                      <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                <div class="col-md-4">
                  <?php if(in_array($performance->title,$titles)): ?>
                  <input name="performance[<?php echo e($row); ?>][parameter]" class="form-control margin-top-10" placeholder="Parameter" required="required" type="text" value="<?php echo e($performance->parameter); ?>">
                  <?php else: ?>
                    
                    <div class="input-group">
                      <input name="performance[<?php echo e($row); ?>][parameter]" class="form-control margin-top-10" placeholder="Parameter" required="required" type="text" value="<?php echo e($performance->parameter); ?>">
                    <span class="input-group-btn">
                                      <button class="btn deletebtn margin-top-10 delete_desc" onclick="$('#performance_row<?php echo e($row); ?>').remove();" data-toggle="tooltip" title="remove" type="button"><i class="fa fa-minus-circle"></i> Remove</button>
                                    </span>
                  </div>
                  
                 <?php endif; ?>
                </div>
             

              </div>
              <?php ($row++); ?>
              <?php endforeach; ?>

              <?php else: ?>
              
              <div id="performance_row<?php echo e($row); ?>" class="form-group">
                
                  <div class="col-md-4"><input type="hidden" name="performance[<?php echo e($row); ?>][p_id]" value="0"><input type="text" readonly="readonly" name="performance[<?php echo e($row); ?>][title]" class="form-control" placeholder="Performance Title" value="Task"></div>
                  <div class="col-md-4">
                    <select class="form-control" name="performance[<?php echo e($row); ?>][duration]">
                      <?php foreach($data['duration'] as $duration): ?>
                      <?php if(old('duration') == $duration['value']): ?>
                      <option selected="selected" value="<?php echo e($duration['value']); ?>"><?php echo e($duration['title']); ?></option>
                      <?php else: ?>
                      <option value="<?php echo e($duration['value']); ?>"><?php echo e($duration['title']); ?></option>
                      <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                <div class="col-md-4">
                  
                    <input name="performance[<?php echo e($row); ?>][parameter]" class="form-control margin-top-10" placeholder="Parameter" type="text" value="50">
                    
                 
                </div>
             

              </div>

              <?php $row = $row + 1;?>
               <div id="performance_row<?php echo e($row); ?>" class="form-group">
                
                  <div class="col-md-4"><input type="hidden" name="performance[<?php echo e($row); ?>][p_id]" value="0"><input type="text" readonly="readonly" name="performance[<?php echo e($row); ?>][title]" class="form-control" placeholder="Performance Title" value="KPIs"></div>
                  <div class="col-md-4">
                    <select class="form-control" name="performance[<?php echo e($row); ?>][duration]">
                      <?php foreach($data['duration'] as $duration): ?>
                      <?php if(old('duration') == $duration['value']): ?>
                      <option selected="selected" value="<?php echo e($duration['value']); ?>"><?php echo e($duration['title']); ?></option>
                      <?php else: ?>
                      <option value="<?php echo e($duration['value']); ?>"><?php echo e($duration['title']); ?></option>
                      <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                <div class="col-md-4">
                  
                    <input name="performance[<?php echo e($row); ?>][parameter]" class="form-control margin-top-10" placeholder="Parameter" required="required" type="text" value="50">
                    
                 
                </div>
             

              </div>

               <?php $row = $row + 1;?>
               <div id="performance_row<?php echo e($row); ?>" class="form-group">
                
                  <div class="col-md-4"><input type="hidden" name="performance[<?php echo e($row); ?>][p_id]" value="0"><input type="text" readonly="readonly" name="performance[<?php echo e($row); ?>][title]" class="form-control" placeholder="Performance Title" value="Discipline"></div>
                  <div class="col-md-4">
                    <select class="form-control" name="performance[<?php echo e($row); ?>][duration]">
                      <?php foreach($data['duration'] as $duration): ?>
                      <?php if(old('duration') == $duration['value']): ?>
                      <option selected="selected" value="<?php echo e($duration['value']); ?>"><?php echo e($duration['title']); ?></option>
                      <?php else: ?>
                      <option value="<?php echo e($duration['value']); ?>"><?php echo e($duration['title']); ?></option>
                      <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                <div class="col-md-4">
                  
                    <input name="performance[<?php echo e($row); ?>][parameter]" class="form-control margin-top-10" required="required" placeholder="Parameter" type="text" value="50">
                    
                 
                </div>
             

              </div>

               <?php $row = $row + 1;?>
               <div id="performance_row<?php echo e($row); ?>" class="form-group">
                
                  <div class="col-md-4"><input type="hidden" name="performance[<?php echo e($row); ?>][p_id]" value="0"><input type="text" readonly="readonly" name="performance[<?php echo e($row); ?>][title]" class="form-control" placeholder="Performance Title" value="Punctuality"></div>
                  <div class="col-md-4">
                    <select class="form-control" name="performance[<?php echo e($row); ?>][duration]">
                      <?php foreach($data['duration'] as $duration): ?>
                      <?php if(old('duration') == $duration['value']): ?>
                      <option selected="selected" value="<?php echo e($duration['value']); ?>"><?php echo e($duration['title']); ?></option>
                      <?php else: ?>
                      <option value="<?php echo e($duration['value']); ?>"><?php echo e($duration['title']); ?></option>
                      <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                <div class="col-md-4">
                  
                    <input name="performance[<?php echo e($row); ?>][parameter]" class="form-control margin-top-10" required="required" placeholder="Parameter" type="text" value="50">
                    
                 
                </div>
             

              </div>
              <?php $row = $row + 1;?>
               <div id="performance_row<?php echo e($row); ?>" class="form-group">
                
                  <div class="col-md-4"><input type="hidden" name="performance[<?php echo e($row); ?>][p_id]" value="0"><input type="text" readonly="readonly" name="performance[<?php echo e($row); ?>][title]" class="form-control" placeholder="Performance Title" value="Subordinate Rating"></div>
                  <div class="col-md-4">
                    <select class="form-control" name="performance[<?php echo e($row); ?>][duration]">
                      <?php foreach($data['duration'] as $duration): ?>
                      <?php if(old('duration') == $duration['value']): ?>
                      <option selected="selected" value="<?php echo e($duration['value']); ?>"><?php echo e($duration['title']); ?></option>
                      <?php else: ?>
                      <option value="<?php echo e($duration['value']); ?>"><?php echo e($duration['title']); ?></option>
                      <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                <div class="col-md-4">
                  
                    <input name="performance[<?php echo e($row); ?>][parameter]" class="form-control margin-top-10" required="required" placeholder="Parameter" type="text" value="50">
                    
                 
                </div>
             

              </div>
              <?php $row = $row + 1;?>
               <div id="performance_row<?php echo e($row); ?>" class="form-group">
                
                  <div class="col-md-4"><input type="hidden" name="performance[<?php echo e($row); ?>][p_id]" value="0"><input type="text" readonly="readonly" name="performance[<?php echo e($row); ?>][title]" class="form-control" placeholder="Achievement" value="Achievement"></div>
                  <div class="col-md-4">
                    <select class="form-control" name="performance[<?php echo e($row); ?>][duration]">
                      <?php foreach($data['duration'] as $duration): ?>
                      <?php if(old('duration') == $duration['value']): ?>
                      <option selected="selected" value="<?php echo e($duration['value']); ?>"><?php echo e($duration['title']); ?></option>
                      <?php else: ?>
                      <option value="<?php echo e($duration['value']); ?>"><?php echo e($duration['title']); ?></option>
                      <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                <div class="col-md-4">
                  
                    <input name="performance[<?php echo e($row); ?>][parameter]" class="form-control margin-top-10" required="required" placeholder="Parameter" type="text" value="50">
                    
                 
                </div>
             

              </div>
              <?php endif; ?>
              
            </div>
            
              <div class="row">
                <div class="col-md-12">
                  <button id="btnAddPerformance" type="button" class="btn refreshbtn btm10m right">Add Performance</button>
                </div>
              </div>
            
            </div>
            
            <button type="submit" class="btn btn-primary tp10m">
                Send <i class="fa fa-paper-plane"></i>
              </button>
            
          </div>
         
        </form>
        </div><!-- /.box-body -->
      </div>
    </div>
    <div>
      <div>
      </div>
    <script type="text/javascript">
  var performance_row = '<?php echo e($row + 1); ?>';
  $('#btnAddPerformance').on('click', function(){
    
    html = '<div id="performance_row'+performance_row+'" class="form-group"><div class="col-md-4"><input type="hidden" name="performance['+performance_row+'][p_id]" value="0"><input type="text" required="required" name="performance['+performance_row+'][title]" class="form-control" placeholder="Performance Title"></div>';
    html += '<div class="col-md-4"><select class="form-control" name="performance['+performance_row+'][duration]"> <?php foreach($data['duration'] as $duration): ?> <option value="<?php echo e($duration["value"]); ?>"><?php echo e($duration["title"]); ?></option><?php endforeach; ?></select></div>';
    html += '<div class="col-md-4"><div class="input-group"><input name="performance['+performance_row+'][parameter]" required="required" class="form-control margin-top-10" placeholder="Parameter" type="text">';
    html += '<span class="input-group-btn"><button class="btn deletebtn margin-top-10 delete_desc" onclick="$(\'#performance_row'+performance_row+'\').remove();" data-toggle="tooltip" title="remove" type="button"><i class="fa fa-minus-circle"></i> Remove</button>';
    html += '</span></div> </div></div>';
    $('#performances').append(html);
      performance_row++;
  })

  $('#client_comment').on('change', function(){
    var id = $(this).val();
    if (id == 1) {
      $('#cc_type').fadeIn();
    } else{
      $('#cc_type').fadeOut();
    }
  })
</script>  
<script>
    //image display via js
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