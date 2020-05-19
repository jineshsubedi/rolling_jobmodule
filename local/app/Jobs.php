<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Jobs extends Model
{
    protected $table = 'jobs';  

    protected $fillable = array('title', 'branch_id', 'location_title', 'job_level', 'job_availability', 'deadline', 'job_location', 'min_experience', 'education_level', 'faculty', 'position', 'vacancy_code', 'external_link', 'gender', 'salary_unit', 'negotiable', 'minimum_salary', 'min_age', 'max_age', 'status', 'seo_url', 'setting', 'apply_type', 'emails', 'formfields', 'education_levels', 'emanual', 'process_status', 'publish_date', 'assignment_handeler', 'job_file', 'advertise_link', 'image', 'line_manager','edu_marks','exp_marks', 'sort_order');

    public function Branch()
    {
    	return $this->belongsTo('App\Branch', 'branch_id');
    }
     public function JobsLocation()
    {
    	return $this->hasMany('App\JobsLocation');
    }
    public function JobsRequirements()
    {
        return $this->hasOne('App\JobRequirements');
    }
    public function JobLocation()
    {
        return $this->belongsTo('App\JobLocation');
    }
    public function JobForm()
    {
        return $this->hasMany('App\JobForm');
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
    public function ExamSyllabus()
    {
        return $this->hasMany('App\ExamSyllabus');
    }
    
    public function JobEducations()
    {
        return $this->hasMany('App\JobEducation');
    }
    
    public function JobExperiences()
    {
        return $this->hasMany('App\JobExperience');
    }


    

    

    public static function getTitle($id)
    {
        $job = DB::table('jobs')->where('id', $id)->first();
        if (isset($job->title)) {
            $title = $job->title;
        } else {
            $title = '';
        }
        return $title;
    }

    public static function countApplication($id)
    {
        $data =   DB::table('employees')->where('jobs_id', $id)->where('status', 1)->where('trash', 0)->count();
        if($data)
        {
            return $data;
        }
        return 0;
    }

}
