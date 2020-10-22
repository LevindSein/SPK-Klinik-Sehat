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

    public static function mean($kategori){
        $mean = DB::table('alternatif')->where('kategori',$kategori)->get();
        $count = count($mean);
        $total = 0;
        foreach($mean as $m){
            $total = $total + $m->harga;
        }
        $mean = $total / $count;
        return round($mean);
    }

    public static function laporan($id){
        return DB::table('alternatif')->where('alternatif.id',$id)
        ->leftJoin('supplier','alternatif.supplier','=','supplier.id')
        ->leftJoin('kategori','alternatif.kategori','=','kategori.id')
        ->select(
            'alternatif.kode as kode',
            'alternatif.nama as nama',
            'alternatif.merk as merk',
            'kategori.nama as kategori',
            'supplier.nama as supplier',)
        ->first();
    }
}
