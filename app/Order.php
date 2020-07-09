<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name_costumer','email', 'no', 'address', 'jam', 'tgl_pesan', 'tgl_kembali','type', 'status', 'verified',

    ];
}
