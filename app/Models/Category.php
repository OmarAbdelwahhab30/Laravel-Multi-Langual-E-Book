<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function Book()
    {
        return $this->hasMany("App\Models\Book");
    }
}
