<?php $__env->startSection('heading'); ?>
New Leave Request
<small>Detail of New Leave Request</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo e(url('/branchadmin/leaverequest')); ?>">Leave Request</a></li>
<li class="active">New Leave Request</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
    .nodisplay {
        display: none;
    }
</style>
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
                <div class="panel-heading">New Leave Request</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" enctype="multipart/form-data" method="POST"
                        action="<?php echo e(url('/branchadmin/leaverequest/save')); ?>">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="accrual" value="<?php echo e(old('accrual')); ?>" id="accrual">
                        <input type="hidden" name="status" value="<?php echo e(old('status')); ?>" id="status">
                        <input type="hidden" name="emergency_leave" value="0" id="emergency_leave">
                        <input type="hidden" name="apply_before" value="<?php echo e(old('apply_before')); ?>" id="apply_before">
                        <input type="hidden" name="remaining" value="<?php echo e(old('remaining')); ?>" id="remaining">
                        <input type="hidden" name="continious_leave" value="<?php echo e(old('continious_leave')); ?>"
                            id="continious_leave">
                        <input type="hidden" name="days" value="<?php echo e(old('days')); ?>" id="days">
                        <input type="hidden" name="eligible" value="<?php echo e(old('eligible')); ?>" id="eligible">
                        <input type="hidden" name="join_duration" value="<?php echo e($datas['joinduration']); ?>" id="join_duration">
                        <input type="hidden" name="total_compensation" id="total_compensation"
                            value="<?php echo e(count($datas['compensatory_off'])); ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary border p-10">
                                    <div class="form-group<?php echo e($errors->has('leave_type') ? ' has-error' : ''); ?>">
                                        <label class="col-md-2 control-label reqired">Nature of Leave</label>
                                        <div class="col-md-8" id="ltype">
                                            <select class="form-control" id="leave_type" name="leave_type">
                                                <option value="">Select Type</option>
                                                <?php foreach($datas['leave_type'] as $ltype): ?>
                                                <?php if(old('leave_type') == $ltype['value']): ?>
                                                <option accrual="<?php echo e($ltype['accrual']); ?>"
                                                    apply_before="<?php echo e($ltype['apply_before']); ?>"
                                                    eligible="<?php echo e($ltype['eligible']); ?>"
                                                    continious_leave="<?php echo e($ltype['continious_leave']); ?>"
                                                    remaining="<?php echo e($ltype['remaining']); ?>" selected="selected"
                                                    value="<?php echo e($ltype['value']); ?>"><?php echo e($ltype['title']); ?></option>
                                                <?php else: ?>
                                                <option continious_leave="<?php echo e($ltype['continious_leave']); ?>"
                                                    apply_before="<?php echo e($ltype['apply_before']); ?>"
                                                    eligible="<?php echo e($ltype['eligible']); ?>" accrual="<?php echo e($ltype['accrual']); ?>"
                                                    remaining="<?php echo e($ltype['remaining']); ?>" value="<?php echo e($ltype['value']); ?>">
                                                    <?php echo e($ltype['title']); ?></option>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if($errors->has('leave_type')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('leave_type')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-primary" onclick="newLeaveTypeModal()">
                                                <i class="fa fa-plus"></i> Add Nature of leave
                                            </button>
                                        </div>
                                    </div>
                                    <div id="comp"
                                        class="form-group<?php echo e($errors->has('compensation_of') ? 'block has-error' : ' nodisplay'); ?>">
                                        <label class="col-md-2 control-label">Compensation of</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="compensation_of">
                                                <option value="">Select Date</option>
                                                <?php foreach($datas['compensatory_off'] as $comp): ?>
                                                <?php if(old('compensation_of') == $comp->work_day): ?>
                                                <option selected="selected" value="<?php echo e($comp->work_day); ?>">
                                                    <?php echo e($comp->work_day); ?></option>
                                                <?php else: ?>
                                                <option value="<?php echo e($comp->work_day); ?>"><?php echo e($comp->work_day); ?></option>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if($errors->has('compensation_of')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('compensation_of')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label reqired">Leave Type</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="full_day" id="full_day">
                                                <?php foreach($datas['full_day'] as $fday): ?>
                                                <?php if(old('full_day') == $fday['value']): ?>
                                                <option selected="selected" value="<?php echo e($fday['value']); ?>">
                                                    <?php echo e($fday['title']); ?></option>
                                                <?php else: ?>
                                                <option value="<?php echo e($fday['value']); ?>"><?php echo e($fday['title']); ?></option>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('start_date') ? ' has-error' : ''); ?>">
                                        <label class="col-md-2 control-label reqired">Start Date</label>
                                        <div class="col-md-8">
                                            <input type="text" id="start_date" name="start_date" autocomplete="off"
                                                placeholder="<?php echo e(date('Y-m-d')); ?>" value="<?php echo e(old('start_date')); ?>"
                                                class="form-control datepicker" />
                                            <?php if($errors->has('start_date')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('start_date')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('end_date') ? ' has-error' : ''); ?>">
                                        <label class="col-md-2 control-label reqired">End Date</label>
                                        <div class="col-md-8">
                                            <input type="text" id="end_date" name="end_date" autocomplete="off"
                                                placeholder="<?php echo e(date('Y-m-d')); ?>" value="<?php echo e(old('end_date')); ?>"
                                                class="form-control date" />
                                            <?php if($errors->has('end_date')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('end_date')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <?php if(old('doctor_report')): ?>
                                    <?php ($class = ''); ?>
                                    <?php else: ?>
                                    <?php ($class = 'nodisplay'); ?>
                                    <?php endif; ?>
                                    <div class="form-group <?php echo e($class); ?>" id="doctor_report">
                                        <label class="col-md-2 control-label reqired">Doctor Report</label>
                                        <div class="col-md-8">
                                            <input type="file" name="doctor_report" class="form-control" />
                                        </div>
                                        <div class="col-md-2"></div>

                                    </div>
                                    <div class="form-group<?php echo e($errors->has('contact_number') ? ' has-error' : ''); ?>">
                                        <label class="col-md-2 control-label reqired">Emergency Contact Number</label>
                                        <div class="col-md-8">
                                            <input type="text" id="contact_number" name="contact_number"
                                                placeholder="9851000000" value="<?php echo e(old('contact_number')); ?>"
                                                class="form-control " />
                                            <?php if($errors->has('contact_number')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('contact_number')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                        <label class="col-md-2 control-label reqired">Description</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="description"
                                                placeholder="description"><?php echo e(old('description')); ?></textarea>
                                            <?php if($errors->has('description')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('description')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <?php if($datas['handover_required'] == 1): ?>
                                    <div class="form-group<?php echo e($errors->has('handover') ? ' has-error' : ''); ?>">
                                        <label class="col-md-2 control-label reqired">Work Handover To</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="handover">
                                                <?php foreach($datas['staffs'] as $staff): ?>
                                                <?php if(old('handover') == $staff->id): ?>
                                                <option selected="selected" value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?>

                                                </option>
                                                <?php else: ?>
                                                <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php if($errors->has('handover')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('handover')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <div class="col-md-10 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">
                                                Submit <i class="fa fa-paper-plane"></i>
                                            </button>
                                        </div>
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
    $('#leave_type').on('change', function(){
    var id = $(this).val();
    var element = $(this).find('option:selected'); 
    var accrual = element.attr("accrual"); 
    var apply_before = element.attr("apply_before"); 
    var remaining = element.attr("remaining"); 
    var continious_leave = element.attr("continious_leave"); 
    var eligible = element.attr("eligible"); 
    var join_duration = $("#join_duration").val(); 
    var total_compensation = $('#total_compensation').val();
    
   $('#accrual').val(accrual);
   $('#apply_before').val(apply_before);
   $('#remaining').val(remaining);
   $('#continious_leave').val(continious_leave);
   $('#eligible').val(eligible);
   $('#ltype #lmessage').remove();
   
    if (id == 3) {
      $('#comp').fadeIn();
       $('#ltype #lmessage').remove();
       if (total_compensation == 0) {
       
       var message = '<div id="lmessage" class="alert alert-danger" style="padding:5px; margin-bottom:5px;">You do not have any compensation. Please apply for the compensation.</div>';
           
             $('#ltype').append(message);
        } 
    } else{
      $('#comp').fadeOut();
       if (Number(accrual) < 1) {
        var html = '<div id="lmessage" class="alert alert-danger" style="padding:5px; margin-bottom:5px;">Your accrual is not sufficient if you will request this leave it will go to onpaid leave.</div>';
        $('#ltype #lmessage').remove();
        $('#ltype').append(html);
      }

      if (Number(join_duration) < Number(eligible)) {
        var html = '<div id="lmessage" class="alert alert-danger" style="padding:5px; margin-bottom:5px;">You are not eligible for this leave it will go to onpaid leave.</div>';
        $('#ltype #lmessage').remove();
        $('#ltype').append(html);
      }

    }




    var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();

            var diffdays = 0;
            

            if (start_date != '') {
                    if (end_date != '') {
                        var date1 = new Date(start_date);
                        var date2 = new Date(end_date);
                        var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
                        diffdays = Math.ceil(diffDays + 1);
                        
                    } 
                
            var full_day = $('#full_day').val();
            if (full_day == 2) {
                diffdays = diffdays / 4;
            }
            if (full_day == 3) {
                diffdays = diffdays / 2;
            }

            var continious_leave = $('#continious_leave').val();
            if(continious_leave > 0 ) {
                if (continious_leave < diffdays) {
                     var html = '<div id="lmessage" class="alert alert-danger" style="padding:5px; margin-bottom:5px;">Sorry you can not take leave more than '+continious_leave+' day(s).</div>';
                        $('#ltype #lmessage').remove();
                        $('#ltype').append(html);
                } else{
                    $('#ltype #lmessage').remove();
                    
                }
            } else{
                 $('#ltype #lmessage').remove();
                    
            }
           

            if(id == 1 && diffdays > 2){
                $('#doctor_report').fadeIn();
               
            } else{

                $('#doctor_report').fadeOut();
            }
            $('#days').val(diffdays);


} 

   })
</script>
<script type="text/javascript">
    $(function () {

    $('.datepicker').datepicker({
        onSelect: function(date) {
            
            var start_date = $('#start_date').val();
            var apply_before = $('#apply_before').val();
            if (apply_before > 0 && start_date != '') {
                var adate = new Date(start_date);
                var bdate = new Date();
                var ddif = Math.abs(bdate.getTime() - adate.getTime());
                var dDays = Math.ceil(ddif / (1000 * 3600 * 24)); 
                difdays = Math.ceil(dDays + 1);
                //alert(dDays);
                if (apply_before > dDays) {
                    var html = '<div id="lmessage" class="alert alert-danger" style="padding:5px; margin-bottom:5px;">You must apply before '+apply_before+' Days. If you will continue it will go to Emmergency Leave but you have to give reason for Emmergency Leave.</div>';
                        $('#ltype #lmessage').remove();
                        $('#ltype').append(html);
                        $('#emergency_leave').val(1);
                } else{
                     $('#ltype #lmessage').remove();
                     $('#emergency_leave').val(0);
                }
            }

            if (start_date != '') {
               var token = $('input[name=\'_token\']').val();
               var end_date = $('#end_date').val();
               $.ajax({
                    type: 'POST',
                    url: '<?php echo e(url("/branchadmin/leaverequest/check_available")); ?>',
                    data: '_token='+token+'&start_date='+start_date+'&end_date='+end_date,
                    cache: false,
                    success: function(html){
                        var datas = html.split('|');
                        $('#status').val(datas[0]);
                     if (datas[1] != '') {
                        $('#ltype #lmessage').remove();
                        $('#ltype').append('<div id="lmessage" class="alert alert-danger" style="padding:5px; margin-bottom:5px;">'+datas[1]+'</div>');
                    } else{
                        if (apply_before > dDays) {
                            var html = '<div id="lmessage" class="alert alert-danger" style="padding:5px; margin-bottom:5px;">You must apply before '+apply_before+' Days. If you will continue it will go to Emmergency Leave but you have to give reason for Emmergency Leave.</div>';
                                $('#ltype #lmessage').remove();
                                $('#ltype').append(html);
                                $('#emergency_leave').val(1);
                        } else{
                             $('#ltype #lmessage').remove();
                             $('#emergency_leave').val(0);
                        }
                       
                    }
                    }
                });
            }
           
        }
    });


    
    $('.date').datepicker({
        onSelect: function(date) {
            var type = $('#leave_type').val();
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();

            var diffdays = 0;
            

            if (start_date != '') {
                    if (end_date != '') {
                        var date1 = new Date(start_date);
                        var date2 = new Date(end_date);
                        var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
                        diffdays = Math.ceil(diffDays + 1);
                        
                    } 
                } 
            var full_day = $('#full_day').val();
            if (full_day == 2) {
                diffdays = diffdays / 4;
            }
            if (full_day == 3) {
                diffdays = diffdays / 2;
            }

            var continious_leave = $('#continious_leave').val();
            if(continious_leave > 0 ) {
                if (continious_leave < diffdays) {
                     var html = '<div id="lmessage" class="alert alert-danger" style="padding:5px; margin-bottom:5px;">Sorry you can not take leave more than '+continious_leave+' day(s).</div>';
                        $('#ltype #lmessage').remove();
                        $('#ltype').append(html);
                } else{
                    $('#ltype #lmessage').remove();
                    
                }
            } else{
                 $('#ltype #lmessage').remove();
                    
            }
           

            if(type == 1 && diffdays > 2){
                $('#doctor_report').fadeIn();
               
            } else{

                $('#doctor_report').fadeOut();
            }
            $('#days').val(diffdays);

            if (end_date != '') {
               var token = $('input[name=\'_token\']').val();
               
               $.ajax({
                    type: 'POST',
                    url: '<?php echo e(url("/branchadmin/leaverequest/check_available")); ?>',
                    data: '_token='+token+'&start_date='+start_date+'&end_date='+end_date,
                    cache: false,
                    success: function(html){
                        var datas = html.split('|');
                        $('#status').val(datas[0]);
                     if (datas[1] != '') {
                        $('#ltype #lmessage').remove();
                        $('#ltype').append('<div id="lmessage" class="alert alert-danger" style="padding:5px; margin-bottom:5px;">'+datas[1]+'</div>');
                    } else{
                         if(continious_leave > 0 ) {
                            if (continious_leave < diffdays) {
                                 var html = '<div id="lmessage" class="alert alert-danger" style="padding:5px; margin-bottom:5px;">Sorry you can not take leave more than '+continious_leave+' day(s).</div>';
                                    $('#ltype #lmessage').remove();
                                    $('#ltype').append(html);
                            } else{
                                $('#ltype #lmessage').remove();
                                
                            }
                        } else{
                             $('#ltype #lmessage').remove();
                                
                        }
                       
                    }
                    }
                });
            }
           
        }
    });
});
</script>

<div class="modal fade bd-example-modal-lg" id="leave-modal-add-nature">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Nature of leave</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" id="testform" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary border p-10">
                                <div class="col-md-3"><strong>Leave Title</strong></div>
                                <div class="col-md-2"><strong>Number of Days</strong></div>
                                <div class="col-md-2"><strong>Eligible (Months)</strong></div>
                                <div class="col-md-1"><strong>Continious</strong></div>
                                <div class="col-md-2"><strong>Accrual Per Month</strong></div>
                                <div class="col-md-2"><strong>Apply Before</strong></div>
                                <div id="leave_type">
                                    <div id="leave_type_nature_row1">
                                        <div class="col-md-3">
                                            <div class="form-group"><input name="leave_type_title[]"
                                                    class="form-control margin-top-10" placeholder="Leave Title"
                                                    type="text"></div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group"><input name="leave_type_number_of_days[]"
                                                    class="form-control margin-top-10" placeholder="10" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group"><input name="leave_type_eligible[]"
                                                    class="form-control margin-top-10" placeholder="10" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group"><input name="leave_type_continious_leave[]"
                                                    class="form-control margin-top-10" placeholder="10" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group"><input name="leave_type_accrual_amount[]"
                                                    class="form-control margin-top-10" placeholder="10" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input name="leave_type_before_days[]"
                                                        class="form-control margin-top-10" placeholder="2" type="text">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-danger margin-top-10 delete_desc"
                                                            onclick="removeLeaveTypeForm(1)" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div id="errors" class="col-md-12 text-danger"></div>
                                    <div class="col-md-12 text-right margin-top-10">
                                        <button onclick="btnAddLeaveTypeForm()" type="button"
                                            class="btn btn-sm grey-mint pullri">Add Leave Type</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-3">
                            <button type="button" onclick="saveNatureOfLeave()" class="btn btn-primary">
                                Submit <i class="fa fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<script>
    var count = 1;
    function newLeaveTypeModal()
    {
        $('#leave-modal-add-nature').modal('show');
    }
    function btnAddLeaveTypeForm()
    {
        count++;
        var html = '<div id="leave_type_nature_row'+count+'"><div class="col-md-3"><div class="form-group"><input name="leave_type_title[]" class="form-control margin-top-10" placeholder="Leave Title" type="text"></div></div><div class="col-md-2"><div class="form-group"><input name="leave_type_number_of_days[]" class="form-control margin-top-10" placeholder="10" type="text"></div></div><div class="col-md-2"><div class="form-group"><input name="leave_type_eligible[]" class="form-control margin-top-10" placeholder="10" type="text"></div></div><div class="col-md-1"><div class="form-group"><input name="leave_type_continious_leave[]" class="form-control margin-top-10" placeholder="10" type="text"></div></div><div class="col-md-2"><div class="form-group"><input name="leave_type_accrual_amount[]" class="form-control margin-top-10" placeholder="10" type="text"></div></div><div class="col-md-2"><div class="form-group"><div class="input-group"><input name="leave_type_before_days[]" class="form-control margin-top-10" placeholder="2" type="text"><span class="input-group-btn"><button class="btn btn-danger margin-top-10 delete_desc" onclick="removeLeaveTypeForm('+count+')" type="button"><i class="fa fa-times"></i></button></span></div></div></div></div>';
        $('#leave_type_nature_row1').append(html);
    }
    function removeLeaveTypeForm(num)
    {
        $('#leave_type_nature_row'+num).remove();
    }
    function saveNatureOfLeave()
    {
        var title = $("input[name='leave_type_title[]']").map(function(){return $(this).val();}).get();
        var number_of_days = $("input[name='leave_type_number_of_days[]']").map(function(){return $(this).val();}).get();
        var eligible = $("input[name='leave_type_eligible[]']").map(function(){return $(this).val();}).get();
        var continious_leave = $("input[name='leave_type_continious_leave[]']").map(function(){return $(this).val();}).get();
        var accrual_amount = $("input[name='leave_type_accrual_amount[]']").map(function(){return $(this).val();}).get();
        var before_days = $("input[name='leave_type_before_days[]']").map(function(){return $(this).val();}).get();
        var token = $("input[name=\"_token\"]").val();
        $.ajax({
            url: '<?php echo e(route("branchadmin.addNatureOfLeaveType")); ?>',
            type: 'POST',
            data: {
                _token: token,
                title: title,
                number_of_days: number_of_days,
                eligible: eligible,
                continious_leave: continious_leave,
                accrual_amount: accrual_amount,
                before_days: before_days
            },
            cache: false,
            success: function(data){
                console.log(data.msg)
                if(data.msg){
                    location.reload();
                }
            },
            error: function(error){
                console.log(error.responseJSON)
                $('#errors').html('')
                $.each(error.responseJSON, function(index, value){
                    var errorText = '<br>'+'<span style="color:red;">'+value+'</span>'
                    $('#errors').append(errorText)
                })
            }
        });
    }
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>