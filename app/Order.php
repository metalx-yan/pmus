<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['kode','supplier', 'po','bahan','qty','satuan', 'harga','dpp','ppn','total'];
}
