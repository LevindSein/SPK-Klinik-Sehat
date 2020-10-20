<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriteria';
    protected $fillable = [
        'id', 'kode', 'nama', 'bobot', 'updated_at', 'created_at'
    ];
}
