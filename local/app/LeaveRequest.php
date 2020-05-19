<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
use App\LeaveSetting;

class LeaveRequest extends Model
{
    protected $table = 'leave_request';  

    protected $fillable = array('requested_by', 'leave_type', 'full_day', 'compensation', 'contact_number', 'start_date', 'emergency', 'end_date', 'duration', 'description', 'supervisor_approval', 'hr_approval', 'branch_id', 'chairman_approval', 'chairman_remarks', 'leave_file', 'types');
    protected $primaryKey = 'id';

    public function handoverTo()
    {
    	return $this->hasMany('App\LeaveWorkHandover');
    }
    
    public static function getStatus($id='', $type='')
    {
    	$leave = DB::table('leave_request')->select('id','supervisor_remarks', 'supervisor_approval', 'hr_approval', 'hr_remarks', 'chairman_approval', 'chairman_remarks')->where('id', $id)->first();
        $data = '';
    	if (isset($leave->id)) {
           if ($type == 'Supervisor') {

               if ($leave->supervisor_approval == 0) {
                   $data = '<span class="label bg-blue">Waiting For Approval</span>';
               }elseif ($leave->supervisor_approval == 1) {
                   $data = '<span class="label bg-green">Approved</span>';
               } else{
                $tp = "SU";
                $data = '<span class="label bg-red pointer" onclick="viewSRemarks('.$id.')">Canceled</span><input type="hidden" id="su_rem_'.$id.'" value="'.$leave->supervisor_remarks.'">';
               }
           }

           if ($type == 'HR') {
            if ($leave->supervisor_approval == 1) {
               
               if ($leave->hr_approval == 0) {
                   $data = '<span class="label bg-blue">Waiting For Approval</span>';
               }elseif ($leave->hr_approval == 1) {
                   $data = '<span class="label bg-green">Approved</span>';
               } else{
                $tp = "HR";
                $data = '<span class="label bg-red pointer" onclick="viewHRemarks('.$id.')">Canceled</span><input type="hidden" id="hr_rem_'.$id.'" value="'.$leave->hr_remarks.'">';
               }
                } else{
                    $data = '';
                }
           }

           if ($type == 'Chairman') {
                if($leave->hr_approval == 1){
               if ($leave->chairman_approval == 0) {
                   $data = '<span class="label bg-blue">Waiting For Approval</span>';
               }elseif ($leave->chairman_approval == 1) {
                   $data = '<span class="label bg-green">Approved</span>';
               } else{
                $tp = "CH";
                $data = '<span class="label bg-red pointer" onclick="viewCRemarks('.$id.')">Canceled</span><input type="hidden" id="ch_rem_'.$id.'" value="'.$leave->chairman_remarks.'">';
               }
                } else{
                    $data = '';
                }
           }
    		
    	} 

    	return $data;
    }


    public static function getDuration($type,$full_day = '',$duration,$start_date,$end_date)
    {
    	 				$duration = $duration;

                           if ($type == 3) {
                               $end_date = Carbon::parse($end_date);
                                $start_date = Carbon::parse($start_date);
                                $diff = $end_date->diffInDays($start_date);
                                $duration = $diff + 1;
                           }
                           
                        if ($full_day == 3) {
                            $duration = $duration / 2;
                           } elseif ($full_day == 2) {
                             $duration = $duration / 4;
                           } else{
                            $duration = $duration;
                           }

                     return $duration.' Day(s)';
    }


