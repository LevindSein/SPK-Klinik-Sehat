<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $fillable = [
        'id', 'tanggal', 'bulan', 'kode', 'nama', 'merk', 'kategori', 'dokter', 'supplier', 'updated_at', 'created_at'
    ];

    public static function sort(){
        return DB::table('laporan')
        ->select('bulan')
        ->groupBy('bulan')
        ->get();
    }

    public static function print($bln){
        return DB::table('laporan')
        ->where('bulan',$bln)
        ->orderBy('supplier','asc')
        ->get();
    }
}
