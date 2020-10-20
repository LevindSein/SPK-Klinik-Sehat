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

        $data = new Supplier;
        $data->nama = $nama;
        $data->save();
        return redirect()->route('supplier')->with('success','Data Ditambah');
    }

    public function delete($id){
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->route('supplier')->with('success','Supplier Dihapus');
    }
}
