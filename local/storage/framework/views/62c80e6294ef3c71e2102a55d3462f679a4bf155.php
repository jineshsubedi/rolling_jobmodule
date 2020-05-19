<?php $__env->startSection('heading'); ?>
Staff
            <small>List of Staff</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Staff</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
          <a href="<?php echo e(url('/supervisor/adjustment_staff/addnew')); ?>" class="btn addnew right"><i class="fa fa-fw fa-plus"></i>Add New Staff</a>
      </div>
      <div class="box">
            <div class="box-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <?php if(auth()->guard('staffs')->user()->branch==2 && auth()->guard('staffs')->user()->department == 4): ?>
                        <th>Branch</th>
                        <?php endif; ?>
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
                        <?php if(auth()->guard('staffs')->user()->branch==2 && auth()->guard('staffs')->user()->department == 4): ?>
                        <td>
                        <select class="form-control" id="filter_branch">
                          <?php foreach($datas['branch'] as $branch): ?>
                            <?php if($branch['id'] == $datas['branch_id']): ?>
                            <option value="<?php echo e($branch['id']); ?>" selected><?php echo e($branch['name']); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($branch['id']); ?>"><?php echo e($branch['name']); ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                        </td>
                        <?php endif; ?>
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
                       
                      <td>
                        <button type="button" class="btn refreshbtn" onClick="filterData()"><i class="fa fa-search"></i> Filter</button>
                      </td>
                      </tr>
                      <?php $i=1; 
                        foreach ($datas['staffs'] as $row) { ?>
                          <tr>
                        <td><?php echo $i++ ;?></td>
                       <?php ($average = \App\Adjustment_staff::getAvergePoint($row->id)); ?>
                       <td><img src="<?php echo e(\App\Adjustment_staff::getImage($row->id)); ?>" class="img-circle" style="height: 50px;"></td>
                       <td><span class="label bg-blue"><?php echo e($average['ratio']); ?></span></span><?php echo \App\Adjustment_staff::staffStatus($row->id);?><?php echo $row->name;?>
                        <?php if($row->isOnline()): ?>
                            <span class="label label-success" style="width:5px;height:5px; display:inline-block;border-radius:50% !important;padding:0px;"></span>
                        <?php endif; ?>
                       </td>
                       <?php if(auth()->guard('staffs')->user()->branch==2 && auth()->guard('staffs')->user()->department == 4): ?>
                       <td><?php echo e(\App\Branch::gettitle($row->branch)); ?></td>
                        <?php endif; ?>
                        <td><?php echo e(($row->employmentType == 1 ? 'Full Time' : 'Part Time')); ?></td>
                       <td><?php echo \App\Adjustment_staff::getStatus($row->status);?></td>
                        <td><a href="<?php echo e(url('/supervisor/adjustment_staff/edit/'.$row->id)); ?>" title="View or Edit" class="btn btn-primary left"><i class="fa fa-eye"></i> / <i class="fa fa-edit"></i></a>
                          <a  href="javascript:void(0);" onClick="confirm_delete('/<?php echo e($row->id); ?>')" class="btn btn-danger left"><i class="fa fa-fw fa-remove"></i></a>
                          <a href="<?php echo e(url('/supervisor/report?staff='.$row->id)); ?>" title="View or Edit" class="btn btn-primary left">Report</a>
                        </td>
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

 
    function confirm_delete(ids){
    if(confirm('Do You Want To Delete This Staff?')){
      var url= "<?php echo e(url('/supervisor/adjustment_staff/delete/')); ?>"+ids;
      location = url;
      
      }
    }
  function filterData(){
        var url= "<?php echo e(url('/supervisor/adjustment_staff/?')); ?>";
        
        var filter_name=$('#filter_name').val();
        var filter_work_mode=$('#filter_work_mode').val();
        var filter_status=$('#filter_status').val();
        var filter_branch=$('#filter_branch').val();

        
        if(filter_name != '') {
          url += '&filter_name='+filter_name
        }
        if(filter_branch != '') {
          url += '&filter_branch='+filter_branch
        }
         if(filter_work_mode != 0) {
          url += '&filter_work_mode='+filter_work_mode
        }
        if(filter_status != 0) {
          url += '&filter_status='+filter_status
        }
        // alert(url)
        location = url;
      }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>