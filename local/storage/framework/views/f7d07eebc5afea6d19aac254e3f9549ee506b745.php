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
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyAoqaY2Xc_0pCgZdcoODLP5Qli-coBxnSI&v=3&libraries=panoramio"></script>
<?php echo csrf_field(); ?>

 <div class="row">
    <div class="col-xs-12">
    <div class="row">
            <div class="col-md-12">
                <a href="<?php echo e(url('staffs/attendance-handler/create')); ?>" class="btn btn-info pull-right">Generate Staff Attendance</a>
            </div>
        </div>
        <div class="box">
            <div class="heading text-center">
                <h4>Staff Manual Attendance Handler</h4>
                <form action="<?php echo e(route('staffs.exportExcel')); ?>" method="get">
                    <?php echo csrf_field(); ?>

                    <div class="col-md-3">
                        <label class="label-control col-md-4">Staff</label>
                        <div class="col-md-8">
                        <select name="filter_staff" id="filter_staff" class="form-control">
                            <option value="">Select Staff</option>
                            <?php foreach($staffs as $staff): ?>
                            <?php if($staff->id == $datas['filter_staff']): ?>
                            <option value="<?php echo e($staff->id); ?>" selected><?php echo e($staff->name); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($staff->id); ?>"><?php echo e($staff->name); ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="label-control col-md-4">From</label>
                        <div class="col-md-8"><input type="text" name="filter_from" id="filter_from" class="form-control datepicker"
                            value="<?php echo e($datas['filter_from']); ?>"></div>
                    </div>
                    <div class="col-md-3">
                        <label class="label-control col-md-4">To</label>
                        <div class="col-md-8">
                        <input type="text" name="filter_to" id="filter_to" class="form-control datepicker"
                            value="<?php echo e($datas['filter_to']); ?>"></div>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-success" href="<?php echo e(url('/staffs/attendance-handler')); ?>">All</a>
                        <input type="submit" class="btn btn-success" value="Download Sheet">
                    </div>
                </form>
            </div>
            <div class="box-body">
                <div class="row">
                <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Staff</th>
                        <th>Date</th>
                        <th>Duty Start</th>
                        <th>Lunch Out</th>
                        <th>Lunch In</th>
                        <th>Duty Out</th>
                        <th>Total Duration</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($datas['all_attendece'] as $attendance): ?>
                      <tr 
                        <?php if($attendance["manual"] == 1): ?>
                        style="background-color:#dae7f1;"
                        <?php endif; ?>
                      >
                        <td><?php echo e(\App\Adjustment_staff::getName($attendance['staff'])); ?></td>
                        <td><?php echo e($attendance['attendance_date']); ?></td>
                        <td>
                        <span class="label <?php echo e($attendance['office_in_class']); ?>"><?php echo e($attendance['office_in'] .' '.$attendance['office_in_distance']); ?></span><button onclick="viewMap('<?php echo e($attendance["office_in_location"]); ?>','Duty Started in <?php echo e($attendance["office_in"]); ?>')"><i class="fa fa-map-marker"></i></button>
                        <?php if($attendance['in_away_location'] || $attendance['in_time_reason']): ?>
                          <button class="btn btn-info" data-toggle="modal" data-target="#modal-in-away-location<?php echo e($attendance['id']); ?>"><i class="fa fa-eye"></i></button>
                          <div class="modal fade" id="modal-in-away-location<?php echo e($attendance['id']); ?>">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="meeting-title">Reason</h4>
                                  </div>
                                      <div class="modal-body" id="meeting-body">
                                      <?php if($attendance['in_time_reason']): ?>
                                      <label>Late Clock In Reason:</label>
                                      <p><?php echo e($attendance['in_time_reason']); ?></p>
                                      <?php endif; ?>
                                      <?php if($attendance['in_away_location']): ?>
                                      <label>Away Clock In reason:</label>
                                      <p><?php echo e($attendance['in_away_location']); ?></p>
                                      <?php endif; ?>
                                      </div>
                                      <div class="modal-footer">
                                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        <?php endif; ?>
                        </td>
                        <td><span class="label <?php echo e($attendance['lunch_out_class']); ?>"><?php echo e($attendance['lunch_out'] .' '.$attendance['lunch_out_distance']); ?></span><button onclick="viewMap('<?php echo e($attendance["lunch_out_location"]); ?>','Lunch Started in <?php echo e($attendance["lunch_out"]); ?>')"><i class="fa fa-map-marker"></i></button></td>
                         <td><span class="label <?php echo e($attendance['lunch_in_class']); ?>"><?php echo e($attendance['lunch_in'] .' '.$attendance['lunch_in_distance']); ?></span><button onclick="viewMap('<?php echo e($attendance["lunch_in_location"]); ?>','Lunch Ended in <?php echo e($attendance["lunch_in"]); ?>')"><i class="fa fa-map-marker"></i></button></td>
                          <td>
                          <span class="label <?php echo e($attendance['office_out_class']); ?>"><?php echo e($attendance['office_out'] .' '.$attendance['office_out_distance']); ?></span><button onclick="viewMap('<?php echo e($attendance["office_out_location"]); ?>','Duty Out in <?php echo e($attendance["office_out"]); ?>')"><i class="fa fa-map-marker"></i></button>
                          <?php if($attendance['out_away_location'] || $attendance['out_time_reason']): ?>
                          <button class="btn btn-info" data-toggle="modal" data-target="#modal-out-away-location<?php echo e($attendance['id']); ?>"><i class="fa fa-eye"></i></button>
                          <div class="modal fade" id="modal-out-away-location<?php echo e($attendance['id']); ?>">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="meeting-title">Reason</h4>
                                  </div>
                                      <div class="modal-body" id="meeting-body">
                                      <?php if($attendance['out_away_location']): ?>
                                      <?php echo e($attendance['out_away_location']); ?>

                                      <?php endif; ?>
                                      <?php if($attendance['out_time_reason']): ?>
                                      <?php echo e($attendance['out_time_reason']); ?>

                                      <?php endif; ?>
                                      </div>
                                      <div class="modal-footer">
                                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <?php endif; ?>
                          </td>
                          <td><?php echo e($attendance['human_time']); ?></td>
                          <td>
                            <?php if($attendance['meetings'] > 0): ?>
                            <button type="button" class="btn btn-primary" onclick="viewMeeting('<?php echo e($attendance["attendance_date"]); ?>','<?php echo e($attendance["staff"]); ?>')">(<?php echo e($attendance['meetings']); ?>)Meetings</button>
                            <?php endif; ?>
                            <?php if($attendance['approve'] != 1): ?>
                            <button type="button" id="approve-button<?php echo e($attendance['id']); ?>" class="btn company_docbtn" onclick="approveAttendance('<?php echo e($attendance['id']); ?>')">Approve</button>
                            <?php endif; ?>
                            <button type="button" id="edit-button<?php echo e($attendance['id']); ?>" class="btn btn-info" onclick="updateAttendance('<?php echo e($attendance['id']); ?>', '<?php echo e($attendance['office_in']); ?>', '<?php echo e($attendance['office_out']); ?>')">Edit</button>
                          </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="6"><b style="float: right;">Total Duration</b></td>
                        <td colspan="2"><b><?php echo e($datas['human_total_time']); ?></b></td>
                      </tr>
                    </tfoot>

                </table>
                </div>
            </div><!-- /.box-body -->
        </div>
    </div>
  <div>
