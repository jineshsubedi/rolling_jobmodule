<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\MostStaff;
use App\Adjustment_staff;

class Award extends Model
{
     protected $table = 'award';  
     protected $fillable = array('vote_to','title', 'vote_from', 'year', 'month');
     protected $primaryKey = 'id';

     public static function checkAllVote($title)
     {
     	return DB::table('award')->where('vote_from', auth()->guard('staffs')->user()->id)->where('title', $title)->count();
     }

     public static function checkVote($title)
     {
          $data = '1';
             $months = ['6','12'];
             $nm = date('m');
             if (in_array($nm, $months)) {
          	$data = DB::table('award')->where('vote_from', auth()->guard('staffs')->user()->id)->where('title', $title)->where('year', date('Y'))->where('month', $nm)->count();
               }
          return $data;
     }
     public static function countVoting($id,$title)
     {
     	return DB::table('award')->where('vote_to', $id)->where('title', $title)->where('year', date('Y'))->count();
     }

     public static function getAward()
     {
        
        $data = [];
         $branch = auth()->guard('staffs')->user()->branch;
        $kpi_master = MostStaff::where('branch_id', $branch)->where('staff_type', '!=', 3)->orderBy('kpi_rating','desc')->first();
        $kpi_staff = '0';
        if(isset($kpi_master->kpi_rating)){
        if ($kpi_master->kpi_rating > 0) {
            $data['kpi_master'] = [
                'name' => Adjustment_staff::getName($kpi_master->staff_id),
                'image' => Adjustment_staff::getImage($kpi_master->staff_id),
                'point' => $kpi_master->kpi_rating
            ];
          
        }
        }

        $best_per = MostStaff::where('branch_id', $branch)->where('staff_type', '!=', 3)->orderBy('av_point','desc')->first();
        $best_performer = '0';
        if(isset($best_per->av_point)){
        if ($best_per->av_point > 0) {
             $data['best_performer'] = [
                'name' => Adjustment_staff::getName($best_per->staff_id),
                'image' => Adjustment_staff::getImage($best_per->staff_id),
                'point' => $best_per->av_point
            ];
          
        }
        }

        $wow_master = MostStaff::where('branch_id', $branch)->where('staff_type', '!=', 3)->orderBy('wow_rating','desc')->first();
        $wow_staff = '0';
        if(isset($wow_master->wow_rating)){
        if ($wow_master->wow_rating > 0) {
             $data['wow'] = [
                'name' => Adjustment_staff::getName($wow_master->staff_id),
                'image' => Adjustment_staff::getImage($wow_master->staff_id),
                'point' => $wow_master->wow_rating
            ];
          
        }
        }
        $client_master = MostStaff::where('branch_id', $branch)->where('staff_type', '!=', 3)->orderBy('client_rating','desc')->first();
        $client_staff = '0';
        if(isset($client_master->client_rating)){
        if ($client_master->client_rating > 0) {
          $data['client'] = [
                'name' => Adjustment_staff::getName($client_master->staff_id),
                'image' => Adjustment_staff::getImage($client_master->staff_id),
                'point' => $client_master->client_rating
            ];
        }
        }
        $helping_master = MostStaff::where('branch_id', $branch)->where('staff_type', '!=', 3)->orderBy('help_desk','desc')->first();
        $help_staff = '0';
        if(isset($helping_master->help_desk)){
        if ($helping_master->help_desk > 0) {
          $data['help'] = [
                'name' => Adjustment_staff::getName($helping_master->staff_id),
                'image' => Adjustment_staff::getImage($helping_master->staff_id),
                'point' => $helping_master->help_desk
            ];
        }
        }
        $achievement_master = MostStaff::where('branch_id', $branch)->where('staff_type', '!=', 3)->orderBy('achievement','desc')->first();
        $achievement_staff = '0';
        if(isset($achievement_master->achievement)){
        if ($achievement_master->achievement > 0) {
           $data['achievement'] = [
                'name' => Adjustment_staff::getName($achievement_master->staff_id),
                'image' => Adjustment_staff::getImage($achievement_master->staff_id),
                'point' => $achievement_master->achievement
            ];
        }
        }
        
       
       
        
        
       
        
        
       

        return $data;
     }
}
