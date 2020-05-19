<?php $__env->startSection('heading'); ?>
Travel Request
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Travel Request</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Make Travel Request</h3>
        </div>
      <div class="box-body">
      <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(route('supervisor.travel.store')); ?>">
        <?php echo csrf_field(); ?>

       <div class="row">
            <div class="col-md-10" id="multiCategory">
                <div class="form-group<?php echo e($errors->has('type') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Type</label>
                    <div class="col-md-8">
                        <select name="type" id="type" class="form-control required">
                            <option value="">Select Type</option>
                            <option value="domestic">Domestic</option>
                            <option value="international">International</option>
                        </select>
                        <?php if($errors->has('type')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('type')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('departure_date') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Departure Date</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control datepicker" id="departure_date" name="departure_date" value="<?php echo e(old('departure_date')); ?>" placeholder="Departure Date" autocomplete="off">
                        <?php if($errors->has('departure_date')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('departure_date')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('arrival_date') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Arrival Date</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control datepicker" id="arrival_date" name="arrival_date" value="<?php echo e(old('arrival_date')); ?>" placeholder="Arrival Date" autocomplete="off">
                        <?php if($errors->has('arrival_date')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('arrival_date')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('expected_days') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Expected Days</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" id="expected_days" name="expected_days" value="<?php echo e(old('expected_days')); ?>" placeholder="Expected day" autocomplete="off">
                        <?php if($errors->has('expected_days')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('expected_days')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('purpose') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Purpose</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="purpose" name="purpose" value="<?php echo e(old('purpose')); ?>" placeholder="Purpose" autocomplete="off">
                        <?php if($errors->has('purpose')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('purpose')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="<?php echo e($errors->has('place.*') ? ' has-error' : ''); ?>" id="morePlace">
                    <div id="place_from1" class="form-group">
                    <label class="col-md-2 control-label required">Place</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="place" name="place[]" value="<?php echo e(old('place')); ?>" placeholder="Place" autocomplete="off">
                        <?php if($errors->has('place.*')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('place')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-info" onclick="addMorePlaceBtn()"><i class="fa fa-plus"></i></button>
                    </div>
                    <div class="clearfix"></div>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('client') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Client</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="client" name="client" value="<?php echo e(old('client')); ?>" placeholder="Client Name" autocomplete="off">
                        <?php if($errors->has('client')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('client')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('payment') ? ' has-error' : ''); ?>" id="newform0">
                    <label class="col-md-2 control-label required">Payment</label>
                    <div class="col-md-8">
                        <select name="payment" id="payment" class="form-control">
                            <option value="">Select Payment</option>
                            <option value="client">Client</option>
                            <option value="company">Company</option>
                        </select>
                        <?php if($errors->has('payment')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('payment')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <label class="col-md-2 control-label required">Amount Request</label>
                    <div class="col-md-8">
                        <select name="request_fund" id="fund_request" class="form-control">
                            <option value="">Select</option>
                            <option value="1">Fixed TADA</option>
                            <option value="2">Advance</option>
                        </select>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('advance_amount') ? ' has-error' : ''); ?>" id="advance_amount">
                    <label class="col-md-2 control-label required">Advance Amount</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="advance_amount" value="<?php echo e(old('advance_amount')); ?>" placeholder="advance_amount Name" autocomplete="off">
                        <?php if($errors->has('advance_amount')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('advance_amount')); ?></strong>
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
  <script>
    var count = 1;
    $('.datepicker').datepicker();
    $('#advance_amount').hide();
    $('#fund_request').change(function(){
        var type = $(this).val();
        if(type == 2)
        {
            $('#advance_amount').show();
        }else{
            $('#advance_amount').hide();
        }
    })
    function addMorePlaceBtn()
    {
        count++;
        html = '<div id="place_from'+count+'" class="form-group"><label class="col-md-2 control-label required">Place</label><div class="col-md-6"><input type="text" class="form-control" id="place" name="place[]" placeholder="Place" autocomplete="off"></div><div class="col-md-2"><button type="button" class="btn btn-warning" onclick="removeMorePlaceBtn('+count+')"><i class="fa fa-trash"></i></button></div><div class="clearfix"></div></div>';
        $('#morePlace').append(html)
    }
    function removeMorePlaceBtn(id)
    {
        $('#place_from'+id).remove()
    }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>