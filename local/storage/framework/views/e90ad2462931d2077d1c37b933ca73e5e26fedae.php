<?php $__env->startSection('heading'); ?>
Termination
<small>List of Termination</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Termination</li>
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
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="box-title">Termination List</h3>
                        <?php if($setting->approve_person==auth()->guard('staffs')->user()->id || \App\BranchSetting::isHrHandler()): ?>
                        <a href="<?php echo e(route('staffs.termination.createTermination')); ?>" class="btn addnew right"><i
                                class="fa fa-fw fa-plus"></i>Terminate
                            Staff</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div>

            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Staff</th>
                            <th>Branch</th>
                            <th>Termination End Date</th>
                            <th>Justification Date</th>
                            <th>Approval</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($staffs as $k=>$staff): ?>
                        <tr <?php if($staff->staff_id==$setting->approve_person || \App\BranchSetting::isHrHandler()): ?> style="background-color:
                            #ddd6d6;"
                            <?php endif; ?>
                            <?php if(\App\DepartmentApproval::departmentApproval($staff->id,
                            'termination') && $staff->status!='unprocess'): ?>
                            style="background-color: #fbb;" <?php else: ?> <?php endif; ?>>
                            <td><?php echo e($k+1); ?></td>
                            <td><?php echo e($staff->user->name); ?></td>
                            <td><?php echo e($staff->branch->name); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($staff->end_date)->format('M d, Y')); ?></td>
                            <td>
                                <?php if($staff->justification_date): ?>
                                <?php echo e(\Carbon\Carbon::parse($staff->justification_date)->format('M d, Y')); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($staff->status!='terminate' && $staff->status!="hire"): ?>
                                <?php if($staff->justification_date &&
                                $setting->approve_person==auth()->guard('staffs')->user()->id && $staff->staff_id !=
                                auth()->guard('staffs')->user()->id || \App\BranchSetting::isHrHandler()): ?>
                                <button type="button" class="btn btn-primary"
                                    onclick="approve_termination('<?php echo e($staff->id); ?>')">
                                    Approval
                                    <?php elseif($staff->justification_date): ?>
                                    <p class="label label-default">pending request</p>
                                    <?php else: ?>
                                    <p class="label label-default">no justification</p>
                                    <?php endif; ?>
                                    <?php elseif($staff->status=='terminate'): ?>
                                    <p class="label label-danger"><?php echo e($staff->status); ?></p>
                                    <?php elseif($staff->status=='hire'): ?>
                                    <p class="label label-success"><?php echo e($staff->status); ?></p>
                                    <?php else: ?>
                                    <p class="label label-default"><?php echo e($staff->status); ?></p>
                                    <?php endif; ?>
                            </td>
                            <td>
                                <form action="<?php echo e(route('staffs.termination.deleteTermination',$staff->id)); ?>"
                                    method="post">
                                    <?php echo csrf_field(); ?>

                                    <?php echo e(method_field('DELETE')); ?>

                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#view-modal-default-<?php echo e($staff->id); ?>">
                                        View
                                    </button>
                                    <?php if(!$staff->justification_date &&
                                    $staff->staff_id==auth()->guard('staffs')->user()->id): ?>
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#justify-modal-default-<?php echo e($staff->id); ?>">
                                        Justify
                                    </button>
                                    <?php else: ?>
                                    <?php if($setting->approve_person==auth()->guard('staffs')->user()->id &&
                                    $staff->staff_id!=auth()->guard('staffs')->user()->id || \App\BranchSetting::isHrHandler()): ?>
                                    <a href="<?php echo e(route('staffs.termination.editTermination',$staff->id)); ?>"
                                        class="btn btn-sm btn-info">EDIT</a>
                                    <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                    <?php endif; ?>
                                    <?php endif; ?>

                                </form>
                            </td>
                        </tr>
                        <div class="modal fade bd-example-modal-lg" id="justify-modal-default-<?php echo e($staff->id); ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">User Modal</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo e(route('staffs.termination.justify',$staff->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>

                                            <?php echo e(method_field('PUT')); ?>

                                            <div class="form-group">
                                                <label>Justification:</label>
                                                <div class="form-input">
                                                    <textarea name="justification_detail"
                                                        id="justification_detail_<?php echo e($staff->id); ?>"
                                                        class="form-control @error('justification_detail') is-invalid @enderror"
                                                        value="<?php echo e(old('justification_detail')); ?>"></textarea>
                                                    <?php /* script call start */ ?>
                                                    <script type="text/javascript">
                                                        CKEDITOR.replace("justification_detail_<?php echo $staff->id; ?>");
                                                        CKEDITOR.add
                                                    </script>
                                                    <?php /* script call end */ ?>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo e($staff->id); ?>">
                                            <input type="hidden" name="justification_date"
                                                value="<?php echo e(\Carbon\Carbon::now()->format('Y-m-d')); ?>">
                                            <input type="Submit" value="SUBMIT" class="btn btn-primary">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade bd-example-modal-lg" id="view-modal-default-<?php echo e($staff->id); ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <div style="border-bottom: 1px solid #f4f4f4;">
                                            <p style="font-size:20px; color:#3c8dbc"><?php echo e($staff->user->name); ?></p>
                                            <p style="font-size:16; color:grey"><?php echo e($staff->branch->title); ?></p>
                                        </div>
                                        <div>
                                            <p style="font-size:20px; color:#3c8dbc">
                                                Termination: &nbsp; &nbsp;
                                                <?php if($staff->status=='unprocess'): ?>
                                                <span class="label label-default"><?php echo e($staff->status); ?></span>
                                                <?php elseif($staff->status=='terminate'): ?>
                                                <span class="label label-danger"><?php echo e($staff->status); ?></span>
                                                <?php else: ?>
                                                <span class="label label-success"><?php echo e($staff->status); ?></span>
                                                <?php endif; ?>
                                            </p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>Start Date:
                                                        <?php echo e(\Carbon\Carbon::parse($staff->start_date)->format('M d, Y')); ?>

                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>End Date:
                                                        <?php echo e(\Carbon\Carbon::parse($staff->end_date)->format('M d, Y')); ?>

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="well">
                                                <?php echo $staff->termination_detail; ?>

                                            </div>
                                        </div>
                                        <?php if($staff->status=='unprocess' && !$staff->justification_date &&
                                        $staff->staff_id==auth()->guard('staffs')->user()->id): ?>
                                        <form action="<?php echo e(route('staffs.termination.justify',$staff->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>

                                            <?php echo e(method_field('PUT')); ?>

                                            <div class="form-group">
                                                <label>Justification:</label>
                                                <div class="form-input">
                                                    <textarea name="justification_detail"
                                                        id="justification_detail_2_<?php echo e($staff->id); ?>"
                                                        class="form-control @error('justification_detail') is-invalid @enderror"
                                                        value="<?php echo e(old('justification_detail')); ?>"></textarea>
                                                    <?php /* script call start */ ?>
                                                    <script type="text/javascript">
                                                        CKEDITOR.replace("justification_detail_2_<?php echo $staff->id; ?>");
                                                                                                CKEDITOR.add
                                                    </script>
                                                    <?php /* script call end */ ?>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo e($staff->id); ?>">
                                            <input type="hidden" name="justification_date"
                                                value="<?php echo e(\Carbon\Carbon::now()->format('Y-m-d')); ?>">
                                            <input type="Submit" value="SUBMIT" class="btn btn-primary">
                                        </form>
                                        <?php else: ?>
                                        <div>
                                            <p>
                                                <span style="font-size:20px; color:#3c8dbc">Justification</span>
                                                <div class="">
                                                    <?php if($staff->justification_date): ?>
                                                    <?php echo e(\Carbon\Carbon::parse($staff->justification_date)->format('M d, Y')); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </p>
                                            <div class="well">
                                                <?php echo $staff->justification_detail; ?>

                                            </div>
                                        </div>
                                        <?php if($staff->status=='unprocess' && $staff->justification_date &&
                                        $setting->approve_person==auth()->guard('staffs')->user()->id || \App\BranchSetting::isHrHandler()): ?>
                                        <form action="<?php echo e(route('staffs.termination.approval')); ?>" method="post">
                                            <?php echo csrf_field(); ?>

                                            <?php echo e(method_field('PUT')); ?>

                                            <div class="form-group">
                                                <label>Set Off Boarding Date:</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input id="offboarding_date_<?php echo e($staff->id); ?>" name="offBoarding_date"
                                                        type="text"
                                                        class="datepicker form-control @error('offBoarding_date') is-invalid @enderror"
                                                        value="<?php echo e(old('offBoarding_date')); ?>">
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo e($staff->id); ?>">
                                            <input type="Submit" name="action" value="TERMINATE" class="btn btn-danger">
                                            <p><span
                                                    style="font-size: 20; font-family:fantasy; color:cadetblue;">OR</span>
                                            </p>
                                            <input type="Submit" name="action" value="HIRE" class="btn btn-success">
                                            <?php /* script call start */ ?>
                                            <script type="text/javascript">
                                                $('#offboarding_date_<?php echo $staff->id; ?>').datepicker();
                                            </script>
                                            <?php /* script call end */ ?>
                                        </form>
                                        <?php else: ?>
                                        <p style="font-size:20px; color:#3c8dbc">Action By:
                                            <?php if($staff->terminate_by!=null): ?>
                                            <?php echo e($staff->authorize_user->name); ?>

                                            <?php endif; ?>
                                        </p>
                                        <p style="font-size:20px; color:#3c8dbc">Off Boarding Date:
                                            <?php if($staff->offBoarding_date): ?>
                                            <?php echo e(\Carbon\Carbon::parse($staff->offBoarding_date)->format('M d, Y')); ?>

                                            <?php endif; ?>
                                        </p>
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
                                        <?php endif; ?>
                                        <?php endif; ?>
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
                <form action="<?php echo e(route('staffs.termination.approval')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <?php echo e(method_field('PUT')); ?>

                    <div class="form-group">
                        <label>Set Off Boarding Date:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <input id="offboarding_date1" name="offBoarding_date" type="text"
                                class="datepicker form-control @error('offBoarding_date') is-invalid @enderror"
                                value="<?php echo e(old('offBoarding_date')); ?>">
                        </div>
                    </div>
                    <input type="hidden" name="id" id="approve_termination_id">
                    <input type="Submit" name="action" value="TERMINATE" class="btn btn-danger">
                    <p><span style="font-size: 20; font-family:fantasy; color:cadetblue;">OR</span>
                    </p>
                    <input type="Submit" name="action" value="HIRE" class="btn btn-success">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#offboarding_date1').datepicker();
    function approve_termination(id)
    {
        $('#approval-modal-default').modal('show');
        $('#approve_termination_id').val(id);
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>