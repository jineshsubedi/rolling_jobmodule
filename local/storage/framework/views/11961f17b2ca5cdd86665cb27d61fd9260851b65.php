<?php $__env->startSection('heading'); ?>
Selected Application for Document Verification
            <small>List of Selected Application for Document Verification</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Applications</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
      
     
      <div class="box">
            <div class="box-body">
              <div class="panel-heading">
      <div class="top-links btn-group">
        <a href="<?php echo e(url('/branchadmin/jobs/application/'.$datas['job_id'])); ?>" class="btn btn-default">All Applicant (<?php echo e(\App\Employee::countAllApplicant($datas['job_id'])); ?>)</a>
        <a href="<?php echo e(url('/branchadmin/jobs/verification/'.$datas['job_id'])); ?>" class="btn btn-success">Document Verification (<?php echo e(\App\Employee::countDocumentVerification($datas['job_id'])); ?>)</a>
        <a href="<?php echo e(url('/branchadmin/jobs/written/'.$datas['job_id'])); ?>" class="btn btn-default">Written Exam (<?php echo e(\App\Employee::countWrittenExam($datas['job_id'])); ?>)</a>
        <a href="<?php echo e(url('/branchadmin/jobs/discussion/'.$datas['job_id'])); ?>" class="btn btn-default">Group Discussion (<?php echo e(\App\Employee::countGroup($datas['job_id'])); ?>)</a>
        <a href="<?php echo e(url('/branchadmin/jobs/interview/'.$datas['job_id'])); ?>" class="btn btn-default">Final Interview (<?php echo e(\App\Employee::countInterview($datas['job_id'])); ?>)</a>
        <a href="<?php echo e(url('/branchadmin/jobs/selected/'.$datas['job_id'])); ?>" class="btn btn-default">Selected Candidates (<?php echo e(\App\Employee::countSelected($datas['job_id'])); ?>)</a>
        
        
        </div>
    </div>
 <?php if(count($errors)): ?>
                <div class="row">
            <div class="col-xs-12">
            <div class="alert alert-danger">
             <?php foreach($errors->all() as $error): ?>
              <?php echo e('* : '.$error); ?></br>
             <?php endforeach; ?>
                </div>
            </div>

          </div>
       <?php endif; ?>
