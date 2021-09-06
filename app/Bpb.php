<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bpb extends Model
{
    protected $fillable = ['kode','bahan', 'sisa', 'qty', 'satuan', 'keterangan'];
}
