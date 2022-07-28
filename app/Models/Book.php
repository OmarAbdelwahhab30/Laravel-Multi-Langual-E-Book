<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    public function Category()
    {
        return $this->belongsTo("App\Models\Category");
    }

    public function User()
    {
        return $this->belongsTo("App\Models\User");
    }

    public function Comment()
    {
        return $this->hasMany("App\Models\Comment");
    }
}