<?php /* <?php if(Auth::guard('employer')->user()->user_type === 1): ?> */ ?>
<link rel="stylesheet" href="<?php echo e(asset('/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
<script src="<?php echo e(asset('assets/ckeditor/ckeditor.js')); ?>"></script>
    <?php foreach($datas['meeting'] as $meeting ): ?>
        <div class="row bg bg-success">
            <div class="col-md-6 ">
                <h5>Topic: <?php echo e($meeting->topic); ?></h5>
                <span>Start Tiime: <?php echo e($meeting->start_time); ?></span>

            </div>
            <div class="col-md-6 bg bg-success">
                <h5>Meeting ID: <?php echo e($meeting->zoom_id); ?>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://zoom.us/s/<?php echo e($meeting->zoom_id); ?>" target="_blank" class="btn btn-primary"> start meeting</a>
                </h5>
                <span>Participant Id :<?php echo e($meeting->employee_id); ?>

                </span>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
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
      <form class="form-horizontal" enctype="multipart/form-data" role="form" id="testform" method="POST" action="<?php echo e(url('/branchadmin/jobs/updatestatus')); ?>">
                       
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="jobs_id" value="<?php echo e($datas['jobs_id']); ?>">
                         <div class="col-md-12">
                            <div class="form-group <?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                                <label class="label-control required col-md-2 text-center">Job Status</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="status">
                                        <?php foreach($datas['process_status'] as $status): ?>
                                        <?php if($datas['status'] == $status->id): ?>
                                        <option selected="selected" value="<?php echo e($status->id); ?>"><?php echo e($status->title); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($status->id); ?>"><?php echo e($status->title); ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
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
      <form class="form-horizontal" enctype="multipart/form-data" role="form" id="testform" method="POST" action="<?php echo e(url('/branchadmin/jobs/eventupdate')); ?>">
                       
                        <input type="hidden" name="jobs_id" value="<?php echo e($datas['jobs_id']); ?>">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="detail_id" value="<?php echo e($datas['report']['id']); ?>">
                        <input type="hidden" name="detail_type" value="<?php echo e($datas['report']['detail_type']); ?>">
                        <input type="hidden" name="page" value="verification">
                        
                       
                          <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="label-control required col-md-12 text-center">Event Date</label>
                                        <div class="col-md-12">
                                             <input type="text" name="detail_date" class="form-control date" value="<?php echo e($datas['report']['detail_date']); ?>">
                                   
                                        </div>
                                    </div>
                                    
                                     <div class="form-group">
                                        <label class="label-control required col-md-12 text-center">Event Time</label>
                                        <div class="col-md-12">
                                             <input type="text" name="detail_time" class="form-control" value="<?php echo e($datas['report']['detail_time']); ?>">
                                   
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-control required col-md-12 text-center">Event Venue</label>
                                        <div class="col-md-12">
                                             <input type="text" name="detail_venue" class="form-control" value="<?php echo e($datas['report']['detail_venue']); ?>">
                                   
                                        </div>
                                    </div>
                                </div>
                        <div class="col-md-9">
                                    <div class="form-group ">
                                        <label class="label-control required col-md-12 text-center">Description</label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="description"><?php echo e($datas['report']['description']); ?></textarea>
                                  
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
      <form class="form-horizontal" enctype="multipart/form-data" role="form" id="testform" method="POST" action="<?php echo e(url('/branchadmin/jobs/atsupdate')); ?>">
                       
                        <input type="hidden" name="jobs_id" value="<?php echo e($datas['jobs_id']); ?>">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="detail_id" value="<?php echo e($datas['report']['id']); ?>">
                        <input type="hidden" name="detail_type" value="<?php echo e($datas['report']['detail_type']); ?>">
                        <input type="hidden" name="page" value="verification">
                        
                       
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="label-control col-md-12 text-center">Success Message</label>
                                        <div class="col-md-12">
                                             <textarea rows="8" class="form-control" id="success_message" name="success_message"><?php echo e($datas['report']['success_message']); ?></textarea>
                                    <script>
                                             CKEDITOR.replace('success_message',
                                                    {
                                                                  filebrowserBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html")); ?>',
                                                                  filebrowserImageBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Images")); ?>',
                                                                  filebrowserFlashBrowseUrl : '<?php echo e(url("assets/ckfinder/ckfinder.html?type=Flash")); ?>',
                                                                  filebrowserUploadUrl : 
                                                '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files")); ?>',
                                                                  filebrowserImageUploadUrl : 
                                                '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images")); ?>',
                                                                  filebrowserFlashUploadUrl : '<?php echo e(url("assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash")); ?>',
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
                                             <textarea rows="8" class="form-control" id="textarea" name="error_message"><?php echo e($datas['report']['error_message']); ?></textarea>
                                    
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
              <form class="form-horizontal" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" action="<?php echo e(url('/branchadmin/jobs/upload_verification')); ?>">
                <input type="hidden" name="jobs_id" value="<?php echo e($datas['job_id']); ?>">
              <?php echo csrf_field(); ?>

              <div class="col-md-4">
                <div class="form-group<?php echo e($errors->has('upload_file') ? ' has-error' : ''); ?>">
                            <label class="col-md-3 control-label">Select CSV File</label>

                            <div class="col-md-9">
                            
                           <input type="file" required name="upload_file" class="form-control" >
                              
                             <?php if($errors->has('upload_file')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('upload_file')); ?></strong>
                                    </span>
                                <?php endif; ?>
                               
                            </div>
                        </div>
              </div>
               <div class="col-md-4">
                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-fw fa-save"></i>Upload
                                </button>
              </div>
              
              <div class="col-md-4"><a href="<?php echo e(url('image/sample.csv')); ?>" class="btn btn-success" title="Download Sample File" download>Sample File</a></div>
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
    <div class="row">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Status</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
               
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              
               <div class="col-md-6 chart-responsive">
              <canvas id="pieChart" style="height:300px"></canvas>
              	</div>
              	
                <div class="col-md-6">
                <div class="chart" id="bar-chart" style="height: 300px;" ></div>
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
             
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
        </div>
    </div>
    <script src="<?php echo e(asset('/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
<script>
  $(function () {
   $('.date').datepicker();
    //bootstrap WYSIHTML5 - text editor
    $('#textarea').wysihtml5()
  })
</script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="<?php echo e(asset('/assets/chart.js/Chart.js')); ?>"></script>
<script type="text/javascript">
	$(function(){
		

	var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: 'Male/Female', a: '<?php echo e($datas["total_male"]); ?>', b: '<?php echo e($datas["total_female"]); ?>'},
        
        
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Male', 'Female'],
      hideHover: 'auto'
    });


     
     
     <?php if(count($datas['age']) > 0): ?>
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
    <?php foreach($datas['age'] as $age): ?>
      {
        value    : '<?php echo e($age["total"]); ?>',
        color    : '<?php echo e($age["color"]); ?>',
        highlight: '<?php echo e($age["color"]); ?>',
        label    : '<?php echo e($age["title"]); ?>'
      },
      
      <?php endforeach; ?>
    ]
    <?php endif; ?>
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

	});
