<?php

namespace App\Http\Controllers;

use App\equipos;
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
    public function equiposindex()
    {
        $equipos = equipos::all();
        return view('ajustes.equipos.equipos', [
            'equipos' => $equipos
        ]);
    }
    public function agregarequipoindex()
    {
        $equipos = equipos::all();
        return view('ajustes.equipos.agregarequipo', [
            'equipos' => $equipos
        ]);
    }
    public function agregarequipocreate(Request $request)
    {
        $agregarequipo = equipos::create ([
            'equipo' => $request->input('equipo'),
        ]);

        return redirect('/Ajustes/Equipos/Agregar')->withSuccess('Equipo agregado correctamente');
    }
}
