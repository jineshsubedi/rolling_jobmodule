<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class JobReport extends Model
{
    protected $table = 'jobs_report';  

    protected $fillable = array('jobs_id', 'application_detail', 'application_file', 'written_detail', 'written_file', 'group_detail', 'group_file', 'interview_detail', 'interview_file', 'final_detail', 'final_file','afile_name', 'wfile_name', 'gfile_name', 'ifile_name', 'ffile_name');
    protected $primaryKey = 'id';


    public function Job()
    {
    	return $this->belongsTo('App\Jobs');
    }


    public static function getThumb($id,$field)
    {
        $report = DB::table('jobs_report')->select($field)->where('id', $id)->first();
          if (isset($report->$field)) {
            if($report->$field != '') {
              $aext = strtolower(substr(strrchr($report->$field, '.'), 1));
             if ($aext == 'pdf') {
                       $athumb = Imagetool::resize('pdf_icon.png', 100, 100);
                    } elseif ($aext == 'docx') {
                        $athumb = Imagetool::resize('ms-word.png', 100, 100);
                    }elseif ($aext == 'doc') {
                        $athumb = Imagetool::resize('ms-word.png', 100, 100);
                    }elseif ($aext == 'xlsx') {
                        $athumb = Imagetool::resize('ms-excel.png', 100, 100);
                    }elseif ($aext == 'xls') {
                        $athumb = Imagetool::resize('ms-excel.png', 100, 100);
                    }elseif ($aext == 'csv') {
                        $athumb = Imagetool::resize('ms-excel.png', 100, 100);
                    }else{
                      $athumb = '';
                    }
            } else{
              $athumb = '';
            }

            return $athumb;
          
            } else{
                return '';
            }
        }

   
    
}
