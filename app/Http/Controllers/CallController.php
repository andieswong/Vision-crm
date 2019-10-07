<?php

namespace App\Http\Controllers;

use App\Call;
use App\Contact;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\TwiML;
use Plivo\RestClient;


class CallController extends Controller
{

    public function callindex(Request $request)
    {

        $userid = $request->user()->id;
        $contactsofuser = Contact::where('user_id', $userid)->paginate(500);
        $contacto = $contactsofuser->where('estado', 'new')->first();


        return view ('call', [
            'contacto' => $contacto,

        ]);
    }


    public function call(Request $request)
    {



        $sid = env('TWILIO_ACCOUNT_SID');
            $token = env('TWILIO_AUTH_TOKEN');
            $twilio = new Client($sid, $token);
            $twilio_number = env('TWILIO_NUMBER');

        $call = $twilio->calls
            ->create($request->input('to'), // to
                $twilio_number, // from

            );

        return redirect('/Contactos')->withSuccess('LLamada en curso');

    }
    public function calling(Request $request)
    {



        $sid = env('PLIVO_AUTH_ID');
            $token = env('PLIVO_AUTH_TOKEN');
            $plivo = new RestClient($sid, $token);

        $call_made = $plivo->calls->create(
            '+19095430757',
            ['+16194897697'],
            'http://76d61898.ngrok.io/api/callxml'
        );


        return redirect('/Contactos')->withSuccess('LLamada en curso');

    }


    public function api()
    {
        $response = new TwiML;
        $say = $response->say('Hola, estas contactando a Visioncc, un agente se comunicara contigo');
        $dial = $response->dial('+16194897697');




        print $response;
    }


    public function show(Call $call)
    {
        //
    }


    public function edit(Call $call)
    {
        //
    }


    public function update(Request $request, Call $call)
    {
        //
    }


    public function destroy(Call $call)
    {
        //
    }
}
