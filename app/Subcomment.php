<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcomment extends Model
{
    protected $fillable = [
        'komentar','comments_id','user_id','icon'
    ];
}
