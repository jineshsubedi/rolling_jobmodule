@extends('branchadmin_master')
@section('heading')
Jobs
            <small>List of Jobs</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Jobs</li>
@stop
@section('content')
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
        <a href="{{ url('/branchadmin/jobs/addnew') }}" class="btn btn-primary right"><i class="fa fa-fw fa-plus"></i>Add New Jobs</a>
      </div>
     
      <div class="box">
            <div class="box-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                         <th>Job Title</th>
                          <th>Branch</th>
                          <th>Vacancy Code</th>
                          <th>Application Source</th>
                          <th>Status</th>
                          <th>Process Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td><input type="text" id="filter_title" value="{{$datas['filter_title']}}" class="form-control"></td>
                        <td>
                          <select class="form-control select2" id="filter_employer">
                            <option value="0">Select Branch</option>
                            @foreach($datas['branch'] as $branch)
                            @if($datas['filter_employer'] == $branch->id)
                            <option value="{{$branch->id}}" selected>{{$branch->name}}</option>
                            @else
                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                            @endif
                            @endforeach
                          </select>
                        </td>
                        <td><input type="text" id="filter_code" value="{{$datas['filter_code']}}" class="form-control"></td>

                        
                        <td></td>
                        <td><select class="form-control select2" id="filter_status">
                            <option value="0">Select Status</option>
                              @foreach($datas['status'] as $status) 
                                @if($datas['filter_status'] == $status['value'])
                                <option value="{{$status['value']}}" selected="selected">{{$status['title']}}</option>
                                @else
                                <option value="{{$status['value']}}">{{$status['title']}}</option>
                                @endif
                                @endforeach
                          </select></td>
                           <td><select class="form-control select2" id="filter_process">
                            <option value="0">Select Process</option>
                              @foreach($datas['process_status'] as $process_status) 
                                @if($datas['filter_process'] == $process_status->id)
                                <option value="{{$process_status->id}}" selected="selected">{{$process_status->title}}</option>
                                @else
                                <option value="{{$process_status->id}}">{{$process_status->title}}</option>
                                @endif
                                @endforeach
                          </select></td>
                        <td><a href="javascript:void(0);" onClick="filter()" class="btn btn-block btn-primary"><i class="fa fa-fw fa-search"></i></a></td>
                      </tr>
                      
                      <?php $i=1; 
                        foreach ($data as $row) { ?>
                          <tr>
                        <td><?php echo $i;?><span class="badge bg-red">{{\App\Jobs::countApplication($row->id)}}</span></td>
                        
                         <td><?php echo $row->title;?> <br/><span style="color:blue;">Todays Views: </span>{{\App\Counter::getTodayscount($row->id)}}<br/><span style="color:red;">Total Views:</span> {{\App\Counter::getCount($row->id)}}</td>
                          
                          <td>{{\App\Branch::gettitle($row->branch_id)}}</td>
                          <td>{{$row->vacancy_code}}</td>
                          
                          <td>
                            <?php $sources = \App\FormData::getSource($row->id); ?>
                             @if(count($sources) > 0)
                              <ul class="nav nav-stacked">
                               @foreach($sources as $view)
                              <li><a>{{$view['title']}} <span class="pull-right badge bg-blue">{{$view['total']}}</span></a></li>
                               @endforeach
                             
                            </ul>
                             @endif
                          </td>
                          <td>
                          @if($row->status == 1)
                          Active
                          @elseif($row->status == 2)
                          Disabled
                          @elseif($row->status == 3)
                          Pending
                          @else
                          @endif
                          </td>
                          <td>{{\App\RecruitmentProcess::getTitle($row->process_status)}}</td>
                        <td>
                          <div class="dropdown mobile-options">
                            <button class="btn btn-lg btn-primary dropdown-toggle " type="button" data-toggle="dropdown">
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{url('branchadmin/jobs/edit/'.$row->id)}}" class="btn btn-default btn-xs" title="Edit"><i class="fa fa-edit"></i>Edit</a></li>
                            <li><a href="{{url('branchadmin/jobs/application/'.$row->id)}}" class="btn btn-default btn-xs" title="view"><span class="badge bg-red">{{\App\Jobs::countApplication($row->id)}}</span>Application</a></li> 
                            <li><a href="{{url('branchadmin/jobs/view/'.$row->id)}}" class="btn btn-default btn-xs" title="view"><i class="fa fa-eye"></i>View</a></li>   
                            <li><a href="{{url('branchadmin/jobs/source/'.$row->id)}}" class="btn btn-default btn-xs" title="View Application Resource"><i class="fa fa-eye"></i>Application Resource</a></li>  
                            <!--<li><a href="{{ url('/branchadmin/jobs/makepdf/'.$row->id) }}" title="Make Pdf" class="btn btn-default btn-xs"><i class="fa fa-file-pdf-o"></i>PDF</a></li>
        <li> <a href="{{ url('/branchadmin/jobs/printprofile/'.$row->id) }}" target="_blank" title="Print Profile" class="btn btn-default btn-xs"><i class="fa fa-print"></i>Print</a></li>               -->   
                            <li><a href="javascript:void(0);" onClick="confirm_delete('/{{$row->id}}')" class="btn btn-default btn-xs" title="Delete Invoice"><i class="fa fa-fw fa-remove"></i>Delete</a></li>
                            <li><a href="{{url('branchadmin/jobs/downloadCV/'.$row->id)}}" class="btn btn-default btn-xs"><i class="fa fa-download"></i>Download All CV</a></li>
                            <li><a href="{{url('branchadmin/jobs/downloadCoverletter/'.$row->id)}}" class="btn btn-default btn-xs"><i class="fa fa-download"></i>Download Coverletters</a></li>
                            <li><a href="{{url('branchadmin/jobs/report/'.$row->id)}}" class="btn btn-default btn-xs" title="Edit"><i class="fa fa-edit"></i>Add/Edit Report</a></li>
                           
                            <li><a href="{{url('branchadmin/jobs/detail/'.$row->id)}}" class="btn btn-default btn-xs" title="Edit"><i class="fa fa-edit"></i>Add/Edit Detail</a></li>
                            </ul>
                            </div>


                         
                        </td>
                      </tr>
                      <?php $i++;  }

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
  
  <script type="text/javascript">
 function confirm_delete(ids){
    if(confirm('Do You Want To Delete This Job?')){
      var url= "{{ url('/branchadmin/jobs/delete/') }}"+ids;
      location = url;
      }
    }

  function filter(){
   var filter_title = $('#filter_title').val();
   var filter_code = $('#filter_code').val();
   
   var filter_employer = $('#filter_employer').val();
   
   var filter_status = $('#filter_status').val();
   var filter_process = $('#filter_process').val();
    var url= "{{ url('/branchadmin/jobs/?') }}";
   if (filter_title != '') {
      url += '&filter_title='+filter_title;
   }
   if (filter_code != '') {
      url += '&filter_code='+filter_code;
   }
   
   if (filter_employer != '0') {
      url += '&filter_employer='+filter_employer;
   }
   
    if (filter_status != '0') {
      url += '&filter_status='+filter_status;
    }
    if (filter_process != '0') {
      url += '&filter_process='+filter_process;
    }
   location = url;

  }
 </script>
 <script type="text/javascript">
$(function() {
 
  $(".select2").select2({ width: '100%' });
});


</script>
@stop()