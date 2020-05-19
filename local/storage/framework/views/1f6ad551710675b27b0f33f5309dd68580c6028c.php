<?php $__env->startSection('heading'); ?>
Leave Request
            <small>List of Leave Request</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Leave Request</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-md-12">
        <a href="<?php echo e(url('/branchadmin/leavetemp/addnew')); ?>" class="btn refreshbtn right btm10m"><i class="fa fa-plus-circle"></i> Add New Leave Request</a>
      </div>
      </div>
     
      <div class="box">
            <div class="box-body">
               
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th> Requested By</th>
                        <th> Leave From</th>
                        <th> Leave To</th>
                        <th> Duration</th>
                       
                        
                       
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                       <tr>
                        <th></th>
                        <th><input type="text" name="staffs" id="staffs" class="form-control" value="<?php echo e(\App\Adjustment_staff::getName($data['filter_staff'])); ?>"><input type="hidden" id="filter_staff" value="<?php echo e($data['filter_staff']); ?>"></th>
                        <th><input type="text" id="filter_from" class="form-control datepicker" value="<?php echo e($data['filter_from']); ?>"></th>
                        <th><input type="text" id="filter_to" class="form-control datepicker" value="<?php echo e($data['filter_to']); ?>"></th>
                        <th> </th>
                        
                         
                       
                        <th><a class="btn btn-primary" onClick="filterData()"><i class="fa fa-search"></i>Filter</a></th>
                      </tr>
                       <?php if(count($data['all_request']) > 0): ?>
                      <?php $i=1; 
                        foreach ($data['all_request'] as $allrequest) { 
                         
                          
                          
                          ?>
                          <tr>
                        <td><?php echo $i++ ;?> <input type="hidden" id="detail_<?php echo e($allrequest->id); ?>" value="<?php echo e($allrequest->description); ?>"></td>
                        <td><?php echo \App\Adjustment_staff::getName($allrequest->requested_by).' ('. \App\LeaveType::getTitle($allrequest->leave_type).') ';?> <b>(<?php echo e($allrequest->types == 1 ? "Unpaid" : "Paid"); ?>)</b></td>
                        <td><?php echo $allrequest->start_date;?></td>
                        <td><?php echo $allrequest->end_date;?></td>
                        <td><?php echo \App\LeaveRequest::getDuration($allrequest->leave_type,$allrequest->full_day,$allrequest->duration,$allrequest->start_date,$allrequest->end_date);?></td>
                        
                        
                        <td>
                       
                          <a href="<?php echo e(url('/branchadmin/leavetemp/edit/'.$allrequest->id)); ?>" class="btn btn-primary left"><i class="fa fa-edit"></i></a>
                          <a href="javascript:void(0);" onClick="confirm_delete('/<?php echo e($allrequest->id); ?>')" class="btn btn-danger left"><i class="fa fa-fw fa-remove"></i></a>
                          
                          </td>
                      </tr>
                      <?php  } ?>
                      <?php else: ?>
                      <tr><td colspan="8">
                <div class="alert alert-info">Sorry No Request Found</div>
              </td>
            </tr>
                <?php endif; ?>
                      </tbody>

                    </table>
                
               <div class="row">
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_simple_numbers right">
          <?php echo $data['all_request']->render();?>
      </div>
    </div>
  </div>
          </div><!-- /.box-body -->
      </div>
    </div>
  <div>

  <div>
  </div>

  <div class="modal fade" id="modal-otherstaff">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="otherstaff-title">Other Staffs</h4>
              </div>
              <form id="job-form" method="POST" action="<?php echo e(url('/branchadmin/leavetemp/updatehandover')); ?>" class="form-horizontal" enctype="multipart/form-data">
                 <?php echo csrf_field(); ?>

               <input type="hidden" name="id" id="leave_id" value="">
              <div class="modal-body">
               <div class="form-group">
                                      
                <div class="col-md-12">
                  <select class="form-control" name="otherstaff" id="otherstaff">
                    
                  </select>
                                          
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

  <div class="modal fade" id="modal-decline">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="decline-title">Decline Remarks</h4>
              </div>
              <form id="decline_form" method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
                 <?php echo csrf_field(); ?>

               <input type="hidden" name="id" id="decline_id" value="">
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
  
  <script type="text/javascript">

 
     function confirm_delete(ids){
    if(confirm('Do You Want To Delete This Album?')){
      var url= "<?php echo e(url('/branchadmin/leavetemp/delete/')); ?>"+ids;
      location = url;
      
      }
    }

    function viewRemarks(id) {
      var remarks = $('#su_rem_'+id).val();
      $('#remarks_body').html(remarks);
      $('#remarks-title').html('Decline Remarks');
      $('#modal-remarks').modal('show');
    }

    function viewStatus(id) {
      var remarks = $('#status_'+id).val();
      $('#remarks_body').html(remarks);
      $('#remarks-title').html('Decline Remarks');
      $('#modal-remarks').modal('show');
    }

    function addHandover(id) {
       var token = $('input[name=\'_token\']').val();
        $.ajax({
             type: 'POST',
                url: '<?php echo e(url("/branchadmin/leavetemp/getStaffs")); ?>',
                data: '_token='+token+'&id='+id,
                cache: false,
                success: function(html){
                  $('#leave_id').val(id);
                  $('#otherstaff').html(html);
                  $('#modal-otherstaff').modal('show');
                   
                }
          });
      
    }

    function viewDetail(id) {
      
       var remarks = $('#detail_'+id).val();
      $('#remarks_body').html(remarks);
      $('#remarks-title').html('Description');
      $('#modal-remarks').modal('show');
    }



    function SUApprove(id){
    if(confirm('Are you sure you want to Approve this?')){
      var url= "<?php echo e(url('/branchadmin/leavetemp/supervisor_approve/')); ?>"+id;
      location = url;
      
      }
    }

    function HRApprove(id){
    if(confirm('Are you sure you want to Approve this?')){
      var url= "<?php echo e(url('/branchadmin/leavetemp/hr_approve/')); ?>"+id;
      location = url;
      
      }
    }

     function SUdecline(id){
    if(confirm('Are you sure you want to decline this?')){
      $('#decline_id').val(id);
      $('#decline_form').attr('action','<?php echo e(url("/branchadmin/leavetemp/supervisor_decline")); ?>')
      $('#modal-decline').modal('show');
      
      }
    }

    function HRdecline(id){
    if(confirm('Are you sure you want to decline this?')){
      $('#decline_id').val(id);
      $('#decline_form').attr('action','<?php echo e(url("/branchadmin/leavetemp/hr_decline")); ?>')
      $('#modal-decline').modal('show');
      
      }
    }


     function filterData(){
        var url= "<?php echo e(url('/branchadmin/leavetemp/?')); ?>";
        
        var filter_staff=$('#filter_staff').val();
        var filter_from=$('#filter_from').val();
        var filter_to=$('#filter_to').val();
        var approved=$('#approved').val();
        
        if(filter_staff != '') {

          url += '&filter_staff='+filter_staff
        }
         if(filter_from != 0) {

          url += '&filter_from='+filter_from
        }

        if(filter_to != 0) {

          url += '&filter_to='+filter_to
        }

        if(approved != 0) {

          url += '&approved='+approved
        }
        
        location = url;

      }
  </script>

  <script type="text/javascript">

 $(function() {

  $('.datepicker').datepicker();
  
});
</script>

<script type="text/javascript">
  $('input[name=\'staffs\']').autocomplete({

    source: '<?php echo e(url("branchadmin/staffs/autocomplete/")); ?>',
          minlength:1,
          autoFocus:true,
          select:function(e,ui){
            $('#filter_staff').val(ui.item.id);
            var url= "<?php echo e(url('/branchadmin/leavetemp/?')); ?>";
            

                url += '&filter_staff='+ui.item.id
             location = url;
          }

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>