<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Laporan;
use App\Alternatif;

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

    public function store($id){
        $dokter = Session::get('username');
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date("Y-m-d", time());
        $bulan = date("Y-m", time());

        $data = Alternatif::laporan($id);

        $laporan = new Laporan;
        $laporan->tanggal = $tanggal;
        $laporan->bulan = $bulan;
        $laporan->kode = $data->kode;
        $laporan->nama = $data->nama;
        $laporan->merk = $data->merk;
        $laporan->kategori = $data->kategori;
        $laporan->dokter = $dokter;
        $laporan->supplier = $data->supplier;
        $laporan->save();

        echo "<script>window.close();</script>";
    }
}