    public static function getApproveButton($id,$requested_by,$supervisor_approval,$hr_approval, $chairman_approval)
    {
        $data = '';
        $setting = LeaveSetting::where('branch_id', auth()->guard('staffs')->user()->branch)->first();
        $staff = DB::table('adjustment_staff')->select('supervisor')->where('id', $requested_by)->first();
        if ($staff->supervisor == auth()->guard('staffs')->user()->id && $setting->supervisor_required == 1) {
            if ($supervisor_approval == 0) {
                
                $data .= '<a href="javascript:void(0);" onClick="SUApprove('.$id.')" class="btn btn-success left">Approve</a>';
                $data .= '<a href="javascript:void(0);" onClick="SUdecline('.$id.')" class="btn btn-danger left">Decline</a>';
            } elseif ($supervisor_approval == 1) {
                
               
                $data .= '<a href="javascript:void(0);" onClick="SUdecline('.$id.')" class="btn btn-danger left">Decline</a>';
            } elseif ($supervisor_approval == 2) {
               
                $data .= '<a href="javascript:void(0);" onClick="SUApprove('.$id.')" class="btn btn-success left">Approve</a>';
               
            }
        }

         if ($setting->approve_person == auth()->guard('staffs')->user()->id && $setting->approval_required == 1) {
          if($supervisor_approval == 1){
             if ($staff->supervisor != auth()->guard('staffs')->user()->id)
             {
               if ($hr_approval == 0) {
                  
                  $data .= '<a href="javascript:void(0);" onClick="HRApprove('.$id.')" class="btn btn-success left">Approve</a>';
                  $data .= '<a href="javascript:void(0);" onClick="HRdecline('.$id.')" class="btn btn-danger left">Decline</a>';
              } elseif ($hr_approval == 1) {
                 
                 
                  $data .= '<a href="javascript:void(0);" onClick="HRdecline('.$id.')" class="btn btn-danger left">Decline</a>';
              } elseif ($hr_approval == 2) {
                 
                  $data .= '<a href="javascript:void(0);" onClick="HRApprove('.$id.')" class="btn btn-success left">Approve</a>';
                 
              }
             }
          }
        }

        if ($setting->chairman == auth()->guard('staffs')->user()->id && $setting->chairman_required == 1) {
          if($supervisor_approval == 1 && $hr_approval == 1){
           if ($staff->supervisor != auth()->guard('staffs')->user()->id)
           {
             if ($chairman_approval == 0) {
                
                $data .= '<a href="javascript:void(0);" onClick="CHApprove('.$id.')" class="btn btn-success left">Approve</a>';
                $data .= '<a href="javascript:void(0);" onClick="CHdecline('.$id.')" class="btn btn-danger left">Decline</a>';
            } elseif ($chairman_approval == 1) {
               
               
                $data .= '<a href="javascript:void(0);" onClick="CHdecline('.$id.')" class="btn btn-danger left">Decline</a>';
            } elseif ($chairman_approval == 2) {
               
                $data .= '<a href="javascript:void(0);" onClick="CHApprove('.$id.')" class="btn btn-success left">Approve</a>';
               
            }
           }
         }
        }

        return $data;
    }
    
    
    public static function countApprovalWaiting()
    {
      $setting = LeaveSetting::where('branch_id', auth()->guard('staffs')->user()->branch)->first();

      $ids = Adjustment_staff::select('id')->where('supervisor', auth()->guard('staffs')->user()->id)->get();
        $id = [];
        foreach ($ids as $key => $value) {
          $id[]= $value->id;
        }
      $data = DB::table('leave_request')->where('supervisor_approval', 0)->whereIn('requested_by', $id)->count();;

      if($setting->approve_person == auth()->guard('staffs')->user()->id)
      {
        $data += DB::table('leave_request')->where('supervisor_approval', 1)->where('hr_approval', 0)->count();
        
      } elseif ($setting->chairman == auth()->guard('staffs')->user()->id) {
        $data += DB::table('leave_request')->where('supervisor_approval', 1)->where('hr_approval', 1)->where('chairman_approval', 0)->count();

      } 
      return $data;
    }

    public static function UnpaidCountOfStaff($id){
        $fiscal = \App\FiscalYear::where('status', 1)->orderBy('id', 'desc')->first();
        
        return LeaveRequest::where('requested_by',$id)
              ->where('types',1)
              ->where('supervisor_approval', 1)
              ->where('hr_approval', 1)
              ->where('chairman_approval', 1)
              ->where('start_date', '<=', $fiscal->end)
              ->where('end_date', '>=', $fiscal->start)
              ->count();
    }
}
