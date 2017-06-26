<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fare extends Model
{
    //
    protected $fillable = ['carType_id','route_id','departure_time','price'];

    protected $hidden = ['id','carType_id','route_id','created_at', 'updated_at'];

    public function route()
    {
    	return $this->belongsTo('App\Route');
    }

    public function cartype()
    {
    	return $this->belongsTo('App\CarType','carType_id');
    }

    public function carSchedules()
    {
        return $this->hasMany('App\CarSchedule');
    }

    public function tickets()
    {
        return $this->hasManyThrough('App\Ticket','App\CarSchedule','fare_id','carSchedule_id','id');
    }
}
