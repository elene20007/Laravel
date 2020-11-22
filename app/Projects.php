<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    public function UsersProjects(){
        return $this->belongsToMany('App\User' , 'users_projects' , 'user_id', 'project_id');
    }
}
