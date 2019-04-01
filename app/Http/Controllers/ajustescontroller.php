<?php

namespace App\Http\Controllers;

use App\equipos;
use App\Levels;
use App\puestos;
use App\User;
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
    public function nivelesindex()
    {
        $niveles = Levels::all();
        return view('ajustes.niveles.niveles', [
            'niveles' => $niveles
        ]);
    }
    public function agregarnivelindex()
    {
        $niveles = Levels::all();
        $usuarios = User::all();
        return view('ajustes.niveles.agregarnivel', [
            'niveles' => $niveles,
            'usuarios' => $usuarios
        ]);
    }
    public function agregarnivelcreate(Request $request)
    {
        $nivel = $request->input('nivel');
        $userid = $request->input('usuario');

        $user = User::find($userid);

        $user->nivel()->detach();

        $user->nivel()->attach($nivel);

        return redirect('/Ajustes/Niveles/Agregar')->withSuccess('Nivel agregado correctamente');
    }

    public function nivel($level)
    {
        $nivel = Levels::where('level', $level)->first();

        $integrantes = $nivel->integrantes;


        return view('ajustes.niveles.nivel', [
           'integrantes' => $integrantes,
            'nivel' => $nivel
        ]);
    }
}
