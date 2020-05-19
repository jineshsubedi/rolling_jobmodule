<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use GMaps;
use Carbon\Carbon;

class Attendance extends Model
{
     protected $table = 'attendance';  

   
    protected $fillable = array('adjustment_staff_id','branch_id', 'attendance_date', 'in_time', 'in_time_reason', 'lunch_start', 'lunch_end', 'out_time', 'out_time_reason', 'in_location', 'out_location', 'lunch_start_location', 'lunch_end_location','np_year', 'np_month', 'np_date','approve', 'manual', 'in_away_location', 'out_away_location', 'remarks');

    

    public function adjustment_staff()
    {
        return $this->belongsTo('App\Adjustment_staff','adjustment_staff_id');
    }


    public static function getTodayIntime($id='')
    {
    	$data = DB::table('attendance')->select('in_time')->where('adjustment_staff_id', $id)->where('attendance_date', date('Y-m-d'))->first();
    	if (isset($data->in_time)) {
    		return $data->in_time;
    	}else{
    		return '';
    	}
    }

    public static function getTodayLunchStart($id='')
    {
    	$data = DB::table('attendance')->select('lunch_start')->where('adjustment_staff_id', $id)->where('attendance_date', date('Y-m-d'))->first();
    	if (isset($data->lunch_start)) {
    		return $data->lunch_start;
    	}else{
    		return '';
    	}
    }

    public static function getTodayLunchend($id='')
    {
    	$data = DB::table('attendance')->select('lunch_end')->where('adjustment_staff_id', $id)->where('attendance_date', date('Y-m-d'))->first();
    	if (isset($data->lunch_end)) {
    		return $data->lunch_end;
    	}else{
    		return '';
    	}
    }

    public static function getTodayOuttime($id='')
    {
    	$data = DB::table('attendance')->select('out_time')->where('adjustment_staff_id', $id)->where('attendance_date', date('Y-m-d'))->first();
    	if (isset($data->out_time)) {
    		return $data->out_time;
    	}else{
    		return '';
    	}
    }

    public static function getTodayInLocation($id='')
    {
    	$data = DB::table('attendance')->select('in_location')->where('adjustment_staff_id', $id)->where('attendance_date', date('Y-m-d'))->first();
    	if (isset($data->in_location)) {
    		return $data->in_location;
    	}else{
    		return '';
    	}
    }

    public static function getTodayLunchStartLocation($id='')
    {
    	$data = DB::table('attendance')->select('lunch_start_location')->where('adjustment_staff_id', $id)->where('attendance_date', date('Y-m-d'))->first();
    	if (isset($data->lunch_start_location)) {
    		return $data->lunch_start_location;
    	}else{
    		return '';
    	}
    }

    public static function getTodayLunchEndLocation($id='')
    {
    	$data = DB::table('attendance')->select('lunch_end_location')->where('adjustment_staff_id', $id)->where('attendance_date', date('Y-m-d'))->first();
    	if (isset($data->lunch_end_location)) {
    		return $data->lunch_end_location;
    	}else{
    		return '';
    	}
    }

    public static function getTodayOutLocation($id='')
    {
    	$data = DB::table('attendance')->select('out_location')->where('adjustment_staff_id', $id)->where('attendance_date', date('Y-m-d'))->first();
    	if (isset($data->out_location)) {
    		return $data->out_location;
    	}else{
    		return '';
    	}
    }

    public static function getMap($location,$title='',$map_id,$height)
    {
    	if ($location != '') {
    		
            
                $config['center'] = $location;
                $config['zoom'] = '15';
                $config['map_height'] = $height.'px';
                $config['map_div_id'] = $map_id;
                $config['trafficOverlay'] = TRUE;
                $config['panoramio'] = TRUE;
                $config['disableDefaultUI'] = TRUE;
                $config['panoramioTag'] = 'sunset';
                GMaps::initialize($config);
                    $marker = array();
                    $marker['position'] = $location;
                    $marker['infowindow_content'] = $title;                   
                    $marker['animation'] = 'DROP';
                    GMaps::add_marker($marker);
                 $datas['map'] = GMaps::create_map();
             
         	return view('google_map')->with('datas', $datas);
    	} else{
    		return '';
    	}
    }

   public static function getDistance($lat1 = '', $lon1 = '', $lat2 = '', $lon2 = '', $unit = '') {
            
        if($lat1 != '' && $lon1 != '' && $lat2 != '' && $lon2 != '' && $unit != ''){
            if(is_numeric($lat1) && is_numeric($lat2) && is_numeric($lon1) && is_numeric($lon2)){
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);

          if ($unit == "K") {
              return ($miles * 1.609344);
          } else if ($unit == "N") {
              return ($miles * 0.8684);
          } else {
              return $miles;
          }
      } else{
        return '';
      }
        }
    else{
        return '';
    }
   }



   public static function getDuration($attendance_date, $in_time, $out_time, $lunch_start, $lunch_end)
   {
        $from1 =  Carbon::parse($attendance_date.' '.$in_time);
        $to1 =    Carbon::parse($attendance_date.' '.$lunch_start);

        $from2 =  Carbon::parse($attendance_date.' '.$lunch_end);
        $to2 =    Carbon::parse($attendance_date.' '.$out_time);

        $minutes1 = 0;
        $minutes2 = 0;
        $total_minute = 0;
        $human_time = '';
        if($out_time != ''){
            if ($lunch_start != '') {
                $minutes1 = $to1->diffInMinutes($from1);
            }
            if ($lunch_end != '' && $out_time != '') {
                $minutes2 = $to2->diffInMinutes($from2);
            }

            $total_minute = $minutes1 + $minutes2;

            if ($lunch_start == '' && $out_time != '') {
                $total_minute = $to2->diffInMinutes($from1);
            }
            
            if ($total_minute != 0) {
                if ($total_minute > 60) {
                    $hour = floor($total_minute / 60);
                    $minute = $total_minute - ($hour * 60);
                    $human_time = $hour.' Hour '.$minute.' Minutes';
                } else{
                    $human_time = $total_minute. 'Minutes';
                }
            }
        }
        return $human_time;
   }



    
}
