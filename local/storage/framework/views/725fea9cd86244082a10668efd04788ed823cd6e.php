<?php $__env->startSection('heading'); ?>
View Application Source of <?php echo e($datas['job']->title); ?>

            <small>Detail of View Application Source of <?php echo e($datas['job']->title); ?></small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/admin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo e(url('/admin/jobs')); ?>">Jobs</a></li>
            <li class="active">View Application source </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">View Application source</div>
                <div class="panel-heading">
      <div class="top-links btn-group">
        

        
        
        
        </div>
    </div>
                <div class="panel-body">
                   
 <div class="default-options-search">
     <div class="row">
  <div class="form-group col-md-12">
              <label class="col-md-2">Date</label>
              <div class="col-md-2">
                <input id="filter_date" type="text" class="form-control" value="<?php echo e($datas['filter_date']); ?>">
              </div>
              <div class="col-md-2">
                <a class="btn btn-success" id="search"><i class="fa fa-search"></i>Search</a>
              </div>
            </div>
            </div>

 </div>
                    

                   
                    <?php if(count($datas['source']) > 0): ?>

                     <div class="box box-default box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Application Source</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                          <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                <?php $i = 1; ?>
                                 <?php foreach($datas['source'] as $view): ?>
                              <li class="col-md-4" style="float:left; list-style:none; padding:10px;"><?php echo e($view['title']); ?> 
                              
                               
                                  <span id="<?php echo e($i); ?>" class="pull-right badge bg-blue " style="cursor:pointer" ><?php echo e($view['total']); ?></span>
                           
                            <div id="c_<?php echo e($i); ?>" style="display:none;">
                              <?php foreach($view['employe'] as $emp): ?>
                            <a href="<?php echo e($emp['url']); ?>" class="btn btn-default btn-xs" target="_blank" title="<?php echo e($emp['name']); ?>"><?php echo e($emp['name']); ?></a>
                              <?php endforeach; ?>
                            
                           </div>
                            
                            
                              
                              </li>
                              <?php $i++; ?>
                               <?php endforeach; ?>
                              
                             
                            </ul>
                          </div>                        
                        </div>
                        <!-- box-body -->
                      </div>
                    <?php endif; ?>
                    
                   
                     
                      
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
$(function() {
 
  
  $('#filter_date').datepicker();
 
});

$('#search').click(function()
{
  var url = '<?php echo e(url("/admin/jobs/source/".$datas["job"]->id)); ?>';
  var filter_date = $('#filter_date').val();

  if (filter_date != '') {
    url += '?filter_date='+filter_date;
    
  }
  window.location = url;
});


$(document).delegate('.badge', 'click', function(e) {
      e.preventDefault();
      
        $('.popover').popover('hide', function() {
            $('.popover').remove();
          });

          var element = this;
          var id = $(this).attr('id');
          var cont = $('#c_'+id).html();
          $(element).popover({
          html: true,
          placement: 'left',
          trigger: 'manual',
          content: function() {
          return cont;
        }
      });

      $(element).popover('show');
  });


</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>