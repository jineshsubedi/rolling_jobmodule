<?php $__env->startSection('heading'); ?>
Salary Detail
            <small>Detail of Salary</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo e(url('/staffs/otstaff')); ?>">Organization Branch</a></li>
            <li class="active">Salary</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Salary</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(url('/staffs/staff_salary/salary/save')); ?>">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="staff_id" value="<?php echo e($data['salary']['staff_id']); ?>">
                        <input type="hidden" name="salary_id" value="<?php echo e($data['salary']['salary_id']); ?>">
                        <div class="row">
                            <div class="col-md-10">
                                <label style="font-size:14px;"><u>Income</u></label>
                                <div class="form-group<?php echo e($errors->has('base_salary') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">Base Salary</label>

                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="base_salary" name="base_salary" value="<?php echo e($data['salary']['base_salary']); ?>">

                                        <?php if($errors->has('base_salary')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('base_salary')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('basic_salary') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">Basic Salary</label>

                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="basic_salary" name="basic_salary" value="<?php echo e($data['salary']['basic_salary']); ?>">

                                        <?php if($errors->has('basic_salary')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('basic_salary')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('incentive') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">Incentive</label>

                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="incentive" name="incentive" value="<?php echo e($data['salary']['incentive']); ?>">

                                        <?php if($errors->has('incentive')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('incentive')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('ot') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">Overtime</label>

                                    <div class="col-md-8">
                                        <select class="form-control" name="ot">
                                            <?php foreach($data['yn'] as $yn): ?>
                                            <?php if($data['salary']['ot'] == $yn['value']): ?>
                                            <option selected="selected" value="<?php echo e($yn['value']); ?>"><?php echo e($yn['title']); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo e($yn['value']); ?>"><?php echo e($yn['title']); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>

                                        <?php if($errors->has('ot')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('ot')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('salary_date') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">Salary Date</label>

                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="salary_date" name="salary_date" value="<?php echo e($data['salary']['salary_date']); ?>">

                                        <?php if($errors->has('salary_date')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('salary_date')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('da') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">Dearness Allowance</label>

                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="da" name="da" value="<?php echo e($data['salary']['da']); ?>">

                                        <?php if($errors->has('da')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('da')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('con_a') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">Conveyance Allowance</label>

                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="con_a" name="con_a" value="<?php echo e($data['salary']['con_a']); ?>">

                                        <?php if($errors->has('con_a')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('con_a')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('daily_a') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">Daily Allowance</label>

                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="daily_a" name="daily_a" value="<?php echo e($data['salary']['daily_a']); ?>">

                                        <?php if($errors->has('daily_a')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('daily_a')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('fuel_a') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">Fuel Allowance</label>

                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="fuel_a" name="fuel_a" value="<?php echo e($data['salary']['fuel_a']); ?>">

                                        <?php if($errors->has('fuel_a')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('fuel_a')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('mobile_a') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">Mobile Allowance</label>

                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="mobile_a" name="mobile_a" value="<?php echo e($data['salary']['mobile_a']); ?>">

                                        <?php if($errors->has('mobile_a')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('mobile_a')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('project_a') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">Project Allowance</label>

                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="project_a" name="project_a" value="<?php echo e($data['salary']['project_a']); ?>">

                                        <?php if($errors->has('project_a')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('project_a')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('petty_cash') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">Petty Cash</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="petty_cash" name="petty_cash" value="<?php echo e($data['salary']['petty_cash']); ?>">

                                        <?php if($errors->has('petty_cash')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('petty_cash')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('others') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">Others</label>

                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="others" name="others" value="<?php echo e($data['salary']['others']); ?>">

                                        <?php if($errors->has('others')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('others')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <label style="font-size:14px;"><u>Annual Deduction</u></label>
                                <div class="form-group<?php echo e($errors->has('pf') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">Provident Fund</label>

                                    <div class="col-md-8">
                                        <select class="form-control" name="pf">
                                            <?php foreach($data['yn'] as $yn): ?>
                                            <?php if($data['salary']['pf'] == $yn['value']): ?>
                                            <option selected="selected" value="<?php echo e($yn['value']); ?>"><?php echo e($yn['title']); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo e($yn['value']); ?>"><?php echo e($yn['title']); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>

                                        <?php if($errors->has('pf')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('pf')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('cit') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">CIT</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="cit" name="cit" value="<?php echo e($data['salary']['cit']); ?>">

                                        <?php if($errors->has('cit')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('cit')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('insurance') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">Insurance</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="insurance" name="insurance" value="<?php echo e($data['salary']['insurance']); ?>">

                                        <?php if($errors->has('insurance')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('insurance')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('advance') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">Advance</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="advance" name="advance" value="<?php echo e($data['salary']['advance']); ?>">

                                        <?php if($errors->has('advance')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('advance')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('advance_canteen') ? ' has-error' : ''); ?>">
                                    <label class="col-md-4 control-label">Advance Canteen</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="advance_canteen" name="advance_canteen" value="<?php echo e($data['salary']['advance_canteen']); ?>">

                                        <?php if($errors->has('advance_canteen')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('advance_canteen')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <?php $all_row = 0; ?>
                        <div id="sifts" >
                            <div class="row" style="margin-bottom: 20px;">
                                <div class="col-md-12 task-header">
                                <label style="font-size:14px;"><u>Allowances</u></label>
                                    <!-- <strong>Allowances</strong> -->
                                </div>
                            </div>
                        <?php if(is_array(old('allowance'))): ?>
                        <?php if(count(old('allowance')) > 0): ?>
                        <?php foreach(old('allowance') as $key => $time): ?>
                         <div class="row" id="allowance_<?php echo e($all_row); ?>">
                         <div class="col-md-4">
                            <label class="col-md-6 control-label">Title</label>
                            <div class="col-md-6">
                                <div class="form-group<?php echo e($errors->has('allowance.'.$key.'.title') ? ' has-error' : ''); ?>">
                                    
                                        <input type="text" class="form-control" name="allowance[<?php echo e($all_row); ?>][title]" value="<?php echo e($time['title']); ?>">

                                        <?php if($errors->has('allowance.'.$key.'.title')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('allowance.'.$key.'.title')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group<?php echo e($errors->has('allowance.'.$key.'.amount') ? ' has-error' : ''); ?>">
                                <label class="col-md-6 control-label">Amount</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control timepicker" name="allowance[<?php echo e($all_row); ?>][amount]" value="<?php echo e($time['amount']); ?>">

                                    <?php if($errors->has('allowance.'.$key.'.amount')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('allowance.'.$key.'.amount')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group<?php echo e($errors->has('allowance.'.$key.'.type') ? ' has-error' : ''); ?>">
                            <label class="col-md-6 control-label">Type</label>

                            <div class="col-md-6">
                                <select class="form-control" name="allowance[<?php echo e($all_row); ?>][type]">
                                    <?php foreach($data['sad'] as $sad): ?>
                                    <?php if($time['type'] == $sad['value']): ?>
                                    <option selected="selected" value="<?php echo e($sad['value']); ?>"><?php echo e($sad['title']); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($sad['value']); ?>"><?php echo e($sad['title']); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                
                                <?php if($errors->has('allowance.'.$key.'.type')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('allowance.'.$key.'.type')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        

                    </div>
                    <div class="col-md-2">
                        
                       <button class="btn btn-danger margin-top-6 delete_desc" onclick="$('#allowance_<?php echo e($all_row); ?>').remove();" data-toggle="tooltip" title="" type="button" data-original-title="remove"><i class="fa fa-times"></i></button>
                        

                    </div>
                </div>
                        <?php $all_row++ ?>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <?php elseif(count($data['staff_allowance']) > 0): ?>
                        <?php foreach($data['staff_allowance'] as $staff_allowance): ?>
                        <div class="row" id="allowance_<?php echo e($all_row); ?>">
                         <div class="col-md-4">
                        
                        
                        <div class="form-group">
                            <label class="col-md-6 control-label">Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="allowance[<?php echo e($all_row); ?>][title]" value="<?php echo e($staff_allowance->title); ?>">

                               
                            </div>
                        </div>

                        

                    </div>
                    <div class="col-md-3">
                        
                        
                        <div class="form-group">
                            <label class="col-md-6 control-label">Amount</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control timepicker" name="allowance[<?php echo e($all_row); ?>][amount]" value="<?php echo e($staff_allowance->amount); ?>">

                                
                            </div>
                        </div>

                        

                    </div>
                    <div class="col-md-3">
                        
                        
                        <div class="form-group">
                            <label class="col-md-6 control-label">Type</label>

                            <div class="col-md-6">
                                 <select class="form-control" name="allowance[<?php echo e($all_row); ?>][type]">
                                    <?php foreach($data['sad'] as $sad): ?>
                                    <?php if($staff_allowance->amount == $sad['value']): ?>
                                    <option selected="selected" value="<?php echo e($sad['value']); ?>"><?php echo e($sad['title']); ?></option>
                                    <?php else: ?>
                                     <option value="<?php echo e($sad['value']); ?>"><?php echo e($sad['title']); ?></option>
                                     <?php endif; ?>
                                   
                                    <?php endforeach; ?>
                                </select>

                               
                            </div>
                        </div>

                        

                    </div>
                    <div class="col-md-2">
                        
                       <button class="btn btn-danger margin-top-10 delete_desc" onclick="$('#allowance_<?php echo e($all_row); ?>').remove();" data-toggle="tooltip" title="" type="button" data-original-title="remove"><i class="fa fa-times"></i></button>
                        

                    </div>
                </div>

                        <?php ($all_row++); ?>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <div class="row" id="allowance_<?php echo e($all_row); ?>">
                         <div class="col-md-4">
                        
                        
                        <div class="form-group">
                            <label class="col-md-6 control-label">Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="allowance[<?php echo e($all_row); ?>][title]">

                               
                            </div>
                        </div>

                        

                    </div>
                    <div class="col-md-3">
                        
                        
                        <div class="form-group">
                            <label class="col-md-6 control-label">Amount</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control timepicker" name="allowance[<?php echo e($all_row); ?>][amount]">

                                
                            </div>
                        </div>

                        

                    </div>
                    <div class="col-md-3">
                        
                        
                        <div class="form-group">
                            <label class="col-md-6 control-label">Type</label>

                            <div class="col-md-6">
                                 <select class="form-control" name="allowance[<?php echo e($all_row); ?>][type]">
                                    <?php foreach($data['sad'] as $sad): ?>
                                   
                                    <option value="<?php echo e($sad['value']); ?>"><?php echo e($sad['title']); ?></option>
                                   
                                    <?php endforeach; ?>
                                </select>

                               
                            </div>
                        </div>

                        

                    </div>
                    <div class="col-md-2">
                        
                       <button class="btn btn-danger margin-top-10 delete_desc" onclick="$('#allowance_<?php echo e($all_row); ?>').remove();" data-toggle="tooltip" title="" type="button" data-original-title="remove"><i class="fa fa-times"></i></button>
                        

                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-md-12 text-right margin-top-10">
                    <button id="addSift" type="button" class="btn btn-sm grey-mint pullri">Add More</button>
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
<script src="<?php echo e(asset('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<script type="text/javascript">
    var sift_row = '<?php echo e($all_row + 1); ?>';
    $('#addSift').on('click', function(){
        
        html = '<div class="row" id="allowance_'+sift_row+'">';
        html += '<div class="col-md-4"><div class="form-group"><label class="col-md-6 control-label">Title</label><div class="col-md-6"><input type="text" class="form-control" name="allowance['+sift_row+'][title]"></div></div></div>';
        html += '<div class="col-md-3"><div class="form-group"><label class="col-md-6 control-label">Amount</label><div class="col-md-6"><input type="text" class="form-control timepicker" name="allowance['+sift_row+'][amount]"></div></div></div>';
        html += '<div class="col-md-3"><div class="form-group"><label class="col-md-6 control-label">Type</label><div class="col-md-6"><select class="form-control" name="allowance['+sift_row+'][type]"><?php foreach($data['sad'] as $sad): ?><option value="<?php echo e($sad['value']); ?>"><?php echo e($sad['title']); ?></option><?php endforeach; ?></select></div></div></div>';
        html += '<div class="col-md-2"><button class="btn btn-danger margin-top-10 delete_desc" onclick="$(\'#allowance_'+sift_row+'\').remove();" data-toggle="tooltip" title="" type="button" data-original-title="remove"><i class="fa fa-times"></i></button></div></div>';
        $('#sifts').append(html);
        sift_row++;
       
    });

    $('#base_salary').on('blur', function(){
        var base_salary = $(this).val();
        var basic_salary = '0.00';
        var da = '0.00';
        var con_a = '0.00';
        var daily_a = '0.00';
        if (base_salary > '0') {
            basic_salary = base_salary * 60 / 100;
            da = base_salary * 20 / 100;
            con_a = base_salary * 10 / 100;
            daily_a = base_salary * 10 / 100;
        }
        $('#basic_salary').val(basic_salary);
        $('#da').val(da);
        $('#con_a').val(con_a);
        $('#daily_a').val(daily_a);
    })

    $('#salary_date').datepicker({
        autoclose: true,
        format: 'yyyy-m-d',
        startDate: '-0d'
    })

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>