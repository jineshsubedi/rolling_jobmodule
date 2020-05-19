<?php

namespace App;

use Carbon\Carbon;  
use Illuminate\Database\Eloquent\Model;

class ProbationEvaluation extends Model
{
    protected $table = 'probation_evaluation';  

    protected $fillable = array('staff_id', 'branch_id', 'attribute', 'staff_mid_comment', 'staff_final_comment', 'supervisor_mid_comment', 'supervisor_final_comment', 'mid_completed_at', 'conclusion', 'completed_at');

    public static function checkSupervisorEvaluation($staff)
    {
        $Adjust_staff = \App\Adjustment_staff::select('id', 'name', 'joindate', 'probation_end_date')->find($staff);
        $probation = ProbationEvaluation::where('staff_id', $staff)->latest()->first();
        return $probation;
        $avgMonth = (Carbon::parse($Adjust_staff->joindate)->format('m') + Carbon::parse($Adjust_staff->probation_end_date)->format('m')) / 2;
        // $avgDate = Carbon::parse($Adjust_staff->joindate)->format('Y').'-'.$avgMonth.'-'.Carbon::parse($Adjust_staff->probation_end)->format('d');
        $avgDate = Carbon::parse($Adjust_staff->joindate)->addMonths($avgMonth)->format('Y-m-d');

        if($Adjust_staff->probation_end_date <= Date("Y-m-d")){
            if(isset($probation) && $probation->completed_at == NULL){
                return TRUE;
            }
        }else{
            if(isset($probation) && $Adjust_staff->probation_end_date <= $avgDate){
                if($probation->mid_completed_at == NULL){
                    return TRUE;
                }
            }
        }
        return FALSE;
    }

    public static function getMyProbationEvaluation(){
        $Adjust_staff = \App\Adjustment_staff::select('id', 'name', 'joindate', 'probation_end_date')->where('id', auth()->guard('staffs')->user()->id)->latest()->first();
        $probation = ProbationEvaluation::where('staff_id', auth()->guard('staffs')->user()->id)->latest()->first();
        $avgMonth = (Carbon::parse($Adjust_staff->joindate)->format('m') + Carbon::parse($Adjust_staff->probation_end_date)->format('m')) / 2;
        // $avgDate = Carbon::parse($Adjust_staff->joindate)->format('Y').'-'.$avgMonth.'-'.Carbon::parse($Adjust_staff->probation_end)->format('d');
        $avgDate = Carbon::parse($Adjust_staff->joindate)->addMonths($avgMonth)->format('Y-m-d');

        if($Adjust_staff->probation_end_date <= Date("Y-m-d")){
            if(isset($probation) && $probation->staff_final_comment == NULL){
                return $probation;
            }
        }else{
            if($Adjust_staff->probation_end_date <= $avgDate){
                if(isset($probation) && $probation->staff_mid_comment == NULL){
                    return $probation;
                }
            }
        }
        return NULL;
    }

    public static function countStaffProbation()
    {

    }
}
