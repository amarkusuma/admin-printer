<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Printers extends Model
{
    protected $table = 'printers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'image', 'brand', 'stock', 'price'

    ];
}
