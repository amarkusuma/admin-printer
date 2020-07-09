<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'image', 'type', 'brand',  'price', 'priceperWeek', 'priceperMonth', 'spesifikasi', 'stock',

    ];
}
