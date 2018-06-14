<?php

namespace App\Http\Controllers;

use App\puestos;
use App\equipos;
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
        $user = User::where('user', $username)->first();
        $equipo = $user->integrar->first();
        $rango = $user->rango->first();
        return view('agente', [
            'user' => $user,
            'rango' => $rango,
            'equipo' => $equipo,
        ]);
    }

    public function followsview($username)
    {
        $user = User::where('user', $username)->first();
    }

    public function addagentindex()
    {
        $puestos = puestos::all();
        $equipos = equipos::all();
        return view('auth.registeragent', [
            'puestos' => $puestos,
            'equipos' => $equipos
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
            'avatar' => $request->input('avatar'),
        ]);


        $userbymail = User::where('email', $request->input('email'))->first();

        $userid = $userbymail->id;

        $user = User::find($userid);
        $team = $request->input('equipo');

        $user->integrar()->attach($team);

        $puesto = $request->input('puesto');

        $user->rango()->attach($puesto);

        return redirect('/Agentes')->withSuccess('El agente se ha registrado.');
    }


    public function destroyagent($id, Request $request)
    {
        $usertodestroy = User::find($id);
        $teamtodetach = $usertodestroy->integrar->first();
        $puestotodetach = $usertodestroy->rango->first();

        $usertodestroy->integrar()->detach($teamtodetach);
        $usertodestroy->rango()->detach($puestotodetach);

        $usertodestroy->delete();

        return redirect('/Agentes')->withSuccess('El agente se a eliminado');
    }

    public function notifications(Request $request)
    {
        $user = $request->user();
        $notificationsstack = $user->notifications;
        $notifications = $notificationsstack->where('estado', 'activo');


        return $notifications;

    }
    public function notificationscount(Request $request)
    {
        $user = $request->user();
        $notifications = $user->notifications->count();

        return $notifications;

    }

}
