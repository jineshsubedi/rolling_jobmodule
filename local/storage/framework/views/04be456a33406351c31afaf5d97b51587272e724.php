<?php $__env->startSection('heading'); ?>
Booking 
            <small>List of Booking </small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Booking </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-md-12">
        <a href="<?php echo e(url('/branchadmin/booking/addnew')); ?>" class="btn refreshbtn right btm10m"><i class="fa fa-plus-circle"></i> Add New Booking</a>
      </div>
      </div>

    

     
      <div class="box">
            <div class="box-body">
              <div class="panel-heading">
                    <div class="top-links btn-group">
             <a href="<?php echo e(url('/branchadmin/booking')); ?>" class="btn <?php echo e($datas['booked_by'] == '' ? 'btn-primary' : 'btn-default'); ?>">All</a>
              <a href="<?php echo e(url('/branchadmin/booking?booked_by='.auth()->guard('staffs')->user()->id)); ?>" class="btn <?php echo e($datas['booked_by'] == auth()->guard('staffs')->user()->id ? 'btn-primary' : 'btn-default'); ?>">Your Bookings</a>
             
              
              
              </div>
            </div>
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th>Place</th>
                        <th>Purpose</th>
                        <th>Date</th>
                        <th>Booked By</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      
                      <?php $i=1; 
                        foreach ($data as $row) { 
                          $hall = \App\BookingHall::getTitle($row->hall_id);
                          $purpose = \App\BookingPurpose::getTitle($row->purpose);
                          $purpose_title = $purpose != '' ? $purpose : $row->other_purpose;
                          ?>
                          <tr>
                        <td><?php echo $i++ ;?></td>
                        <td><?php echo e(\App\BookingPlace::getTitle($row->place_id)); ?> >> <?php echo e($hall != '' ? $hall : $row->others); ?></td>
                         <td><?php echo e($purpose_title); ?></td>
                          <td><?php echo e($row->booking_date.' '.$row->booking_time.' to '.$row->to_time); ?></td>
                       <td><?php echo e(\App\Adjustment_staff::getName($row->booked_by)); ?></td>
                        <td>
                          <?php if($row->booked_by == auth()->guard('staffs')->user()->id): ?>
                          <a href="javascript:void(0);" onClick="confirm_delete('/<?php echo e($row->id); ?>')" class="btn btn-danger left"><i class="fa fa-fw fa-remove"></i>Cancel</a>
                         
                           <a href="javascript:void(0);" onClick="otherStaffs('<?php echo e($row->id); ?>')" class="btn btn-success left">Invites
                            <?php ($rejected = \App\BookingStaffs::ApprovalRejected($row->id)); ?>
                            <?php if($rejected > 0): ?>
                            <span class="pull-right-container"><small class="label pull-right bg-red"><?php echo e($rejected); ?></small></span>
                            <?php endif; ?>
                           </a>
                            <?php endif; ?>
                           <a href="javascript:void(0);" onClick="viewDetail('<?php echo e($row->id); ?>')" class="btn btn-primary left">Detail</a>
                        </td>
                      </tr>
                      <?php  }

                      ?>
                      

                    </table>

          </div><!-- /.box-body -->
      </div>
    </div>
  <div>

  <div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_simple_numbers right">
          <?php echo $data->render();?>
      </div>
    </div>
  </div>
  <div class="modal fade " id="modal-others">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Participating Staffs</h4>
              </div>
              <div class="modal-body">
                <input type="hidden" id="booking_id" value="">
                <div id="other-box" class="box-body" style="">
                  <!-- Conversations are loaded here -->
                
                 
                </div>
                
                
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="addStaff()">Add Staff</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

  <div class="modal fade " id="modal-staffs">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Staffs</h4>
              </div>
              <form class="form-horizontal" role="form" id="booking_form" method="POST" action="<?php echo e(url('/branchadmin/booking/add_staff')); ?>">
                <?php echo csrf_field(); ?>

              <div class="modal-body">
                <input type="hidden" id="addbooking_id" name="booking_id" value="">
                <div id="staff-box" class="box-body" style="">
                  <div class="col-md-12" id="staffs">
                   <div id="booking_staffs_0" class="form-group">
                            <label class="col-md-2 control-label">Staff</label>

                            <div class="col-md-8">
                                <select class="form-control checkstaff" id="staffs_0" name="booking_staffs[0]" onchange="checkStaff(0)" >
                                    <option value="0"> Select Staff</option>
                                    <?php foreach($staffs as $staff): ?>
                                   
                                    <option value="<?php echo e($staff->id); ?>"> <?php echo e($staff->name); ?></option>
                                   
                                    <?php endforeach; ?>
                                </select>
                               

                                
                            </div>
                            <div class="col-md-2">
                              <button class="btn btn-danger margin-top-10 delete_desc" onclick="$('#booking_staffs_0').remove();" data-toggle="tooltip" title="" type="button" data-original-title="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                </div>
                 
                </div>
                
                
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" onclick="moreStaff()">More Staffs</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>



  <div class="modal fade " id="modal-reason">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-title">Reason of Cancellation</h4>
              </div>
              
              <div class="modal-body">
                
                <div id="reason-box" class="box-body" style="">

                 
                
                 
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

  <div class="modal fade " id="modal-detail">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-title">Detail of Hall Booking</h4>
              </div>
              
              <div class="modal-body">
                
                <div id="detail-box" class="box-body" style="">

                 
                
                 
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
  
  <script type="text/javascript">
 function confirm_delete(ids){
    if(confirm('Do You Want To Delete This Shit Time?')){
      var url= "<?php echo e(url('/branchadmin/booking/delete/')); ?>"+ids;
      location = url;
      
      }
    }

  function otherStaffs(id)
    {
      var token = $('input[name=\'_token\']').val();
       $.ajax({
                    type: 'POST',
                    url: '<?php echo e(url("/branchadmin/booking/getStaffs")); ?>',
                    data: '_token='+token+'&booking_id='+id,
                    cache: false,
                    success: function(html){
                     $('#other-box').html(html);
                     $('#booking_id').val(id);
                       $('#modal-others').modal('show');
                    }
                });
    }

  function addStaff() {

    var booking_id = $('#booking_id').val();
    $('#addbooking_id').val(booking_id);
    $('#modal-others').modal('hide');
    $('#modal-staffs').modal('show');
  }

  var row_id = 1;
  function moreStaff() {
    html = '<div id="booking_staffs_'+row_id+'" class="form-group"><label class="col-md-2 control-label">Staff</label>';

    html += '<div class="col-md-8"><select class="form-control checkstaff" id="staffs_'+row_id+'" name="booking_staffs['+row_id+']" onchange="checkStaff('+row_id+')" ><option value="0"> Select Staff</option> <?php foreach($staffs as $staff): ?><option value="<?php echo e($staff->id); ?>"> <?php echo e($staff->name); ?></option> <?php endforeach; ?></select> </div>';
    html += '<div class="col-md-2"><button class="btn btn-danger margin-top-10 delete_desc" onclick="$(\'#booking_staffs_'+row_id+'\').remove();" data-toggle="tooltip" title="" type="button" data-original-title="remove"><i class="fa fa-times"></i></button></div></div>';
    $('#staffs #staff_detail').remove();
    $('#staffs').append(html);
    row_id++;
    checkStaff(row_id);
  }


  function checkStaff(id)
  {
      
      var token = $('input[name=\'_token\']').val();
       var addbooking_id = $('#addbooking_id').val();
       
       var staff_id = $('#staffs_'+id).val();
       if (addbooking_id != '' && staff_id != 0) {
      $.ajax({
           type: 'POST',
              url: '<?php echo e(url("/branchadmin/booking/staff_check")); ?>',
              data: '_token='+token+'&booking_id='+addbooking_id+'&staff_id='+staff_id,
              cache: false,
              success: function(html){
                $('#staffs #staff_detail').remove();
              $('#staffs').append(html);
                 
              }
        });
      } else{
          $('#staff_detail_'+id).html('');
      }
  };


  function viewReject(id) {
    var reasons = $('#reason_'+id).html();

    $('#reason-box').html(reasons);
    $('#modal-reason').modal('show');
  }


  function viewDetail(id)
  {
    var token = $('input[name=\'_token\']').val();
     $.ajax({
           type: 'POST',
              url: '<?php echo e(url("/branchadmin/booking/detail")); ?>',
              data: '_token='+token+'&booking_id='+id,
              cache: false,
              success: function(html){
                
              $('#detail-box').html(html);
              $('#modal-detail').modal('show');
                 
              }
        });
  }
 </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>