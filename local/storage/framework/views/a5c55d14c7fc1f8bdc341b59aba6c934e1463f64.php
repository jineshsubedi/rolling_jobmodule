<?php $__env->startSection('heading'); ?>
New Client Detail
            <small>Detail of New Client Detail</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo e(url('/supervisor/clientdetail')); ?>">Client Detail</a></li>
            <li class="active">New Client Detail</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <style type="text/css">
     .display-none{
        display: none;
     }
     .display-block{
        display: block;
     }
 </style>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">New Client Detail</div>
                <div class="panel-body">
                     <?php if(count($errors)): ?>
                <div class="row">
            <div class="col-xs-12">
            <div class="alert alert-danger">
             <?php foreach($errors->all() as $error): ?>
              <?php echo e('* : '.$error); ?></br>
             <?php endforeach; ?>
                </div>
            </div>

          </div>
       <?php endif; ?>
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(url('/supervisor/clientdetail/save')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                         <div class="col-md-10">
                              <div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
                            <label class="col-md-3 control-label">Country</label>

                            <div class="col-md-9">
                            
                             <select class="form-control" name="country" id="country">
                                <option value="">Select Country</option>
                                <?php foreach($datas['countries'] as $countries): ?>
                                <?php if(old('country') == $countries['value']): ?>
                                <option selected="selected" value="<?php echo e($countries['value']); ?>"><?php echo e($countries['value']); ?></option>
                                <?php else: ?>
                                <option value="<?php echo e($countries['value']); ?>"><?php echo e($countries['value']); ?></option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                              
                             <?php if($errors->has('country')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('country')); ?></strong>
                                    </span>
                                <?php endif; ?>
                               
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('client_name') ? ' has-error' : ''); ?>">
                            <label class="col-md-3 control-label">Client Name</label>

                            <div class="col-md-9">

                            <input type="text" required name="client_name" value="<?php echo e(old('client_name')); ?>" placeholder="Client Name" class="form-control" />
                              
                             <?php if($errors->has('client_name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('client_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                               
                            </div>
                        </div>
                         <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                        <label class="col-md-3 control-label">Address</label>
                                  <div class="col-md-9">
                           <input type="text" name="address" class="form-control" value="<?php echo e(old('address')); ?>">
                              
                             <?php if($errors->has('address')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('address')); ?></strong>
                                    </span>
                                <?php endif; ?>
                               
                            </div>
                        </div>
                   
                    
                        <div class="form-group<?php echo e($errors->has('business_nature') ? ' has-error' : ''); ?>">
                            <label class="col-md-3 control-label">Nature of Business</label>

                            <div class="col-md-9">
                            
                             <select class="form-control" name="business_nature" id="business_nature">
                                <option value="">Select Nature of Business</option>
                                <?php foreach($datas['nature'] as $nature): ?>
                                <?php if(old('business_nature') == $nature): ?>
                                <option selected="selected" value="<?php echo e($nature); ?>"><?php echo e($nature); ?></option>
                                <?php else: ?>
                                <option value="<?php echo e($nature); ?>"><?php echo e($nature); ?></option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                              
                             <?php if($errors->has('business_nature')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('business_nature')); ?></strong>
                                    </span>
                                <?php endif; ?>
                               
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('service_type') ? ' has-error' : ''); ?>">
                            <label class="col-md-3 control-label">Type of Service/Project</label>

                            <div class="col-md-9">
                            <select class="form-control" name="service_type" id="service_type">
                                <option value="">Select Service/Project Type</option>
                                <?php foreach($datas['types'] as $type): ?>
                                <?php if(old('service_type') == $type): ?>
                                <option selected="selected" value="<?php echo e($type); ?>"><?php echo e($type); ?></option>
                                <?php else: ?>
                                <option value="<?php echo e($type); ?>"><?php echo e($type); ?></option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                          
                              
                             <?php if($errors->has('service_type')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('service_type')); ?></strong>
                                    </span>
                                <?php endif; ?>
                               
                            </div>
                        </div>

                        <div id="other_type" class="form-group<?php echo e($errors->has('other_type') ? ' has-error display-block' : ' display-none'); ?>">
                        <label class="col-md-3 control-label">Other Type</label>
                                  <div class="col-md-9">
                            <input type="text" name="other_type" id="o-type" class="form-control" value="<?php echo e(old('other_type')); ?>">
                              
                             <?php if($errors->has('other_type')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('other_type')); ?></strong>
                                    </span>
                                <?php endif; ?>
                               
                            </div>
                        </div>
                        
                         <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                        <label class="col-md-3 control-label">Phone Number</label>
                                  <div class="col-md-9">
                           <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone')); ?>">
                              
                             <?php if($errors->has('phone')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                <?php endif; ?>
                               
                            </div>
                        </div>

                         <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label class="col-md-3 control-label">E-mail</label>
                                  <div class="col-md-9">
                           <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>">
                              
                             <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                               
                            </div>
                        </div>
                         <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                        <label class="col-md-3 control-label">Status</label>
                                  <div class="col-md-9">
                           <select class="form-control" name="status" id="status">
                            <option value="">Select Status</option>
                            <?php foreach($datas['status'] as $status): ?>
                            <?php if($status['value'] == old('status')): ?>
                            <option selected="selected" value="<?php echo e($status['value']); ?>"><?php echo e($status['title']); ?></option>
                            <?php else: ?>
                            <option value="<?php echo e($status['value']); ?>"><?php echo e($status['title']); ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            </select>
                              
                             <?php if($errors->has('status')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('status')); ?></strong>
                                    </span>
                                <?php endif; ?>
                               
                            </div>
                        </div>
                        

          
                        
                        
                    </div>
                </div>
                  
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-fw fa-save"></i>Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#service_type').on('change', function(){
        var data = $(this).val();
        if (data == 'Others') {
            $('#o-type').val('');
            $('#other_type').val('').fadeIn();

        } else{
            $('#o-type').val('');
            $('#other_type').val('').fadeOut();
        }
    });

     $('#status').on('change', function(){
        var data = $(this).val();
        if (data == 3) {

            $('#close_remarks').fadeIn();
        } else{
            $('#close_remarks').fadeOut();
            $('#other_remarks').fadeOut();
            $('#o-remarks').val('');
        }
    });

      $('#closed_remarks').on('change', function(){
        var data = $('#closed_remarks').val();
        
        if (data == 'Others') {

            $('#other_remarks').fadeIn();

        } else{
            $('#o-remarks').val('');
            $('#other_remarks').fadeOut();
        }
    });

      $(function(){
        $('.datepicker').datepicker();
      })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>