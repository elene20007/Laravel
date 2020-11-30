<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = [ 'title', 'price', 'description', 'category_id', 'image' ];
}
