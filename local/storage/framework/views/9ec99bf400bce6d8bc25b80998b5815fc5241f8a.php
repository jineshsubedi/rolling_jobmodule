<?php $__env->startSection('heading'); ?>
Compensatory Off
            <small>Compensatory Off</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Compensatory Off</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
     
      <div class="row">
        <div class="col-md-12"><a href="<?php echo e(url('branchadmin/compensatory/addnew')); ?>" class="btn refreshbtn right btm10m"><i class="fa fa-plus-circle"></i> Compensatory Request</a></div>
      </div>
     
      <div class="box">
            <div class="box-body">
            <div id="FilterDiv" class="filter-results rounded-item panel panel-default listing-filters">
  
                
                  <div class="panel-body ">
                  
                    <div class="default-options-search">
                         <div class="form-group col-md-2">
                            <label >Requested By</label>
                              <input type="text" class="form-control " id="staffs" value="<?php echo e(\App\Adjustment_staff::getName($datas['filter_staff'])); ?>">
                              <input type="hidden" id="filter_staff" value="<?php echo e($datas['filter_staff']); ?>">
                          </div>
                        <div class="form-group col-md-2">
                            <label >Date From</label>
                              <input type="text" class="form-control datepicker" id="filter_from" value="<?php echo e($datas['filter_from']); ?>">
                          </div>
                          <div class="form-group col-md-2">
                            <label >Date To</label>
                              <input type="text" class="form-control datepicker" id="filter_to" value="<?php echo e($datas['filter_to']); ?>">
                          </div>

                         <div class="form-group col-md-2">
                            <label >Status</label>
                              <select class="form-control" id="filter_status">
                                
                                <?php foreach($datas['status'] as $status): ?>
                                  <?php if($status['value'] == $datas['filter_status']): ?>
                                  <option selected="selected" value="<?php echo e($status['value']); ?>"><?php echo e($status['title']); ?></option>
                                  <?php else: ?>
                                  <option value="<?php echo e($status['value']); ?>"><?php echo e($status['title']); ?></option>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group col-md-2">
                            <a class="btn btn-success btn-addon" id="filter-button" style="margin-top: 25px;"><i class="fa fa-check"></i> Filter</a>
                                  
                        </div>
                          
                      </div>
                      <div style="display:none;" class="more-options-search">
                      
                      
                      </div>
                      
                  
                </div>
                <div class="clear"></div>
              </div>
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab-all" data-toggle="tab">All</a></li>
                <li><a href="#tab-your" data-toggle="tab">Your Requests</a></li>
                <li><a href="#tab-supervisor" data-toggle="tab">Approval Waiting</a></li>
                
               
              </ul>
              <div class="tab-content">
              <div class="tab-pane active" id="tab-all">
                       
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th>Requested By</th>
                        <th>Date</th>
                        <th>Reason</th>
                        
                      <th>Inform To</th>
                      <th>Approval</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      
                      <?php $i=1; 
                        foreach ($datas['all'] as $all) { ?>
                          <tr>
                        <td><?php echo $i++ ;?><input type="hidden" id="rem_<?php echo e($all->id); ?>" value="<?php echo e($all->remarks); ?>"></td>
                       
                        
                       <td><?php echo \App\Adjustment_staff::getName($all->requested_by);?></td>
                        <td><?php echo $all->work_day;?></td>
                        <td><?php echo $all->reason;?></td>
                       
                      
                       <td><?php echo \App\Adjustment_staff::getName($all->inform_to);?></td>
                       <td><?php echo \App\CompensatoryOff::getStatus($all->id,$all->status);?></td>
                        <td>
                          <?php if($all->requested_by == auth()->guard('staffs')->user()->id && $all->status == 0): ?>
                          <a href="<?php echo e(url('/branchadmin/compensatory/edit/'.$all->id)); ?>" class="btn btn-primary left"><i class="fa fa-edit"></i></a>
                          <a  href="javascript:void(0);" onClick="confirm_delete('/<?php echo e($all->id); ?>')" class="btn btn-danger left"><i class="fa fa-fw fa-remove"></i></a>
                          <?php elseif($all->inform_to == auth()->guard('staffs')->user()->id): ?>
                            <?php if($all->status == 1): ?>
                          
                            <a href="javascript:void(0);" onClick="decline('<?php echo e($all->id); ?>')" class="btn btn-danger left">Decline</a>
                            <?php elseif($all->status == 2): ?>
                            <a href="javascript:void(0);" onClick="approve('<?php echo e($all->id); ?>')" class="btn btn-success left">Approve</a>
                            <?php else: ?>
                             <a href="javascript:void(0);" onClick="approve('<?php echo e($all->id); ?>')" class="btn btn-success left">Approve</a>
                            <a href="javascript:void(0);" onClick="decline('<?php echo e($all->id); ?>')" class="btn btn-danger left">Decline</a>
                            <?php endif; ?>
                            <?php else: ?>
                          <?php endif; ?>
                         
                        </td>
                      </tr>
                      <?php  }

                      ?>
                      </tbody>
                     

                    </table>
                    <div class="row">
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_simple_numbers right">
          <?php echo $datas['all']->render();?> 
      </div>
    </div>
  </div>
            </div>
            <div class="tab-pane" id="tab-your">
                       
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th>Requested By</th>
                        <th>Date</th>
                        <th>Reason</th>
                        
                      <th>Inform To</th>
                      <th>Approval</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      
                      <?php $i=1; 
                        foreach ($datas['compensatory'] as $row) { ?>
                          <tr>
                        <td><?php echo $i++ ;?><input type="hidden" id="rem_<?php echo e($row->id); ?>" value="<?php echo e($row->remarks); ?>"></td>
                       
                        
                       <td><?php echo \App\Adjustment_staff::getName($row->requested_by);?></td>
                        <td><?php echo $row->work_day;?></td>
                        <td><?php echo $row->reason;?></td>
                       
                      
                       <td><?php echo \App\Adjustment_staff::getName($row->inform_to);?></td>
                       <td><?php echo \App\CompensatoryOff::getStatus($row->id,$row->status);?></td>
                        <td>
                          <?php if($row->status == 0): ?>
                          <a href="<?php echo e(url('/branchadmin/compensatory/edit/'.$row->id)); ?>" class="btn btn-primary left"><i class="fa fa-edit"></i></a>
                          <a  href="javascript:void(0);" onClick="confirm_delete('/<?php echo e($row->id); ?>')" class="btn btn-danger left"><i class="fa fa-fw fa-remove"></i></a>

                          <?php endif; ?>
                         
                        </td>
                      </tr>
                      <?php  }

                      ?>
                      </tbody>
                     

                    </table>
                    <div class="row">
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_simple_numbers right">
          <?php echo $datas['compensatory']->render();?> 
      </div>
    </div>
  </div>
            </div>
            
            <div class="tab-pane" id="tab-supervisor">
              <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th>Requested By</th>
                        <th>Date</th>
                        <th>Reason</th>
                        
                      <th>Inform To</th>
                      <th>Approval</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      
                      <?php $i=1; 
                        foreach ($datas['requested'] as $row) { ?>
                          <tr>
                        <td><?php echo $i++ ;?><input type="hidden" id="rem_<?php echo e($row->id); ?>" value="<?php echo e($row->remarks); ?>"></td>
                       
                        
                       <td><?php echo \App\Adjustment_staff::getName($row->requested_by);?></td>
                        <td><?php echo $row->work_day;?></td>
                        <td><?php echo $row->reason;?></td>
                       
                      
                       <td><?php echo \App\Adjustment_staff::getName($row->inform_to);?></td>
                       <td><?php echo \App\CompensatoryOff::getStatus($row->id,$row->status);?></td>
                        <td>
                         
                          
                            <a href="javascript:void(0);" onClick="approve('<?php echo e($row->id); ?>')" class="btn btn-success left">Approve</a>
                            <a href="javascript:void(0);" onClick="decline('<?php echo e($row->id); ?>')" class="btn btn-danger left">Decline</a>
                         
                        </td>
                      </tr>
                      <?php  }

                      ?>
                      </tbody>
                     

                    </table>
                    
                    <div class="row">
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_simple_numbers right">
          <?php echo $datas['requested']->render();?> 
      </div>
    </div>
  </div>
            </div>

          </div><!-- /.box-body -->
      </div>
    </div>
  <div>

  <div>
  </div>
  

   <div class="modal fade" id="modal-decline">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="decline-title">Decline Remarks</h4>
              </div>
              <form id="decline_form" method="POST" action="<?php echo e(url('/branchadmin/compensatory/decline')); ?>" class="form-horizontal" enctype="multipart/form-data">
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

 
      function confirm_delete(ids){
    if(confirm('Do You Want To Delete This data?')){
      var url= "<?php echo e(url('/branchadmin/compensatory/delete/')); ?>"+ids;
      location = url;
      
      }
    }
    
     function viewRemarks(id) {
       var remarks = $('#rem_'+id).val();
      $('#remarks_body').html(remarks);
      $('#remarks-title').html('Description');
      $('#modal-remarks').modal('show');
    }

     function approve(ids){
    if(confirm('Do You Want To Approve This Compensatory Off?')){
      var url= "<?php echo e(url('/branchadmin/compensatory/approve/')); ?>/"+ids;
      location = url;
      
      }
    }
  
       function decline(id){
      if(confirm('Are you sure you want to decline this?')){
        $('#decline_id').val(id);
        
        $('#modal-decline').modal('show');
        
        }
      }
  </script>
  <script type="text/javascript">
   $(function () {
    
    $('.datepicker').datepicker({
        onSelect: function(date) {
            
          var filter_from = $('#filter_from').val();
          var filter_to = $('#filter_to').val();
          var filter_staff = $('#filter_staff').val();
          var filter_status = $('#filter_status').val();
          var url = '<?php echo e(url("branchadmin/compensatory/")); ?>?';
          if (filter_staff != '') {
            url += 'filter_staff='+filter_staff;
          }
          if (filter_from != '') {
              url += '&filter_from='+filter_from;
             }
             if (filter_to != '') {
              url += '&filter_to='+filter_to;
             }
             if (filter_status != '') {
              url += '&filter_status='+filter_status;
             }
            location = url;


           
        }
    });
});
 </script>

 <script type="text/javascript">
   $('#filter-button').click(function(){
   
          var filter_from = $('#filter_from').val();
          var filter_to = $('#filter_to').val();
          var filter_staff = $('#filter_staff').val();
          var filter_status = $('#filter_status').val();
          var url = '<?php echo e(url("branchadmin/compensatory/")); ?>?';
          if (filter_staff != '') {
            url += 'filter_staff='+filter_staff;
          }
          if (filter_from != '') {
              url += '&filter_from='+filter_from;
             }
             if (filter_to != '') {
              url += '&filter_to='+filter_to;
             }
             if (filter_status != '') {
              url += '&filter_status='+filter_status;
             }
            location = url;
   })


    $('#staffs').autocomplete({

    source: '<?php echo e(url("branchadmin/staffs/autocomplete/")); ?>',
          minlength:1,
          autoFocus:true,
          select:function(e,ui){
            var filter_from = $('#filter_from').val();
            var filter_to = $('#filter_to').val();
            var filter_status = $('#filter_status').val();
            var url = '<?php echo e(url("branchadmin/compensatory/")); ?>?';
             url += 'filter_staff='+ui.item.id;
             if (filter_from != '') {
              url += '&filter_from='+filter_from;
             }
             if (filter_to != '') {
              url += '&filter_to='+filter_to;
             }
             if (filter_status != '') {
              url += '&filter_status='+filter_status;
             }
            location = url;
            
             
          }
    });
 </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>