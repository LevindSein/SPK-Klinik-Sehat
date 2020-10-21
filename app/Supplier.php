<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $fillable = [
        'id', 'nama', 'alamat', 'no_hp', 'updated_at', 'created_at'
    ];
}
