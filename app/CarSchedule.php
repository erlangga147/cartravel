<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarSchedule extends Model
{
    //
	protected $table = 'carschedules';

    protected $fillable = ['car_id','driver_id','fare_id','status','message'];

    protected $hidden = ['created_at', 'updated_at'];

    public function tickets()
    {
    	return $this->hasMany('App\Ticket','carSchedule_id');
    }

    public function car()
    {
    	return $this->belongsTo('App\Car');
    }

}
