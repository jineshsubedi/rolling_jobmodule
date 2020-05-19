<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Job Recomended</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000;">
<div style="width: 680px;">
  <p style="margin-top: 0px; margin-bottom: 20px;">The following job has been recommended by your friend <?php echo $data['name'];?></p>
  
  
 <p style="font-size: 12px; border-right: 1px solid #DDDDDD; border-bottom: 1px solid #DDDDDD; text-align: left; padding: 7px;"><?php echo $data['message']; ?></p>
  
  <p><a href="<?php echo $data['job_url'];?>" style="-webkit-appearance: button; cursor: pointer; background-color: #428bca; border: none; font-size: 13px;font-weight: 300;  border-radius: 2px; color: #fff;display: inline-block; padding: 6px 12px; margin-bottom: 0; line-height: 1.42857143;  text-align: center;  white-space: nowrap; vertical-align: middle;     background-image: none;">Click Here</a></p>
  <p>or copy this link to your brouser <?php echo $data['job_url'];?></p>
  
</div>
</body>
</html>