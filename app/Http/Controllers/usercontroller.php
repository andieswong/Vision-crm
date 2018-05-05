<?php

namespace App\Http\Controllers;

use App\User;
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
}
