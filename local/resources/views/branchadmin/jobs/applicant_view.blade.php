@extends('branchadmin_master')
@section('heading')
View Applicants 
            <small>Detail of View Applicants</small>
@stop
@section('breadcrubm')
 <li><a href="{{ url('/branchadmin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/branchadmin/jobs/application/'.$datas['employee']->jobs_id) }}">Applicantss</a></li>
            <li class="active">View Applicants</li>
@stop
@section('content')

 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">View Applicants</div>
                
                <div class="panel-body">
                    @if($datas['image'] != '')
                    <div class="logo"><img src="{{$datas['image']}}"></div>
                    @endif
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Personal Information</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                          <table class="table table-bordered table-hover">
                            <tbody>
                              <tr>
                                    <td><b> Application Id</b></td>
                                    <td>{{$datas['employee']->id}}</td>
                                </tr>
                                <tr>
                                    <td><b> Application For</b></td>
                                    <td>{{\App\Jobs::getTitle($datas['employee']->jobs_id)}}</td>
                                </tr>
                                <tr>
                                    <td style="width: 25%"><b> Full Name</b></td>
                                    <td>{{\App\Employees::getFullname($datas['employee']->firstname,$datas['employee']->middlename,$datas['employee']->lastname)}}</td>
                                </tr>
                                <tr>
                                    <td><b> Email</b></td>
                                    <td>{{$datas['employee']->email}}</td>
                                </tr>
                                @if($datas['employee']->gender != '')
                                <tr>
                                    <td><b> Gender</b></td>
                                    <td>{{$datas['employee']->gender}}</td>
                                </tr>
                                @endif
                               @if($datas['employee']->dob < 2007-01-01)
                                <tr>
                                    <td><b> Date of Birth</b></td>
                                    <td>{{$datas['employee']->dob}}</td>
                                </tr>
                                @endif
                                 @if($datas['employee']->age > 15)
                                <tr>
                                    <td><b> Age</b></td>
                                    <td>{{$datas['employee']->age}}</td>
                                </tr>
                                @endif
                                @if($datas['employee']->total_experience > 0)
                                <tr>
                                    <td><b> Total Experience</b></td>
                                    <td>{{$datas['employee']->total_experience}}</td>
                                </tr>
                                @endif
                                @if($datas['employee']->marital_statu != '')
                                <tr>
                                    <td><b> Marital Status</b></td>
                                    <td>{{$datas['employee']->marital_status}}</td>
                                </tr>
                                @endif
                                @if($datas['employee']->vehicle != '')
                                <tr>
                                  <tr>
                                    <td><b> Vehicle</b></td>
                                    <td>{{$datas['employee']->vehicle}}</td>
                                </tr>
                                @endif
                                @if($datas['employee']->license_of != '')
                                <tr>
                                    <td><b> License Of</b></td>
                                    <td>{{$datas['employee']->license_of}}</td>
                                </tr>
                                @endif
                                @if($datas['employee']->permanent_address != '')
                                <tr>
                                    <td><b> Permanent Address</b></td>
                                    <td>{{$datas['employee']->permanent_address}}</td>
                                </tr>
                                @endif
                                  @if($datas['employee']->temporary_address != '')
                                  <tr>
                                    <td><b>Temporary Address</b></td>
                                    <td>{{$datas['employee']->temporary_address}}</td>
                                </tr>
                                  @endif
                               @if($datas['employee']->home_phone != '')
                                  <tr>
                                    <td><b>Home Phone</b></td>
                                    <td>{{$datas['employee']->home_phone}}</td>
                                </tr>
                                  @endif
                                  @if($datas['employee']->mobile != '')
                                  <tr>
                                    <td><b>Mobile Phone</b></td>
                                    <td>{{$datas['employee']->mobile}}</td>
                                </tr>
                                  @endif
                                  @if($datas['employee']->fax != '')
                                  <tr>
                                    <td><b>Fax</b></td>
                                    <td>{{$datas['employee']->fax}}</td>
                                </tr>
                                  @endif
                                  @if($datas['employee']->website != '')
                                  <tr>
                                    <td><b>Website</b></td>
                                    <td>{{$datas['employee']->website}}</td>
                                </tr>
                                  @endif
                                   @if($datas['employee']->district != '')
                                  <tr>
                                    <td><b>{{$datas['location_title']}}</b></td>
                                    <td>{{$datas['employee']->district.', '.$datas['employee']->municipality.', '.$datas['employee']->ward}}</td>
                                </tr>
                                  @endif
                                   @if($datas['employee']->image != '')
                                  <tr>
                                    <td><b>Image</b></td>
                                    <td><a href="{{asset('image/'.$datas['employee']->image)}}" target="_blank" download></a><img src="{{asset('image/'.$datas['employee']->image)}}" height="150" download></a></td>
                                    
                                  </tr>
                                  @endif
                                  @if($datas['employee']->resume != '')
                                  <tr>
                                    <td><b>Resume</b></td>
                                    <td><a href="{{asset('image/'.$datas['employee']->resume)}}" class="btn btn-primary" target="_blank" download>Download</a></td>
                                    
                                  </tr>
                                  @endif
                                  @if($datas['employee']->coverletter != '')
                                  <tr>
                                    <td><b>Cover Letter</b></td>
                                    <td><a href="{{asset('image/'.$datas['employee']->coverletter)}}" class="btn btn-primary" target="_blank" download>Download</a></td>
                                    
                                  </tr>
                                  @endif
                                  @if(count($datas['form_data']) > 0)
                                  @foreach($datas['form_data'] as $formdata)
                                    <tr>
                                    <td><b>{{$formdata->f_title}}</b></td>
                                    @if($formdata->type == 1)
                                    <td><a href="{{asset('image/'.$formdata->f_description)}}" target="_blank" class="btn btn-primary" download>Download</a></td>
                                    @else
                                    <td>{{$formdata->f_description}}</td>
                                    @endif
                                    
                                  </tr>
                                  @endforeach
                                  @endif
                            </tbody>
                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                     @if(isset($datas['education']) && count($datas['education']) > 0)
                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Education Qualification</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                          <table class="table table-bordered table-hover">
                             <thead>
                                <th>Country</th>
                                <th>Education Level</th>
                                <th>Faculty</th>
                                
                                <th>Institution</th>
                                <th>Board</th>
                                <th>Percent/Grade</th>
                                <th>Year</th>
                                
                            </thead>
                            <tbody>
                           
                              @foreach($datas['education'] as $education)
                                <tr>
                                    <td>{{$education->country}}</td>
                                    <td>{{\App\Faculty::getLevelTitle($education->level_id)}}</td>
                                    <td>{{\App\Faculty::getTitle($education->faculty_id)}}</td>
                                    
                                    <td>{{$education->institution}}</td>
                                    <td>{{$education->board}}</td>
                                    <td>{{$education->percentage.' '.$education->marksystem}}</td>
                                    <td>{{$education->year}}</td>
                                </tr>
                              @endforeach
                         
                          </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                       @endif
                        @if(isset($datas['training']) && count($datas['training']) > 0)
                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Training</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                          <table class="table table-bordered table-hover">
                              <thead>
                                <th>Title</th>
                                <th>Details</th>
                                <th>Institution</th>
                                <th>Duration</th>
                               
                                <th>Year</th>
                                
                            </thead>
                            <tbody>
                          
                              @foreach($datas['training'] as $training)
                                <tr>
                                    <td>{{$training->title}}</td>
                                    
                                    <td>{{$training->details}}</td>
                                    <td>{{$training->institution}}</td>
                                    <td>{{$training->duration}}</td>
                                    
                                    <td>{{$training->year}}</td>
                                </tr>
                              @endforeach
                          
                          </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      @endif
                      
                       @if(isset($datas['experience']) && count($datas['experience']) > 0)
                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Experiences</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <table class="table table-bordered table-hover">
                              <thead>
                                <th>Organization</th>
                                <th>Type of Employment</th>
                                <th>Organization Type</th>
                                <th>Designation</th>
                                <th>Job Level</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Working Status</th>
                                <th>Country</th>
                                <th>Experience</th>
                            </thead>
                            <tbody>
                          
                              @foreach($datas['experience'] as $experience)
                                <tr>
                                    <td>{{$experience->organization}}</td>
                                    
                                    <td>{{$experience->typeofemployment}}</td>
                                    <td>{{\App\OrganizationType::getOrgTypeTitle($experience->org_type_id)}}</td>
                                    <td>{{$experience->designation}}</td>
                                    
                                    <td>{{$experience->level}}</td>
                                    <td>{{$experience->from}}</td>
                                    <td>{{$experience->to}}</td>
                                    <td>{{$experience->currently_working == 1 ? 'Currently Working' : 'Not Working'}}</td>
                                    <td>{{$experience->country}}</td>
                                    <td>{{$experience->experience}}</td>
                                </tr>
                              @endforeach
                         
                          </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                       @endif
                       @if(isset($datas['language']) && count($datas['language']) > 0)
                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Languages</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <table class="table table-bordered table-hover">
                               <thead>
                                <th>Languages</th>
                                <th>Understad</th>
                                <th>Speak</th>
                                <th>Read</th>
                                <th>Write</th>
                               
                               
                            </thead>
                            <tbody>
                           
                              @foreach($datas['language'] as $language)
                                <tr>
                                    <td>{{$language->language}}</td>
                                    <td>{{$language->understand}}</td>
                                    <td>{{$language->speak}}</td>
                                    <td>{{$language->reading}}</td>
                                    <td>{{$language->writing}}</td>
                                </tr>
                              @endforeach
                         
                          </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                       @endif
                       @if(isset($datas['reference']) && count($datas['reference']) > 0)
                      <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">References</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <table class="table table-bordered table-hover">
                               <thead>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Address</th>
                                <th>Office Phone</th>
                                <th>Mobile</th>
                                <th>E-mail</th>
                                <th>Company</th>
                                
                            </thead>
                            <tbody>
                           
                              @foreach($datas['reference'] as $reference)
                                <tr>
                                    <td>{{$reference->name}}</td>
                                    
                                    <td>{{$reference->designation}}</td>
                                    
                                    <td>{{$reference->address}}</td>
                                    
                                    <td>{{$reference->office_phone}}</td>
                                    <td>{{$reference->mobile}}</td>
                                   
                                    <td>{{$reference->email}}</td>
                                    <td>{{$reference->company}}</td>
                                    
                                </tr>
                              @endforeach
                          
                          </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                      @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection