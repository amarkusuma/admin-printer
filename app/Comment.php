<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'komentar','postingan_id','user_id','icon'
    ];

    // public function postingan()
    // {
    //     return $this->belongsTo(Postingan::class);
    // }
    
}
