<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $fillable = [
        'id', 'kode', 'nama', 'nama', 'dokter', 'supplier', 'updated_at', 'created_at'
    ];
}
