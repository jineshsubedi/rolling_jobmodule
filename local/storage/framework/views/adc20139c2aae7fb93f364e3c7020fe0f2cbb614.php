<?php $__env->startSection('heading'); ?>
New Exit Interview
<small>Detail of New Exit Interview</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo e(url('/supervisor/interview')); ?>">Exit Interview</a></li>
<li class="active">New Exit Interview</li>
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
                <div class="panel-heading">New Exit Interview</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(url('/supervisor/interview/save')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group<?php echo e($errors->has('staff_id') ? ' has-error' : ''); ?>">
                                    <label class="col-md-3 control-label">Staff </label>
                                    <input type="hidden" name="staff_name" value="<?php echo e(old('staff_name')); ?>" id="staff_name">
                                    <div class="col-md-9">
                                        <select class="form-control" id="staff_id" name="staff_id">
                                            <option value="">Select Staff</option>
                                            <?php foreach($datas['staffs'] as $staff): ?>
                                            <?php if(old('staff_id') == $staff->id): ?>
                                            <option cname="<?php echo e($staff->name); ?>" selected="selected" value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                                            <?php else: ?>
                                            <option cname="<?php echo e($staff->name); ?>" value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                        
                                        <?php if($errors->has('staff_id')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('staff_id')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group<?php echo e($errors->has('interview_date') ? ' has-error' : ''); ?>">
                                    <label class="col-md-3 control-label">Interview Date</label>
                                    <div class="col-md-9">
                                        
                                        <input type="text" id="interview_date" required name="interview_date" value="<?php echo e(old('interview_date')); ?>" placeholder="2016-01-01" class="form-control datepicker" />
                                        
                                        <?php if($errors->has('interview_date')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('interview_date')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group<?php echo e($errors->has('received_by') ? ' has-error' : ''); ?>">
                                    <label class="col-md-3 control-label">Received By </label>
                                    
                                    <div class="col-md-9">
                                        <select class="form-control" name="received_by">
                                            <option value="">Select Received By</option>
                                            <?php foreach($datas['admins'] as $staff): ?>
                                            <?php if(old('received_by') == $staff->name): ?>
                                            <option selected="selected" value="<?php echo e($staff->name); ?>"><?php echo e($staff->name); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo e($staff->name); ?>"><?php echo e($staff->name); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                        
                                        <?php if($errors->has('received_by')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('received_by')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group<?php echo e($errors->has('service_tenure') ? ' has-error' : ''); ?>">
                                    <label class="col-md-3 control-label">Service Trnure</label>
                                    <div class="col-md-9">
                                        
                                        <input type="text" id="service_tenure" required name="service_tenure" value="<?php echo e(old('service_tenure')); ?>" placeholder="2016-01-01" class="form-control" />
                                        
                                        <?php if($errors->has('service_tenure')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('service_tenure')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 bg-gray" style="padding: 10px;">
                                <h3 style="margin: 0px;">Interview Questions</h3>
                            </div>
                        </div>
                        <div class="row" >
                            <?php ($des_row = 0); ?>
                            <div class="col-md-12" id="descriptions">
                                 <?php if(is_array(old('description')) > 0): ?>
                                 <?php foreach(old('description') as $key => $old): ?>
                                <div id="desc_row_<?php echo e($des_row); ?>" class="form-group<?php echo e($errors->has('description.'.$key.'.answer') ? ' has-error' : ''); ?>">
                                    <div class="col-xs-10">
                                    <input type="hidden" name="description[<?php echo e($des_row); ?>][question]" value="<?php echo e($old['question']); ?>"/>
                                    <label class="col-md-12"><?php echo e($old['question']); ?></label>
                                    <div class="col-md-12">
                                        
                                       <textarea class="form-control" name="description[<?php echo e($des_row); ?>][answer]"><?php echo e($old['answer']); ?></textarea>
                                        
                                        <?php if($errors->has('end')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('end')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>
                                 <div class="col-xs-2"><button type="button" class="btn btn-danger" onclick="$('#desc_row_<?php echo e($des_row); ?>').remove();" style="margin-top: 35px;"><i class="fa fa-minus-circle"></i></button>
                                </div>
                                </div>
                                <?php ($des_row++); ?>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <div  id="desc_row_<?php echo e($des_row); ?>" class="form-group">
                                    <div class="col-xs-10">
                                    <input type="hidden" name="description[<?php echo e($des_row); ?>][question]" value="What was your main reason for leaving the organization or the job?"/>
                                    <label class="col-md-12 ">What was your main reason for leaving the organization or the job?</label>
                                    <div class="col-md-12">
                                        
                                        <textarea class="form-control" name="description[<?php echo e($des_row); ?>][answer]"></textarea>
                                        
                                                                               
                                    </div>
                                </div>
                                <div class="col-xs-2"><button type="button" class="btn btn-danger" onclick="$('#desc_row_<?php echo e($des_row); ?>').remove();" style="margin-top: 35px;"><i class="fa fa-minus-circle"></i></button>
                                </div>
                            </div>
                                <?php ($des_row = $des_row + 1); ?>
                                <div id="desc_row_<?php echo e($des_row); ?>" class="form-group">
                                    <div class="col-xs-10">
                                    <input type="hidden" name="description[<?php echo e($des_row); ?>][question]" value="What was the quality of the supervision you received? Your thoughts about your immediate supervisors?"/>
                                    <label class="col-md-12">What was the quality of the supervision you received? Your thoughts about your immediate supervisors?</label>
                                    <div class="col-md-12">
                                        
                                        <textarea class="form-control" name="description[<?php echo e($des_row); ?>][answer]"></textarea>
                                        
                                                                               
                                    </div>
                                </div>
                                 <div class="col-xs-2"><button type="button" class="btn btn-danger" onclick="$('#desc_row_<?php echo e($des_row); ?>').remove();" style="margin-top: 35px;"><i class="fa fa-minus-circle"></i></button>
                                </div>
                                </div>
                                <?php ($des_row = $des_row + 1); ?>
                                <div id="desc_row_<?php echo e($des_row); ?>" class="form-group">
                                    <div class="col-xs-10">
                                    <input type="hidden" name="description[<?php echo e($des_row); ?>][question]" value="Did any company policy or procedure make your job more difficult?"/>
                                    <label class="col-md-12">Did any company policy or procedure make your job more difficult?</label>
                                    <div class="col-md-12">
                                        
                                        <textarea class="form-control" name="description[<?php echo e($des_row); ?>][answer]"></textarea>
                                        
                                                                               
                                    </div>
                                </div>
                                 <div class="col-xs-2"><button type="button" class="btn btn-danger" onclick="$('#desc_row_<?php echo e($des_row); ?>').remove();" style="margin-top: 35px;"><i class="fa fa-minus-circle"></i></button>
                                </div>
                                </div>
                                <?php ($des_row = $des_row + 1); ?>
                                <div id="desc_row_<?php echo e($des_row); ?>" class="form-group">
                                    <div class="col-xs-10">
                                    <input type="hidden" name="description[<?php echo e($des_row); ?>][question]" value="Did your job turn into what was described to you during the job interview process and induction?"/>
                                    <label class="col-md-12">Did your job turn into what was described to you during the job interview process and induction?</label>
                                    <div class="col-md-12">
                                        
                                        <textarea class="form-control" name="description[<?php echo e($des_row); ?>][answer]"></textarea>
                                        
                                                                               
                                    </div>
                                </div>
                                 <div class="col-xs-2"><button type="button" class="btn btn-danger" onclick="$('#desc_row_<?php echo e($des_row); ?>').remove();" style="margin-top: 35px;"><i class="fa fa-minus-circle"></i></button>
                                </div>
                                </div>
                                <?php ($des_row = $des_row + 1); ?>
                                <div id="desc_row_<?php echo e($des_row); ?>" class="form-group">
                                    <div class="col-xs-10">
                                    <input type="hidden" name="description[<?php echo e($des_row); ?>][question]" value="Did you receive adequate support to do your job?"/>
                                    <label class="col-md-12">Did you receive adequate support to do your job?</label>
                                    <div class="col-md-12">
                                        
                                        <textarea class="form-control" name="description[<?php echo e($des_row); ?>][answer]"></textarea>
                                        
                                                                               
                                    </div>
                                </div>
                                 <div class="col-xs-2"><button type="button" class="btn btn-danger" onclick="$('#desc_row_<?php echo e($des_row); ?>').remove();" style="margin-top: 35px;"><i class="fa fa-minus-circle"></i></button>
                                </div>
                                </div>
                                <?php ($des_row = $des_row + 1); ?>
                                <div id="desc_row_<?php echo e($des_row); ?>" class="form-group">
                                    <div class="col-xs-10">
                                    <input type="hidden" name="description[<?php echo e($des_row); ?>][question]" value="Your thoughts about the management?"/>
                                    <label class="col-md-12">Your thoughts about the management?</label>
                                    <div class="col-md-12">
                                        
                                        <textarea class="form-control" name="description[<?php echo e($des_row); ?>][answer]"></textarea>
                                        
                                                                               
                                    </div>
                                </div>
                                 <div class="col-xs-2"><button type="button" class="btn btn-danger" onclick="$('#desc_row_<?php echo e($des_row); ?>').remove();" style="margin-top: 35px;"><i class="fa fa-minus-circle"></i></button>
                                </div>
                                </div>
                                <?php ($des_row = $des_row + 1); ?>
                                <div id="desc_row_<?php echo e($des_row); ?>" class="form-group">
                                    <div class="col-xs-10">
                                    <input type="hidden" name="description[<?php echo e($des_row); ?>][question]" value="What did you like most about working for this organization?"/>
                                    <label class="col-md-12">What did you like most about working for this organization?</label>
                                    <div class="col-md-12">
                                        
                                        <textarea class="form-control" name="description[<?php echo e($des_row); ?>][answer]"></textarea>
                                        
                                                                               
                                    </div>
                                </div>
                                 <div class="col-xs-2"><button type="button" class="btn btn-danger" onclick="$('#desc_row_<?php echo e($des_row); ?>').remove();" style="margin-top: 35px;"><i class="fa fa-minus-circle"></i></button>
                                </div>
                                </div>
                                <?php ($des_row = $des_row + 1); ?>
                                <div id="desc_row_<?php echo e($des_row); ?>" class="form-group">
                                    <div class="col-xs-10">
                                    <input type="hidden" name="description[<?php echo e($des_row); ?>][question]" value="What did you like least about working for this organization?"/>
                                    <label class="col-md-12">What did you like least about working for this organization?</label>
                                    <div class="col-md-12">
                                        
                                        <textarea class="form-control" name="description[<?php echo e($des_row); ?>][answer]"></textarea>
                                        
                                                                               
                                    </div>
                                </div>
                                 <div class="col-xs-2"><button type="button" class="btn btn-danger" onclick="$('#desc_row_<?php echo e($des_row); ?>').remove();" style="margin-top: 35px;"><i class="fa fa-minus-circle"></i></button>
                                </div>
                                </div>
                                <?php ($des_row = $des_row + 1); ?>
                                <div id="desc_row_<?php echo e($des_row); ?>" class="form-group">
                                    <div class="col-xs-10">
                                    <input type="hidden" name="description[<?php echo e($des_row); ?>][question]" value="What, if anything, could have been done to keep you with the company?"/>
                                    <label class="col-md-12">What, if anything, could have been done to keep you with the company?</label>
                                    <div class="col-md-12">
                                        
                                        <textarea class="form-control" name="description[<?php echo e($des_row); ?>][answer]"></textarea>
                                        
                                                                               
                                    </div>
                                </div>
                                 <div class="col-xs-2"><button type="button" class="btn btn-danger" onclick="$('#desc_row_<?php echo e($des_row); ?>').remove();" style="margin-top: 35px;"><i class="fa fa-minus-circle"></i></button>
                                </div>
                                </div>
                                <?php ($des_row = $des_row + 1); ?>
                                <div id="desc_row_<?php echo e($des_row); ?>" class="form-group">
                                    <div class="col-xs-10">
                                    <input type="hidden" name="description[<?php echo e($des_row); ?>][question]" value="Provided a chance to change few things in the organization, what would that be?"/>
                                    <label class="col-md-12">Provided a chance to change few things in the organization, what would that be?</label>
                                    <div class="col-md-12">
                                        
                                        <textarea class="form-control" name="description[<?php echo e($des_row); ?>][answer]"></textarea>
                                        
                                                                               
                                    </div>
                                </div>
                                 <div class="col-xs-2"><button type="button" class="btn btn-danger" onclick="$('#desc_row_<?php echo e($des_row); ?>').remove();" style="margin-top: 35px;"><i class="fa fa-minus-circle"></i></button>
                                </div>
                                </div>
                                <?php ($des_row = $des_row + 1); ?>
                                <div id="desc_row_<?php echo e($des_row); ?>" class="form-group">
                                    <div class="col-xs-10">
                                    <input type="hidden" name="description[<?php echo e($des_row); ?>][question]" value="Would you recommend others to work for this company?"/>
                                    <label class="col-md-12">Would you recommend others to work for this company?</label>
                                    <div class="col-md-12">
                                        
                                        <textarea class="form-control" name="description[<?php echo e($des_row); ?>][answer]"></textarea>
                                        
                                                                               
                                    </div>
                                </div>
                                 <div class="col-xs-2"><button type="button" class="btn btn-danger" onclick="$('#desc_row_<?php echo e($des_row); ?>').remove();" style="margin-top: 35px;"><i class="fa fa-minus-circle"></i></button>
                                </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            
                            
                            
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <button class="btn btn-success" onclick="addQuestion();" type="button">Add More Question</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                  <div class="form-group">
                      <div class="col-md-10 col-md-offset-3">
                        <button type="submit" class="btn sendbtn">
                        Save <i class="fa fa-fw fa-paper-plane"></i>
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
$(function() {
$('.datepicker').datepicker();


});

$('#staff_id').on('change', function(){
    var staff_name = $(this).children(':selected').attr('cname');
    //alert(staff_name);
    var staff = $(this).val();
    var token = $('input[name=\'_token\']').val();
    $('#staff_name').val(staff_name);
    if (staff != '') {
        $.ajax({
                    type: 'POST',
                    url: '<?php echo e(url("/supervisor/staffs/get_trnure")); ?>',
                    data: '_token='+token+'&id='+staff,
                    cache: false,
                    success: function(html){
                       $('#service_tenure').val(html);
                    }
                });
    }
})
</script>
<script type="text/javascript">
    var des_row = '<?php echo e($des_row + 1); ?>';
    function addQuestion() {
        var html = ' <div class="row" id="desc_row_'+des_row+'"><div class="col-xs-10"><div class="form-group">';
                                    
            html += '<label class="col-md-2 control-label">Question</label><div class="col-md-10"><input type="text" class="form-control" name="description['+des_row+'][question]" value=""/></div></div>';
            html += '<div class="form-group"><label class="col-md-2 control-label">Answer</label><div class="col-md-10"><textarea class="form-control" name="description['+des_row+'][answer]"></textarea></div></div></div><div class="col-xs-2"><button type="button" class="btn btn-danger" onclick="$(\'#desc_row_'+des_row+'\').remove();" style="margin-top: 35px;"><i class="fa fa-minus-circle"></i></button></div> </div>';
        $('#descriptions').append(html);
        des_row++;
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>