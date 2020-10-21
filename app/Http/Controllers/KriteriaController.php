<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kriteria;

class KriteriaController extends Controller
{
    public function index(){
        $dataset = Kriteria::all();
        return view('kriteria.index',['dataset'=>$dataset]);
    }

    public function update($id){
        $dataset = Kriteria::find($id);
        return view('kriteria.update',['dataset'=>$dataset]);
    }

    public function store(Request $request, $id){
        $bobot = $request->get('bobot');

        if($bobot != ($bobot > 0 && $bobot <= 5)){
            return redirect()->back()->with('error','Bobot Salah');
        }

        $kriteria = Kriteria::find($id);
        $kriteria->bobot = $bobot;
        $kriteria->save();
        return redirect()->route('kriteria')->with('success','Bobot Diupdate');
    }
}
