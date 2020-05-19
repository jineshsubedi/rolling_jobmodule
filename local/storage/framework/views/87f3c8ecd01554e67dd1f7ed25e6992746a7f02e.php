<?php $__env->startSection('heading'); ?>
Leave Setting Detail 
            <small>Detail of Leave Setting</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
           
            <li class="active">Edit Leave Setting</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Leave Setting Detail</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="testform" method="POST" action="<?php echo e(url('/branchadmin/leavesetting/update')); ?>">
                        <input type="hidden" name="id" value="<?php echo $data['setting']['id'];?>" />
                        <?php echo csrf_field(); ?>

                        <div class="row">
                         <div class="col-md-6">
                       
                         <div class="form-group">
                            <label class="col-md-4 control-label">Allow Quarter Day Leave</label>

                            <div class="col-md-8">
                                <select class="form-control" name="quarter">
                                    <?php foreach($data['yesno'] as $yesno): ?>
                                        <?php if($yesno['value'] == $data['setting']['quarter']): ?>
                                        <option selected="selected" value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                              
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Allow Half Day Leave</label>

                            <div class="col-md-8">
                                <select class="form-control" name="half">
                                    <?php foreach($data['yesno'] as $yesno): ?>
                                        <?php if($yesno['value'] == $data['setting']['half']): ?>
                                        <option selected="selected" value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                              
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Exclude Holiday</label>
                            <div class="col-md-8">
                                <select class="form-control" name="exclude_holiday">
                                    <?php foreach($data['yesno'] as $yesno): ?>
                                        <?php if($yesno['value'] == $data['setting']['exclude_holiday']): ?>
                                        <option selected="selected" value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label">Exclude Weekend</label>

                            <div class="col-md-8">
                                <select class="form-control" name="exclude_weekend">
                                    <?php foreach($data['yesno'] as $yesno): ?>
                                        <?php if($yesno['value'] == $data['setting']['exclude_weekend']): ?>
                                        <option selected="selected" value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                              
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">HR Approve Person</label>

                            <div class="col-md-8">
                                <select class="form-control" name="approve_person">
                                    <option value="0">Select Approval Person</option>
                                    <?php foreach($data['staffs'] as $staffs): ?>
                                        <?php if($staffs['id'] == $data['setting']['approve_person']): ?>
                                        <option selected="selected" value="<?php echo e($staffs['id']); ?>"><?php echo e($staffs['name']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($staffs['id']); ?>"><?php echo e($staffs['name']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                              
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Management Approve Person</label>

                            <div class="col-md-8">
                                <select class="form-control" name="chairman">
                                    <option value="0">Select Approval Person</option>
                                    <?php foreach($data['staffs'] as $staffs): ?>
                                        <?php if($staffs['id'] == $data['setting']['chairman']): ?>
                                        <option selected="selected" value="<?php echo e($staffs['id']); ?>"><?php echo e($staffs['name']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($staffs['id']); ?>"><?php echo e($staffs['name']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>

                              
                            </div>
                        </div>
                        <?php if(auth()->guard('staffs')->user()->branch == 2): ?>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Revenue Upload</label>

                            <div class="col-md-8">
                                <select class="form-control" name="revenue_upload">
                                    <?php foreach($data['staffs'] as $staffs): ?>
                                        <?php if($staffs['id'] == $data['setting']['revenue_upload']): ?>
                                        <option selected="selected" value="<?php echo e($staffs['id']); ?>"><?php echo e($staffs['name']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($staffs['id']); ?>"><?php echo e($staffs['name']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <?php else: ?>
                        <input type="hidden" name="revenue_upload" value="0">
                        <?php endif; ?>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Leave on the basis of Accrual </label>

                            <div class="col-md-8">
                                <select class="form-control" name="accrual">
                                    <?php foreach($data['yesno'] as $yesno): ?>
                                        <?php if($yesno['value'] == $data['setting']['accrual']): ?>
                                        <option selected="selected" value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                              
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Handover Require</label>

                            <div class="col-md-8">
                                <select class="form-control" name="handover_required">
                                    <?php foreach($data['yesno'] as $yesno): ?>
                                        <?php if($yesno['value'] == $data['setting']['handover_required']): ?>
                                        <option selected="selected" value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                              
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Supervsor Approval Require</label>

                            <div class="col-md-8">
                                <select class="form-control" name="supervisor_required">
                                    <?php foreach($data['yesno'] as $yesno): ?>
                                        <?php if($yesno['value'] == $data['setting']['supervisor_required']): ?>
                                        <option selected="selected" value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                              
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Management Approval Require</label>

                            <div class="col-md-8">
                                <select class="form-control" name="chairman_required">
                                    <?php foreach($data['yesno'] as $yesno): ?>
                                        <?php if($yesno['value'] == $data['setting']['chairman_required']): ?>
                                        <option selected="selected" value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>

                              
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">HR Approval Require</label>

                            <div class="col-md-8">
                                <select class="form-control" name="approval_required">
                                    <?php foreach($data['yesno'] as $yesno): ?>
                                        <?php if($yesno['value'] == $data['setting']['approval_required']): ?>
                                        <option selected="selected" value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($yesno['value']); ?>"><?php echo e($yesno['title']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>

                              
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Accrual Basis</label>

                            <div class="col-md-8">
                                <select class="form-control" name="accrual_basis">
                                    <?php foreach($data['accrual'] as $accrual): ?>
                                        <?php if($accrual['value'] == $data['setting']['accrual_basis']): ?>
                                        <option selected="selected" value="<?php echo e($accrual['value']); ?>"><?php echo e($accrual['title']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($accrual['value']); ?>"><?php echo e($accrual['title']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>

                              
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Leave Manage Person</label>

                            <div class="col-md-8">
                                <select class="form-control" name="manage_person">
                                    <?php foreach($data['staffs'] as $staffs): ?>
                                        <?php if($staffs['id'] == $data['setting']['manage_person']): ?>
                                        <option selected="selected" value="<?php echo e($staffs['id']); ?>"><?php echo e($staffs['name']); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($staffs['id']); ?>"><?php echo e($staffs['name']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>

                              
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="col-md-4 control-label">Maximum Leave Per Month</label>

                            <div class="col-md-8">
                               <input type="text" class="form-control" name="max_leave" value="<?php echo e($data['setting']['max_leave']); ?>">
                                <span><i style="font-size:10px;color:RED;">0 value will be unlimited.</i></span>
                              
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-10 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    Submit <i class="fa fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                       
                    </div>
                </div>
                  
                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>