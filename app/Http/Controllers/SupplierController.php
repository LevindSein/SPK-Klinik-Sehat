<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Supplier;

class SupplierController extends Controller
{
    public function index(){
        $dataset = Supplier::all();
        return view('supplier.index',['dataset'=>$dataset]);
    }

    public function add(Request $request){
        $nama = strtoupper($request->get('nama'));
        $alamat = $request->get('alamat');
        $no_hp = '62'.substr($request->get('no_hp'),1);

        $data = new Supplier;
        $data->nama = $nama;
        $data->alamat = $alamat;
        $data->no_hp = $no_hp;

        $data->save();
        return redirect()->route('supplier')->with('success','Data Ditambah');
    }

    public function delete($id){
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->route('supplier')->with('success','Supplier Dihapus');
    }

    public function update($id){
        $dataset = Supplier::find($id);
        return view('supplier.update',['dataset'=>$dataset]);
    }

    public function store(Request $request, $id){
        $nama = strtoupper($request->get('nama'));
        $alamat = $request->get('alamat');
        $no_hp = $request->get('no_hp');

        $supplier = Supplier::find($id);
        $supplier->nama = $nama;
        $supplier->alamat = $alamat;
        $supplier->no_hp = $no_hp;
        $supplier->save();
        return redirect()->route('supplier')->with('success','Supplier Diupdate');
    }
}
