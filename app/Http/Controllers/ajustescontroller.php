<?php

namespace App\Http\Controllers;

use App\puestos;
use Illuminate\Http\Request;

class ajustescontroller extends Controller
{
    public function puestosindex()
    {
        $puestos = puestos::all();
        return view('ajustes.puestos.puestos', [
            'puestos' => $puestos
        ]);
    }
    public function agregarpuestoindex()
    {
        $puestos = puestos::all();
        return view('ajustes.puestos.agregarpuesto', [
            'puestos' => $puestos
        ]);
    }
    public function agregarpuestocreate(Request $request)
    {
        $agregarpuesto = puestos::create ([
            'puesto' => $request->input('puesto'),
        ]);

        return redirect('/Ajustes/Puestos/Agregar')->withSuccess('puesto agregado correctamente');
    }
}
