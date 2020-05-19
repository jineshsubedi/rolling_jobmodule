<?php $__env->startSection('heading'); ?>
Organization Chart
<small>List of Organization Chart</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
<li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

<li class="active">Organization Chart</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/organizationchart/css/jquery.orgchart.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
<style>
    #chart-container {
        font-family: Arial;
        height: 100%;
        border: 2px dashed #aaa;
        border-radius: 5px;
        overflow: auto !important;
        text-align: center !important;
    }

    .orgchart {
        background: #fff;
    }

    .orgchart .node {
        width: auto;
    }

    .orgchart .node .title {
        height: 30px;
        line-height: 30px;
        width: 100%;
        min-width: 130px;
    }

    .orgchart .node .title .symbol {
        margin-top: 1px;
    }

    .orgchart td.left,
    .orgchart td.right,
    .orgchart td.top {
        border-color: #aaa;
    }

    .orgchart td>.down {
        background-color: #aaa;
    }

    .orgchart .senior-manager .title {
        background-color: #006699;
        min-width: 200px;
        width: 100%;
    }

    .orgchart .senior-manager .chart-content {
        border-color: #006699;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .head .title {
        background-color: #55baec;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .head .chart-content {
        border-color: #55baec;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .sub-senior-manager .title {
        background-color: #009933;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .sub-senior-manager .chart-content {
        border-color: #009933;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .manager .title {
        background-color: #993366;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .manager .chart-content {
        border-color: #993366;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .department .title {
        background-color: #996633;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .department .chart-content {
        border-color: #996633;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .senior-officer .title {
        background-color: #cc0066;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .senior-officer .chart-content {
        border-color: #cc0066;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .officer .title {
        background-color: #730f59;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .officer .chart-content {
        border-color: #730f59;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .junior-officer .title {
        background-color: #bd0d8f;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .junior-officer .chart-content {
        border-color: #bd0d8f;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .assistant-level .title {
        background-color: #b7a8a8;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .assistant-level .chart-content {
        border-color: #b7a8a8;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .part-time .title {
        background-color: #583d3d;
        width: 100%;
        min-width: 200px;
    }

    .orgchart .part-time .chart-content {
        border-color: #583d3d;
        width: 100%;
        min-width: 200px;
    }

    .submanager {
        padding-top: 10px !important;
    }

    .title {
        font-size: 12px !important;
        width: 100%;
    }

    .chart-content {
        height: auto !important;
        border: 1px solid #f2d9d9;
        border-radius: 0 0 4px 4px;
    }
</style>
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo e(url('/branchadmin/organizationChart/addMember')); ?>" class="btn refreshbtn right btm10m"><i
                        class="fa fa-plus-circle"></i> Add Organization Members</a>
            </div>
        </div>
        <div class="box">
            <div class="box-title">
            </div>
            <div class="box-body">
                <div id="chart_container"  class="text-center"></div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/html2canvas@1.0.0-rc.5/dist/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/organizationchart/js/jquery.orgchart.js')); ?>"></script>
<script type="text/javascript">
    $(function() {
        var datasource = '';
        var token = $('input[name=\'_token\']').val();
        $.ajax({
            url: '<?php echo e(route("branchadmin.orgchart.getChartData")); ?>',
            data: {'_token':token},
            type: 'GET',
            dataType: 'JSON',
            cache: false,
            contentType: 'application/json',
            success:function(data){
                datasource = data.msg;
                var nodeTemplate = function(data) {
                    return `
                    <div class="title">${data.name}</div>
                    <div class="chart-content">${data.title}</div>
                    `;
                };
                // var getId = function() {
                //     return (new Date().getTime()) * 1000 + Math.floor(Math.random() * 1001);
                // };
                
                var oc = $('#chart_container').orgchart({
                    'data' : JSON.parse(datasource),
                    'nodeContent': 'title',
                    'nodeTemplate': nodeTemplate,
                    'exportButton': true,
                    'exportFileextension': 'pdf',
                    'exportFilename': 'MyOrgChart',
                    'parentNodeSymbol': 'fa-users',
                    'direction': 't2b'
                });
            },
            error: function(error)
            {
                console.log(error)
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>