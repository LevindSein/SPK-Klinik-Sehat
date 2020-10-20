<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Nexmo;

class UserController extends Controller
{
    public function index(){
        $dataset = User::data();
        return view('user.index',['dataset'=>$dataset]);
    }

    public function add(Request $request){
        $nama = $request->get('nama');
        $role = $request->get('role');
        $random = str_shuffle('abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ123456789');
        $password = substr($random, 0, 7);

        $data = new User;
        $data->username = $nama;
        $data->role = $role;
        $data->password = md5($password);
        $data->save();

        Nexmo::message()->send([
            'to'   => '6287838840774',
            'from' => '1913',
            'text' => 'Hai, Coders. Klinik Sehat informasikan Password untuk '.$nama.' adalah >> '.$password.' <<'
        ]);
        return redirect()->route('users')->with('success','Data Ditambah, Cek SMS');
    }

    public function reset($id){
        $random = str_shuffle('abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ123456789');
        $password = substr($random, 0, 7);

        $data = User::find($id);
        $nama = $data->username;
        $data->password = md5($password);
        $data->save();

        Nexmo::message()->send([
            'to'   => '6287838840774',
            'from' => '1913',
            'text' => 'Hai, Coders. Klinik Sehat informasikan Password baru untuk '.$nama.' adalah >> '.$password.' <<'
        ]);
        return redirect()->route('users')->with('success','Password direset, Cek SMS');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users')->with('success','User Dihapus');
    }
}
