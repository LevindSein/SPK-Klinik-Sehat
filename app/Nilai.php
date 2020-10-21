<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $fillable = [
        'id', 'id_alternatif', 'khasiat', 'efek', 'garansi', 'merk', 'harga', 'updated_at', 'created_at'
    ];

    public static function join()
    {
        $data = DB::table('alternatif')->select('id')->get();
        foreach($data as $d){
            $check = DB::table('nilai')->where('id_alternatif',$d->id)->first();
            if($check == NULL){
                $data = new Nilai([
                    'id_alternatif'=>$d->id
                ]);
                $data->save();;
            }
        }
        return DB::table('nilai')
        ->leftJoin('alternatif','nilai.id_alternatif','=','alternatif.id')
        ->select(
            'nilai.id_alternatif as id',
            'alternatif.nama',
            'alternatif.satuan',
            'alternatif.supplier',
            'nilai.khasiat',
            'nilai.efek',
            'nilai.garansi',
            'nilai.merk',
            'nilai.harga'
            )
        ->get();
    }

    public static function kategori($id)
    {
        return DB::table('nilai')
        ->leftJoin('alternatif','nilai.id_alternatif','=','alternatif.id')
        ->where('alternatif.kategori',$id)
        ->select(
            'alternatif.id',
            'alternatif.nama',
            'alternatif.satuan',
            'alternatif.supplier',
            'nilai.khasiat',
            'nilai.efek',
            'nilai.garansi',
            'nilai.merk',
            'nilai.harga'
            )
        ->get();
    }
}
