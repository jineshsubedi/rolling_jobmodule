<?php $__env->startSection('heading'); ?>
Resignation
<small>List of Resignation</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Resignation</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    .datepicker {
        z-index: 9999 !important
    }
</style>
<script src="<?php echo e(asset('assets/ckeditor/ckeditor.js')); ?>"></script>
<div class="row">
    <div class="col-xs-12">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Resignation Staff</h3>
                <?php if(($resignation_status[0]==null || $resignation_status[0]=='disapproved')): ?>
                <div class="pull-right">
                    <a href="<?php echo e(route('staffs.resignation.create')); ?>" class="btn btn-info">Add Resignation</a>
                </div>
                <?php endif; ?>
            </div>
            <div class="box-body">
                <table id="main" class="table table-hover">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Staff</th>
                            <th>Branch</th>
                            <th>Resignation Date</th>
                            <th>Supervisor Approval</th>
                            <th>Hr Approval</th>
                            <th>OffBoarding Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($staffs as $k=>$staff): ?>
                        <tr <?php if(\App\DepartmentApproval::departmentApproval($staff->id,
                            'resignation') && $staff->offBoarding_date): ?>
                            style="background-color: #fbb;" <?php else: ?> <?php endif; ?> >
                            <td><?php echo e($k+1); ?></td>
                            <td><?php echo e($staff->user->name); ?></td>
                            <td><?php echo e($staff->branch->name); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($staff->resignation_date)->format('M d, Y')); ?></td>
                            <td>
                                <?php if(!$staff->supervisor_approval_status &&
                                $staff->supervisor==auth()->guard('staffs')->user()->id): ?>
                                <button type="button" class="btn btn-primary"
                                    onclick="approval_modal('<?php echo e($staff->id); ?>')">
                                    Approval
                                </button>
                                <?php else: ?>
                                <?php if($staff->supervisor_approval_status=='disapproved'): ?>
                                <p class="label label-danger"><?php echo e($staff->supervisor_approval_status); ?></p>
                                <?php elseif($staff->supervisor_approval_status=='approved'): ?>
                                <p class="label label-success"><?php echo e($staff->supervisor_approval_status); ?></p>
                                <?php else: ?>
                                <p class="label label-default">pending request</p>
                                <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($staff->status == 'unapproved' && 
                                \App\BranchSetting::isHrHandler() && 
                                $staff->supervisor_approval_status == 'approved' && 
                                $staff->staff_id != auth()->guard('staffs')->user()->id): ?>
                                <button type="button" class="btn btn-primary"
                                    onclick="approval_modal('<?php echo e($staff->id); ?>')">
                                    Approval
                                </button>
                                <?php else: ?>
                                <?php if($staff->status=='disapproved'): ?>
                                <p class="label label-danger"><?php echo e($staff->status); ?></p>
                                <?php elseif($staff->status=='approved'): ?>
                                <p class="label label-success"><?php echo e($staff->status); ?></p>
                                <?php else: ?>
                                <p class="label label-default">pending request</p>
                                <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($staff->offBoarding_date): ?>
                                <?php echo e(\Carbon\Carbon::parse($staff->offBoarding_date)->format('M d, Y')); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#view-modal-default-<?php echo e($staff->id); ?>">
                                    View
                                </button>
                                <?php if($staff->status=='unapproved' &&
                                $staff->staff_id==auth()->guard('staffs')->user()->id): ?>
                                <a href="<?php echo e(route('staffs.resignation.edit',$staff->id)); ?>"
                                    class="btn btn-warning">Edit</a>
                                <?php endif; ?>
                            </td>
                        </tr>

                        <div class="modal fade bd-example-modal-lg" id="view-modal-default-<?php echo e($staff->id); ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <div style="border-bottom: 1px solid #f4f4f4;">
                                            <p style="font-size:20px; color:#3c8dbc"><?php echo e($staff->user->name); ?></p>
                                            <p style="font-size:16; color:grey"><?php echo e($staff->branch->name); ?></p>
                                        </div>
                                        <div class="">
                                            <p style="font-size:20px; color:#3c8dbc">
                                                Resignation: &nbsp; &nbsp;
                                                <?php if($staff->supervisor_approval_status=='approved'): ?>
                                                <span class="label label-success">Supervisor:
                                                    <?php echo e($staff->supervisor_approval_status); ?></span>
                                                <?php elseif($staff->supervisor_approval_status=='disapproved'): ?>
                                                <span class="label label-danger">Supervisor:
                                                    <?php echo e($staff->supervisor_approval_status); ?></span>
                                                <?php else: ?>
                                                <span class="label label-default"> Supervisor:
                                                    unapproved</span>
                                                <?php endif; ?>
                                                <?php if($staff->status=='unapproved'): ?>
                                                <span class="label label-default">HR: <?php echo e($staff->status); ?></span>
                                                <?php elseif($staff->status=='disapproved'): ?>
                                                <span class="label label-danger">HR: <?php echo e($staff->status); ?></span>
                                                <?php else: ?>
                                                <span class="label label-success"> HR: <?php echo e($staff->status); ?></span>
                                                <?php endif; ?>
                                                &nbsp;&nbsp;&nbsp;
                                                <?php echo e(\Carbon\Carbon::parse($staff->resignation_date)->format('M d, Y')); ?>

                                            </p>
                                            <div class="well"><?php echo $staff->resignation_detail; ?></div>
                                        </div>
                                        <?php if(!$staff->supervisor_approval_status &&
                                        $staff->supervisor==auth()->guard('staffs')->user()->id): ?>
                                        <form action="<?php echo e(route('staffs.resignation.updateSupervisorAction')); ?>"
                                            method="post">
                                            <?php echo csrf_field(); ?>

                                            <?php echo e(method_field('PUT')); ?>

                                            <div class="form-group">
                                                <label>Approval Detail:</label>
                                                <div class="form-input">
                                                    <textarea id="approval_detail_<?php echo e($staff->id); ?>" name="approval_detail"
                                                        class="form-control @error('approval_detail') is-invalid @enderror"
                                                        value="<?php echo e(old('approval_detail')); ?>"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="date" value="<?php echo e(Date('Y-m-d')); ?>">
                                            <input type="hidden" value="<?php echo e($staff->id); ?>" name="id">
                                            <input type="Submit" name="action" value="APPROVED" class="btn btn-success">
                                            <input type="Submit" name="action" value="DISAPPROVED"
                                                class="btn btn-danger">
                                        </form>
                                        <script>
                                            CKEDITOR.replace('approval_detail_<?php echo $staff->id; ?>');
                                        </script>
                                        <?php else: ?>
                                        <div id="supervisor-section">
                                            <p style="font-size:20px; color:#3c8dbc">Supervisor Section</p>
                                            <p style="font-size:20px; color:#3c8dbc">Action By:
                                                <?php if($staff->supervisor!=null): ?>
                                                <?php echo e($staff->supervisor_user->name); ?>

                                                <?php endif; ?>
                                            </p>
                                            <p>
                                                Date:
                                                <?php if($staff->supervisor_approval_date): ?>
                                                <?php echo e(\Carbon\Carbon::parse($staff->supervisor_approval_date)->format('M d, Y')); ?>

                                                <?php endif; ?>
                                            </p>
                                            <p>Detail:</p>
                                            <div class="well"><?php echo $staff->supervisor_approval_detail; ?></div>

                                        </div>
                                        <?php endif; ?>
                                        <?php if($staff->status=='unapproved' && ($setting->approve_person ==
                                        auth()->guard('staffs')->user()->id) &&
                                        $staff->supervisor_approval_status=='approved'): ?>
                                        <form action="<?php echo e(route('staffs.resignation.updateHrAction')); ?>" method="post">
                                            <?php echo csrf_field(); ?>

                                            <?php echo e(method_field('PUT')); ?>

                                            <div class="form-group">
                                                <label>Approval Detail:</label>
                                                <div class="form-input">
                                                    <textarea id="hr_approval_detail_<?php echo e($staff->id); ?>"
                                                        name="approval_detail"
                                                        class="form-control @error('approval_detail') is-invalid @enderror"
                                                        value="<?php echo e(old('approval_detail')); ?>"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Set Off Boarding Date:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input id="datepicker<?php echo e($staff->id); ?>" name="offBoarding_date"
                                                        type="text"
                                                        class="datepicker form-control @error('offBoarding_date') is-invalid @enderror"
                                                        value="<?php echo e(old('offBoarding_date')); ?>" autocomplete="off">
                                                </div>
                                            </div>
                                            <input type="hidden" name="date" value="<?php echo e(Date('Y-m-d')); ?>">
                                            <input type="hidden" value="<?php echo e($staff->id); ?>" name="id">
                                            <input type="Submit" name="action" value="APPROVED" class="btn btn-success">
                                            <input type="Submit" name="action" value="DISAPPROVED"
                                                class="btn btn-danger">
                                        </form>
                                        <script>
                                            $('#datepicker<?php echo $staff->id; ?>').datepicker({
                                            autoclose: true,
                                            format: 'yyyy-m-d',
                                            });
                                            CKEDITOR.replace('hr_approval_detail_<?php echo $staff->id; ?>');
                                        </script>
                                        <?php else: ?>
                                        <div id="hr-section">
                                            <p style="font-size:20px; color:#3c8dbc">HR Section</p>
                                            <p style="font-size:20px; color:#3c8dbc">Action By:
                                                <?php if($staff->approval_by!=null): ?>
                                                <?php echo e($staff->authorize_user->name); ?>

                                                <?php endif; ?>
                                            </p>
                                            <p>
                                                Date:
                                                <?php if($staff->approval_date): ?>
                                                <?php echo e(\Carbon\Carbon::parse($staff->approval_date)->format('M d, Y')); ?>

                                                <?php endif; ?>
                                            </p>
                                            <p>Detail:</p>
                                            <div class="well"><?php echo $staff->approval_detail; ?></div>
                                            <p style="font-size:20px; color:#3c8dbc">
                                                Off Boarding Date:
                                                <?php if($staff->offBoarding_date): ?>
                                                <?php echo e(\Carbon\Carbon::parse($staff->offBoarding_date)->format('M d, Y')); ?>

                                                <?php endif; ?>
                                            </p>
                                        </div>
                                        <?php endif; ?>
                                        <div id="deparment_section">
                                            <h3>Department Approval</h3>
                                            <?php foreach($staff->department_approval as $approval): ?>
                                            <p><?php echo e($approval->department->title); ?>

                                                &nbsp;
                                                <?php if($approval->status==1): ?>
                                                <span class="label label-success">Approved</span>
                                                <?php elseif($approval->status==2): ?>
                                                <span class="label label-danger">Disapproved</span>
                                                <?php else: ?>
                                                <span class="label label-default">Pending</span>
                                                <?php endif; ?>
                                            </p>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div><!-- /.box-body -->
            <div class="box-footer">
                <div class="text-center">
                    <?php echo e($staffs->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="approval-modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Approval Modal</h4>
            </div>
            <div class="modal-body">
                <?php if($setting->approve_person == auth()->guard('staffs')->user()->id || \App\BranchSetting::isHrHandler()): ?>
                <form action="<?php echo e(route('staffs.resignation.updateHrAction')); ?>" method="post">
                    <?php else: ?>
                    <form action="<?php echo e(route('staffs.resignation.updateSupervisorAction')); ?>" method="post">
                        <?php endif; ?>
                        <?php echo csrf_field(); ?>

                        <?php echo e(method_field('PUT')); ?>

                        <div class="form-group">
                            <label>Approval Detail:</label>
                            <div class="form-input">
                                <textarea id="approval_detail" name="approval_detail"
                                    class="form-control @error('approval_detail') is-invalid @enderror"
                                    value="<?php echo e(old('approval_detail')); ?>"></textarea>
                            </div>
                        </div>
                        <?php if($setting->approve_person == auth()->guard('staffs')->user()->id || \App\BranchSetting::isHrHandler()): ?>
                        <div class="form-group">
                            <label>Set Off Boarding Date:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input id="datepicker" name="offBoarding_date" type="text"
                                    class="datepicker form-control @error('offBoarding_date') is-invalid @enderror"
                                    value="<?php echo e(old('offBoarding_date')); ?>" autocomplete="off">
                            </div>
                        </div>
                        <?php endif; ?>
                        <input type="hidden" name="date" value="<?php echo e(Date('Y-m-d')); ?>">
                        <input type="hidden" id="resign_id" name="id">
                        <input type="Submit" name="action" value="APPROVED" class="btn btn-success">
                        <input type="Submit" name="action" value="DISAPPROVED" class="btn btn-danger">
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#deparment_section_hide').hide();
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-m-d',
    });
    CKEDITOR.replace('approval_detail');
    var data = $('#deparment_section_hide').html();
    function approval_modal(id)
    {
        $('#approval-modal-default').modal('show');
        $('#resign_id').val(id);
        $('#deparment_section_hide').show();
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>