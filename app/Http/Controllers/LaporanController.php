<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Laporan;

class LaporanController extends Controller
{
    public function index(){
        $dataset = Laporan::sort();
        return view('laporan.index',['dataset'=>$dataset]);
    }

    public function print($bln){
        $dataset = Laporan::print($bln);
        return view('laporan.print',['dataset'=>$dataset,'bln'=>$bln]);
    }
}
