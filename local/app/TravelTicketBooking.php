<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelTicketBooking extends Model
{
    protected $table = 'travel_ticket_booking';
    protected $fillable = array('planner_id', 'type', 'vehicle_number', 'driver_name', 'driver_number', 'vendor_name', 'bus_number', 'airline_name', 'flight_number', 'departure_on', 'arrival_on', 'remark');
    protected $primaryKey = 'id';

    public static function countApprovalWaiting()
    {
    	$count = 0;
    	if(\App\BranchSetting::isAccountHandler())
    	{
    		$count = TravelTicketBooking::where('status', 0)->count();
    	}
    	return $count;
    }
}
