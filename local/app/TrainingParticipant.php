<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingParticipant extends Model
{
    protected $table = 'training_participant';  

    protected $fillable = array('training_id', 'staff_id', 'request_status', 'participant_status', 'level', 'description');

    protected $primaryKey = 'id';

    public static function getTotalPresent($training_id, $year, $month, $program, $department)
    {
        $departmentStaffs = \App\Adjustment_staff::where('department', $department)->pluck('id');
        $training_ids = \App\TrainingParticipant::whereIn('staff_id', $departmentStaffs)
                        ->where('request_status', 1)
                        ->groupBy('training_id')
                        ->pluck('training_id');

    	$data = TrainingParticipant::leftjoin('training', function($join){
                    $join->on('training_participant.training_id','=', 'training.id');
                })->where('training_participant.training_id', $training_id)->whereYear('training.from', '=', $year);

        if($month != 0)
        {
            $data = $data->whereMonth('training.from', '=', $month);
        }
        if($program != 0)
        {
            $data = $data->where('training.program_id', $program);   
        }
        if($department != 0)
        {
            $departmentStaffs = \App\Adjustment_staff::where('department', $department)->pluck('id');
            $data = $data->whereIn('training_participant.staff_id', $departmentStaffs);
        }
        $data = $data->where('training_participant.request_status', 1)
                ->where('training_participant.participant_status', 0)
                ->count();
        return $data;
    }
    public static function getTotalAbsent($training_id, $year, $month, $program, $department)
    {
        $departmentStaffs = \App\Adjustment_staff::where('department', $department)->pluck('id');
        $training_ids = \App\TrainingParticipant::whereIn('staff_id', $departmentStaffs)
                ->where('request_status', 1)
                ->groupBy('training_id')
                ->pluck('training_id');

    	$data = TrainingParticipant::leftjoin('training', function($join){
                    $join->on('training_participant.training_id','=', 'training.id');
                })->where('training_participant.training_id', $training_id)->whereYear('training.from', '=', $year);

        if($month != 0)
        {
            $data = $data->whereMonth('training.from', '=', $month);
        }
        if($program != 0)
        {
            $data = $data->where('training.program_id', $program);   
        }
        if($department != 0)
        {
            $departmentStaffs = \App\Adjustment_staff::where('department', $department)->pluck('id');
            $data = $data->whereIn('training_participant.staff_id', $departmentStaffs);
        }
        $data = $data->where('training_participant.request_status', 1)
                ->where('training_participant.participant_status', 1)
                ->count();
        return $data;
    }
    public static function getParticipatedStaffDepartment($training_id)
    {
    	$data = TrainingParticipant::where('training_id', $training_id)->leftjoin('adjustment_staff', function($join){
    		$join->on('training_participant.staff_id', '=', 'adjustment_staff.id');
    	})->leftjoin('department', function($join){
    		$join->on('adjustment_staff.department','=', 'department.id');
    	})->where('training_participant.request_status', 1)
            ->groupBy('department.title')
            ->select('department.title')
            ->get();
    	return $data;
    }

    public static function getPresentStaffCountByDept($deptId, $year, $month, $program)
    {
    	$data = \App\Department::where('department.branch_id', auth()->guard('staffs')->user()->branch)
    			->where('department.id', $deptId)
		    	->leftjoin('adjustment_staff', function($join){
		    		$join->on('department.id', '=', 'adjustment_staff.department');
		    	})->leftjoin('training_participant', function($join){
		    		$join->on('adjustment_staff.id', '=', 'training_participant.staff_id');
		    	})->leftjoin('training', function($join){
                    $join->on('training_participant.training_id', '=', 'training.id');
                });
                
        if($year){
            $data = $data->whereYear('training.from', '=', $year);
        }
        if($month != 0){
            $data = $data->whereMonth('training.from', '=', $month);
        }
        if($program != 0){
            $data = $data->where('training.program_id', $program);
        }
        $data = $data->where('training_participant.request_status', 1)
                ->where('training_participant.participant_status', 0)
		    	->select('training_participant.id')
		    	->count();

		return $data;
    }
    public static function getAbsentStaffCountByDept($deptId, $year, $month, $program)
    {
    	$data = \App\Department::where('department.branch_id', auth()->guard('staffs')->user()->branch)
    			->where('department.id', $deptId)
		    	->leftjoin('adjustment_staff', function($join){
		    		$join->on('department.id', '=', 'adjustment_staff.department');
		    	})->leftjoin('training_participant', function($join){
		    		$join->on('adjustment_staff.id', '=', 'training_participant.staff_id');
		    	})->leftjoin('training', function($join){
                    $join->on('training_participant.training_id', '=', 'training.id');
                });

        if($year){
            $data = $data->whereYear('training.from', '=', $year);
        }
        if($month != 0){
            $data = $data->whereMonth('training.from', '=', $month);
        }
        if($program != 0){
            $data = $data->where('training.program_id', $program);
        }

        $data = $data->where('training_participant.request_status', 1)
                ->where('training_participant.participant_status', 1)
		    	->select('training_participant.id')
		    	->count();
		    	
		return $data;
    }

    public static function getTrainingParticipantRequest($trainingId)
    {
        $data = TrainingParticipant::where('training_id', $trainingId)->where('request_status', 0)->get();
        return $data;
    }

    public static function checkStaffApply($trainingId)
    {
        $data = TrainingParticipant::where('training_id', $trainingId)->where('staff_id', auth()->guard('staffs')->user()->id)->first();
        return $data;
    }
    public static function getTotalInvitationOfStaff($staffId)
    {
        $data = TrainingParticipant::where('staff_id', $staffId)->where('request_status', 1)->count();
        return $data;
    }
    public static function getTotalAbsentOfStaff($staffId)
    {
        $data = TrainingParticipant::where('staff_id', $staffId)->where('request_status', 1)->where('participant_status', 1)->count();
        return $data;
    }
    public static function getDepartmentsOfParticipant($trainingId)
    {
        $data = TrainingParticipant::leftjoin('adjustment_staff', function($join){
            $join->on('training_participant.staff_id', '=', 'adjustment_staff.id');
        })->leftjoin('department', function($join){
            $join->on('adjustment_staff.department','=','department.id');
        })
        ->where('training_participant.training_id', $trainingId)
        ->where('training_participant.request_status', 1)
        ->groupBy('department.id')
        ->select('department.id', 'department.title')
        ->get();
        return $data;
    }
    public static function getTotalStaffPresentByDept($trainingId, $departmentId)
    {
        $staffs = \App\Adjustment_staff::where('department', $departmentId)->pluck('id');
        $data = TrainingParticipant::where('training_id', $trainingId)->whereIn('staff_id', $staffs)->where('request_status', 1)->where('participant_status', 0)->count();
        return $data;
    }
    public static function getTotalStaffAbsentByDept($trainingId, $departmentId)
    {
        $staffs = \App\Adjustment_staff::where('department', $departmentId)->pluck('id');
        $data = TrainingParticipant::where('training_id', $trainingId)->whereIn('staff_id', $staffs)->where('request_status', 1)->where('participant_status', 1)->count();
        return $data;
    }

}
