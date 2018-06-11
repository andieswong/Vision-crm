<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class agentcontroller extends Controller
{
    public function index()
    {
        return view ('agentes.dash');
    }
}
