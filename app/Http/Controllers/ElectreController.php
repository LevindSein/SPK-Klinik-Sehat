<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElectreController extends Controller
{
    public function index(){
        return view('electre.index');
    }
}
