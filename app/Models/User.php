<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','phone','email','ban','img','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * @var bool
     */
    public $Admin ;


    public function Comment()
    {
        return $this->hasMany("App\Models\Comment");
    }

    public function Book()
    {
        return $this->hasMany("App\Models\Book");
    }
    public function Role()
    {
        return $this->belongsToMany("App\Models\Role",'roles_users','user_id','role_id');
    }

    public function ReturnUserRoles()
    {
        $roles = array();
        if (Auth::check()) {
            $user = Auth::user();
            foreach ($user->role as $role) {
                if ($role->name === 'admin') {
                    $this->Admin = true;
                }
                array_push($roles, $role->name);
            }
        }
        return $roles;
    }
}
