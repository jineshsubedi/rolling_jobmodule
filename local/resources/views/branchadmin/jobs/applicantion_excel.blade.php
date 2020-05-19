<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
    <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <td>ID</td>
                       
                         <td>First Name</td>
                         <td>Middle Name</td>
                         <td>Last Name</td>
                         <td>E-mail</td>
                         <td>Tracking Code</td>
                         </tr>
                         
                    </thead>
                    <tbody>
                         @if(count($datas['employees']) > 0)
                          @foreach($datas['employees'] as $emp)
                            <tr>
                        <td>{{$emp['id']}}</td>
                        
                         <td>{{$emp['firstname']}}</td>
                         <td>{{$emp['middlename']}}</td>
                         <td>{{$emp['lastname']}}</td>
                         <td>{{$emp['email']}}</td>
                         <td>{{$emp['tracking_code']}}</td>
                         </tr>
                         @endforeach
                         @endif
                    </tbody>
    </table>
</body>
</html>