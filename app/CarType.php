<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    //
	protected $table = 'cartypes';

    protected $fillable = ['name', 'display_name', 'description','capacity'];

    protected $hidden = ['created_at', 'updated_at'];

    public function seatLayout()
    {
    	return $this->hasMany('App\SeatLayout','carType_id');
    }
}
