<?php $__env->startSection('heading'); ?>
Detail of <?php echo e($datas['job_title']); ?> 
           
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo e(url('/branchadmin/jobs')); ?>">Jobs</a></li>
            <li class="active">Detail of <?php echo e($datas['job_title']); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<script src="<?php echo e(asset('assets/ckeditor/ckeditor.js')); ?>"></script>
 <div class="row">
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
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">Detail of <?php echo e($datas['job_title']); ?></div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" id="testform" method="POST" action="<?php echo e(url('/branchadmin/jobs/detail/update')); ?>">
                       
                        <input type="hidden" name="jobs_id" value="<?php echo e($datas['jobs_id']); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                         <div class="col-md-12">
                        <?php $detail_rows = 0; ?>
                            <table id="details" class="table table-bordered table-hover">
                                <thead>
                                    <th>Detail Of</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php if(is_array(old('details')) > 0): ?>
                                <?php if(count(old('details')) > 0): ?>
                            

                            <?php foreach(old('details') as $key => $old): ?>
                                    <tr id="detail_row_<?php echo e($detail_rows); ?>">
                                        <td class="<?php echo e($errors->has('details.'.$key.'.title') ? ' has-error' : ''); ?>">
                                            <select class="form-control" name="details[<?php echo e($detail_rows); ?>][title]">
                                            <?php foreach($datas['title'] as $title): ?>
                                            <?php if($old['title'] == $title['value']): ?>
                                            <option selected="selected" value="<?php echo e($title['value']); ?>"><?php echo e($title['title']); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo e($title['value']); ?>"><?php echo e($title['title']); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                     <?php if($errors->has('details.'.$key.'.title')): ?>
                                                    <span class="help-block">
                                                        <?php echo e($errors->first('details.'.$key.'.title')); ?>

                                                    </span>
                                                <?php endif; ?></td>
                                    <td class="<?php echo e($errors->has('details.'.$key.'.detail_date') ? ' has-error' : ''); ?>">
                                        <input type="text" name="details[<?php echo e($detail_rows); ?>][detail_date]" class="form-control date" value="<?php echo e($old['detail_date']); ?>">
                                    <?php if($errors->has('details.'.$key.'.detail_date')): ?>
                                                    <span class="help-block">
                                                        <?php echo e($errors->first('details.'.$key.'.detail_date')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                    <td class="<?php echo e($errors->has('details.'.$key.'.description') ? ' has-error' : ''); ?>"><textarea class="form-control" name="details[<?php echo e($detail_rows); ?>][description]"><?php echo e($old['description']); ?></textarea>
                                    <?php if($errors->has('details.'.$key.'.description')): ?>
                                                    <span class="help-block">
                                                        <?php echo e($errors->first('details.'.$key.'.description')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                    <td> <button type="button" onclick="$('#detail_row_<?php echo e($detail_rows); ?>').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                                    </tr>
                                    <?php $detail_rows++;?>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php elseif(count($datas['report']) > 0): ?>
                                    <?php foreach($datas['report'] as $report): ?>
                                    <tr id="detail_row_<?php echo e($detail_rows); ?>">
                                        <td><select class="form-control" name="details[<?php echo e($detail_rows); ?>][title]">
                                            <?php foreach($datas['title'] as $title): ?>
                                            <?php if($report->detail_type == $title['value']): ?>
                                            <option selected="selected" value="<?php echo e($title['value']); ?>"><?php echo e($title['title']); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo e($title['value']); ?>"><?php echo e($title['title']); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select></td>
                                    <td><input type="text" name="details[<?php echo e($detail_rows); ?>][detail_date]" class="form-control date" value="<?php echo e($report->detail_date); ?>"></td>
                                    <td><textarea class="form-control" name="details[<?php echo e($detail_rows); ?>][description]"><?php echo e($report->description); ?></textarea></td>
                                     <td> <button type="button" onclick="$('#detail_row_<?php echo e($detail_rows); ?>').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                                    </tr>
                                    <?php $detail_rows++;?>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <tr id="detail_row_<?php echo e($detail_rows); ?>">
                                        <td><select class="form-control" name="details[<?php echo e($detail_rows); ?>][title]">
                                            <?php foreach($datas['title'] as $title): ?>
                                           
                                            <option value="<?php echo e($title['value']); ?>"><?php echo e($title['title']); ?></option>
                                           
                                            <?php endforeach; ?>
                                        </select></td>
                                    <td><input type="text" name="details[<?php echo e($detail_rows); ?>][detail_date]" class="form-control date" value=""></td>
                                    <td><textarea class="form-control" name="details[<?php echo e($detail_rows); ?>][description]"></textarea></td>
                                     <td> <button type="button" onclick="$('#detail_row_<?php echo e($detail_rows); ?>').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">
                                            <button type="button" onclick="addDetail();" data-toggle="tooltip" title="Add More Detail" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i>Add More Detail</button>
                        </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            

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
</div>
<script type="text/javascript">
$(function() {
  
  $('.date').datepicker();
  
});

    var detail_rows = '<?php echo e($detail_rows + 1); ?>';
    function addDetail()
    {
        var html = '<tr id="detail_row_'+detail_rows+'"><td><select class="form-control" name="details['+detail_rows+'][title]">  <?php foreach($datas['title'] as $title): ?> <option value="<?php echo e($title["value"]); ?>"><?php echo e($title["title"]); ?></option> <?php endforeach; ?></select></td>';
            html += '<td><input type="text" name="details['+detail_rows+'][detail_date]" class="form-control date" ></td>';
            html += '<td><textarea class="form-control" name="details['+detail_rows+'][description]"></textarea></td>';
            html += '<td> <button type="button" onclick="$(\'#detail_row_'+detail_rows+'\').remove();" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td></tr>';
        $('#details tbody').append(html);
        detail_rows++;

        $('.date').datepicker();
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>