<?php $__env->startSection('heading'); ?>
Applications
            <small>List of Applications</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Applications</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('assets/ckeditor/ckeditor.js')); ?>"></script>
 <div class="row">
    <div class="col-xs-12">
      
     
      <div class="box">
            <div class="box-body">
              <div class="panel-heading">
      <div class="top-links btn-group">
        

       <a href="<?php echo e(url('/branchadmin/jobs/application/'.$datas['job_id'])); ?>" class="btn btn-success">All Applicant (<?php echo e(\App\Jobs::countApplication($datas['job_id'])); ?>)</a>
        <a href="<?php echo e(url('/branchadmin/jobs/verification/'.$datas['job_id'])); ?>" class="btn btn-default">Document Verification (<?php echo e(\App\Employee::countDocumentVerification($datas['job_id'])); ?>)</a>
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
    <?php /* <?php if(Auth::guard('staffs')->user()->user_type === 1): ?> */ ?>

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
                        <input type="hidden" name="jobs_id" value="<?php echo e($datas['job_id']); ?>">
                        <?php echo csrf_field(); ?>

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
            </div>
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
            </div>
          </div>
        </div>
    </div>
<link rel="stylesheet" href="<?php echo e(asset('/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
<script src="<?php echo e(asset('/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
<script>
  $(function () {
   $('.date').datepicker();
    //bootstrap WYSIHTML5 - text editor
    $('#textarea').wysihtml5()
  })
</script>

<?php /* <?php endif; ?> */ ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <div class="row">
      <div class="col-md-12">
      <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Status</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
               
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            	<div class="col-md-4 chart-responsive">
            	    <span style="height:10px;width:10px;background:#E65A26;display:inline-block; border: 1px solid #E65A26; border-radious:2px; margin-right:5px;"></span>Visitors
            	    <span style="height:10px;width:10px;background:#3c8dbc;display:inline-block; border: 1px solid #3c8dbc; border-radious:2px; margin-right:5px; margin-left:10px"></span>Applicants
            	    <span style="height:10px;width:10px;background:#07c5a1;display:inline-block; border: 1px solid #07c5a1; border-radious:2px; margin-right:5px; margin-left:10px"></span>Rolling Sourcing
              <div class="chart" id="line-chart" style="height: 300px;"></div>
              	</div>
              	
              	<?php if(count($datas['age']) > 0): ?>
      <div class="col-md-3">
          <!-- LINE CHART -->
          
         
              <div id="pieChart" style="height:300px"></div>
            
            	    
            	    
            	    
            	    
            	     <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['City', 'Applicant', { role: 'style' }],
        <?php foreach($datas['age'] as $age): ?>
        
        ['<?php echo e($age["title"]); ?>', <?php echo e($age["total"]); ?>, '<?php echo e($age["color"]); ?>'],
          
      
            <?php endforeach; ?>
      
      ]);

      var options = {
        title: 'Applicant Age',
        resize: true,
        chartArea: {width: '100%'},
        hAxis: {
          title: 'Applicant Age',
          minValue: 0
        },
        vAxis: {
          title: ''
        }
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('pieChart'));

      chart.draw(data, options);
    }
    </script>
           

        </div>
        <?php endif; ?>
        
    <?php if(count($datas['vsource']) > 0): ?>
    
   
    <div class="col-md-3">
        
             <div id="chart_div" style="height:300px;"></div>
          
    </div>
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['City', 'Applications',],
        <?php foreach($datas['vsource'] as $vs): ?>
        ['<?php echo e($vs["title"]); ?>', <?php echo e($vs['total_source']); ?>],
        <?php endforeach; ?>
      ]);

      var options = {
        title: 'Application Sources',
        resize: true,
        chartArea: {width: '100%'},
        hAxis: {
          title: 'Application Sources',
          minValue: 0
        },
        vAxis: {
          title: ''
        }
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
    </script>
    
    <?php endif; ?>
              	
                <div class="col-md-2">
                <div class="chart" id="bar-chart" style="height: 300px;" ></div>
                </div>
                
            </div>
            <!-- /.box-body -->
          </div>
        </div>
    </div>
    
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

	<?php if(count($datas['daywise']) > 0): ?>
     var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      
      data: [
      <?php foreach($datas["daywise"] as $dy): ?>
        {y: '<?php echo e($dy["title"]); ?>', item1: '<?php echo e($dy["total_visit"]); ?>', item2: '<?php echo e($dy["total"]); ?>', item3: '<?php echo e($dy["rolling"]); ?>'},
       
        <?php endforeach; ?>
      ],
      xkey: 'y',
      ykeys: ['item1', 'item2', 'item3'],
      labels: ['Visitors', 'Applications', 'Rolling'],
      lineColors: ['#E65A26','#3c8dbc','#07c5a1'],
      axes: true,
      grid: true,
      hideHover: 'auto'
    });
     <?php endif; ?>
     
     
    

	});
