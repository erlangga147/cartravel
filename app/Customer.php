<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = ['name','phone','email'];

    protected $hidden = ['id','phone','name','created_at', 'updated_at'];
}
