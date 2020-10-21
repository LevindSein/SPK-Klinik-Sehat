<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Alternatif;
use App\Kategori;
use App\Supplier;
use App\Nilai;

class AlternatifController extends Controller
{
    public function index(){
        $dataset = Alternatif::join();
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        return view('alternatif.index',['dataset'=>$dataset,'kategori'=>$kategori,'supplier'=>$supplier]);
    }

    // public function updateKode(){
    //     $data = Alternatif::all();
    //     foreach($data as $d){
    //         $alternatif = ucfirst($d->nama);
    //         $kode = Alternatif::kode($alternatif).mt_rand(10000, 99999);

    //         $upd = Alternatif::find($d->id);
    //         $upd->kode = $kode;
    //         $upd->save();
    //     }
    // }

    public function add(Request $request){
        $alternatif = ucfirst($request->get('alternatif'));
        $kategori = $request->get('kategori');
        $supplier = $request->get('supplier');
        $satuan = $request->get('satuan');
        $kode = Alternatif::kode($alternatif).mt_rand(10000, 99999);

        $data = new Alternatif;
        $data->kode = $kode;
        $data->nama = $alternatif;
        $data->kategori = $kategori;
        $data->supplier = $supplier;
        $data->satuan = $satuan;
        $data->save();
        return redirect()->route('alternatif')->with('success','Data Ditambah');
    }

    public function delete($id){
        $nilai = Nilai::where('id_alternatif',$id)->first();
        $nilai->delete();
        $alternatif = Alternatif::find($id);
        $alternatif->delete();
        return redirect()->route('alternatif')->with('success','Data Dihapus');
    }

    public function update($id){
        $dataset = Alternatif::find($id);
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        return view('alternatif.update',['dataset'=>$dataset,'kategori'=>$kategori,'supplier'=>$supplier]);
    }

    public function store(Request $request, $id){
        $alternatif = ucfirst($request->get('nama'));
        $kategori = $request->get('kategori');
        $supplier = $request->get('supplier');
        $satuan = $request->get('satuan');
        $kode = Alternatif::kode($alternatif).mt_rand(10000, 99999);

        $data = Alternatif::find($id);
        $data->kode = $kode;
        $data->nama = $alternatif;
        $data->kategori = $kategori;
        $data->supplier = $supplier;
        $data->satuan = $satuan;
        $data->save();
        return redirect()->route('alternatif')->with('success','Data Ditambah');
    }
}
