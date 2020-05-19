<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelHotelBooking extends Model
{
    protected $table = 'travel_hotel_booking';
    protected $fillable = array('planner_id', 'departure_at', 'arrival_at', 'name', 'place_name', 'district', 'number', 'remark');
    protected $primaryKey = 'id';

    public static function countApprovalWaiting()
    {
    	$count = 0;
    	if(\App\BranchSetting::isAccountHandler())
    	{
    		$count = TravelHotelBooking::where('status', 0)->count();
    	}
    	return $count;
    }
}
