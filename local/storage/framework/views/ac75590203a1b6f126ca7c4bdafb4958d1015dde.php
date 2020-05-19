<?php $__env->startSection('heading'); ?>
Edit Survey
<small>Edit Survey</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/staffs')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo e(url('/staffs/survey')); ?>">Surveys</a></li>
<li class="active">New Survey</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">New Survey</div>
                <div class="panel-body">
                    <div id="survey_section" class="col-md-12">
                        <div class="col-md-6">
                            <form action="<?php echo e(route('staffs.surveysetup.update', $survey->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>

                                <?php echo e(method_field('PUT')); ?>

                                <div class="form-group">
                                    <label>Survey Title:</label>
                                    <div class="form-input">
                                        <input type="text" name="title" class="form-control" value="<?php echo e($survey->title); ?>"
                                            required>
                                    </div>
                                    <?php if($errors->has('title')): ?>
                                    <span class="text-danger">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Branch:</label>
                                    <div class="form-input">
                                        <select name="branch" class="form-control" required>
                                            <option value="<?php echo e(null); ?>">select branch</option>
                                            <?php foreach($branches as $branch): ?>
                                            <option value="<?php echo e($branch->id); ?>" <?php if($branch->id==$survey->branch_id): ?>
                                                selected
                                                <?php endif; ?>><?php echo e($branch->name); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <?php if($errors->has('branch')): ?>
                                    <span class="text-danger">
                                        <strong><?php echo e($errors->first('branch')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Survey Publish Date:</label>
                                    <div class="form-input">
                                        <input type="text" name="publish_date" id="survey_publish_date"
                                            class="form-control"
                                            value="<?php echo e(\Carbon\Carbon::parse($survey->publish_date)->format('Y-m-d')); ?>"
                                            required>
                                    </div>
                                    <?php if($errors->has('publish_date')): ?>
                                    <span class="text-danger">
                                        <strong><?php echo e($errors->first('publish_date')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label>Survey End Date:</label>
                                    <div class="form-input">
                                        <input type="text" name="end_date" id="survey_end_date" class="form-control"
                                            value="<?php echo e(\Carbon\Carbon::parse($survey->end_date)->format('Y-m-d')); ?>"
                                            required>
                                    </div>
                                    <?php if($errors->has('end_date')): ?>
                                    <span class="text-danger">
                                        <strong><?php echo e($errors->first('end_date')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <div class="form-input">
                                        <button type="submit" class="btn btn-sm btn-primary">SAVE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="survey_question_section" class="col-md-12">
                        <div id="survey_question_head">
                            <div class="col-md-2"><strong>Parent</strong></div>
                            <div class="col-md-2"><strong>Label</strong></div>
                            <div class="col-md-2"><strong>Type</strong></div>
                            <div class="col-md-2"><strong>List Menu</strong></div>
                            <div class="col-md-2"><strong>Required</strong></div>
                            <div class="col-md-2"><strong>Extra</strong></div>
                        </div>
                        <input type="hidden" id="survey_id" value="<?php echo e($survey->id); ?>">
                        <div id="ajaxData" style="padding:10px;"></div>
                        <div id="survey_question_body">
                            <input type="hidden" id="survey_id">
                            <div class="col-md-2">
                                <input type="hidden" class="form-control" id="survey_parent_id">
                                <input type="text" class="form-control" id="survey_parent">
                                <div class="parent-error"></div>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="survey_label" required>
                                <div class="label-error"></div>
                            </div>
                            <div class="col-md-2">
                                <select name="type" id="survey_type" class="form-control">
                                    <option value="<?php echo e('text'); ?>">Text</option>
                                    <option value="<?php echo e('select'); ?>">Select</option>
                                    <option value="<?php echo e('textarea'); ?>">Textarea</option>
                                    <option value="<?php echo e('radio'); ?>">Radio</option>
                                    <option value="<?php echo e('date'); ?>">Date</option>
                                    <option value="<?php echo e('checkbox'); ?>">Checkbox</option>
                                    <option value="<?php echo e('email'); ?>">Email</option>
                                    <option value="<?php echo e('file'); ?>">File</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="text" id="list_menu" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <select name="required" id="survey_required" class="form-control">
                                    <option value="false">Not Required</option>
                                    <option value="true">Required</option>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <input type="text" class="form-control" id="survey_extra">
                            </div>
                            <div class="col-md-1">
                                <button type="button" id="surveyQuestionBtn" class="btn btn-sm btn-info">Add
                                    New</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="<?php echo e(route('staffs.surveysetup.index')); ?>" class="btn btn-sm btn-default">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.label-error').html('');
    $('.parent-error').html('');
    var CSRF_TOKEN = $('input[name=\'_token\']').val();
    $('#survey_publish_date').datepicker({
        autoclose: true,
        format: 'yyyy-m-d',
    });
    $('#survey_end_date').datepicker({
        autoclose: true,
        format: 'yyyy-m-d',
    });
    console.log($('#survey_id').val())
    $.ajax({
        url: "<?php echo e(route('staffs.surveysetup.questions')); ?>",
        type: 'GET',
        data:{
            _token: CSRF_TOKEN,
            survey_id: $('#survey_id').val(),
        },
        dataType: 'JSON',
        success:function(data){
            var value = data.msg;
            console.log(value)
            $.each(data.msg, function(index, value){
                var htmlcontent = '<div class="row" id="surveyquestion_'+value.id+'"style="margin-top: 20px; margin-bottom: 20px;border-bottom: 1px solid #ececec;"><div class="col-md-2">'+value.parent_id+'</div><div class="col-md-2">'+value.label+'</div><div class="col-md-2">'+value.type+'</div><div class="col-md-2">'+value.list_menu+'</div><div class="col-md-2">'+value.required+'</div><div class="col-md-1">'+value.extra+'</div><div class="col-md-1"><a href="#" onclick="editSurveyQuestion('+value.id+');return false;"><i class="fa fa-edit"></i></a>&nbsp;<a href="#" onclick="deleteSurveyQuestion('+value.id+');return false;"><i class="fa fa-trash"></i></a></div></div>';
                $('#ajaxData').append(htmlcontent);
            })
        },
        error: function(error) {
            console.log(error.responseJSON)
            $.each(error.responseJSON, function(index, value){
               console.log(value)
            })
        }
    })
    $('#surveyQuestionBtn').click(function() {
        $('.label-error').html('');
        $('.parent-error').html('');
        $.ajax({
            url: "<?php echo e(url('/staffs/survey-setup/addnew/surveyQuestion')); ?>",
            type: 'POST',
            data:{
                _token: CSRF_TOKEN,
                survey_id: $('#survey_id').val(),
                parent_id: $('#survey_parent_id').val(),
                label: $('#survey_label').val(),
                type: $('#survey_type').val(),
                list_menu: $('#list_menu').val(),
                required: $('#survey_required').val(),
                extra: $('#survey_extra').val(),
            },
            dataType: 'JSON',
            success:function(data){
                var value = data.msg;
                var htmlcontent = '<div class="row" id="surveyquestion_'+value.id+'" style="margin-top: 20px; margin-bottom: 20px;border-bottom: 1px solid #ececec;"><div class="col-md-2">'+value.parent_id+'</div><div class="col-md-2">'+value.label+'</div><div class="col-md-2">'+value.type+'</div><div class="col-md-2">'+value.list_menu+'</div><div class="col-md-2">'+value.required+'</div><div class="col-md-1">'+value.extra+'</div><div class="col-md-1"><a href="#" onclick="editSurveyQuestion('+value.id+');return false;"><i class="fa fa-edit"></i></a>&nbsp;<a href="#" onclick="deleteSurveyQuestion('+value.id+');return false;"><i class="fa fa-trash"></i></a></div></div>';
                $('#ajaxData').append(htmlcontent);
                $('#survey_label').val('');
                $('#survey_parent_id').val('');
                $('#survey_parent').val('');
                $('#list_menu').val('');
                $('#survey_extra').val('');
                console.log(value)

            },
            error: function(error) {
                console.log(error.responseJSON)
                $.each(error.responseJSON, function(index, value){
                    if(index=='label'){
                        $(`.label-error`).append('<strong class="text-danger">'+value+'</strong>')
                    }
                    if(index=='parent_id'){
                        $(`.parent-error`).append('<strong class="text-danger">'+value+'</strong>')
                    }
                })
            }
        })
    });
    function deleteSurveyQuestion(id){
        $.ajax({
            url: "<?php echo e(url('/staffs/survey-setup/addnew/deleteSurveyQuestion')); ?>",
            type: 'POST',
            data:{
                _token: CSRF_TOKEN,
                survey_id: id
            },
            dataType: 'JSON',
            success:function(data){
                var value = data.msg;
                console.log(value)
                $('#surveyquestion_'+value).remove();
            },
            error: function(error) {
                console.log(error.responseJSON)
            }
        })
    }
    function editSurveyQuestion(id){
        var form = '<input type="hidden" id="edit_survey_id"><input type="hidden" id="edit_question_'+id+'"><div class="col-md-2"><input type="hidden" class="form-control" id="edit_survey_parent_'+id+'"><input type="text" class="form-control" id="edit_survey_parent'+id+'"></div><div class="col-md-2"><input type="text" class="form-control" id="edit_survey_label'+id+'"></div><div class="col-md-2"><select name="type" id="edit_survey_type'+id+'" class="form-control"><option value="text">Text</option><option value="select">Select</option><option value="textarea">Textarea</option><option value="radio">Radio</option><option value="date">Date</option><option value="checkbox">Checkbox</option><option value="email">Email</option><option value="file">File</option></select></div><div class="col-md-2"><input type="text" id="edit_list_menu'+id+'" class="form-control"></div><div class="col-md-2"><select name="required" id="edit_survey_required'+id+'" class="form-control"><option value="false">Not Required</option><option value="true">Required</option></select></div><div class="col-md-1"><input type="text" class="form-control" id="edit_survey_extra'+id+'"></div><div class="col-md-1"><button type="button" onclick="updateSurveyQuestion('+id+')" id="editSurveyQuestionBtn'+id+'" class="btn btn-sm btn-info">Update</button></div>'
        $('#surveyquestion_'+id).html(form);
        $('#edit_survey_id').val($('#survey_id').val())
        $.ajax({
            url: "<?php echo e(url('/staffs/survey-setup/addnew/findSurveyQuestion')); ?>",
            type: 'get',
            data:{
                _token: CSRF_TOKEN,
                question_id: id
            },
            dataType: 'JSON',
            success:function(data){
                var value = data.msg;
                console.log(id)
                $('#edit_question_'+id).val(value.id);
                $('#edit_survey_label'+id).val(value.label);
                $('#edit_survey_parent_'+id).val(value.parent_id);
                $('#edit_survey_parent'+id).val(value.parent);
                $('#edit_list_menu'+id).val(value.list_menu);
                $('#edit_survey_type'+id).val(value.type);
                $('#edit_survey_required'+id).val(value.required);
                $('#edit_survey_extra'+id).val(value.extra);
            },
            error: function(error) {
                console.log(error.responseJSON)
            }
        })

        $('#edit_survey_parent'+id).autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: '<?php echo e(url("/staffs/survey-setup/addnew/edit/autocomplete")); ?>',
                    dataType: "json",
                    data: {
                        term : request.term,
                        survey_id : $('#survey_id').val(),
                        question_id: id
                    },
                    success: function(data) {
                        response(data);
                    }
                })
            },
            autoFocus:true,
            minLength: 1,
            select: function(event, ui) {
                $('#edit_survey_parent'+id).val(ui.item.value);
                $('#edit_survey_parent_'+id).val(ui.item.id);
            }
        });
    }
    function updateSurveyQuestion(id)
    {
        console.log($('#edit_survey_parent_'+id).val())
        $.ajax({
            url: "<?php echo e(url('/staffs/survey-setup/addnew/updateSurveyQuestion')); ?>",
            type: 'PUT',
            data:{
                _token: CSRF_TOKEN,
                question_id: id,
                parent_id: $('#edit_survey_parent_'+id).val(),
                label: $('#edit_survey_label'+id).val(),
                type: $('#edit_survey_type'+id).val(),
                list_menu: $('#edit_list_menu'+id).val(),
                required: $('#edit_survey_required'+id).val(),
                extra: $('#edit_survey_extra'+id).val(),
            },
            dataType: 'JSON',
            success:function(data){
                var value = data.msg;
                console.log(value)
                var updatedRow = '<div class="col-md-2">'+value.parent_id+'</div><div class="col-md-2">'+value.label+'</div><div class="col-md-2">'+value.type+'</div><div class="col-md-2">'+value.list_menu+'</div><div class="col-md-2">'+value.required+'</div><div class="col-md-1">'+value.extra+'</div><div class="col-md-1"><a href="#" onclick="editSurveyQuestion('+value.id+');return false;"><i class="fa fa-edit"></i></a>&nbsp;<a href="#" onclick="deleteSurveyQuestion('+value.id+');return false;"><i class="fa fa-trash"></i></a></div>'
                $('#surveyquestion_'+id).html(updatedRow)
            },
            error: function(error) {
                console.log(error.responseJSON)
            }
        }) 
    }
    $('#survey_parent').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '<?php echo e(url("/staffs/survey-setup/addnew/autocomplete")); ?>',
                dataType: "json",
                data: {
                    term : request.term,
                    survey_id : $('#survey_id').val()
                },
                success: function(data) {
                    response(data);
                }
            })
        },
        autoFocus:true,
        minLength: 1,
        select: function(event, ui) {
            var id = ui.item.id
            console.log(id)
            var value = ui.item.value
            $('#survey_parent').val(value);
            $('#survey_parent_id').val(id);
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('staff_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>