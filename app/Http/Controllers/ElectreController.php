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
        $data = "";
        $kategori = Kategori::all();
        $name = "Pilih Kategori :";
        $value = 0;
        if($request->get('id') == 1){
            $id = $request->get('kategori');
            $name = Kategori::name($id);
            $data = Kategori::find($id);
            $data = $data->nama;
            $value = 1;
        }
        return view('electre.index',['data'=>$data,'kategori'=>$kategori,'name'=>$name,'value'=>$value]);
    }
}
