<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
   
    protected $fillable = [
        'content'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function comment()
    // {
    //     return $this->hasMany(Comment::class);
    // }
}
