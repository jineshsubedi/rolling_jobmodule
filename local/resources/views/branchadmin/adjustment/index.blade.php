@extends('branchadmin_master')
@section('heading')
Staff's
            <small>Adjustment Request</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Adjustment Request</li>
@stop
@section('content')
 <div class="row">
    <div class="col-xs-12">
     
      
     
      <div class="box">
            <div class="box-body">
            <div id="FilterDiv" class="filter-results rounded-item panel panel-default listing-filters">
  
                
                  <div class="panel-body ">
                  
                    <div class="default-options-search">
                        <div class="form-group col-md-2">
                            <label >Informed To</label>
                              <select class="form-control"  id="filter_supervisor">
                                <option value="">Select Staff</option>
                                @foreach($datas['supervisors'] as $supervisor)
                                  @if($supervisor['id'] == $datas['filter_supervisor'])
                                  <option selected="selected" value="{{$supervisor['id']}}">{{$supervisor['name']}}</option>
                                  @else
                                  <option value="{{$supervisor['id']}}">{{$supervisor['name']}}</option>
                                  @endif
                                @endforeach
                              </select>
                          </div>
                          <div class="form-group col-md-2">
                            <label >Name</label>
                              <select class="form-control"  id="filter_name">
                                <option value="">Select Staff</option>
                                @foreach($datas['staffs'] as $staff)
                                  @if($staff['id'] == $datas['filter_name'])
                                  <option selected="selected" value="{{$staff['id']}}">{{$staff['name']}}</option>
                                  @else
                                  <option value="{{$staff['id']}}">{{$staff['name']}}</option>
                                  @endif
                                @endforeach
                              </select>
                          </div>
                            <div class="form-group col-md-2">
                            <label >Status</label>
                              <select class="form-control"  id="filter_status">
                               
                                @foreach($datas['status'] as $status)
                                  @if($status['value'] == $datas['filter_status'])
                                  <option selected="selected" value="{{$status['value']}}">{{$status['title']}}</option>
                                  @else
                                  <option value="{{$status['value']}}">{{$status['title']}}</option>
                                  @endif
                                @endforeach
                              </select>
                          </div>
                          <div class="form-group col-md-2">
                            <label >Date From</label>
                              <input type="text" class="form-control datepicker" id="filter_from" value="{{$datas['filter_from']}}">
                          </div>
                          <div class="form-group col-md-2">
                            <label >Date To</label>
                              <input type="text" class="form-control datepicker" id="filter_to" value="{{$datas['filter_to']}}">
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
                       
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>Login Time</th>
                        <th>Logout Time</th>
                       <th>Adjustment Reason</th>
                       <th>Time To Be Adjusted</th>
                       <th>Informed To</th>
                      <th width="300">Remarks</th>
                      <th>Approval</th>
                        <th width="250">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                     
                      
                      <?php $i=1; 
                        foreach ($datas['adjustments'] as $row) { ?>
                          <tr>
                        <td><?php echo $i++ ;?></td>
                       
                        <td><?php echo \App\Adjustment_staff::getName($row->adjustment_staff_id);?><input type="hidden" id="reason_{{$row->id}}" value="{{$row->r_reason}}"></td>
                       <td><?php echo $row->login_time;?></td>
                        <td><?php echo $row->logout_time;?></td>
                       <td><?php echo \App\Adjustmentreason::getTitle($row->adjustment_reason); ?></td>
                       <td><?php echo $row->time_to_be_adjusted;?></td>
                       <td><?php echo \App\Adjustment_staff::getName($row->informed_personnel);?></td>
                       <td><?php echo $row->remarks;?></td>
                       <td><?php echo \App\Adjustmentrequest::getStatus($row->status);?> @if($row->status == 4 || $row->status == 3)
                       <small class="label bg-yellow" style="cursor:pointer;" onclick="viewReason({{$row->id}})">Reason</small>
                       @endif</td>
                        <td>
                          
                          
                          <a  href="javascript:void(0);" onClick="confirm_delete('/{{$row->id}}')" class="btn btn-danger left"><i class="fa fa-fw fa-remove"></i></a>
                          <a  href="javascript:void(0);" onClick="confirm_approve('/{{$row->id}}')" class="btn btn-primary left">Approve</a>
                          <a  href="javascript:void(0);" onClick="confirm_dismiss('{{$row->id}}')" class="btn btn-warning left">Dismiss</a>
                          
                        </td>
                      </tr>
                      <?php  }

                      ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="10"><button class="btn btn-primary" onclick="exportData();"><i class="fa fa-fw fa-download"></i>Download Data</button></td>
                        </tr>
                      </tfoot>

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
           <?php echo $datas['adjustments']->render();?> 
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="modal-dismiss">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"  id="edit-kpa-title">Dismiss Reason</h4>
              </div>
              <form id="dismiss-form" method="POST" action="{{ url('/branchadmin/adjustment/dismiss/') }}" class="form-horizontal" enctype="multipart/form-data">
              <div class="modal-body">
                
                  {!! csrf_field() !!}
              
               <input type="hidden" name="id" id="adjustment_id" value="">
               <div class="form-group">
                 <label class="control-label col-md-12" style="text-align:left;">Reason</label>
                      <div class="col-md-12">
                          <textarea class="form-control" name="reason"   required="required"> </textarea></div>            
               </div>
              
              </div>
              <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  <script type="text/javascript">

 
      function confirm_delete(ids){
    if(confirm('Do You Want To Delete This data?')){
      var url= "{{ url('/branchadmin/adjustment/delete/') }}"+ids;
      location = url;
      
      }
    }
  
       
      function confirm_approve(ids){
    if(confirm('Do You Want To Approve This Request?')){
      var url= "{{ url('/branchadmin/adjustment/approve/') }}"+ids;
      location = url;
      
      }
    }


      function confirm_dismiss(ids){
    if(confirm('Do You Want To Dismiss This Request?')){
        $('#adjustment_id').val(ids);
      
        $('#modal-dismiss').modal('show');
      }
    }
  </script>

  <script type="text/javascript">
   $(function () {
    
    $('.datepicker').datepicker();
});
 </script>

  <script type="text/javascript">
   $('#filter-button').click(function(){
     var filter_supervisor = $('#filter_supervisor').val();
    var filter_name = $('#filter_name').val();
    var filter_from = $('#filter_from').val();
    var filter_to = $('#filter_to').val();
    var filter_status = $('#filter_status').val();
    var url = '{{url("branchadmin/adjustment?")}}';
    
    if (filter_supervisor != '') {
      url += '&filter_supervisor='+filter_supervisor;
    }
    if (filter_name != '') {
      url += '&filter_name='+filter_name;
    }
    if (filter_status != '') {
      url += '&filter_status='+filter_status;
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
 
  <script type="text/javascript">
   $('#filter_supervisor').on('change', function(){
    var url = '{{url("branchadmin/adjustment?")}}';
    var filter_supervisor = $(this).val();
    if (filter_supervisor != '') {
      url += '&filter_supervisor='+filter_supervisor;
    }
    location = url;
   })
 </script>
 <script type="text/javascript">
   function exportData(){
    if(confirm('Do You Want To Download Data?')){
      var url= "<?php echo url('/branchadmin/adjustment/export-data/?'.$datas['url']);?>";
      location = url;
      
      }
    }
 </script>
 
 <div class="modal fade" id="modal-reason">
          <div class="modal-dialog kpa_add">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" >Reason</h4>
              </div>
              
              <div class="modal-body" id="reason_body">
                
               
              
              </div>
             
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        
<script type="text/javascript">
    function viewReason(id)
    {
        var reason = $('#reason_'+id).val();
        
        $('#reason_body').html(reason);
        $('#modal-reason').modal('show');
    }
</script>
@stop()