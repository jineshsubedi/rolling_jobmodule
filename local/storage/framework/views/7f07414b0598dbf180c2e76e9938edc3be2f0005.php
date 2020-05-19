<?php $__env->startSection('heading'); ?>
Generate Payroll
            <small>Detail of Generate Payroll</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo e(url('/branchadmin/payroll')); ?>">Pay Roll</a></li>
            <li class="active">Generate Payroll</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

 
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Generate Payroll</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(url('/branchadmin/payroll/save')); ?>">
                     <input type="hidden" name="type" id="type" value="">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                         <div class="col-md-10">
                          <div class="box box-primary border p-10">
                            <div class="row">
                          <div class="col-md-3">
                          <div class="form-group">
                                <label class="col-md-3 control-label"> Branch</label>
                                <div class="col-md-9">
                                <select class="form-control" name="branch" id="branch">
                                   <option value="">Select Branch</option>
                                   <?php foreach($branches as $branch): ?>
                                   <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                                   <?php endforeach; ?>
                                </select>
                                   
                                </div>
                            </div>
                            </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Year</label>
                                <div class="col-md-9">
                                <select class="form-control" name="year" id="year">
                                   <option value="">Select Branch</option>
                                  
                                </select>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-md-3 control-label"> Month</label>
                                <div class="col-md-9">
                                <select class="form-control" name="month" id="month">
                                   <option value="">Select Branch</option>
                                   
                                </select>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3" id="save" style="display: none;">
                            <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-fw fa-save"></i>Generate
                                </button>
                        </div>
                        

                       </div>
                    
                   
                      </div>
                       
            
          </div>
                        
                        
                    </div>
                
                  
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 <script type="text/javascript">
    $('#branch').on('change', function(){
        var branch_id = $(this).val();
        if (branch_id != '') {
            var token = $('input[name=\'_token\']').val();
    
            $.ajax({
              type: 'POST',
              url: '<?php echo e(url("/branchadmin/payroll/getYear")); ?>',
              data: '_token='+token+'&branch='+branch_id,
              cache: false,
              success: function(data){
               var datas = data.split('|');
               $('#type').val(datas[0]);
               $('#year').html(datas[1]);
              }
            });
        }
    })
    $('#year').on('change', function(){
        var year = $(this).val();
        if (year != '') {
            var token = $('input[name=\'_token\']').val();
            var type = $('#type').val();
            var branch_id = $('#branch').val();
            $.ajax({
              type: 'POST',
              url: '<?php echo e(url("/branchadmin/payroll/getMonth")); ?>',
              data: '_token='+token+'&year='+year+'&type='+type+'&branch='+branch_id,
              cache: false,
              success: function(data){
               
               $('#month').html(data);
              }
            });
        }
    })
    $('#month').on('change', function(){
        var year = $(this).val();
        if (year != '') {
            $('#testform').submit();
        }
    })
 </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>