<?php

namespace App\Http\Controllers;

use App\Lead;
use Illuminate\Http\Request;

class leadscontroller extends Controller
{
    public function leadsview()
    {
        $leads = Lead::all();
        return view('leads', [
            'leads' => $leads,
        ]);
    }
    public function viewnewlead()
    {
        return view('newlead');
    }
}