<div class="row">
    <div class="col-xs-12">
        <div class="dataTables_paginate paging_simple_numbers right">
        <?php echo $datas['page']->render();?>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-attendance">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="attendance-title"></h4>
        </div>
        
        <div class="modal-body" id="attendance-body">
            <div class="row">
        <div class="col-md-12" id="meeting_detail">

        </div>
        </div>
        <div class="row">
        <div class="col-md-12 modal_body_map">
            <div class="location-map" id="location-map">
            <div style="width: 100%; height: 400px;" id="map_canvas"></div>
            </div>
        </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            
        </div>
        
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-meeting">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="meeting-title">Meeting Detail</h4>
        </div>
        
            <div class="modal-body" id="meeting-body">
            
        
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            
            </div>
        
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-approve">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="meeting-title">Approve Attendace</h4>
        </div>
        
            <div class="modal-body" id="meeting-body">
            <div class="form-group">
              <label>Remarks</label>
              <input type="hidden" id="attendance_id" class="form-control">
              <textarea class="form-control" id="remarks"></textarea>
              <input type="button" id="approveBtn" class="btn btn-primary" value="Approve">
            </div>
            
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            
            </div>
        
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-update-attendance">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="attendance-title">Update Attendance</h4>
          <br>
          <form action="<?php echo e(route('staffs.attendancehandler.update')); ?>" method="post" class="form-horizontal">
            <?php echo csrf_field(); ?>

            <?php echo method_field('PUT'); ?>

            <input type="hidden" name="attendance_id" id="updateAttendanceId">
            <input type="hidden" name="filter_staff" value="<?php echo e(request()->get('filter_staff')); ?>">
            <input type="hidden" name="filter_from" value="<?php echo e(request()->get('filter_from')); ?>">
            <input type="hidden" name="filter_to" value="<?php echo e(request()->get('filter_to')); ?>">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div class="form-group">
                  <label class="col-md-4 control-label">Set ClockIn-Time</label>
                  <div class="col-md-8">
                    <input type="text" id="in_time" name="in_time" class="form-control timepicker">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Set ClockOut-Time</label>
                  <div class="col-md-8">
                    <input type="text" id="out_time" name="out_time" class="form-control timepicker">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label"></label>
                  <div class="col-md-8">
                    <input type="submit" class="btn btn-info" value="Update">
                  </div>
                </div>
              </div>              
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
  $(function() {
    $('.datepicker').datepicker({
         onSelect: function(date) {
             
           var filter_from = $('#filter_from').val();
           var filter_to = $('#filter_to').val();
           var filter_staff = $('#filter_staff').val();
           
           var url= "<?php echo e(url('/staffs/attendance-handler?')); ?>";
           if (filter_staff != '') {
             url += 'filter_staff='+filter_staff;
           }
           if (filter_from != '') {
               url += '&filter_from='+filter_from;
              }
              if (filter_to != '') {
               url += '&filter_to='+filter_to;
              }
             location = url;
         }
    });
  });
