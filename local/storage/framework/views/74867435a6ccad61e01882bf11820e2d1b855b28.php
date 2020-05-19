<?php $__env->startSection('heading'); ?>
Staff Attendance
<small>Staff Attendance</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li class="active">Staff Attendance</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/assets/plugins/timepicker/jquery.timepicker.css')); ?>" />
 <div class="row">
    <div class="col-xs-12">
     
        <div class="box">
            <div class="heading text-center">
                <h4>Staff Manual Attendance Handler</h4>
            </div>
            <div class="box-body">
                <div class="row">
                <form action="<?php echo e(url('/staffs/attendance-handler/save')); ?>" method="post">
                <?php echo csrf_field(); ?>

                    <div class="col-md-12 form-horizontal">
                        <input type="hidden" name="branch_id" id="branch_id" value="<?php echo e(auth()->guard('staffs')->user()->branch); ?>">
                        <input type="hidden" name="type" id="type" value="">
                        <div class="form-group">
                            <label class="col-md-3 control-label required">Select Staff</label>
                            <div class="col-md-9">
                            <select class="form-control" name="staff_id" id="staff">
                                <option value="">Select Staff</option>
                                <?php foreach($staffs as $staff): ?>
                                <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label required"> Year</label>
                            <div class="col-md-9">
                            <select class="form-control" name="year" id="year">
                                <option value="">Select Year</option>
                            </select>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label required"> Month</label>
                            <div class="col-md-9">
                            <select class="form-control" name="month" id="month">
                                <option value="">Select Month</option>
                            </select>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label required"> Start Day</label>
                            <div class="col-md-9">
                                <select class="form-control" name="start_day" id="start_day">
                                    <option value="">Select Day</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label required"> End Day</label>
                            <div class="col-md-9">
                                <select class="form-control" name="end_day" id="end_day">
                                    <option value="">Select Day</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Set ClockIn-Time</label>
                            <div class="col-md-9">
                                <input type="text" id="in_time" name="in_time" class="form-control timepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Set ClockOut-Time</label>
                            <div class="col-md-9">
                                <input type="text" id="out_time" name="out_time" class="form-control timepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Remarks</label>
                            <div class="col-md-9">
                                <textarea name="remarks" class="form-control" placeholder="remarks"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-sm btn-primary">Generate Attendance</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div><!-- /.box-body -->
        </div>
    </div>
  <div>
  <div class="row">
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_simple_numbers right">
        
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo e(asset('/assets/plugins/timepicker/jquery.timepicker.js')); ?>"></script>
  <script>
    $('.timepicker').timepicker({
        'showDuration': true,
        'timeFormat': 'H:i:s',
        'minTime': '07:00:00',
    });
    var token = $('input[name=\'_token\']').val();
    var branch_id = $('#branch_id').val();
    $.ajax({
      type: 'GET',
      url: '<?php echo e(url("/staffs/attendance-handler/getYear")); ?>',
      data: '_token='+token+'&branch='+branch_id,
      cache: false,
      success: function(data){
       var datas = data.split('|');
       $('#type').val(datas[0]);
       $('#year').html(datas[1]);
      }
    });

    $('#year').on('change', function(){
        var year = $(this).val();
        if (year != '') {
            var type = $('#type').val();
            $.ajax({
              type: 'GET',
              url: '<?php echo e(url("/staffs/attendance-handler/getMonth")); ?>',
              data: '_token='+token+'&year='+year+'&type='+type+'&branch='+branch_id,
              cache: false,
              success: function(data){
               $('#month').html(data);
              }
            });
        }
    })
    $('#month').on('change', function(){
        var month = $(this).val();
        var year = $('#year').val();
        var type = $('#type').val();
        if (month != '') {
            $.ajax({
              type: 'GET',
              url: '<?php echo e(url("/staffs/attendance-handler/getDays")); ?>',
              data: '_token='+token+'&year='+year+'&type='+type+'&month='+month,
              cache: false,
              success: function(data){
                $('#start_day').html(data);
                $('#end_day').html(data);
              }
            });
        }
    })
  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>