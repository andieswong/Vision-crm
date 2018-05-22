<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class admincontroller extends Controller
{


    public function dialerview()
    {
        return view('dialer');
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
        return view('doreq');
    }
}
