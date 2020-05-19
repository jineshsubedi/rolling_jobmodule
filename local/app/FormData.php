<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class FormData extends Model
{
    protected $table = 'form_data';  

    protected $fillable = array('jobs_id', 'employees_id', 'f_title', 'f_description', 'type','marks','extra_lable','extra_answer', 'sn');
    
    public function Employee()
    {
    	return $this->belongsTo('App\Employees');
    }

    public function Job()
    {
    	return $this->belongsTo('App\Jobs');
    }
    
    public static function getValue($job_id,$employe_id,$f_title)
    {
        $data = DB::table('form_data')->where('jobs_id',$job_id)->where('employees_id', $employe_id)->where('f_title', $f_title)->first();
        if (isset($data->id)) {
           $value = $data->f_description;
        } else{
            $value = '';
        }
        return $value;
    }

    public static function getMark($job_id,$employe_id,$f_title)
    {
        $data = DB::table('form_data')->where('jobs_id',$job_id)->where('employees_id', $employe_id)->where('f_title', $f_title)->first();
        if (isset($data->id)) {
            if ($data->marks != '') {
                $value = $data->marks;
            } else{
                $value = 0;
            }
           
        } else{
            $value = 0;
        }
        return $value;
    }
    
    
    public static function getSource($id)
    {
       $today = date('Y-m-d');
        $datas = DB::table('form_data')->where('jobs_id',$id)->where('f_title', 'Source of Vacancy Information')->where('created_at', 'LIKE', $today.'%')->groupBy('f_description')->get();
        $out = [];
        if (count($datas) > 0) {
            foreach ($datas as $value) {
                $out[] = [
                    'title' => $value->f_description,
                    'total' => DB::table('form_data')->where('jobs_id',$id)->where('f_description', $value->f_description)->where('created_at', 'LIKE', $today.'%')->count()
                ];
            }
        }
        return $out;
    }
}
