<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class agentcontroller extends Controller
{
    public function indexview(Request $request)
    {
        $user = $request->user();


        return view ('agentes.dash',[
            'user' => $user,

        ]);
    }
}
