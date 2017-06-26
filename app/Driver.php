<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    //
    protected $fillable = ['name','phone','address'];

    protected $hidden = ['created_at', 'updated_at'];
}
