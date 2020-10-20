<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = [
        'id','nama', 'updated_at', 'created_at'
    ];

    public static function name($id){
        $data = DB::table('kategori')->select('nama')->first();
        return $data->nama;
    }
}
