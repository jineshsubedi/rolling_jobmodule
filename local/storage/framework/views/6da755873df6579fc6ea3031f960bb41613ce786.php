<?php $__env->startSection('heading'); ?>
Achievement Detail
<small>List of Achievement Detail</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo e(url('/staffs/achievements')); ?>"> Achievements</a></li>
<li class="active">Achievement Detail</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
   
    
    <div class="box">
      <div class="box-body">

        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>S.N.</th>
              <th>Staff</th>
              <?php foreach($datas['category'] as $category): ?>
              <th><?php echo e($category->title); ?></th>
              <?php endforeach; ?>
            </tr>
          </thead>
          <tbody>
            
            <?php $i=1;
            foreach ($datas['staffs'] as $row) { ?>
            <tr>
              <td><?php echo $i++ ;?></td>
              <td><?php echo $row->name;?></td>
              <?php foreach($datas['category'] as $category): ?>
              <?php ($check = \App\Achievements::checkAchievement($row->id,$category->id)); ?>
             
              <td><input type="checkbox" onchange="changeAchievenet('<?php echo e($row->id); ?>','<?php echo e($category->id); ?>','<?php echo e($check); ?>','<?php echo e(addslashes(htmlspecialchars($row->name))); ?>')" <?php echo e($check > 0 ? 'checked="checked"' : ''); ?> ></a></td>
              <?php endforeach; ?>
            </tr>
            <?php  }
            ?>
            
          </table>
          </div><!-- /.box-body -->
        </div>
      </div>
      <div>
        <div>
        </div>
        <style type="text/css">
          .modal-vertical-centered {
            transform: translate(0, 50%) !important;
            -ms-transform: translate(0, 50%) !important; /* IE 9 */
            -webkit-transform: translate(0, 50%) !important; /* Safari and Chrome */
            }
        </style>
      <div class="modal fade" id="modal-loading">
          <div class="modal-dialog modal-sm ">
            <div class="modal-content">
            
              <div class="modal-body">
                <div class="box-body" style="text-align: center; font-size: 20px;">
                  <i class="fa fa-spinner fa-spin fa-w-16 fa-fw fa-3x"></i><br>
                  <span style="">Please Wait.......</span>
                
                </div>
                
                
                
              </div>
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> 
        <script type="text/javascript">
        
        function changeAchievenet(staff_id,category,status,name){
        if(confirm('Do You Want To Change the status of '+name+'?')){
          var token = $('input[name=\'_token\']').val();
          $('#modal-loading').modal('show');
          $.ajax({
            type: 'POST',
            url: '<?php echo e(url("/staffs/save_achievement")); ?>',
            data: '_token='+token+'&staff_id='+staff_id+'&category='+category+'&status='+status,
            cache: false,
            success: function(html){
                   $('#modal-loading').modal('hide');          
               
            }
          })
        }
        }
        </script>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>