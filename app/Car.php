<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $fillable = ['carType_id','brand','license_plate','year'];

    protected $hidden = ['created_at', 'updated_at'];

    public function carType()
    {
    	return $this->belongsTo('App\CarType','carType_id');
    }
}
