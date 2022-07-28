<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','book_id','email','ban','img','password',
    ];

    public function user()
    {
        return $this->belongsTo("App\Models\User");
    }

    public function Book()
    {
        return $this->belongsTo("App\Models\Book");
    }
}
