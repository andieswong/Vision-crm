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
    public function agentsview($id)
    {
        $user = User::find($id);
        return view('agente', [
            'user' => $user,
        ]);
    }
}
