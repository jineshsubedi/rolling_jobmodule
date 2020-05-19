<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class OnBoardStaff extends Model
{
    protected $table = 'on_board_staff';
    protected $fillable = array('branch_id', 'supervisor_id','name', 'email', 'staffType', 'nature_of_job', 'nature_of_employment', 'department_id', 'designation_id', 'salary', 'trail_period', 'no_of_days', 'trail_start_date', 'joining_date', 'offer_letter', 'letter_accept_date', 'cv', 'supervisor_approval', 'supervisor_comment', 'supervisor_approval_date', 'hr_approval', 'hr_comment', 'hr_approval_date');

    public function branch(){
        return $this->belongsTo('App\Branch');
    }
    public function Supervisor(){
        return $this->belongsTo('App\Adjustment_staff','supervisor_id');
    }
    public function getAll(){
        return OnBoardStaff::orderBy('created_at','DESC')->paginate(10);
    }
    public function getDataBySupervisorId($id){
        return OnBoardStaff::where('supervisor_id',$id)->orderBy('created_at','DESC')->paginate(10);
    }
   
    public function findData($id){
        return OnBoardStaff::where('id', $id)->first();
    }
    public function updateOnBoardStaff($request){
        $data = $this->findData($request->id);
        if($request->role=='supervisor'){
            switch($request->action){
                case 'accept':
                    $data->supervisor_approval = 'accepted';
                    $data->supervisor_comment = $request->comment;
                    $data->supervisor_approval_date = $request->date;
                break;
                case 'reject':
                    $data->supervisor_approval = 'rejected';
                    $data->hr_approval = 'rejected';
                    $data->supervisor_comment = $request->comment;
                    $data->supervisor_approval_date = $request->date;
                break;
            }
        }else{
            switch($request->action){
                case 'accept':
                    $data->hr_approval = 'accepted';
                    $data->hr_comment = $request->comment;
                    $data->hr_approval_date = $request->date;
                break;
                case 'reject':
                    $data->hr_approval = 'rejected';
                    $data->hr_comment = $request->comment;
                    $data->hr_approval_date = $request->date;
                break;
            }
        }
        $data->save();
        return $data;
    }
}
