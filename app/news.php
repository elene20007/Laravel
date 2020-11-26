<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $fillable=[
    	'title', 'short_description', 'description', 'image', 'time', 'category_id', 'user_id'
    ];

    public function tags(){
    	return $this->hasMany('App\tags', 'news_id');
    }
}
