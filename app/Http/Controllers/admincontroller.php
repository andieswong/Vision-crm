<?php

namespace App\Http\Controllers;


use App\prefijo;
use App\User;
use Illuminate\Http\Request;

class admincontroller extends Controller
{


    public function dialerview()
    {
        $estado = "activo";
        $prefijo_activo = prefijo::where('estado', $estado)->get();
        return view('dialer',[
            'prefijo_activo' => $prefijo_activo,
        ]);
    }
    public function telview()
    {
        $needtel = 'si';
        return view('telefono',[
            'needtel' => $needtel
        ]);
    }

    public function ajustesview()
    {
        return view('ajustes');
    }

    public function admintools()
    {
        return view('admin');
    }

    public function doreq()
    {
        $users = User::all();
        return view('notification', [
            'users' => $users,
        ]);
    }
}
