<?php $__env->startSection('heading'); ?>
New Survey
<small>create New Survey</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/supervisor')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="<?php echo e(url('/supervisor/survey-setup')); ?>">Surveys</a></li>
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
                            <div class="form-group">
                                <label>Survey Title:</label>
                                <div class="form-input">
                                    <input type="text" id="survey_title" class="form-control" required>
                                    <div class="title-error"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Branch:</label>
                                <div class="form-input">
                                    <select name="branch" id="survey_branch" class="form-control" required>
                                        <option value="<?php echo e(null); ?>">select branch</option>
                                        <?php foreach($branches as $branch): ?>
                                        <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="branch-error"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Survey Publish Date:</label>
                                <div class="form-input">
                                    <input type="text" id="survey_publish_date" class="form-control" required>
                                    <div class="publish-date-error"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Survey End Date:</label>
                                <div class="form-input">
                                    <input type="text" id="survey_end_date" class="form-control" required>
                                    <div class="end-date-error"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-input">
                                    <button type="button" id="surveybtn" class="btn btn-sm btn-primary">SAVE</button>
                                </div>
                            </div>
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
                    <a href="<?php echo e(route('supervisor.surveysetup.index')); ?>" class="btn btn-sm btn-default">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var CSRF_TOKEN = $('input[name=\'_token\']').val();
    $('#survey_publish_date').datepicker({
        autoclose: true,
        format: 'yyyy-m-d',
    });
    $('#survey_end_date').datepicker({
        autoclose: true,
        format: 'yyyy-m-d',
    });
    $('#survey_question_section').hide();
    console.log($('#survey_branch').val());
    $('#surveybtn').click(function(){
        $('.title-error').html('');
        $('.branch-error').html('');
        $('.publish-date-error').html('');
        $('.end-date-error').html('');
        $.ajax({
            url: "<?php echo e(url('/supervisor/survey-setup/addnew/survey')); ?>",
            type: 'POST',
            data:{
                _token: CSRF_TOKEN,
                title: $('#survey_title').val(),
                branch_id: $('#survey_branch').val(),
                publish_date: $('#survey_publish_date').val(),
                end_date: $('#survey_end_date').val(),
            },
            dataType: 'JSON',
            success:function(data){
                var value = data.msg;
                $('#survey_question_section').show();
                $('#survey_id').val(value.id);
                $('#survey_section').html('<p style="font-size: 16px"><b>Survey Title: '+value.title+'</b></p>');
            },
            error: function(error) {
                console.log(error.responseJSON)
               $.each(error.responseJSON, function(index, value){
                    if(index=='title'){
                        $(`.title-error`).append('<strong class="text-danger">'+value+'</strong>')
                    }
                    if(index=='branch_id'){
                        $(`.branch-error`).append('<strong class="text-danger">'+value+'</strong>')
                    }
                    if(index=='publish_date'){
                        $(`.publish-date-error`).append('<strong class="text-danger">'+value+'</strong>')
                    }
                    if(index=='end_date'){
                        $(`.end-date-error`).append('<strong class="text-danger">'+value+'</strong>')
                    }
                })
            }
        })
    });
    $('#surveyQuestionBtn').click(function() {
        $('.label-error').html('');
        $('.parent-error').html('');
        $.ajax({
            url: "<?php echo e(url('/supervisor/survey-setup/addnew/surveyQuestion')); ?>",
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
                var htmlcontent = '<div class="row" id="surveyquestion_'+value.id+'" style="margin-top: 20px; margin-bottom: 20px;border-bottom: 1px solid #ececec;"><div class="col-md-2">'+value.parent_id+'</div><div class="col-md-2">'+value.label+'</div><div class="col-md-2">'+value.type+'</div><div class="col-md-2">'+value.list_menu+'</div><div class="col-md-2">'+value.required+'</div><div class="col-md-1">'+value.extra+'</div><div class="col-md-1"><a href="#" onclick="deleteSurveyQuestion('+value.id+');return false;"><i class="fa fa-trash"></i></a></div></div>';
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
            url: "<?php echo e(url('/supervisor/survey-setup/addnew/deleteSurveyQuestion')); ?>",
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
    $('#survey_parent').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '<?php echo e(url("/supervisor/survey-setup/addnew/autocomplete")); ?>',
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
<?php echo $__env->make('supervisor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>