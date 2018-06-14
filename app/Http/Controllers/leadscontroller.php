<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNotificationRequest;
use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\CreateLeadRequest;
use App\Lead;
use App\comments_leads;
use App\Notifications;
use App\Notifications\dorequest;
use App\User;
use Illuminate\Http\Request;

class leadscontroller extends Controller
{
    public function leadsview(Request $request)
    {
        $leads = Lead::paginate(20);
        $userid = $request->user()->id;
        $leadsofuser = Lead::where('user_id', $userid)->get();
        return view('leads', [
            'leads' => $leads,
            'leadsofuser' => $leadsofuser
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

       return redirect('/Leads');
    }

    public function leadview($id)
    {
        $lead = Lead::where('id' , $id)->first();

        return view('lead', [
            'lead' => $lead,

        ]);

    }

    public function comment($leadid, Request $request)
    {
        $user = $request ->user();
        $lead = Lead::where('id' , $leadid)->first();

        $comment = comments_leads::create([

            'comment' => $request->input('comment'),
            'user_id' => $user->id,
            'lead_id' => $leadid

        ]);

        $userstonotificate = $lead->followers();





        foreach ($lead->followers as $usern)
        {


            $notification = Notifications::create([

                'notification' => "Hay un nuevo comentario en el lead $lead->id que sigues actualmente",
                'user_id' => "$usern->id",
                'estado' => 'activo'

            ]);
        }



        return view ('lead', [
            'lead' => $lead
        ]);



    }

    public function destroycomment($id, Request $request)
    {
       $comment = comments_leads::where('id', $id)->first();

       $comment->delete();

       return redirect ('/Leads');



    }

    public function addfollow($leadid, Request $request)
    {
        $lead = Lead::find($leadid);
        $me = $request->user();

        $me->follows()->attach($lead);

        return redirect("/Leads/Ver/$leadid")->withSuccess('Lead en Seguimiento');

    }

    public function unfollow($leadid, Request $request)
    {
        $lead = Lead::find($leadid);
        $me = $request->user();

        $me->follows()->detach($lead);

        return redirect("/Leads/Ver/$leadid")->withSuccess('Lead liberado');
    }

    public function follows($leadid)
    {
        $lead = Lead::find($leadid);




        return view('follows', [
            'lead' => $lead,


        ]);
    }
    public function center(Request $request)
    {
        $user = $request->user();
        $level = $user->nivel()->first();
        return view('notifications',[
            'user' => $user,
            'level' => $level
        ]);
    }
    public function createnotification(CreateNotificationRequest $request)
    {
        $me = $request->user();

        $notification = Notifications::create([

            'notification' => $request->input('notification'),
            'user_id' => $request->input('user'),
            'estado' => $request->input('estado'),
        ]);

        $userid = $request->input('user');
        $user = User::find($userid);
        $user->notify(new dorequest($me));

        return redirect('/Do_Request')->withSuccess('Notificacion enviada');
    }
    public function updatenotification($notificationid, Request $request, Notifications $notifications)
    {
        $notification = $notifications::where('id', $notificationid)->first();

        $notification->estado = $request->input('estado');

        $notification->save();

        return redirect('/Notifications');
    }
    public function destroynotification($id, Request $request ,Notifications $notifications)
    {
        $notification = $notifications::where('id', $id)->first();

        $notification->delete();

        return redirect('/Notifications');
    }
}