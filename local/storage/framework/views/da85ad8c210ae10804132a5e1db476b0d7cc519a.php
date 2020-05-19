<?php $__env->startSection('heading'); ?>
Staff
            <small>List of Staff</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Staff</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
     
      <div class="box">
            <div class="box-body">
            <div class="row">
              <form class="form-horizontal" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" action="<?php echo e(url('/branchadmin/otstaff/uploadstaffs')); ?>">
                
              <?php echo csrf_field(); ?>

              <div class="col-md-6">
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
               <div class="col-md-2">
                <button type="submit" class="btn refreshbtn">
                                    <i class="fa fa-fw fa-save"></i>Upload
                                </button>
              </div>
              
              <div class="col-md-4"><a href="<?php echo e(url('image/sample-staff_file.csv')); ?>" class="btn btn-success" title="Download Sample File" download>Sample File</a>
        <a href="<?php echo e(url('/branchadmin/otstaff/addnew')); ?>" class="btn addnew right"><i class="fa fa-fw fa-plus"></i>Add New Staff</a>
        <a href="<?php echo e(url('/branchadmin/otstaff/export?'.$datas['url'])); ?>" class="btn btn-success right"><i class="fa fa-fw fa-download"></i>Export To CSV</a>
              </div>
            </form>
          </div>
                       
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
                        <td><a href="<?php echo e(url('/branchadmin/otstaff/edit/'.$row->id)); ?>" title="View or Edit" class="btn btn-primary left"><i class="fa fa-eye"></i> / <i class="fa fa-edit"></i></a>
                          <a  href="javascript:void(0);" onClick="confirm_delete('/<?php echo e($row->id); ?>')" class="btn btn-danger left"><i class="fa fa-fw fa-remove"></i></a>
                          <a  href="<?php echo e(url('/branchadmin/otstaff/salary/'.$row->id)); ?>" class="btn btn-success left">Salary</a>
                          <a  href="<?php echo e(url('/branchadmin/otstaff/reports/'.$row->id)); ?>" class="btn report left">Reports</a>
                          <a href="<?php echo e(url('/branchadmin/otstaff/history/'.$row->id)); ?>" class="btn btn-success left">History</a>
                          <?php if(!$row->appointment_letter): ?>
                          <a href="<?php echo e(url('/branchadmin/otstaff/appointment_letter/'.$row->id)); ?>" class="btn btn-info left"><i class="fa fa-file-pdf-o"></i></a>
                          <?php endif; ?>
                          <a href="<?php echo e(url('/branchadmin/probation/'.$row->id.'/view')); ?>" title="View or Edit" class="btn btn-default left">Probation</a>
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
      var url= "<?php echo e(url('/branchadmin/otstaff/delete/')); ?>"+ids;
      location = url;
      
      }
    }
  function filterData(){
        var url= "<?php echo e(url('/branchadmin/otstaff/?')); ?>";
        
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
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>