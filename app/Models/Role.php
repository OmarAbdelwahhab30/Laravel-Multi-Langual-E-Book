<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public function User()
    {
        return $this->belongsToMany("App\Models\User","roles_users",'user_id','role_id');
    }
}
