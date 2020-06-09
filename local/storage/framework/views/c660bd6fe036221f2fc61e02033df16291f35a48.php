<?php $__env->startSection('heading'); ?>
Job Level
            <small>List of Calendar</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Job Calendar</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


 <div class="row">
    <div class="col-xs-12">
      <div class="row">
          <a href="<?php echo e(route('branchadmin.dropbox.uploadinfolder', $data['metadata']['id'])); ?>" class="btn btn-primary right"><i class="fa fa-fw fa-plus"></i>Add New Document inside Folder</a>
          <a href="<?php echo e(route('branchadmin.dropbox.newfolder', $data['metadata']['id'])); ?>" class="btn btn-primary right"><i class="fa fa-file"></i> Add New folder to dropbox</a>
          <a href="<?php echo e(route('branchadmin.dropbox.index')); ?>" class="btn btn-primary"><i class="fa fa-list"></i>Back to index</a>
      </div>
      <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                          <th>Title</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;
                        foreach ($data['results'] as $row) { ?>
                          <tr>
                        <td><?php echo $i++ ;?></td>
                              <td>
                                  <?php if($row['.tag'] == 'folder'): ?>
                                      <a href="<?php echo e(route('branchadmin.dropbox.openfolder', $row['id'])); ?>"><i class="fa fa-folder"></i> <?php echo e($row['name']); ?></a><br>
                                  <?php else: ?>
                                      <?php echo e($row['name']); ?>

                                  <?php endif; ?>
                              </td>
                        <td>
                          <form action="<?php echo e(route('branchadmin.dropbox.destroy', $row['id'])); ?>" method="post">
                              <?php echo csrf_field(); ?>

                              <?php echo method_field('DELETE'); ?>

                              <?php if($row['.tag'] == 'folder'): ?>
                                  <a href="<?php echo e(route('branchadmin.dropbox.openfolder', $row['id'])); ?>" class="btn btn-primary left"><i class="fa fa-eye"></i></a>
                              <?php else: ?>
                                  <a href="<?php echo e(route('branchadmin.dropbox.show', $row['id'])); ?>" target="_blank" class="btn btn-primary left"><i class="fa fa-eye"></i></a>
                              <?php endif; ?>
                              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');"><i class="fa fa-fw fa-remove"></i></button>
                          </form>
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
      <div class="dataTables_paginate paging_simple_numbers">

<!--          --><?php //echo $data->render();?>
      </div>
    </div>
  </div>
  
  <script type="text/javascript">
    function confirm_delete(ids){
    if(confirm('Do You Want To Delete This joblevel?')){
      var url = "<?php echo e(url('/branchadmin/job_level/"+ids+"/delete')); ?>";
      location = url;
      }
    }
 </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>