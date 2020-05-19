<?php $__env->startSection('heading'); ?>
Work Handover
            <small>List of Work Handover</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Work Handover</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
      
     
      <div class="box">
            <div class="box-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th> Requested By</th>
                        <th> Start Date</th>
                        <th> End Date</th>
                        <th> Duration Date</th>
                        <th> Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <input type="checkbox" id="checkAll"> Check All
                          <button type="button" class="btn btn-info" id="handoverApproveBtn"><i class="fa fa-thumbs-up"></i></button>
                        </td>
                      </tr>
                      
                      <?php $i=1; 
                        foreach ($datas as $row) { 
                          $leave = $row->leaveRequest;

                          ?>
                          <tr>
                        <td>
                            <?php echo $i++ ;?>
                            <?php if($row->accept_status==0): ?>
                            <input type="checkbox" class="checkItem" name="request_ids[]" value="<?php echo e($row->id); ?>">
                            <?php endif; ?>
                        </td>
                        <td><?php echo \App\Adjustment_staff::getName($leave->requested_by);?></td>
                        <td><?php echo $leave->start_date;?></td>
                      <td><?php echo $leave->end_date;?></td>
                      <td><?php echo \App\LeaveRequest::getDuration($leave->leave_type,$leave->full_day,$leave->duration,$leave->start_date,$leave->end_date);?></td>
                      <td><?php echo \App\LeaveWorkHandover::getStatus($row->id);?></td>
                        <td>

                          <?php if($row->accept_status == 2): ?>
                          <button type="button" onclick="acceptHandover('/<?php echo e($row->id); ?>')" class="btn btn-primary"><i class="fa fa-thumbs-up"></i></button>
                         <?php elseif($row->accept_status == 0): ?>
                         <button type="button" onclick="acceptHandover('/<?php echo e($row->id); ?>')" class="btn btn-primary"><i class="fa fa-thumbs-up"></i></button>
                         <button type="button" onclick="declineHandover('<?php echo e($row->id); ?>')" class="btn btn-danger"><i class="fa fa-thumbs-down"></i></button>
                         <?php else: ?>

                          <?php endif; ?>
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
          <?php echo $datas->render();?>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-decline">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="decline-title">Decline Remarks</h4>
              </div>
              <form id="job-form" method="POST" action="<?php echo e(url('/supervisor/handover/decline')); ?>" class="form-horizontal" enctype="multipart/form-data">
                 <?php echo csrf_field(); ?>

               <input type="hidden" name="id" id="id" value="">
              <div class="modal-body">
               <div class="form-group">
                                      
                <div class="col-md-12">
                  <textarea class="form-control" name="description" placeholder="Description" required="required"></textarea>
                                          
                 </div>
                                        
              </div>
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

   <div class="modal fade" id="modal-remarks">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="remarks-title">Decline Remarks</h4>
              </div>
             
              <div class="modal-body" id="remarks_body">
              
               
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

 
     function acceptHandover(id){
    if(confirm('Are you sure you want to accept this?')){
      var url= "<?php echo e(url('/supervisor/handover/accept/')); ?>"+id;
      location = url;
      
      }
    }

     function declineHandover(id){
    if(confirm('Are you sure you want to decline this?')){
      $('#id').val(id);
      $('#modal-decline').modal('show');
      
      }
    }

     function viewAcceptStatus(id) {
      var remarks = $('#acpt_status_'+id).val();
      $('#remarks_body').html(remarks);
      $('#modal-remarks').modal('show');
    }
  </script>
  <script>
  $("#checkAll").click(function(){
    $('.checkItem:checkbox').not(this).prop('checked', this.checked);
  });
  $('#handoverApproveBtn').click(function(){
    var r = confirm("Do you want to approve selected?");
    if (r == true) {
      var ids = [];
      $("input[class=checkItem]:checked").each(function () {
        ids.push(this.value);
      });
      $.ajax({
          type: "POST",
          url: "<?php echo e(url('supervisor/handover/acceptAll')); ?>",
          data: "_token="+token+"&ids="+ids,
          cache: false,
          success: function(data){
            console.log(data)
            location.reload();
          },
          error: function(error){
            console.log(error)
          }
      });
    }
  })
 </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>