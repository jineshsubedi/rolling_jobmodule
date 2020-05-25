<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100, 100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;" rel="stylesheet"> 
</head>


<body style=" padding:0px;  margin:0px;  font-family: 'Poppins', sans-serif;  background:url(<?php echo e(asset('image/headerbg.png')); ?>) repeat-x;  padding-bottom: 30px;">
  <div style="width: 95%; margin:0 auto; position: relative;">
    <div style="width: 16%;  padding:5px;  background-color: #eeeeee;  border:1px solid #fff;  float: left;  border-radius: 3px;  margin-top:60px;">
<?php /*      <img style="width: 100%" src="<?php echo e($data['logo']); ?>">*/ ?>
    </div>
    <div style="width: 77%;  background-color: #f9f9f9;  border:1px solid #fff;  border-radius: 3px 3px 0px 0px;  float: right;  padding:18px;  border-bottom: 5px solid #48d617;  box-shadow: 0 10px 6px rgba(119, 119, 199, 0.3);  margin-top:40px;">
      <div style=" width:100%;  float: left;  color: #555555;  font-size: 13px;">
        <h2 style="color: #48d617;  font-weight: 500;  font-size: 18px;">Dear <?php echo e($data->firstname); ?>, </h2>
        <p>We are glad to have you as a new Employee  of Rolling Plans.</p>
        <p>I would like to invite you for an short introduction session schedule for <?php echo e($api->start_time); ?> . The details of the Zoom session ID is mention below:-</p>
        <p>Topic: <?php echo e($api->topic); ?></p>
        <p>Meeting ID: <?php echo e($api->id); ?></p>
        <p>Password: <?php echo e($api->password); ?></p>
        <p>Please click on below button to join zoom meeting or copy this link and pest to your browser <a href="<?php echo e($api->join_url); ?>"><?php echo e($api->join_url); ?></a></p>
        <p><a href="<?php echo e($api->join_url); ?>" style="padding:7px 15px;border-radius: 3px;color: #fff;box-shadow: 0 3px 2px rgba(119, 119, 199, 0.3);margin-right: 10px;border:1px solid #f25a4d;background-color: #e3271b;">Click Here</a></p>
      </div>
      
    </div>
  </div>
  <div style="clear: both;"></div>
    <div style="width: 95%; margin:0 auto; position: relative;">
      <div style="clear: both;"></div>
      <div style="background-color: #00a5e5;color: #fff;font-size:12px;font-weight: 300;text-align: center;padding:2px 0px;margin-top: 5px;float: left;width: 100%;">
        <p>Copyrights © <?php echo e(date('Y')); ?>. All Rights Reserved by Rolling Plans</p>
      </div>
  </div>
</body>
</html>