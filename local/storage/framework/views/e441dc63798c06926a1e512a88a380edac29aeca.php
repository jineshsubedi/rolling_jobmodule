<?php $__env->startSection('heading'); ?>
New Job Level 
            <small>Google Drive API Guide</small>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrubm'); ?>
 <li><a href="<?php echo e(url('/branchadmin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Google API Guide</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-xs-12">
        <div class="row">
        </div>
        <div class="box">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Google Drive API Guide
                </div>
                <div class="panel-body">
                    <h1>Enable Google Drive API and get client credentials </h1>
                    <p>
                        <h4>
                            Sign in with your Google account in the reserved area where you can configure Google APIs,
                            from this URL: <a href="https://console.developers.google.com/apis/library">https://console.developers.google.com/apis/library</a>
                        </h4>
                        <img src="<?php echo e(asset('/image/api/drive/1.png')); ?>" alt="1"  width="70%"><br>
                        <h4> Select Google Drive in App Library:<br></h4>
                        <img src="<?php echo e(asset('/image/api/drive/2.png')); ?>" alt="2" width="70%"><br>
                        <h4>Create a project:<br></h4>
                        <img src="<?php echo e(asset('/image/api/drive/3.png')); ?>" alt="3" width="60%"><br>
                        <img src="<?php echo e(asset('/image/api/drive/4.png')); ?>" alt="4" width="60%"><br>
                        <h4>In the left menu (“API and Services”), click on “OAuth consent screen“.<br></h4>
                        <img src="<?php echo e(asset('/image/api/drive/5.png')); ?>" alt="5" width="70%"><br>
                        <h4>Select “External” and enter your email address and the name of the application.<br/>
                            This is the name that will be shown in the “Consent screen” when making authentication.
                            Leave all the other options to their default values.<br>
                            Click on the button “SAVE“</h4>
                        <img src="<?php echo e(asset('/image/api/drive/6.png')); ?>" alt="6" width="70%"><br>
                        <h4>In the left menu (“API and Services”), click on “Credentials” and choose OAuth Client ID from the “Create credentials” menu:</h4>
                        <img src="<?php echo e(asset('/image/api/drive/7.png')); ?>" alt="7" width="70%"><br>
                        <h4>Now select “Web App” as Application Type, enter the name then click on “Create “.</h4>
                        <img src="<?php echo e(asset('/image/api/drive/8.png')); ?>" alt="8" width="70%"><br>
                        <h4>Immediately, CLIENT ID and CLIENT SECRET will be shown on the right. Copy these credentials and paste them into Rolling app.</h4>
                        <img src="<?php echo e(asset('/image/api/drive/9.png')); ?>" alt="9" width="70%"><br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('branchadmin_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>