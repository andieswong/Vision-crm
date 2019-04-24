<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\CreatepreRequest;
use App\pre;
use App\prefijo;
use App\report_prefix;
use Illuminate\Http\Request;

class PrefijoController extends Controller
{
    public function Prefijosview()
    {
        $prefijos = pre::paginate(20);
        $badrep = report_prefix::where('reporte', "malo");
        $goodrep = report_prefix::where('reporte', "bueno");
        return view('prefijos', [
            'prefijos' => $prefijos,
            'badrep' => $badrep,
            'goodrep' => $goodrep,
        ]);
    }

    public function viewnewprefix()
    {
        return view('newprefix');
    }

    public function addnewprefix(CreatepreRequest $request)
    {

        $prec = pre::create([

            'id' => $request->input('prefijo'),
            'pre' => $request->input('prefijo'),

        ]);
        $cont = 10;
        $limite = 100;

        while ($cont < $limite) {


            $pre = $request->input('prefijo');
            $premasfijo = $pre . $cont;

            $prefijo = prefijo::create([
                'prefijo' => $premasfijo,
                'estado' => "new",
                'usuario' => '1',
                'pre' => $pre,

            ]);

            $cont++;

        }

        return redirect('/Prefijos');
    }

    public function prefixview($id)
    {
        $prefijo = prefijo::where('id', $id)->first();

        return view('prefijo', [
            'prefijo' => $prefijo,
        ]);
    }

    public function report(Request $request)
    {
        $user = $request->user();
        $prefixid = $request->input('prefix_id');
        $prefix = prefijo::where('id', $prefixid)->first();

        $report = report_prefix::create([

            'report' => $request->input('report'),
            'user_id' => $user->id,
            'prefix_id' => $prefixid

        ]);

        return redirect("/Dialer");
    }

    public function pre($preid)
    {
        $prec = pre::where('id', $preid)->first();
        $pre = $prec->prefijos->where('estado', 'new');

        return view('pre', [
            'pre' => $pre,
        ]);
    }

    public function take($prefixid, Request $request)
    {
        $pre = prefijo::where('id', $prefixid)->first();
        $prec = $pre->prefijo;
        $cont = 10;
        $limite = 100;

        while ($cont < $limite) {

            $prefijo = $prec . $cont;

            $contacto = Contact::create([
                'telefono' => '+1' . $prefijo,
                'nombre' => 'Prefijo' . $cont,
                'user_id' => $request->user()->id,
                'estado' => 'new',
            ]);

            $cont++;

        }

        $prefijo = prefijo::where('id', $prefixid)->first();

        $prefijo->estado = 'taken';

        $prefijo->usuario = $request->user()->id;

        $prefijo->save();

        return redirect('/Contactos')->withSuccess('Prefijo Agregado');
    }
    public function rm ($prefixid, Request $request)
    {
        $prefix = prefijo::where('id', $prefixid)->first();
        $precontacts = '+1'.$prefix->prefijo;
        $cont = 10;
        $limite = 100;


            while ($cont < $limite) {

                $contacto = $precontacts . $cont;

                $contact = Contact::where('telefono', $contacto)->first();

                $exist = isset($contact);

                if ($exist) {

                    $contact->delete();

                }

                $cont++;

            }

        $me = $request->user();
            $myid = $me->id;

            $prefix->usuario = "1";

            $prefix->save();



        return redirect('/Contactos')->withSuccess('Prefijo eliminado');
    }


}