</script>
<?php /* <?php endif; ?> */ ?>

        <form class="form-horizontal" role="form" id="testform_verification" method="POST" action="<?php echo e(url('/branchadmin/jobs/update_verification')); ?>">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="job_id" value="<?php echo e($datas['job_id']); ?>">
                <input type="hidden" name="tab_id" value="1">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style="width: 5%;">S.N.<input type="checkbox" name="chkall" onclick="chkAll('employee_id[]',this.checked)"></th>
                        <th>ID</th>
                        <th>Code</th>
                         <th>Name</th>
                         <th>Email</th>
                         
                          <th>Created At</th>
                          <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td></td>
                        <td><input type="text" id="filter_id" value="<?php echo e($datas['filter_id']); ?>" class="form-control"></td>
                        <td></td>
                        <td><input type="text" id="filter_name" value="<?php echo e($datas['filter_name']); ?>" class="form-control"></td>
                        <td><input type="text" id="filter_email" value="<?php echo e($datas['filter_email']); ?>" class="form-control"></td>
                        <td></td>
                        <td></td>
                        <td><a href="javascript:void(0);" onClick="filter()" class="btn btn-black"><i class="fa fa-fw fa-search"></i></a></td>
                      </tr>
                      
                      <?php $i=1; 
                        foreach ($datas['employees'] as $row) { ?>
                          <tr>
                        <td><?php echo $i++ ;?><input type="checkbox" name="employee_id[]" value="<?php echo e($row->id); ?>" /></td>
                       <td><?php echo e($row->id); ?></td>
                       <td><?php echo e($row->tracking_code); ?></td>
                         <td>
                         <a href="<?php echo e(url('branchadmin/jobs/verification/view/'.$row->id)); ?>" target="_blank">
                         <?php echo e($row->firstname.' '.$row->middlename.' '.$row->lastname); ?>

                         </a></td>
                          <td><?php echo e($row->email); ?></td>
                          
                          <td><?php echo e($row->created_at); ?></td>
                          <td><?php echo e($row->status); ?></td>
                        <td>
                          <div class="dropdown mobile-options">
                            <button class="btn btn-lg btn-black dropdown-toggle " type="button" data-toggle="dropdown">
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="<?php echo e(url('branchadmin/jobs/tab1/'.$datas['job_id'].'/callmeeting/'.$row->id)); ?>" class="btn btn-default btn-xs" title="Create Zoom Meeting"><i class="fa fa-file"></i>Create Meeting</a></li>

        <li><a href="<?php echo e(url('branchadmin/jobs/verification/view/'.$row->id)); ?>" class="btn btn-default btn-xs" title="view"><i class="fa fa-eye"></i>View</a></li>
                            <li><a href="javascript:void(0);" onClick="confirm_delete('/<?php echo e($row->id); ?>')" class="btn btn-danger btn-xs" title="Delete Invoice"><i class="fa fa-fw fa-remove"></i>Delete</a></li>
                            
                            
                            </ul>
                            </div>


                         
                        </td>
                      </tr>
                      <?php  }

                      ?>
                      
                    </tbody>
                    <tfoot>
                     
                      <tr>
                        <td colspan="2"><button type="button" id="for-written" onClick="confirm_update()" class="btn btn-black">Select for Written Exam</button> </td>
                        <td colspan="6"><button type="button" id="for-meeting" onClick="confirm_meeting()" class="btn btn-black">Select for Group Meeting</button></td>

                    </tr>
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
    function confirm_meeting(){

        if(confirm('Are you sure you want to Call for meeting to selected applicants ?')){
            var action = '<?php echo e(url('/branchadmin/jobs/application/groupMeeting')); ?>';
            $('#testform_verification').attr('action', action);
            $('#testform_verification').submit();

        }
    };
 function confirm_delete(ids){
    if(confirm('Do You Want To Delete This Employee?')){
      var url= "<?php echo e(url('/branchadmin/jobs/verification/delete/')); ?>"+ids;
      location = url;
      
      }
    }

  function confirm_update(){

  if(confirm('Are you sure you want to Shortlisted selected applicants for Written Exam?')){
      var action = '<?php echo e(url('/branchadmin/jobs/update_verification')); ?>';
      $('#testform_verification').attr('action', action);
      $('#testform_verification').submit();
  }
};
$(function() {
  
  $('.date').datepicker();
  
});
function filter(){
   var filter_name = $('#filter_name').val();
   var filter_email = $('#filter_email').val();
   var filter_id = $('#filter_id').val();
  
  
    var url= "<?php echo e(url('/branchadmin/jobs/verification/'.$datas['job_id'].'?')); ?>";
   if (filter_name != '') {
      url += '&filter_name='+filter_name;
   }
   if (filter_email != '') {
      url += '&filter_email='+filter_email;
   }
   if (filter_id != '') {
      url += '&filter_id='+filter_id;
   }
   
  
   location = url;

  }

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>