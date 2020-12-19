<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    protected $fillable=[
    	'store_name','store_location'
    ];
}
