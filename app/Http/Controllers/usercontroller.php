<?php

namespace App\Http\Controllers;

use App\puestos;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function agentstable()
    {
        $users = User::all();
        return view('agentes', [
            'users' => $users,
        ]);
    }
    public function agentsview($username)
    {
        $user =  User::where('user', $username)->first();
        return view('agente', [
            'user' => $user,
        ]);
    }

    public function followsview($username)
    {
     $user =  User::where('user', $username)->first();
    }
    public function addagentindex()
    {
        $puestos = puestos::all();
        return view('auth.registeragent', [
            'puestos' => $puestos,
        ]);
    }
    public function addagentcreate(Request $request)
    {
        $addagent = User::create([

            'name' => $request->input('name'),
            'puesto' => $request->input('puesto'),
            'equipo' => $request->input('equipo'),
            'user' => $request->input('user'),
            'num_emp' => $request->input('num_emp'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'avatar' => $request->input('name'),
        ]);

        return redirect('/Agentes')->withSuccess('El agente se ha registrado.');
    }
}
