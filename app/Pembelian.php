<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $fillable = ['kode','supplier', 'po',' bahan','qty','satuan', 'harga','dpp','ppn','total'];
}
