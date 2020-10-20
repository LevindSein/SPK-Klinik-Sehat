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
}
