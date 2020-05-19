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
                        @if(in_array('saluation', $datas['jf']))
                        <td>Salutation</td>
                        @endif
                         <td>First Name</td>
                         <td>Middle Name</td>
                         <td>Last Name</td>
                         <td>E-mail</td>
                         <td>Total Experience</td>
                          @if(in_array('mobile_phone', $datas['jf'])) 
                          <td>Mobile Phone</td>
                          @endif
                          @if(count($datas['fdt']) > 0)
                            @foreach($datas['fdt'] as $fd)
                              <td>{{$fd['f_title']}} ({{$fd['marks']}})</td>
                            @endforeach
                          @endif
                          <td>Education Marks ({{$datas['job']->edu_marks}})</td>
                          <td>Experience Marks ({{$datas['job']->exp_marks}})</td>
                          <td>Total Marks ({{$datas['total']}})</td>

                      </tr>
                    </thead>

                    <tbody>
                      @if(count($datas['employees']) > 0)
                          @foreach($datas['employees'] as $emp)
                            <tr>
                        <td>{{$emp['id']}}</td>
                        @if(in_array('saluation', $datas['jf']))
                        <td>{{$emp['saluation']}}</td>
                        @endif
                         <td>{{$emp['firstname']}}</td>
                         <td>{{$emp['middlename']}}</td>
                         <td>{{$emp['lastname']}}</td>
                         <td>{{$emp['email']}}</td>
                          <td>{{$emp['total_experience']}}</td>
                          @if(in_array('mobile_phone', $datas['jf'])) 
                          <td>{{$emp['mobile']}}</td>
                          @endif

                          @if(count($emp['form_data']) > 0)
                            @foreach($emp['form_data'] as $fdt)
                            <td>{{$fdt['marks']}}</td>
                            @endforeach
                          @endif
                          <td>{{$emp['edu_marks']}}</td>
                           <td>{{$emp['exp_marks']}}</td>
                            <td>{{$emp['total_marks']}}</td>

                          
                      </tr>
                          @endforeach

                      @endif
                     
                      
                     </tbody>
                      

                    </table>

          </body>
</html>
