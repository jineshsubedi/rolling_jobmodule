<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelDestination extends Model
{
    protected $table = 'travel_destination';  

    protected $fillable = array('travel_id', 'from', 'to', 'departure_date', 'arrival_date');

    protected $primaryKey = 'id';

    public static function getStartDateOfTravel($id)
    {
    	$data = TravelDestination::where('travel_id', $id)->orderBy('id', 'asc')->first();
    	return $data->departure_date;
    }
    public static function getEndDateOfTravel($id)
    {
    	$data = TravelDestination::where('travel_id', $id)->orderBy('id', 'desc')->first();
    	return $data->arrival_date;
    }
    public static function getPlaces($id)
    {
    	$data = TravelDestination::where('travel_id', $id)->orderBy('id','asc')->groupBy('to')->select('to')->get();
    	return $data;
    }
    public static function getDestination($id)
    {
        return \App\TravelDestination::find($id);
    }
}
