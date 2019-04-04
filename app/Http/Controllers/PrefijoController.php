<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateprefijoRequest;
use App\prefijo;
use App\report_prefix;
use Illuminate\Http\Request;

class PrefijoController extends Controller
{
    public function Prefijosview()
    {
        $prefijos = prefijo::paginate(20);
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
    public function addnewprefix(CreateprefijoRequest $request)
    {

        $prefijo = prefijo::create([

            'prefijo' => $request->input('prefijo'),
            'estado' =>$request->input('estado'),
            'usuario' =>$request->input('usuario'),

        ]);

        return redirect('/Prefijos');
    }
    public function prefixview($id)
    {
        $prefijo = prefijo::where('id', $id)->first();

        return view ('prefijo', [
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
}
