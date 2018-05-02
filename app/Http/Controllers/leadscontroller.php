<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeadRequest;
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
    public function addnewlead(CreateLeadRequest $request)
    {
       $user = $request ->user();


       $lead = Lead::create([

           'nombre' => $request->input('nombre'),
           'direccion' =>$request->input('direccion'),
           'ciudad' =>$request->input('ciudad'),
           'estado' =>$request->input('estado'),
           'tel' =>$request->input('tel'),
           'tel_adic' =>$request->input('tel_adic'),
           'fecha_nac' =>$request->input('fecha_nac'),
           'ssn' =>$request->input('ssn'),
           'card' =>$request->input('card'),
           'exp' =>$request->input('exp'),
           'code' =>$request->input('code'),
           'servicio_ai' =>$request->input('servicio_ai'),
           'paq_ofrecido' =>$request->input('paq_ofrecido'),
           'tvs_inst' =>$request->input('tvs'),
           'dvr' =>$request->input('dvr'),
           'horario_inst' =>$request->input('horario_inst'),
           'descuento' =>$request->input('descuento'),
           'servicios_adic' =>$request->input('servicios_adic'),
           'compania_act' =>$request->input('compania_act'),
           'cod' =>$request->input('cod'),
           'notas' =>$request->input('notas'),
           'estado_lead' =>$request->input('estado_lead'),
           'user_id' => $user->id,
       ]);

       return view('leads');
    }

    public function leadview($id)
    {
        $lead = Lead::find($id);

        return view('lead', [
            'lead' => $lead,
        ]);

    }
}
