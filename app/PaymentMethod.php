<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    //
    protected $table = 'paymentmethods';

    protected $fillable = ['name','display_name','description'];

    protected $hidden = ['created_at', 'updated_at'];
}
