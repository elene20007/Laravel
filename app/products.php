<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = [
    	"title", "description", "image", "subcategory_id"
    ];
}
