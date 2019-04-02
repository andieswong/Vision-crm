<?php

namespace App\Http\Controllers;

use App\prefijo;
use Illuminate\Http\Request;

class PrefijoController extends Controller
{
    public function Prefijosview()
    {
        $prefijos = prefijo::paginate(20);
        return view('prefijos', [
            'prefijos' => $prefijos,
        ]);
    }
}
