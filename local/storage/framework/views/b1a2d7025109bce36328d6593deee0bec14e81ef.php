<?php $__env->startSection('heading'); ?>
Horoscope
            <small>List of Horoscope</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            
            <li class="active">Horoscope</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-md-12">
        <a href="<?php echo e(url('/branchadmin/horoscope/create')); ?>" class="btn refreshbtn right btm10m"><i class="fa fa-plus-circle"></i> Add Horoscope</a>
      </div>
      </div>
      <div class="box">
        <div class="box-body">
        <h3>राशिफल - Horoscope</h3>
        <p><?php echo e(\Carbon\Carbon::today()->format('M d, Y')); ?></p>
            <?php if(isset($nepali) && isset($english)): ?>
                <div class="row">
                    <div class="col-md-6">
                        <h4> नेपाली</h4>
                        <?php foreach($nepali as $nep): ?>
                        <div class="col-md-10 cl-md-offset-1" style="border: 1px solid grey; border-radius: 4px; margin-top: 5px;">
                            <div class="col-md-3">
                                <img src="<?php echo e($nep->image); ?>" style="object-fit: contain; width: 100%">
                            </div>
                            <div class="col-md-9">
                                <p><span style="font-size: 14px; font-weight: 600"><?php echo e($nep->title); ?></span></p>
                                <p><?php echo e($nep->data); ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-md-6">
                        <h4>English</h4>
                        <?php foreach($english as $eng): ?>
                        <div class="col-md-10 cl-md-offset-1" style="border: 1px solid grey; border-radius: 4px; margin-top: 5px;">
                            <div class="col-md-3">
                                <img src="<?php echo e($eng->image); ?>" style="object-fit: contain; width: 100%">
                            </div>
                            <div class="col-md-9">
                                <p><span style="font-size: 14px; font-weight: 600"><?php echo e($eng->title); ?></span></p>
                                <p><?php echo e($eng->data); ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
      </div>
    </div>
  <div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>