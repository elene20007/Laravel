<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersProjects extends Model
{
    public function UsersProjects(){
        return $this->belongsToMany('App\User' , 'users_projects' , 'user_id', 'project_id');
    }
}
