<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    //
    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at'];
}
