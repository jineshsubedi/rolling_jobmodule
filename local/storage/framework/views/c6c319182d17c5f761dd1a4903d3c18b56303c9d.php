<?php $__env->startSection('heading'); ?>
Review of <?php echo e($data['client_name']); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo e(url('/branchadmin/clientdetail')); ?>"><i class="fa fa-dashboard"></i> Clients</a></li>
<li class="active">View Rating</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
   
    
    <div class="box">
      <div class="box-body">
        <div class="panel-heading">
          <div class="top-links btn-group col-md-12">
            
            <a href="<?php echo e(url('/branchadmin/clientdetail/view-rating/'.$data['client_id'].'?tab=org')); ?>" class="btn <?php echo e($data['tab'] == 'org' ? 'btn-primary' : 'btn-default'); ?>">Organization Review</a>
            <?php if(count($data['staff_rating']) > 0): ?>
            <?php foreach($data['staff_rating'] as $crt): ?>
            <a href="<?php echo e(url('/branchadmin/clientdetail/view-rating/'.$data['client_id'].'?tab=staff&staff_id='.$crt['id'])); ?>" class="btn <?php echo e($data['staff_id'] == $crt['id'] ? 'btn-primary' : 'btn-default'); ?>"><?php echo e($crt['name']); ?></a>
            <?php endforeach; ?>
            <?php endif; ?>
           
          </div>
         
        </div>
        <div class="panel-heading">
          <div class="row">
            
            
          </div>
        </div>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 1%;">S.N.</th>
              <th>Rating Title</th>
              <th>Rating</th>
              <th>Remarks</th>
              <th>Date</th>
            
            </tr>
          </thead>
          <tbody>
           
            
            <?php ($i = 1); ?>
            <?php foreach($data['org_rating'] as $org_rating): ?>
            <tr>
              <td><?php echo e($i++); ?></td>
              <td>Overal</td>
              <td><?php echo e($org_rating->overal_rating); ?></td>
              <td><?php echo e($org_rating->overal_remarks); ?></td>
              <td><?php echo e($org_rating->created_at); ?></td>
              
              
              
           
            </tr>
            <?php ($others = json_decode($org_rating->others)); ?>
            <?php foreach($others as $other): ?>
              <tr>
              <td><?php echo e($i++); ?></td>
              <td><?php echo e($other->title); ?></td>
              <td><?php echo e($other->rating); ?></td>
              <td><?php echo e($other->remark); ?></td>
              <td><?php echo e($org_rating->created_at); ?></td>
              
              
              
           
            </tr>
            <?php endforeach; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
        
      </div>
      
      </div><!-- /.box-body -->
    </div>
  </div>
  <div>
    <div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="dataTables_paginate paging_simple_numbers right">
          <?php echo $data['org_rating']->render();?>
        </div>
      </div>
    </div>
    
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>