</script>
<script>
    $('select#filter_staff').change(function(){
        var filter_staff = $(this).children("option:selected").val();
        var filter_from = $('#filter_from').val();
        var filter_to = $('#filter_to').val();
        var url= "<?php echo e(url('/staffs/attendance-handler?')); ?>";
        if (filter_staff != '') {
            url += 'filter_staff='+filter_staff;
        }
        if (filter_from != '') {
           url += '&filter_from='+filter_from;
        }
        if (filter_to != '') {
            url += '&filter_to='+filter_to;
        }
        location = url;
    })
</script>
<script type="text/javascript" src="<?php echo e(asset('/assets/plugins/timepicker/jquery.timepicker.js')); ?>"></script>
<script type="text/javascript">
    var map = null;
    var myMarker;
    var myLatlng;
    function initializeGMap(lat, lng) {
      myLatlng = new google.maps.LatLng(lat, lng);

      var myOptions = {
        zoom: 16,
        zoomControl: true,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

      myMarker = new google.maps.Marker({
        position: myLatlng
      });
      myMarker.setMap(map);
    }
    function viewMap(location,title) {
      var data = location.split(',');
      //initialize(new google.maps.LatLng(data[0], data[1]));
        initializeGMap(data[0], data[1]);
        $('#meeting_detail').html('');
            $('#attendance-title').html(title);
            
            $('#modal-attendance').modal('show');
    }
    function viewMeetingDetail(location,meeting_date,company,meeting_with,description,meeting_document) {
        //alert(meeting_document);
        var htmldata = '<table class="table table-responsive">';
            htmldata += '<tr><td><strong>Meeting Date</strong></td><td>'+meeting_date+'</td></tr>';
            htmldata += '<tr><td><strong>Company</strong></td><td>'+company+'</td></tr>';
            htmldata += '<tr><td><strong>Meeting With</strong></td><td>'+meeting_with+'</td></tr>';
            htmldata += '<tr><td><strong>Description</strong></td><td>'+description+'</td></tr>';
            if(meeting_document != '') {
             // var href = '<?php echo e(url("image/")); ?>'+'/'.meeting_document;;
                  
              htmldata += '<tr><td><strong>Document</strong></td><td><a href="'+meeting_document+'" class="btn btn-primary" download target="_blank">Download</a></td></tr>';
            }
 
            htmldata += '</table>';
            $('#meeting_detail').html('');
            $('#meeting_detail').html(htmldata);
            var data = location.split(',');
              //initialize(new google.maps.LatLng(data[0], data[1]));
                initializeGMap(data[0], data[1]);
             $('#attendance-title').html('Meeting Detail');
             
             $('#modal-attendance').modal('show');
    }
    function approveAttendance(id) {
        $('#attendance_id').val(id);
        $('#modal-approve').modal('show');
    }
    $('.timepicker').timepicker({
        'showDuration': true,
        'timeFormat': 'H:i:s',
        'minTime': '07:00:00',
    });
    function updateAttendance(id, in_time, out_time){
      $('#updateAttendanceId').val(id);
      $('#in_time').val(in_time);
      $('#out_time').val(out_time);
      $('#modal-update-attendance').modal('show');
    }
    $('#approveBtn').click(function(){
      var id = $('#attendance_id').val();
      var remarks = $('#remarks').val();
        var token = $('input[name=\'_token\']').val();
        $.ajax({
          type: 'POST',
          url: '<?php echo e(url("/staffs/attendance-handler/approve")); ?>',
          data: '_token='+token+'&id='+id+'&remarks='+remarks,
          cache: false,
          success: function(data){
           if (data == 'Success') {
            $('#approve-button'+id).remove();
           }
          }
        });
      $('#approve-button'+id).remove();
      $('#modal-approve').modal('hide');
      $('#remarks').val('');
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>