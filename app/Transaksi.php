<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['kode','supplier','tgl_invoice','no_invoice','tgl_terima_invoice','pajak','dpp','ppn','total','keterangan'];
}
