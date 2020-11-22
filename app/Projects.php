<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    public function UsersProjects(){
        return $this->belongsToMany('App\User' , 'users_projects' , 'project_id', 'user_id');
    }
}
