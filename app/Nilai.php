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
            'nilai.id_alternatif as alt',
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

        
        //Concordance Discordance Index
        $concordanceIndex = array();
        $discordanceIndex = array();
        for($i=0; $i<count($bobot); $i++){
            for($j=0; $j<count($bobot); $j++){
                if($i == $j){
                    $concordanceIndex[$i][$j] = NULL;
                    $discordanceIndex[$i][$j] = NULL;                                                                                                                                                                                            
                }
                else{
                    $himpunanC = array();
                    $himpunanD = array();
                    for($k=0; $k<5; $k++){
                        if($bobot[$i][$k] >= $bobot[$j][$k]){
                            $himpunanC[$k] = $k;
                        }
                        else if($bobot[$i][$k] < $bobot[$j][$k]){
                            $himpunanD[$k] = $k;
                        }
                    }
                    $concordanceIndex[$i][$j] = $himpunanC;
                    $discordanceIndex[$i][$j] = $himpunanD;
                }
            }
        }
        //Jadikan String
        for($i=0; $i<count($bobot); $i++){
            for($j=0; $j<count($bobot); $j++){
                if($i != $j){
                    $concordanceIndex[$i][$j] = implode(",",$concordanceIndex[$i][$j]);
                    $discordanceIndex[$i][$j] = implode(",",$discordanceIndex[$i][$j]);
                    
                    if($concordanceIndex[$i][$j] == NULL){
                        $concordanceIndex[$i][$j] = " ";
                    }
                    if($discordanceIndex[$i][$j] == NULL){
                        $discordanceIndex[$i][$j] = " ";
                    }
                }
            }
        }

        //Matriks Concordance dan Discordance dari Himpunan Index
        $w = DB::table('kriteria')->select('bobot')->get();
        $kriteria[0] = $w[0]->bobot;
        $kriteria[1] = $w[1]->bobot;
        $kriteria[2] = $w[2]->bobot;
        $kriteria[3] = $w[3]->bobot;
        $kriteria[4] = $w[4]->bobot;


        $cMatriks = array();
        $dMatriks = array();
        for($i=0; $i<count($bobot); $i++){
            for($j=0; $j<count($bobot); $j++){
                if($i != $j){
                    if($concordanceIndex[$i][$j] != " "){
                        $explode = explode(",",$concordanceIndex[$i][$j]);
                        $totalC = 0;
                        for($k=0; $k<count($explode); $k++){
                            $bobotKriteria = $kriteria[$explode[$k]];
                            $totalC = $totalC + $bobotKriteria;
                        }
                        $cMatriks[$i][$j] = $totalC;
                    }
                    else{
                        $cMatriks[$i][$j] = 0;
                    }

                    if($discordanceIndex[$i][$j] != " "){
                        $explode = explode(",",$discordanceIndex[$i][$j]);
                        $totalD = 0;
                        $y = 0;
                        $pembilang = array();
                        for($k=0; $k<count($explode); $k++){
                            $pembilang[$y] = abs($bobot[$i][$explode[$k]] - $bobot[$j][$explode[$k]]);
                            $y++;
                        }
                        $y = 0;
                        $penyebut = array();
                        for($k=0; $k<5; $k++){
                            $penyebut[$y] = abs($bobot[$i][$k] - $bobot[$j][$k]);
                            $y++;
                        }
                        $atas = max($pembilang);
                        $bawah = max($penyebut);
                        $dMatriks[$i][$j] = $atas / $bawah;
                    }
                    else{
                        $dMatriks[$i][$j] = 0;
                    }
                }
            }
        }

        //Dominan Concordance dari Martriks Concordance
        $penyebut = (count($cMatriks) * count($cMatriks)) - count($cMatriks);
        $pembilang = 0;
        for($i=0; $i<count($cMatriks); $i++){
            for($j=0; $j<count($cMatriks); $j++){
                if($i != $j){
                    $pembilang = $pembilang + $cMatriks[$i][$j];
                }
            }
        }
        $meanConcordance = $pembilang / $penyebut;
        $cThreshold = array();
        for($i=0; $i<count($cMatriks); $i++){
            for($j=0; $j<count($cMatriks); $j++){
                if($i != $j){
                    if($cMatriks[$i][$j] >= $meanConcordance){
                        $cThreshold[$i][$j] = 1; 
                    }
                    else{
                        $cThreshold[$i][$j] = 0;
                    }
                }
            }
        }

        //Dominan Discordance dari Martriks Discordance
        $penyebut = (count($dMatriks) * count($dMatriks)) - count($dMatriks);
        $pembilang = 0;
        for($i=0; $i<count($dMatriks); $i++){
            for($j=0; $j<count($dMatriks); $j++){
                if($i != $j){
                    $pembilang = $pembilang + $dMatriks[$i][$j];
                }
            }
        }
        $meanDiscordance = $pembilang / $penyebut;
        $dThreshold = array();
        for($i=0; $i<count($dMatriks); $i++){
            for($j=0; $j<count($dMatriks); $j++){
                if($i != $j){
                    if($dMatriks[$i][$j] >= $meanDiscordance){
                        $dThreshold[$i][$j] = 1; 
                    }
                    else{
                        $dThreshold[$i][$j] = 0;
                    }
                }
            }
        }

        //Kesimpulan Dominasi
        $dominasi = array();
        for($i=0; $i<count($dataset); $i++){
            for($j=0; $j<count($dataset); $j++){
                if($i != $j){ 
                    $dominasi[$i][$j] = $cThreshold[$i][$j] * $dThreshold[$i][$j];
                }
            }
        }

        //Agregat
        $agregat = array();
        $id = array();
        for($i=0; $i<count($dataset); $i++){
            $total = 0;
            for($j=0; $j<count($dataset); $j++){
                if($i != $j){ 
                    $total = $total + ($cThreshold[$i][$j] * $dThreshold[$i][$j]);
                }
            }
            $agregat[$i] = $total;
            $id[$i] = $dataset[$i]->alt;
        }

        return array($nilaiAwal,$normalisasi,$bobot,$concordanceIndex,$discordanceIndex,$cMatriks,$cThreshold,$dMatriks,$dThreshold,$agregat,$id,$dominasi);
    }
}
