<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'training';  

    protected $fillable = array('branch_id', 'program_id', 'level', 'from', 'to', 'status', 'trainer_id', 'budget', 'venue', 'total_participant');
 
    protected $primaryKey = 'id';

    public function training_participant()
    {
    	return $this->hasMany('\App\TrainingParticipant', 'training_id')->where('request_status', 1);
    }

    public function getStaffDepartment($training_id)
    {
    	$staffIds = TrainingParticipant::where('training_id', $training_id)->where('request_status', 1)->pluck('staff_id');
    	return $staffIds;
    }
    public static function getStatus($training_id)
    {
        $training = Training::find($training_id);
        return $training->status;
    }
    public static function checkProgramTraining($id, $year, $month, $program, $department)
    {
        $data = Training::where('branch_id', auth()->guard('staffs')->user()->branch)->where('program_id', $id);
        if($year){
            $data = $data->whereYear('from', '=', $year);
        }
        if($month != 0){
            $data = $data->whereMonth('from', '=', $month);
        }
        if($program != 0){
            $data = $data->where('program_id', $program);
        }
        if($department != 0)
        {
            $departmentStaffs = \App\Adjustment_staff::where('department', $department)->pluck('id');
            $training_ids = \App\TrainingParticipant::whereIn('staff_id', $departmentStaffs)
                                ->where('request_status', 1)
                                ->groupBy('training_id')
                                ->pluck('training_id');
            $data = $data->whereIn('id', $training_ids);
        }
        $data = $data->count();
        if($data)
        {
            return $data;
        }
        return 0;
    }

}
