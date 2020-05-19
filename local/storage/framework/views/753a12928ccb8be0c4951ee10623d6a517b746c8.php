<?php $__env->startSection('heading'); ?>
Travel Request
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Travel Request</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/select2/css/select2.css')); ?>">
<style>
    .select2-selection__rendered{line-height: 20px !important;}
    .switch {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 20px;
    }

    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 15px;
      width: 15px;
      left: 3px;
      bottom: 3px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
</style>
<script src="<?php echo e(asset('assets/select2/js/select2.js')); ?>"></script>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Make Travel Request</h3>
        </div>
      <div class="box-body">
        <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('staffs.travel.update', $travel->id)); ?>">
        <div class="col-md-10" style="border:1px solid #e6e6e6; border-radius: 5px; padding: 20px;">
            <?php echo csrf_field(); ?>

            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label class="col-md-2 control-label required">Type</label>
                <div class="col-md-10">
                    <input type="radio" name="type" value="domestic" <?php if($travel->type == 'domestic'): ?> checked <?php endif; ?>> Domestic &nbsp;
                    <input type="radio" name="type" value="international" <?php if($travel->type == 'international'): ?> checked <?php endif; ?>> International &nbsp;
                    <?php if($errors->has('type')): ?>
                        <span class="text-danger">
                            <strong><?php echo e($errors->first('type')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
               <label class="col-md-2 control-label required">Assigned To</label>
                <div class="col-md-10">
                    <select name="assigned_to" id="assigned_to" class="form-control select2">
                        <option value="">Select Staff</option>
                        <?php foreach($staffs as $staff): ?>
                        <?php if($travel->assigned_to == $staff->id): ?>
                        <option value="<?php echo e($staff->id); ?>" selected><?php echo e($staff->name); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <?php if($errors->has('assigned_to')): ?>
                        <span class="text-danger">
                            <strong><?php echo e($errors->first('assigned_to')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
               <label class="col-md-2 control-label required">From</label>
                <div class="col-md-10">
                    <input type="text" name="travel_from" class="form-control datepicker" value="<?php echo e($travel->from); ?>">
                    <?php if($errors->has('from')): ?>
                        <span class="text-danger">
                            <strong><?php echo e($errors->first('from')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
               <label class="col-md-2 control-label required">To</label>
                <div class="col-md-10">
                    <input type="text" name="travel_to" class="form-control datepicker" value="<?php echo e($travel->to); ?>">
                    <?php if($errors->has('travel_to')): ?>
                        <span class="text-danger">
                            <strong><?php echo e($errors->first('travel_to')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group" style="border:1px solid #a2df8c; border-radius: 5px; padding: 15px;">
                <div class="col-md-10"><label>Add Destination:</label></div>
                <div class="col-md-2">
                    <button type="button" class="btn bg-green" onclick="addMoreDestinationBtn()"><i class="fa fa-plus"></i> Add More</button>
                </div>
                <br>
                <br>
                <br>
                <div class="row" id="addMoreDestination">
                    <?php if($destinations): ?>
                    <?php foreach($destinations as $key=>$destination): ?>
                    <div id="editDestinationForm<?php echo e($destination->id); ?>">
                        <input type="hidden" name="destionation_id[]" value="<?php echo e($destination->id); ?>">
                        <div class="col-md-3">
                           <label>From</label>
                           <input type="text" name="e_from[]" class="form-control" value="<?php echo e($destination->from); ?>">
                        </div>
                        <div class="col-md-3">
                           <label>To</label>
                           <input type="text" name="e_to[]" class="form-control" value="<?php echo e($destination->to); ?>">
                        </div>
                        <div class="col-md-2">
                           <label>Departure Date</label>
                           <input type="text" name="e_departure_date[]" class="form-control datepicker" value="<?php echo e($destination->departure_date); ?>" autocomplete="off">
                        </div>
                        <div class="col-md-2">
                           <label>Arrival Date</label>
                           <input type="text" name="e_arrival_date[]" class="form-control datepicker" value="<?php echo e($destination->arrival_date); ?>" autocomplete="off">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn bg-red" style="margin-top: 20px;" onclick="removeEditDestinationBtn(<?php echo e($destination->id); ?>)"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if(is_array(old('from')) && is_array(old('to')) && is_array(old('departure_date')) && is_array(old('arrival_date'))): ?>
                        <?php for($i=0;$i<count(old('from'));$i++): ?>
                        <div id="oldDestinationForm<?php echo e($i); ?>">
                            <div class="col-md-3">
                                <label class="control-label">From</label>
                                <input type="text" name="from[]" class="form-control" value="<?php echo e(old('from.'.$i)); ?>">
                                <?php if($errors->has('from.'.$i)): ?>
                                    <span class="text-danger">
                                        <strong><?php echo e($errors->first('from.'.$i)); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-3">
                                <label>To</label>
                                <input type="text" name="to[]" class="form-control" value="<?php echo e(old('to.'.$i)); ?>">
                                <?php if($errors->has('to.'.$i)): ?>
                                    <span class="text-danger">
                                        <strong><?php echo e($errors->first('to.'.$i)); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-2">
                                <label>Departure Date</label>
                                <input type="text" name="departure_date[]" class="form-control datepicker" autocomplete="off" value="<?php echo e(old('departure_date.'.$i)); ?>">
                                <?php if($errors->has('departure_date.'.$i)): ?>
                                    <span class="text-danger">
                                        <strong><?php echo e($errors->first('departure_date.'.$i)); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-2">
                                <label>Arrival Date</label>
                                <input type="text" name="arrival_date[]" class="form-control datepicker" autocomplete="off" value="<?php echo e(old('arrival_date.'.$i)); ?>">
                                <?php if($errors->has('arrival_date.'.$i)): ?>
                                    <span class="text-danger">
                                        <strong><?php echo e($errors->first('arrival_date.'.$i)); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn bg-red" style="margin-top: 20px;" onclick="removeOldDestinationBtn(<?php echo e($i); ?>)"><i class="fa fa-trash"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php endfor; ?>
                    <?php else: ?>
                    <div id="destinationForm1">
                        <div class="col-md-3">
                           <label>From</label>
                           <input type="text" name="from[]" class="form-control">
                        </div>
                        <div class="col-md-3">
                           <label>To</label>
                           <input type="text" name="to[]" class="form-control">
                        </div>
                        <div class="col-md-2">
                           <label>Departure Date</label>
                           <input type="text" name="departure_date[]" class="form-control datepicker" autocomplete="off">
                        </div>
                        <div class="col-md-2">
                           <label>Arrival Date</label>
                           <input type="text" name="arrival_date[]" class="form-control datepicker" autocomplete="off">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn bg-red" style="margin-top: 20px;" onclick="removeMoreDestinationBtn(1)"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label required">Assignment of Travel</label>
                <div class="col-md-5">
                    <select name="assignment_type" id="assignment_type" class="form-control select2">
                        <option value="">Select Assignment Type</option>
                        <?php foreach($assignmentType as $type): ?>
                        <option value="<?php echo e($type->id); ?>" <?php if($travel->assignment_type==$type->id): ?> selected <?php endif; ?>><?php echo e($type->title); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if($errors->has('assignment_type')): ?>
                        <span class="text-danger">
                            <strong><?php echo e($errors->first('assignment_type')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="col-md-5">
                    <select name="assignment_category" id="assignment_category" class="form-control select2">
                        <option value="">Select Assignment</option>
                        <?php foreach($assignmentCategory as $category): ?>
                        <option value="<?php echo e($category->id); ?>" <?php if($travel->assignment_category==$category->id): ?> selected <?php endif; ?>><?php echo e($category->title); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if($errors->has('assignment_category')): ?>
                        <span class="text-danger">
                            <strong><?php echo e($errors->first('assignment_category')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label required">Purpose</label>
                <div class="col-md-10">
                   <textarea name="purpose" id="purpose" class="form-control" rows="5"><?php echo e($travel->purpose); ?></textarea>
                    <?php if($errors->has('purpose')): ?>
                        <span class="text-danger">
                            <strong><?php echo e($errors->first('purpose')); ?></strong>
                        </span>
                    <?php endif; ?>
               </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label required">Mode of Transport</label>
                <div class="col-md-10">
                    <input type="radio" name="mode_of_transport" value="road" <?php if($travel->mode_of_transport=='road'): ?> checked <?php endif; ?>> Road &nbsp;
                    <input type="radio" name="mode_of_transport" value="air" <?php if($travel->mode_of_transport=='air'): ?> checked <?php endif; ?>> Air &nbsp;
                    <?php if($errors->has('mode_of_transport')): ?>
                        <span class="text-danger">
                            <strong><?php echo e($errors->first('mode_of_transport')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
            <div id="transport_detail">
                <div class="form-group">
                    <label class="col-md-2">Road-sub Option</label>
                    <div class="col-md-10">
                        <div class="col-md-10">
                            <input type="checkbox" name="road_sub" value="1" <?php if($travel->road_sub==1): ?> checked <?php endif; ?>> Self-Owned Vehicle 
                        </div>
                        <div class="col-md-10">
                            <input type="checkbox" name="road_sub" value="2" <?php if($travel->road_sub==2): ?> checked <?php endif; ?>> Company-Owned Vehicle 
                        </div>
                        <div class="col-md-10">
                            <input type="checkbox" name="road_sub" value="3" <?php if($travel->road_sub==3): ?> checked <?php endif; ?>> Rental Vehicle 
                        </div>
                        <div class="col-md-10">
                            <?php if($errors->has('road_sub')): ?>
                                <span class="text-danger">
                                    <strong><?php echo e($errors->first('road_sub')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 required">Is Advance Required?</label>
                <div class="col-md-10">
                    <label class="switch">
                        <input type="checkbox" name="advance_required" id="advance_required" value="1" <?php if($travel->advance_required==1): ?> checked <?php endif; ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <div id="payment_required">
            <div class="form-group">
                <label class="col-md-2 control-label required">Payment Mode</label>
                <div class="col-md-4">
                    <select name="payment_mode" id="payment_mode" class="form-control">
                        <option value="">Select Payment Mode</option>
                        <option value="1" <?php if($travel->payment_mode==1): ?> selected <?php endif; ?>>Reimbursement Mode</option>
                        <option value="2" <?php if($travel->payment_mode==2): ?> selected <?php endif; ?>>Pre Diem Reimbursement</option>
                    </select>
                    <?php if($errors->has('payment_mode')): ?>
                        <span class="text-danger">
                            <strong><?php echo e($errors->first('payment_mode')); ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <div id="mode_1">
                        <label class="required">Sub-option</label> <br>
                        <input type="radio" name="reimbursement" value="1" <?php if($travel->reimbursement==1): ?> checked <?php endif; ?>> Pre-Paid 70% <br>
                        <input type="radio" name="reimbursement" value="2"  <?php if($travel->reimbursement==2): ?> checked <?php endif; ?>> Post-Paid 30%
                        <?php if($errors->has('reimbursement')): ?>
                            <span class="text-danger">
                                <strong><?php echo e($errors->first('reimbursement')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div id="mode_2">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="required">Position</label>
                                <select name="position" class="form-control">
                                    <option value="">Select Your Position</option>
                                    <?php foreach($positions as $position): ?>
                                    <option value="<?php echo e($position->id); ?>" <?php if($travel->position==$position->id): ?> selected <?php endif; ?>><?php echo e($position->title); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if($errors->has('position')): ?>
                                    <span class="text-danger">
                                        <strong><?php echo e($errors->first('position')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4">
                                <label class="required">Grade</label>
                                <select name="grade" class="form-control">
                                    <option value="">Select Your Grade</option>
                                    <?php foreach($grades as $grade): ?>
                                    <option value="<?php echo e($grade->id); ?>" <?php if($travel->grade==$grade->id): ?> selected <?php endif; ?>><?php echo e($grade->title); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if($errors->has('grade')): ?>
                                    <span class="text-danger">
                                        <strong><?php echo e($errors->first('grade')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4">
                                <label class="required">Per Diem Amount</label>
                                <input type="text" name="per_diem_amount" class="form-control" value="<?php echo e($travel->per_diem_amount); ?>" placeholder="0.0">
                                <?php if($errors->has('per_diem_amount')): ?>
                                    <span class="text-danger">
                                        <strong><?php echo e($errors->first('per_diem_amount')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <h4>Account Details (if the reimbursement or advance need to be done on another account)</h4>
                <div class="row">
                    <div class="col-md-4">
                        <label class="">Account Name</label>
                        <input type="text" name="account_name" class="form-control" value="<?php echo e($travel->account_name); ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="">Account Number</label>
                        <input type="number" name="account_number" class="form-control" value="<?php echo e($travel->account_number); ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="">Bank Name</label>
                        <input type="text" name="bank_name" class="form-control" value="<?php echo e($travel->bank_name); ?>">
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="clearfix"></div>
            <div class="col-md-10 form-group text-right">
                <input type="submit" class="btn btn-info" value="Submit">
                <input type="button" class="btn btn-success" value="Review with edit">
                <input type="button" class="btn btn-warning" value="Cancel">
            </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    var count = 1;
    $('.datepicker').datepicker();
    $('.select2').select2();
    function addMoreDestinationBtn()
    {
        count++;
        html = '<div id="destinationForm'+count+'"><div class="col-md-3"><label>From</label><input type="text" name="from[]" class="form-control"></div><div class="col-md-3"><label>To</label><input type="text" name="to[]" class="form-control"></div><div class="col-md-2"><label>Departure Date</label><input type="text" name="departure_date[]" class="form-control datepicker" autocomplete="off"></div><div class="col-md-2"><label>Arrival Date</label><input type="text" name="arrival_date[]" class="form-control datepicker" autocomplete="off"></div><div class="col-md-2"><button type="button" class="btn bg-red" style="margin-top: 20px;" onclick="removeMoreDestinationBtn('+count+')"><i class="fa fa-trash"></i></button></div></div>';
        $('#addMoreDestination').append(html)
    }
    function removeMoreDestinationBtn(id)
    {
        $('#destinationForm'+id).remove()
    }
    function removeOldDestinationBtn(id)
    {
        $('#oldDestinationForm'+id).remove();
    }
    var token = $('input[name=\'_token\']').val();
    function removeEditDestinationBtn(id)
    {
        
        $.ajax({
            type: "POST",
            url: "<?php echo e(url('staffs/destination/destination_delete')); ?>",
            data: "_token="+token+"&destination_id="+id,
            cache: false,
            success: function(data){
                $('#editDestinationForm'+id).remove();
            },
            error: function(error){
                console.log(error)
            }
        });
    }
    $('#mode_1').hide();
    $('#mode_2').hide();
    $('#payment_mode').change(function(){
        var mode = $(this).val();
        $('#mode_1').hide();
        $('#mode_2').hide();
        $('#mode_'+mode).show();
    })
    var p_mode = $('#payment_mode').val();
    if(p_mode != '')
    {
        $('#mode_1').hide();
        $('#mode_2').hide();
        $('#mode_'+p_mode).show();
    }
    $('#payment_required').hide();
    var adv_check = '<?php echo e($travel->advance_required); ?>';
    if(adv_check == 1)
    {
        $('#payment_required').show();
    }
    $('#advance_required').change(function(){
        if(this.checked) {
            $('#payment_required').show();
        }else{
            $('#payment_required').hide();
        }
    })
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>