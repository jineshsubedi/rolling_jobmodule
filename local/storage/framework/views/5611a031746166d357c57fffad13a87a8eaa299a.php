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
      <div class="box">
        <div class="box-body">
          <h3>राशिफल - Horoscope</h3>
          <p><?php echo e(\Carbon\Carbon::today()->format('M d, Y')); ?></p>
          <form action="<?php echo e(route('branchadmin.horoscope.save')); ?>" class="fomr-horizontal" method="post">
          <?php echo csrf_field(); ?>

            <div class="row">
              <div class="col-md-6">
                <h4> नेपाली</h4>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">मेष</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="rashi1" class="form-control"><?php echo e(isset($data->rashi1) ? $data->rashi1 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">बृष</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="rashi2" class="form-control"><?php echo e(isset($data->rashi2) ? $data->rashi2 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">मिथुन</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="rashi3" class="form-control"><?php echo e(isset($data->rashi3) ? $data->rashi3 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">कर्कट</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="rashi4" class="form-control"><?php echo e(isset($data->rashi4) ? $data->rashi4 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">सिंह</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="rashi5" class="form-control"><?php echo e(isset($data->rashi5) ? $data->rashi5 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">कन्या</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="rashi6" class="form-control"><?php echo e(isset($data->rashi6) ? $data->rashi6 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">तुला</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="rashi7" class="form-control"><?php echo e(isset($data->rashi7) ? $data->rashi7 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">बृश्चिक</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="rashi8" class="form-control"><?php echo e(isset($data->rashi8) ? $data->rashi8 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">धनु</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="rashi9" class="form-control"><?php echo e(isset($data->rashi9) ? $data->rashi9 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">मकर</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="rashi10" class="form-control"><?php echo e(isset($data->rashi10) ? $data->rashi10 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">कुम्भ</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="rashi11" class="form-control"><?php echo e(isset($data->rashi11) ? $data->rashi11 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">मीन</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="rashi12" class="form-control"><?php echo e(isset($data->rashi12) ? $data->rashi12 : ''); ?></textarea>
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                <h4> English</h4>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">Aries</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="zodiac1" class="form-control"><?php echo e(isset($data->zodiac1) ? $data->zodiac1 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">Taurus</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="zodiac2" class="form-control"><?php echo e(isset($data->zodiac2) ? $data->zodiac2 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">Gemini</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="zodiac3" class="form-control"><?php echo e(isset($data->zodiac3) ? $data->zodiac3 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">Cancer</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="zodiac4" class="form-control"><?php echo e(isset($data->zodiac4) ? $data->zodiac4 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">Leo</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="zodiac5" class="form-control"><?php echo e(isset($data->zodiac5) ? $data->zodiac5 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">Virgo</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="zodiac6" class="form-control"><?php echo e(isset($data->zodiac6) ? $data->zodiac6 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">Libra</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="zodiac7" class="form-control"><?php echo e(isset($data->zodiac7) ? $data->zodiac7 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">Scorpio</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="zodiac8" class="form-control"><?php echo e(isset($data->zodiac8) ? $data->zodiac8 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">Sagittarius</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="zodiac9" class="form-control"><?php echo e(isset($data->zodiac9) ? $data->zodiac9 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">Capricorn</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="zodiac10" class="form-control"><?php echo e(isset($data->zodiac10) ? $data->zodiac10 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">Aquarius</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="zodiac11" class="form-control"><?php echo e(isset($data->zodiac11) ? $data->zodiac11 : ''); ?></textarea>
                    </div>
                </div>
                <div class="col-md-10 cl-md-offset-1 form-group">
                    <div class="col-md-3">
                        <span style="font-size: 14px; font-weight: 600">Pisces</span>  
                    </div>
                    <div class="col-md-9">
                        <textarea name="zodiac12" class="form-control"><?php echo e(isset($data->zodiac12) ? $data->zodiac12 : ''); ?></textarea>
                    </div>
                </div>
                
              </div>
              <div class="col-md-12 form-group ">
                <button type="submit" class="btn btn-primary">SAVE</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  <div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>