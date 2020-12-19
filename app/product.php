<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable=[
    	'name','status', 'description', 'store_id'
    ];
}
