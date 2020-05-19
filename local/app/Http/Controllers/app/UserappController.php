<?php

namespace App\Http\Controllers\app;
use DB;
use App\Http\Controllers\Controller;
use Cache;
use App\Adjustment_staff;
use App\Http\Requests;
use App\Branch;
use Illuminate\Http\Request;
use Validator;
use App\library\myFunctions;
use App\Shifttime;
use App\Imagetool;
use App\StaffEducation;
use App\StaffFile;
use Image;
use File;
use App\EducationLevel;
use App\Department;
use App\Faculty;
use App\Designation;
use Excel;
use Illuminate\Support\Facades\Auth;
use App\PerformanceRating;
use App\PerformanceSetting;
use App\StaffSalary;
use App\StaffAllowance;
use App\library\NepaliDateApi;
use Carbon\Carbon;

class UserappController extends Controller
{

use NepaliDateApi;

 
public function checkUser(Request $request)
{
  $email = '';
  $imei = '';
  if (isset($request->email)) {
    $email = $request->email;
  }

  if (isset($request->imei)) {
    $imei = $request->imei;
  }

  $return_data = [
    'staff_id' => '',
    'name' => '',
    'email' => $email,
    'imei' => $imei,
  ];

  $staff = Adjustment_staff::select('id','name','email','imei')->where('email',$email)->first();
  if (isset($staff->id)) {
    
    if ($staff->imei != '') {
      if ($staff->imei == $imei) {
        $return_data = [
          'staff_id' => $staff->id,
          'name' => $staff->name,
          'email' => $email,
          'imei' => $imei,
        ];
      }
    } else{
      $return_data = [
          'staff_id' => $staff->id,
          'name' => $staff->name,
          'email' => $email,
          'imei' => $imei,
        ];

        Adjustment_staff::where('id', $staff->id)->update(['imei' => $imei]);
    }
  }


     $responsecode = 200;
      $header = array (
        'Content-Type' => 'application/json; charset=UTF-8',
        'charset' => 'utf-8'
      );
                            
    return response()->json($return_data , $responsecode, $header, JSON_UNESCAPED_UNICODE);
  

}

public function attendance(Request $request)
{
  $staff_id = '0';
  $staff_email = '';
  $attendance_date = date('Y-m-d');
  $in_time = date('H:i:s');
  $location = '';
  $lunch_out = date('H:i:s');
  $lunch_location = '';
  $lunch_in = date('H:i:s');
  $lunch_in_location = '';
  $clock_out = date('H:i:s');
  $clock_out_location = '';

  if (isset($request->staff_id)) {
    $staff_id = $request->staff_id;
  }
  if (isset($request->staff_email)) {
    $staff_email = $request->staff_email;
  }

  if (isset($request->attendance_date)) {
    $attendance_date = $request->attendance_date;
  }

  if (isset($request->in_time)) {
    $in_time = $request->in_time;
  }

  if (isset($request->location)) {
    $location = $request->location;
  }

  if (isset($request->lunch_out)) {
    $lunch_out = $request->lunch_out;
  }

  if (isset($request->lunch_location)) {
    $lunch_location = $request->lunch_location;
  }

  if (isset($request->lunch_in)) {
    $lunch_in = $request->lunch_in;
  }

  if (isset($request->lunch_in_location)) {
    $lunch_in_location = $request->lunch_in_location;
  }

  if (isset($request->clock_out)) {
    $clock_out = $request->clock_out;
  }

  if (isset($request->clock_out_location)) {
    $clock_out_location = $request->clock_out_location;
  }

  
  $check = Adjustment_staff::select('id','branch')->where('email', $staff_email)->first();
  if (isset($check->id)) {
    if ($check->id == $staff_id) {
      if (isset($request->type)) {
        if ($request->type == 'clock_in') {
            $acheck = Attendance::where('adjustment_staff_id', $staff_id)->where('attendance_date', $attendance_date)->where('in_time', '!=', '')->count();
            if ($acheck > 0) {
              $return_data = 'You are already clocked in';
            } else{
              $nep_date = $this->eng_to_nep(date('Y'), date('m'), date('d'));

              Attendance::create([
                'adjustment_staff_id' => $staff_id, 
                'branch_id' => $check->branch, 
                'attendance_date' => $attendance_date, 
                'in_time' => $in_time, 
                'in_location' => $location,
                'np_year' => $nep_date['year'],
                'np_month' => $nep_date['month'],
                'np_date' => $nep_date['date'],
              ]);
              $return_data = 'Success';
            }
            
        }elseif ($request->type == 'lunch_out') {
          $att = Attendance::where('adjustment_staff_id', $staff_id)->where('attendance_date', $attendance_date)->first();
          if (isset($att->id)) {
            Attendance::where('id', $att->id)->update(['lunch_start' => $lunch_out, 'lunch_start_location' => $lunch_location]);
          }else{
            $return_data = 'Sorry Colock In data not found on '.$attendance_date;
          }
        }
        elseif ($request->type == 'lunch_in') {
          $att = Attendance::where('adjustment_staff_id', $staff_id)->where('attendance_date', $attendance_date)->first();
          if (isset($att->id)) {
            Attendance::where('id', $att->id)->update(['lunch_end' => $lunch_in, 'lunch_end_location' => $lunch_in_location]);
          }else{
            $return_data = 'Sorry Colock In data not found on '.$attendance_date;
          }
        }
        elseif ($request->type == 'clock_out') {
          $att = Attendance::where('adjustment_staff_id', $staff_id)->where('attendance_date', $attendance_date)->first();
          if (isset($att->id)) {
            Attendance::where('id', $att->id)->update(['out_time' => $clock_out, 'out_location' => $clock_out_location]);
          }else{
            $return_data = 'Sorry Colock In data not found on '.$attendance_date;
          }
        }
      } else{
        $return_data = 'Attendance Type is required.';
      }
    } else{
      $return_data = 'User Not Match';
    }
  } else {
    $return_data = 'User Not Found';
  }


  $responsecode = 200;
      $header = array (
        'Content-Type' => 'application/json; charset=UTF-8',
        'charset' => 'utf-8'
      );
                            
    return response()->json($return_data , $responsecode, $header, JSON_UNESCAPED_UNICODE);

}


public function getKra(Request $request)
{
  $id = 0;
  if (isset($request->staff_id)) {
    $id = $request->staff_id;
  }

  $return_data['kra'] = [];
  $kras = \App\StaffKra::where('staff_id',$id)->orderBy('title', 'asc')->get();
  foreach ($kras as $key => $kra) {
    $return_data['kra'][] = [
      'id' => $kra->id,
      'title' => $kra->title,
    ];
  }

   $responsecode = 200;
      $header = array (
        'Content-Type' => 'application/json; charset=UTF-8',
        'charset' => 'utf-8'
      );
                            
    return response()->json($return_data , $responsecode, $header, JSON_UNESCAPED_UNICODE);

}


public function saveDailyRoutine(Request $request)
    {

      $v= Validator::make($request->all(),
            [
                    'staff_id' => 'required',
                    'work_date' => 'required|date',
                    'start_time' => 'required',
                    'end_time' => 'required',
                    'description' => 'required'
                    
            ]);
        if($v->fails())
        {
            $return_data = 'Required field are important';
        }
         else{

          $work_date = Carbon::parse($request->work_date);

        $nep_date = $this->eng_to_nep($work_date->year, $work_date->month, $work_date->day);
        $kra = '';
        $task_id = 0;
        $type = '';
        if (isset($request->kra)) {
            $kra = $request->kra;
        }
        if (isset($request->task_id)) {
            $task_id = $request->task_id;
        }
        if (isset($request->type)) {
            $type = $request->type;
        }

        $data = [
            'staff_id' => auth()->guard('staffs')->user()->id, 
            'en_year' => $work_date->year, 
            'en_month' => $work_date->month,
            'en_day' => $work_date->day, 
            'np_year' => $nep_date['year'], 
            'np_month' => $nep_date['month'], 
            'np_day' => $nep_date['date'], 
            'start_time' => $request->work_date.' '.$request->start_time, 
            'finish_time' => $request->work_date.' '.$request->end_time, 
            'description' => $request->description,
            'kra' => $kra,
            'task_id' => $task_id,
            'type' => $type,
        ];
        DailyRoutine::create($data);

        $return_data = 'Success';
         }

        $responsecode = 200;
        $header = array (
          'Content-Type' => 'application/json; charset=UTF-8',
          'charset' => 'utf-8'
        );
                              
      return response()->json($return_data , $responsecode, $header, JSON_UNESCAPED_UNICODE);

        
        
    }

