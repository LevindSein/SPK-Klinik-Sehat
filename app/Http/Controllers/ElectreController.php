<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Nilai;
use App\Kategori;

class ElectreController extends Controller
{
    public function index(Request $request){
        $kategori = Kategori::all();
        $data = "Pilih Kategori :";
        $value = 0;
        if($request->get('id') == 1){
            $id = $request->get('kategori');
            $data = Kategori::find($id);
            $data = $data->nama;
            $value = 1;

            $electre = Nilai::electre($id);
            $nilaiAwal = $electre[0];
            $matriksNormalisasi = $electre[1];
            $bobotNormalisasi = $electre[2];
            $cIndex = $electre[3];
            $dIndex = $electre[4];
            $cMatriks = $electre[5];

            return view('electre.index',
            [
                'data'=>$data,
                'kategori'=>$kategori,
                'value'=>$value,
                'nilaiAwal'=>$nilaiAwal,
                'matriksNormalisasi'=>$matriksNormalisasi,
                'bobotNormalisasi'=>$bobotNormalisasi,
                'cIndex'=>$cIndex,
                'dIndex'=>$dIndex,
                'cMatriks'=>$cMatriks,
            ]);

        }
        return view('electre.index',
        [
            'kategori'=>$kategori,
            'data'=>$data,
            'value'=>$value
        ]);
    }
}
