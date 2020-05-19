<?php
namespace App;

use DB;
use App\Imagetool;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Employee extends Authenticatable
{
    protected $table = 'employees';  

    protected $primaryKey = 'id';
    protected $fillable = [
        'saluation', 'email','citizenship', 'traking_code', 'jobs_id', 'firstname', 'middlename', 'lastname', 'gender', 'dob', 'marital_status', 'nationality', 'tracking_code', 'image', 'resume', 'apply_date', 'coverletter', 'status', 'remember_token', 'permanent_address', 'temporary_address', 'home_phone', 'mobile', 'fax', 'website', 'vehicle', 'license_of', 'validation_token','written_exam', 'group_discussion', 'final_interview', 'final_selection','age', 'total_experience','edu_marks','exp_marks','total_marks', 'district', 'municipality', 'ward'
    ];

     
    public function Jobs()
    {
        return $this->belongsTo('App\Jobs');
    }

     public function EmployeeEducation()
    
    {
        return $this->hasMany('App\EmployeeEducation');
    }


     public function EmployeeExperience()
    {
        return $this->hasMany('App\EmployeeExperience');
    }


     public function EmployeeLanguage()
    {
        return $this->hasMany('App\EmployeeLanguage');
    }

     
     public function EmployeeTraining()
    {
        return $this->hasMany('App\EmployeeTraining');
    }

     public function EmployeeReference()
    {
        return $this->hasMany('App\EmployeeReference');
    }
    public function WrittenExam()
    {
        return $this->hasMany('App\WrittenExam');
    }
    public function GroupDiscussion()
    {
        return $this->hasMany('App\GroupDiscussion');
    }
    public function FinalInterview()
    {
        return $this->hasMany('App\FinalInterview');
    }
    public function SelectedCandidates()
    {
        return $this->hasMany('App\SelectedCandidates');
    }


    public static function getStatus($id)
    {
        if ($id == 3) {
            $title = 'Pendig';
        }elseif ($id == 1) {
            $title = 'Active';
        }else {
            $title = 'Disabled';
        }
        return $title;
    }

    public static function getFullname($firstname, $middlename, $lastname)
    {
        if ($middlename == '') {
            $fullname = ucfirst($firstname).' '.ucfirst($lastname);
        }else{
            $fullname = ucfirst($firstname).' '.ucfirst($middlename).' '.$lastname;
        }
        return $fullname;
    }
    public static function getFullnames($sa,$firstname, $middlename, $lastname)
    {   
        if ($middlename == '') {
            $fullname = $sa.' '.ucfirst($firstname).' '.ucfirst($lastname);
        }else{
            $fullname =  $sa.' '.ucfirst($firstname).' '.ucfirst($middlename).' '.$lastname;
        }
        return $fullname;
    }

    public static function getPhoto($id)
    {
        $image='catalog/back.png';
        
        $user = DB::table('employees')->where('id', $id)->first();
        if (isset($user->image)) {
            if (!empty($user->image)) {
                $image_file= 'image/'.$user->image; 
            } else {
                $image_file=Imagetool::mycrop($image, 180, 200); 
            }
        } else {
            $image_file=Imagetool::mycrop($image, 180, 200); 
        }
        return $image_file;
    }
    
    public static function countAllApplicant($id)
    {
        $applicant = DB::table('employees')->where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->count();
        return $applicant;
        
    }
    
    public static function countWrittenExam($id)
    {
        $applicant = DB::table('employees')->where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('written_exam', 1)->count();
        return $applicant;
        
    }
    
    public static function countDocumentVerification($id)
    {
        $applicant = DB::table('employees')->where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('document_verification', 1)->count();
        return $applicant;
        
    }
    
    public static function countGroup($id)
    {
        $applicant = DB::table('employees')->where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('group_discussion', 1)->count();
        return $applicant;
        
    }
    
    public static function countInterview($id)
    {
        $applicant = DB::table('employees')->where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('final_interview', 1)->count();
        return $applicant;
        
    }
    
    public static function countSelected($id)
    {
        $applicant = DB::table('employees')->where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('final_selection', 1)->count();
        return $applicant;
        
    }
}