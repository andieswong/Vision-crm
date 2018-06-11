<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class webcontroller extends Controller
{
   public function about()
   {
       return view('portada.about');
   }
   public function contacto()
   {
       return view('portada.contacto');
   }
}
