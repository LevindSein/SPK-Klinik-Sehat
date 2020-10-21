<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Nilai;
use App\Kategori;
use App\Alternatif;

class NilaiController extends Controller
{
    public function index(Request $request){
        // $this->updNilai();
        $dataset = Nilai::join();
        $kategori = Kategori::all();
        $name = "Pilih Kategori :";
        if($request->get('id') == 1){
            $id = $request->get('kategori');
            $name = Kategori::name($id);
            $dataset = Nilai::kategori($id);
        }
        return view('nilai.index',['dataset'=>$dataset,'kategori'=>$kategori,'name'=>$name]);
    }

    public function update($id){

    }

    public function store(Request $request, $id){

    }

    public function updNilai(){
        $dataset = Alternatif::all();
        $stt_kategori = 0;
        $mean = 0;
        foreach($dataset as $d){
            $khasiat = $d->khasiat;
            $efek = $d->efek;
            $garansi = $d->garansi;
            $merk = $d->merk;
            $harga = $d->harga;
            
            $khasiat = explode(",",$khasiat);
            $khasiat = count($khasiat);
            if($khasiat < 2){
                $khasiat = 3;
            }
            else if($khasiat >= 2 && $khasiat <= 4){
                $khasiat = 4;
            }
            else if($khasiat > 4){
                $khasiat = 5;
            }

            $efek = explode(",",$efek);
            $efek = count($efek);
            if($efek == 1){
                $efek = 5;
            }
            else if($efek >= 1 && $efek < 3){
                $efek = 4;
            }
            else if($efek >= 3 && $efek <= 5){
                $efek = 3;
            }
            else if($efek > 5 && $efek <= 7){
                $efek = 2;
            }
            else if($efek > 7){
                $efek = 1;
            }

            if($garansi < 30 && $garansi > 14){
                $garansi = 4;
            }
            else if($garansi <=14 && $garansi > 0){
                $garansi = 2;
            }
            else if($garansi >= 30){
                $garansi = 5;
            }
            else if($garansi <= 0){
                $garansi = 1;
            }


            if($merk != NULL){
                $merk = 5;
            }
            
            if($stt_kategori != $d->kategori){
                $mean = Alternatif::mean($d->kategori);
                $stt_kategori = $d->kategori;
            }

            if($harga == 0){
                $harga = 1;
            }
            else if($harga <= round($mean - ($mean * 0.1)) && $harga > 0){
                $harga = 5;
            }
            else if($harga > round($mean - ($mean * 0.2)) && $harga <= $mean){
                $harga = 4;
            }
            else if($harga > $mean && $harga <= round($mean + ($mean * 0.1))){
                $harga = 3;
            }
            else if($harga > round($mean + ($mean * 0.1))){
                $harga = 2;
            }

            Nilai::where('id_alternatif',$d->id)->update([
                'khasiat'=>$khasiat,
                'efek'=>$efek,
                'garansi'=>$garansi,
                'merk'=>$merk,
                'harga'=>$harga
            ]);
        }
    }
}
