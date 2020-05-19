<?php $__env->startSection('heading'); ?>
Awards
            <small>List of Awards</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Awards</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-md-12">
        <a href="<?php echo e(url('/branchadmin/award-category/addnew')); ?>" class="btn refreshbtn right btm10m"><i class="fa fa-plus-circle"></i> Add New Award</a>
      </div>
      </div>
     
      <div class="box">
            <div class="box-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th> S.N.</th>
                        <th style="width: 20%"> Title</th>
                        <th> Award Date</th>
                        <th style="width: 40%"> Winner</th>
                        <th style="width: 20%;"> Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      
                      <?php $i=1; 
                        foreach ($datas['award_category'] as $row) { 
                          $winners = json_decode($row->staff_id)
                          ?>
                          <tr>
                        <td><?php echo $i++ ;?></td>
                        <td style="width: 20%"><?php echo $row->title;?></td>
                        <?php if($row->award_date): ?>
                        <td><?php echo e(\Carbon\Carbon::parse($row->award_date)->format('d M, Y')); ?></td>
                        <?php else: ?> 
                        <td></td>
                        <?php endif; ?>
                        <td style="width: 40%">
                          <?php if(isset($winners) && count($winners) > 0): ?>
                            <?php foreach($winners as $winner): ?>
                              <?php echo e(\App\Adjustment_staff::getName($winner)); ?>,
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </td>
                      
                        <td style="width: 20%;">
                          <a href="<?php echo e(url('/branchadmin/award-category/edit/'.$row->id)); ?>" class="btn btn-primary left"><i class="fa fa-edit"></i></a>
                          <a href="javascript:void(0);" onClick="confirm_delete('/<?php echo e($row->id); ?>')" class="btn btn-danger left"><i class="fa fa-fw fa-remove"></i></a>
                          <a href="<?php echo e(route('branchadmin.award-category.generateLetter',$row->id)); ?>" class="btn btn-primary left"><i class="fa fa-file-pdf-o"></i></a>
                        </td>
                      </tr>
                      <?php  }                 ?>
                      <?php if($datas['kpi_master'] != ''): ?>
                      <tr>
                        <td><?php echo e($i++); ?></td>
                        <td>KPI Master</td>
                        <td><?php echo e($datas['kpi_master']); ?></td>
                        <td></td>
                      </tr>
                      <?php endif; ?>
                      <?php if($datas['wow'] != ''): ?>
                      <tr>
                        <td><?php echo e($i++); ?></td>
                        <td>Wow Rating Master</td>
                        <td><?php echo e($datas['wow']); ?></td>
                        <td></td>
                      </tr>
                      <?php endif; ?>
                      <?php if($datas['client'] != ''): ?>
                      <tr>
                        <td><?php echo e($i++); ?></td>
                        <td>Client Master</td>
                        <td><?php echo e($datas['client']); ?></td>
                        <td></td>
                      </tr>
                      <?php endif; ?>
                      <?php if($datas['help'] != ''): ?>
                      <tr>
                        <td><?php echo e($i++); ?></td>
                        <td>Helping Hand Master</td>
                        <td><?php echo e($datas['help']); ?></td>
                        <td></td>
                      </tr>
                      <?php endif; ?>
                      <?php if($datas['achievement'] != ''): ?>
                      <tr>
                        <td><?php echo e($i++); ?></td>
                        <td>Achievement Master</td>
                        <td><?php echo e($datas['achievement']); ?></td>
                        <td></td>
                      </tr>
                      <?php endif; ?>
                      <tr>
                        <td colspan="4" style="background: #CCCCCC; font-weight: 700; font-size: 16px">Informal Category</td>
                      </tr>
                      <?php if($datas['overtime'] != ''): ?>
                      <tr>
                        <td><?php echo e($i++); ?></td>
                        <td>Overtime Master</td>
                        <td><?php echo e($datas['overtime']); ?></td>
                        <td></td>
                      </tr>
                      <?php endif; ?>
                      <?php if(count($datas['healthy']) > 0): ?>
                      <tr>
                        <td><?php echo e($i++); ?></td>
                        <td>Most Healthy</td>
                        <td><?php foreach($datas['healthy'] as $healthy): ?><?php echo e($healthy); ?>,&nbsp;<?php endforeach; ?></td>
                        <td></td>
                      </tr>
                      <?php endif; ?>
                      <?php if(count($datas['unhealthy']) > 0): ?>
                      <tr>
                        <td><?php echo e($i++); ?></td>
                        <td>Good to Marry a doctor</td>
                        <td><?php foreach($datas['unhealthy'] as $unhealthy): ?><?php echo e($unhealthy); ?>,&nbsp;<?php endforeach; ?></td>
                        <td></td>
                      </tr>
                      <?php endif; ?>
                       <?php if($datas['workaholic'] != ''): ?>
                      <tr>
                        <td><?php echo e($i++); ?></td>
                        <td>Workaholic</td>
                        <td><?php foreach($datas['workaholic'] as $workaholic): ?><?php echo e($workaholic); ?>,&nbsp;<?php endforeach; ?></td>
                        <td></td>
                      </tr>
                      <?php endif; ?>
                       <?php if($datas['ra'] != ''): ?>
                      <tr>
                        <td><?php echo e($i++); ?></td>
                        <td>RA Addict</td>
                        <td><?php foreach($datas['ra'] as $ra): ?><?php echo e($ra); ?>,&nbsp;<?php endforeach; ?></td>
                        <td></td>
                      </tr>
                      <?php endif; ?>
                       <?php if($datas['weekend'] != ''): ?>
                      <tr>
                        <td><?php echo e($i++); ?></td>
                        <td>Weekend Star</td>
                        <td><?php foreach($datas['weekend'] as $weekend): ?><?php echo e($weekend); ?>,&nbsp;<?php endforeach; ?></td>
                        <td></td>
                      </tr>
                      <?php endif; ?>
                    </table>

          </div><!-- /.box-body -->
      </div>
    </div>
  <div>

  <div>
  </div>
  
  <script type="text/javascript">

 
     function confirm_delete(ids){
    if(confirm('Do You Want To Delete This Holiday?')){
      var url= "<?php echo e(url('/branchadmin/award-category/delete/')); ?>"+ids;
      location = url;
      
      }
    }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>