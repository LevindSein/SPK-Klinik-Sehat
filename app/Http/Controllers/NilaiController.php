<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Nilai;
use App\Kategori;

class NilaiController extends Controller
{
    public function index(Request $request){
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
}