    public function getTodayRecord(Request $request)
    {
      $id = 0;
      if (isset($request->staff_id)) {
       $id = $request->staff_id;
      }
      $today = date('Y-m-d');
      if (isset($request->today)) {
        $today = $request->today;
      }
      $datas['staff_id'] = $id;
      $datas['date'] = $today;
      $datas['clock_in'] = '';
      $datas['clock_in_location'] = '';
      $datas['lunch_out'] = '';
      $datas['lunch_out_location'] = '';
      $datas['lunch_in'] = '';
      $datas['lunch_in_location'] = '';
      $datas['clock_out'] = '';
      $datas['clock_out_location'] = '';
      $datas['tasks'] = [];
      $clock = \App\Attendance::where('adjustment_staff_id', $id)->where('attendance_date',$today)->first();
      if (isset($clock->id)) {
          $datas['clock_in'] = $clock->in_time;
          $datas['clock_in_location'] = $clock->in_location;
          $datas['lunch_out'] = $clock->lunch_start;
          $datas['lunch_out_location'] = $clock->lunch_start_location;
          $datas['lunch_in'] = $clock->lunch_end;
          $datas['lunch_in_location'] = $clock->lunch_end_location;
          $datas['clock_out'] = $clock->out_time;
          $datas['clock_out_location'] = $clock->out_location;
      }

      $tasks = \App\DailyRoutine::where('staff_id',$id)->where('start_time', 'LIKE', $today.'%')->get();
      foreach ($tasks as $key => $task) {
        $datas['tasks'][] = [
          'staff_id' => $id,
          'work_date' => $today,
          'start_time' => str_replace($today.' ', '', $task->start_time),
          'end_time' => str_replace($today.' ', '', $task->finish_time),
          'kra_id' => $task->kra,
          'kra_title' => \App\StaffKra::getTitle($task->kra),
          'detail' => $task->description,
        ];
      }

      $responsecode = 200;
        $header = array (
          'Content-Type' => 'application/json; charset=UTF-8',
          'charset' => 'utf-8'
        );
                              
      return response()->json($datas , $responsecode, $header, JSON_UNESCAPED_UNICODE);
    }


    public function storeAppKey(Request $request)
    {
      $staff_id = 0;
      $token = '';
      if (isset($request->staff_id)) {
        if (!empty($request->staff_id)) {
         $staff_id = $request->staff_id;
        }
      }
      $message = 'Error';

      if (isset($request->token)) {
        if (!empty($request->token) && $staff_id > 0) {
          Adjustment_staff::where('id',$staff_id)->update(['app_token' => $request->token]);
          $message = 'Success';
        }
      }

      $responsecode = 200;
        $header = array (
          'Content-Type' => 'application/json; charset=UTF-8',
          'charset' => 'utf-8'
        );
                              
      return response()->json($message , $responsecode, $header, JSON_UNESCAPED_UNICODE);
    }

}


