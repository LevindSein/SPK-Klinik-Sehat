<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Alternatif extends Model
{
    protected $table = 'alternatif';
    protected $fillable = [
        'id', 'kode', 'kategori', 'supplier', 'nama', 'satuan', 'khasiat', 'efek', 'garansi', 'merk', 'harga', 'updated_at', 'created_at'
    ];

    public static function join(){
        return DB::table('alternatif')
        ->leftJoin('kategori','alternatif.kategori','=','kategori.id')
        ->leftJoin('supplier','alternatif.supplier','=','supplier.id')
        ->select('alternatif.id','alternatif.kode','alternatif.nama','kategori.nama as kat_nama','supplier.nama as sup_nama','alternatif.satuan')
        ->get();
    }

    public static function kode($str){
        return strtoupper(substr($str, 0, 2));
    }
}
