<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    //
	protected $fillable = ['origin_id','destination_id','duration'];

    public function origin()
    {
    	return $this->belongsTo('App\Pool','origin_id');
    }

    public function destination()
    {
    	return $this->belongsTo('App\Pool','destination_id');
    }

    public function fares()
    {
        return $this->hasMany('App\Fare');
    }

    public function carSchedules()
    {
        return $this->hasManyThrough('App\CarSchedule','App\Fare');
    }
}
