<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['kode', 'supplier', 'alamat', 'telepon', 'email','rekening'];
}
