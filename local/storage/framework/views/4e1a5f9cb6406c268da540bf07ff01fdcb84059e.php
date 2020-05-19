<?php $__env->startSection('heading'); ?>
Staff
            <small>List of Staff</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Staff</li>
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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Work Mode</th>
                        <th>Status</th>
                       
                      <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td><input type="text" class="form-control" name="filter_name" id="filter_name" value="<?php echo e($datas['filter_name']); ?>"></td>
                        <td><select class="form-control" id="filter_work_mode">
                          <?php foreach($datas['work_mode'] as $workmode): ?>
                            <?php if($workmode['value'] == $datas['filter_work_mode']): ?>
                            <option value="<?php echo e($workmode['value']); ?>" selected="selected"><?php echo e($workmode['title']); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($workmode['value']); ?>"><?php echo e($workmode['title']); ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select></td>
                        <td><select class="form-control" id="filter_status">
                          <?php foreach($datas['status'] as $status): ?>
                            <?php if($status['value'] == $datas['filter_status']): ?>
                            <option value="<?php echo e($status['value']); ?>" selected="selected"><?php echo e($status['title']); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($status['value']); ?>"><?php echo e($status['title']); ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select></td>
                       
                      <td><a class="btn btn-primary" onClick="filterData()"><i class="fa fa-search"></i>Filter</a></td>
                      </tr>
                      <?php $i=1; 
                        foreach ($datas['staffs'] as $row) { 
                         // $online = \App\Adjustment_staff::isOnline($row->id);
                          ?>
                          <tr>
                        <td><?php echo $i++ ;?></td>
                       
                        
                       
                       <td><img src="<?php echo e(\App\Adjustment_staff::getImage($row->id)); ?>"></td>
                       <td><?php echo $row->name;?>
                       <?php if($row->isOnline()): ?>
                            <span class="label label-success">Online</span>
                        <?php endif; ?>
                         
                       </td>
                      <td><?php echo e(($row->employmentType == 1 ? 'Full Time' : 'Part Time')); ?></td>
                       <td><?php echo \App\Adjustment_staff::getStatus($row->status);?></td>
                        
                       
                        <td>
                          <a  href="<?php echo e(url('/staffs/report?staff='.$row->id)); ?>" class="btn btn-success left">Reports</a></td>
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
  <div class="row">
    <div class="col-xs-12">
      <div class="dataTables_paginate paging_simple_numbers right">
          <?php echo $datas['staffs']->render();?>
      </div>
    </div>
  </div>
  <script type="text/javascript">

 
     
  function filterData(){
        var url= "<?php echo e(url('/staffs/otstaff/?')); ?>";
        
        var filter_name=$('#filter_name').val();
        var filter_work_mode=$('#filter_work_mode').val();
        var filter_status=$('#filter_status').val();
        
        if(filter_name != '') {

          url += '&filter_name='+filter_name
        }
         if(filter_work_mode != 0) {

          url += '&filter_work_mode='+filter_work_mode
        }

        if(filter_status != 0) {

          url += '&filter_status='+filter_status
        }
        
        location = url;

      }

       
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>