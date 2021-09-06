<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenerimaanBahan extends Model
{
    protected $fillable = ['kode','bahan', 'satuan', 'qty','nama','keterangan'];
}
