@extends('branchadmin_master')
@section('heading')
Selected Application for Final Interview
            <small>List of Selected Application for Final Interview</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Selected Application for Group Discussion</li>
@stop
@section('content')
 <div class="row">
    <div class="col-xs-12">
      
     
      <div class="box">
            <div class="box-body">
              <div class="panel-heading">
      <div class="top-links btn-group">
        
        <a href="{{ url('/branchadmin/jobs/application/'.$datas['job_id']) }}" class="btn btn-default">All Application ({{\App\Employee::countAllApplicant($datas['job_id'])}})</a>
         <a href="{{ url('/branchadmin/jobs/verification/'.$datas['job_id']) }}" class="btn btn-default">Document Verification ({{\App\Employee::countDocumentVerification($datas['job_id'])}})</a>
        <a href="{{ url('/branchadmin/jobs/written/'.$datas['job_id']) }}" class="btn btn-default">Written Exam ({{\App\Employee::countWrittenExam($datas['job_id'])}})</a>
        <a href="{{ url('/branchadmin/jobs/discussion/'.$datas['job_id']) }}" class="btn btn-default">Group Discussion ({{\App\Employee::countGroup($datas['job_id'])}})</a>
        <a href="{{ url('/branchadmin/jobs/interview/'.$datas['job_id']) }}" class="btn btn-success">Final Interview ({{\App\Employee::countInterview($datas['job_id'])}})</a>
        <a href="{{ url('/branchadmin/jobs/selected/'.$datas['job_id']) }}" class="btn btn-default">Selected Candidates ({{\App\Employee::countSelected($datas['job_id'])}})</a>

        
        
        
        </div>
    </div>
     @if(count($errors))
                <div class="row">
            <div class="col-xs-12">
            <div class="alert alert-danger">
             @foreach($errors->all() as $error)
              {{ '* : '.$error }}</br>
             @endforeach
                </div>
            </div>

          </div>
       @endif
{{-- @if(Auth::guard('staffs')->user()->user_type === 1) --}}
<link rel="stylesheet" href="{{asset('/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
   <div class="row">
      <div class="col-md-12">
      <div class="box box-success collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Job Status Update</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
               
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              
                <div class="col-md-12">
                
                <div class="row-detail report-row">
      <form class="form-horizontal" enctype="multipart/form-data" role="form" id="testform" method="POST" action="{{ url('/branchadmin/jobs/updatestatus') }}">
                       
                        <input type="hidden" name="jobs_id" value="{{$datas['jobs_id']}}">
                        {!! csrf_field() !!}
                        
                        
                       
                         <div class="col-md-12">
                            <div class="form-group {{$errors->has('status') ? ' has-error' : ''}}">
                                <label class="label-control required col-md-2 text-center">Job Status</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="status">
                                        @foreach($datas['process_status'] as $status)
                                        @if($datas['status'] == $status->id)
                                        <option selected="selected" value="{{$status->id}}">{{$status->title}}</option>
                                        @else
                                        <option value="{{$status->id}}">{{$status->title}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                      
                                
                               
                          
 <button type="submit" class="btn btn-primary report-submit" >
                                    <i class="fa fa-fw fa-save"></i>Update
                                </button>
      </form>
    </div>
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
             
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
        </div>
    </div>






    <div class="row">
      <div class="col-md-12">
      <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Event Update</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
               
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              
                <div class="col-md-12">
                
                <div class="row-detail report-row">
      <form class="form-horizontal" enctype="multipart/form-data" role="form" id="testform" method="POST" action="{{ url('/branchadmin/jobs/eventupdate') }}">
                       
                        <input type="hidden" name="jobs_id" value="{{$datas['jobs_id']}}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="detail_id" value="{{$datas['report']['id']}}">
                        <input type="hidden" name="detail_type" value="{{$datas['report']['detail_type']}}">
                        <input type="hidden" name="page" value="verification">
                        
                       
                          <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="label-control required col-md-12 text-center">Event Date</label>
                                        <div class="col-md-12">
                                             <input type="text" name="detail_date" class="form-control date" value="{{$datas['report']['detail_date']}}">
                                   
                                        </div>
                                    </div>
                                      <div class="form-group">
                                        <label class="label-control required col-md-12 text-center">Event Time</label>
                                        <div class="col-md-12">
                                             <input type="text" name="detail_time" class="form-control" value="{{$datas['report']['detail_time']}}">
                                   
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control required col-md-12 text-center">Event Venue</label>
                                        <div class="col-md-12">
                                             <input type="text" name="detail_venue" class="form-control" value="{{$datas['report']['detail_venue']}}">
                                   
                                        </div>
                                    </div>
                                </div>
                        <div class="col-md-9">
                                    <div class="form-group ">
                                        <label class="label-control required col-md-12 text-center">Description</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="description">{{$datas['report']['description']}}</textarea>
                                  
                                        </div>
                                    </div>
                                </div>
                        
                      
                                
                               
                          
 <button type="submit" class="btn btn-primary report-submit" >
                                    <i class="fa fa-fw fa-save"></i>Update
                                </button>
      </form>
    </div>
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
             
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
        </div>
    </div>





    <div class="row">
      <div class="col-md-12">
      <div class="box box-danger collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Application Tracking System Update</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
               
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              
                <div class="col-md-12">
                
                <div class="row-detail report-row">
      <form class="form-horizontal" enctype="multipart/form-data" role="form" id="testform" method="POST" action="{{ url('/branchadmin/jobs/atsupdate') }}">
                       
                        <input type="hidden" name="jobs_id" value="{{$datas['jobs_id']}}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="detail_id" value="{{$datas['report']['id']}}">
                        <input type="hidden" name="detail_type" value="{{$datas['report']['detail_type']}}">
                        <input type="hidden" name="page" value="verification">
                        
                       
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="label-control col-md-12 text-center">Success Message</label>
                                        <div class="col-md-12">
                                              <textarea rows="8" class="form-control" id="success_message" name="success_message">{{$datas['report']['success_message']}}</textarea>
                                    <script>
                                             CKEDITOR.replace('success_message',
                                                    {
                                                                  filebrowserBrowseUrl : '{{ url("assets/ckfinder/ckfinder.html")}}',
                                                                  filebrowserImageBrowseUrl : '{{ url("assets/ckfinder/ckfinder.html?type=Images")}}',
                                                                  filebrowserFlashBrowseUrl : '{{ url("assets/ckfinder/ckfinder.html?type=Flash")}}',
                                                                  filebrowserUploadUrl : 
                                                '{{ url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files")}}',
                                                                  filebrowserImageUploadUrl : 
                                                '{{ url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images")}}',
                                                                  filebrowserFlashUploadUrl : '{{ url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash")}}',
                                                                  enterMode: CKEDITOR.ENTER_BR
                                                                 } 
                                                    
                                                    );
                                                    </script>
                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="label-control col-md-12 text-center">Regret Message</label>
                                        <div class="col-md-12">
                                             <textarea rows="8" class="form-control" name="error_message">{!! $datas['report']['error_message'] !!}</textarea>
                                    
                                        </div>
                                    </div>
                                </div>
                        
                        
                      
                                
                               
                          
 <button type="submit" class="btn btn-primary report-submit" >
                                    <i class="fa fa-fw fa-save"></i>Update
                                </button>
      </form>
    </div>
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
             
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
        </div>
    </div>

    <div class="row">
      <div class="col-md-12">
      <div class="box box-info collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Upload Applicants</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
               
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              
                <div class="col-md-12">
                
                <div class="row-detail report-row">
                
                <div class="row">
              <form class="form-horizontal" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" action="{{ url('/branchadmin/jobs/upload_interview') }}">
                <input type="hidden" name="jobs_id" value="{{$datas['job_id']}}">
              {!! csrf_field() !!}
              <div class="col-md-4">
                <div class="form-group{{ $errors->has('upload_file') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Select CSV File</label>

                            <div class="col-md-9">
                            
                           <input type="file" required name="upload_file" class="form-control" >
                              
                             @if ($errors->has('upload_file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('upload_file') }}</strong>
                                    </span>
                                @endif
                               
                            </div>
                        </div>
              </div>
               <div class="col-md-4">
                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-fw fa-save"></i>Upload
                                </button>
              </div>
              
              <div class="col-md-4"><a href="{{url('image/sample.csv')}}" class="btn btn-success" title="Download Sample File" download>Sample File</a></div>
            </form>
          </div>
      
    </div>
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
             
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
        </div>
    </div>
    <script src="{{asset('/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
  $(function () {
   $('.date').datepicker();
    //bootstrap WYSIHTML5 - text editor
    $('#textarea').wysihtml5()
  })
</script>
{{-- @endif --}}
    
               <form class="form-horizontal" role="form" id="testform" method="POST" action="{{ url('/branchadmin/jobs/update_interview') }}">
                {!! csrf_field() !!}
                <input type="hidden" name="job_id" value="{{$datas['job_id']}}">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style="width: 5%;">S.N.<input type="checkbox" name="chkall" onclick="chkAll('employee_id[]',this.checked)"></th>
                        <th>ID</th>
                        <th>Code</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Symbol Number</th>
                          
                          <th>Participation Status</th>
                          <th>Presentation Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td></td>
                        <td><input type="text" id="filter_id" value="{{$datas['filter_id']}}" class="form-control"></td>
                        <td></td>
                        <td><input type="text" id="filter_name" value="{{$datas['filter_name']}}" class="form-control"></td>
                        <td><input type="text" id="filter_email" value="{{$datas['filter_email']}}" class="form-control"></td>
                        <td><input type="text" id="filter_symbol_no" value="{{$datas['filter_symbol_no']}}" class="form-control"></td>
                        <td></td>
                        <td></td>
                        <td><a href="javascript:void(0);" onClick="filter()" class="btn btn-black"><i class="fa fa-fw fa-search"></i></a></td>
                      </tr>
                      
                      <?php $i=1; 
                        foreach ($datas['employees'] as $row) { ?>
                          <tr>
                        <td><?php echo $i;?><input type="checkbox" name="employee_id[]" value="{{$row->id}}" /></td>
                       <td>{{$row->id}}</td>
                       <td>{{$row->tracking_code}}</td>
                         <td><a href="{{url('branchadmin/jobs/application/view/'.$row->id)}}" target="_blank">{{\App\Employees::getFullname($row->firstname,$row->middlename,$row->lastname)}}</a></td>
                          <td>{{$row->email}}</td>
                          
                          <td>{{$row->symbol_no}}</td>
                           <td>{{$row->symbol_no}}</td>
                           <td>@if($row->participation == 1)
                          Agree
                          @elseif($row->participation == 2)
                          Declined
                          @else
                          @endif
                          </td>
                           <?php $pstat = \App\EmployeeExtraData::checkData($row->id); ?>
                          <td>{{$pstat != '' ? 'Received':'Not Received'}}</td>
                        <td> 
                         <?php $strategic = \App\EmployeeExtraData::getStrategic($row->id);
                            $presentation = \App\EmployeeExtraData::getPresentation($row->id);
                            $files = \App\EmployeeFiles::getFiles($row->id);
                            ?>
                            <div class="dropdown mobile-options">
                            <button class="btn btn-lg btn-black dropdown-toggle " type="button" data-toggle="dropdown">
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                           
                            <li><a href="{{url('branchadmin/jobs/application/view/'.$row->id)}}" class="btn btn-default btn-xs" title="view"><i class="fa fa-eye"></i>View</a></li>     
                            {{-- @if(Auth::guard('employer')->user()->user_type === 1) --}} 
                            <li><a href="{{url('branchadmin/jobs/file_upload/'.$row->id.'/'.$datas['job_id'])}}" class="btn btn-default btn-xs" title="view"><i class="fa fa-upload"></i>Upload Documents</a></li> 
                            <li><a href="javascript:void(0);" onClick="confirm_delete('/{{$row->id}}')" class="btn btn-danger btn-xs" title="Delete Invoice"><i class="fa fa-fw fa-remove"></i>Delete</a></li>
                             @foreach($files as $file)
                            <li><a href="{{asset('/image/'.$file->file_location)}}" class="btn btn-default" title="{{$file->title}}" download="download"><i class="fa fa-download"></i>{{$file->title}}</a></li>
                            @endforeach
                             @if($strategic != '')  
                            <li><a href="{{$strategic}}" class="btn btn-default" title="Download Strategic Paper" download="download"><i class="fa fa-download"></i>Strategic Paper</a></li>
                            @endif 
                            @if($presentation != '')  
                            <li><a href="{{$presentation}}" class="btn btn-default" title="Download Presentation" download="download"><i class="fa fa-download"></i>Presentation</a></li>
                            @endif
                            {{--@endif--}}
                            
                            </ul>
                            </div>  </td>
                      </tr>
                      <?php  $i++; }

                      ?>
                      
                    </tbody>
                    <tfoot>
                       @if($datas['thumb'] != '' || $datas['detail'] != '')
                      <tr>
                        <td colspan="3"><strong>Report File</strong></td>
                        <td colspan="6"><a href="{{$datas['file']}}"><img src="{{asset($datas['thumb'])}}"></a></td>
                      </tr>
                      <tr>
                        <td colspan="9"><?php echo $datas['detail']; ?></td>
                      </tr>

                      @endif
                       {{-- @if(Auth::guard('employer')->user()->user_type === 1)   --}} 
                       <tr>
                        <td colspan="9"><button type="button" id="for-interview" onClick="confirm_update()" class="btn btn-black">Select for Final Selection</button></td>
                      </tr> 
                      {{-- @endif --}}
                    </tfoot>
                    </table>
                  </form>

          </div><!-- /.box-body -->
      </div>
    </div>
  <div>

  <div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_simple_numbers right">
          <?php echo $datas['employees']->render();?>
      </div>
    </div>
  </div>
  
  <script type="text/javascript">


  function filter(){
   var filter_name = $('#filter_name').val();
   var filter_email = $('#filter_email').val();
   var filter_id = $('#filter_id').val();
   var filter_symbol_no = $('#filter_symbol_no').val();
  
    var url= "{{ url('/branchadmin/jobs/interview/'.$datas['job_id'].'?') }}";
   if (filter_name != '') {
      url += '&filter_name='+filter_name;
   }
   if (filter_email != '') {
      url += '&filter_email='+filter_email;
   }
   if (filter_id != '') {
      url += '&filter_id='+filter_id;
   }
   if (filter_symbol_no != '') {
      url += '&filter_symbol_no='+filter_symbol_no;
   }
  
   location = url;

  }
 </script>
 <script type="text/javascript">
$(function() {
 
  $(".select2").select2({ width: '100%' });
  $('.date').datepicker();
});



function confirm_delete(ids){
    if(confirm('Do You Want To Delete This Employee?')){
      var url= "{{ url('/branchadmin/jobs/interview/delete/') }}"+ids;
      location = url;
      
      }
    }

  function confirm_update(){

  if(confirm('Are you sure you want to Shortlisted selected applicants for Written Exam?')){
      var action = '{{ url('/branchadmin/jobs/update_interview') }}';
      $('#testform').attr('action', action);
      $('#testform').submit();
      
      }
};
</script>
@stop()