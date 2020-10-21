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

    public static function electre($id){
        $dataset = DB::table('nilai')
        ->leftJoin('alternatif','nilai.id_alternatif','=','alternatif.id')
        ->where('alternatif.kategori',$id)
        ->select(
            'alternatif.nama',
            'nilai.khasiat',
            'nilai.efek',
            'nilai.garansi',
            'nilai.merk',
            'nilai.harga'
            )
        ->get();

        $nilaiAwal = $dataset;

        $data = array();
        for($i=0; $i<count($dataset); $i++){
            $data[$i][0] = $dataset[$i]->khasiat;
            $data[$i][1] = $dataset[$i]->efek;
            $data[$i][2] = $dataset[$i]->garansi;
            $data[$i][3] = $dataset[$i]->merk;
            $data[$i][4] = $dataset[$i]->harga;
        }

        //Total
        $total = array(0,0,0,0,0);
        for($i=0; $i<count($dataset); $i++){
            $total[0] = $total[0] + ($data[$i][0] * $data[$i][0]);
            $total[1] = $total[1] + ($data[$i][1] * $data[$i][1]);
            $total[2] = $total[2] + ($data[$i][2] * $data[$i][2]);
            $total[3] = $total[3] + ($data[$i][3] * $data[$i][3]);
            $total[4] = $total[4] + ($data[$i][4] * $data[$i][4]);
        }
        $total[0] = sqrt($total[0]);
        $total[1] = sqrt($total[1]);
        $total[2] = sqrt($total[2]);
        $total[3] = sqrt($total[3]);
        $total[4] = sqrt($total[4]);

        //Normalisasi
        $data = array();
        for($i=0; $i<count($dataset); $i++){
            $data[$i][0] = $dataset[$i]->khasiat / $total[0];
            $data[$i][1] = $dataset[$i]->efek / $total[1];
            $data[$i][2] = $dataset[$i]->garansi / $total[2];
            $data[$i][3] = $dataset[$i]->merk / $total[3];
            $data[$i][4] = $dataset[$i]->harga / $total[4];
            $data[$i][5] = $dataset[$i]->nama;
        }

        $normalisasi = $data;

        //Bobot
        $kriteria = DB::table('kriteria')->select('bobot')->get();
        $bobotKriteria = array($kriteria[0]->bobot,$kriteria[1]->bobot,$kriteria[2]->bobot,$kriteria[3]->bobot,$kriteria[4]->bobot);
        $bobot = array();
        for($i=0; $i<count($normalisasi); $i++){
            $bobot[$i][0] = $data[$i][0] * $bobotKriteria[0];
            $bobot[$i][1] = $data[$i][1]* $bobotKriteria[1];
            $bobot[$i][2] = $data[$i][2] * $bobotKriteria[2];
            $bobot[$i][3] = $data[$i][3] * $bobotKriteria[3];
            $bobot[$i][4] = $data[$i][4] * $bobotKriteria[4];
            $bobot[$i][5] = $data[$i][5];
        }
        return array($nilaiAwal,$normalisasi,$bobot);
    }
}
