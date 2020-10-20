<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Kategori;

class KategoriController extends Controller
{
    public function index(){
        $dataset = Kategori::all();
        return view('kategori.index',['dataset'=>$dataset]);
    }

    public function add(Request $request){
        $nama = ucfirst($request->get('nama'));

        $data = new Kategori;
        $data->nama = $nama;
        $data->save();
        return redirect()->route('kategori')->with('success','Data Ditambah');
    }

    public function delete($id){
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->route('kategori')->with('success','Kategori Dihapus');
    }
}