</script>
             
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style="width: 5%;">S.N.</th>
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
                        <td><?php echo $i++ ;?></td>
                       <td><?php echo e($row->id); ?></td>
                       <td><?php echo e($row->tracking_code); ?></td>
                         <td><a href="<?php echo e(url('branchadmin/jobs/application/view/'.$row->id)); ?>" target="_blank"><?php echo e(\App\Employees::getFullname($row->firstname,$row->middlename,$row->lastname)); ?></a></td>
                          <td><?php echo e($row->email); ?></td>
                          
                          <td><?php echo e($row->created_at); ?></td>
                          <td><?php echo e($row->status); ?></td>
                        <td>
                            <a href="javascript:void(0);" onClick="confirm_delete('/<?php echo e($row->id); ?>')" class="btn btn-danger" title="Delete Invoice"><i class="fa fa-fw fa-remove"></i>Delete</a>
                        </td>
                      </tr>
                      <?php  }

                      ?>
                      
                    </tbody>
                    <tfoot>
                       <?php if($datas['thumb'] != '' || $datas['detail'] != ''): ?>
                      <tr>
                        <td colspan="2"><strong>Report File</strong></td>
                        <td colspan="5"><a href="<?php echo e($datas['file']); ?>"><img src="<?php echo e(asset($datas['thumb'])); ?>"></a></td>
                      </tr>
                      <tr>
                        <td colspan="7"><?php echo $datas['detail']; ?></td>
                      </tr>

                      <?php endif; ?>
                      <tr>
                          <td colspan="7">
                               <a href="<?php echo e(url('branchadmin/jobs/exportCsv/'.$datas['job_id'])); ?>" class="btn btn-success">Export Data on CSV</a>
                                    <a href="<?php echo e(url('branchadmin/jobs/downloadCV/'.$datas['job_id'])); ?>" class="btn btn-warning">Download All CV</a>
                          </td>
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
   <div class="modal modal-success fade" id="modal-success">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form class="form-horizontal" role="form" id="extract" method="POST" action="<?php echo e(url('branchadmin/jobs/exportCsv')); ?>">
                      <?php echo csrf_field(); ?>

                    <input type="hidden" name="job_id" value="<?php echo e($datas['job_id']); ?>">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 id="modal-title" class="modal-title">Export Data</h4>
                    </div>
                    <div id="modal-body" class="modal-body">
                      <div class="row">
                        <div class="col-md-5">
                          <label class="label-control col-md-3">From</label>
                          <div class="col-md-9">
                          <input type="text" class="form-control" required="required" name="start_form">
                        </div>
                      </div>
                      <div class="col-md-7">
                         <label class="label-control col-md-6">Number of Data</label>
                          <div class="col-md-6">
                          <input type="text" class="form-control" required="required" name="limit_data">
                        </div>
                      </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Export</button>
                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
  <script type="text/javascript">
  function confirm_delete(ids){
    if(confirm('Do You Want To Delete This Employee?')){
      var url= "<?php echo e(url('/branchadmin/jobs/application/delete/')); ?>"+ids;
      location = url;
      
      }
    }

  function filter(){
   var filter_name = $('#filter_name').val();
   var filter_email = $('#filter_email').val();
   var filter_id = $('#filter_id').val();
  
    var url= "<?php echo e(url('/branchadmin/jobs/application/'.$datas['job_id'].'?')); ?>";
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
 <script type="text/javascript">
$(function() {
 
  $(".select2").select2({ width: '100%' });
});


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>