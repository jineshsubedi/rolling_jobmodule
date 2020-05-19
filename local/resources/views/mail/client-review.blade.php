<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100, 100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;" rel="stylesheet"> 
</head>


<body style=" padding:0px;  margin:0px;  font-family: 'Poppins', sans-serif;  background:url({{asset('image/headerbg.png')}}) repeat-x;  padding-bottom: 30px;">
  <div style="width: 95%; margin:0 auto; position: relative;">
    <div style="width: 16%;  padding:5px;  background-color: #eeeeee;  border:1px solid #fff;  float: left;  border-radius: 3px;  margin-top:60px;">
      <img style="width: 100%" src="{{$data['logo']}}">
    </div>
    <div style="width: 77%;  background-color: #f9f9f9;  border:1px solid #fff;  border-radius: 3px 3px 0px 0px;  float: right;  padding:18px;  border-bottom: 5px solid #48d617;  box-shadow: 0 10px 6px rgba(119, 119, 199, 0.3);  margin-top:40px;">
      <div style=" width:100%;  float: left;  color: #555555;  font-size: 13px;">
        <h2 style="color: #48d617;  font-weight: 500;  font-size: 18px;">Dear {{$data['to_name']}}, </h2>
        <p>We are glad to have you as a client and would like to thank you for using the services of Rolling Plans.</p>
        <p>As part of Rolling Plans CQFS (Client Quarterly Feedback System), we would like to ask you a few questions about your experience so far. It takes only 3 minutes and your answer will help us make Rolling Plans Services better for your and all other clients. </p>
        <p>The feedback system aims to get the rating of Rolling Plans and its Point of Contact (POC) in terms of Service Delivery and overall Performance. Your valuable feedback is reviewed only by the HEAD of Rolling Plans, so please feel to express yourself to reflect the true picture of the performance of Organization/POC. </p>
        <p>We would expect the feedback to be completed within 3 business days. Thank you in advance.</p>
        <p>Please click on below button to take action or copy this link and pest to your brouser <a href="{{$data['url']}}">{{$data['url']}}</a></p>
        <p><a href="{{$data['url']}}" style="padding:7px 15px;border-radius: 3px;color: #fff;box-shadow: 0 3px 2px rgba(119, 119, 199, 0.3);margin-right: 10px;border:1px solid #f25a4d;background-color: #e3271b;">Click Here</a></p>
      </div>
      
    </div>
  </div>
  <div style="clear: both;"></div>
    <div style="width: 95%; margin:0 auto; position: relative;">
        
      <div style="font-weight: 400;font-size: 15px;padding:0px;margin-top: 30px;padding:10px;border:1px solid #eaeaea;border-radius: 3px;float: left;background-color: #f5f5f5; margin-bottom: 10px;">
        {{$data['name']}}<br>
        
      </div>
      <div style="clear: both;"></div>
      <div style="background-color: #00a5e5;color: #fff;font-size:12px;font-weight: 300;text-align: center;padding:2px 0px;margin-top: 5px;float: left;width: 100%;">
        <p>Copyrights © {{date('Y')}}. All Rights Reserved by {{$data['name']}}</p>
      </div>
  </div>
</body>
</html>