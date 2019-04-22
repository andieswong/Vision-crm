<?php

namespace App\Http\Controllers;

use App\Call;
use App\Contact;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\TwiML;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function call(Request $request)
    {



        $sid = env('TWILIO_ACCOUNT_SID');
            $token = env('TWILIO_AUTH_TOKEN');
            $twilio = new Client($sid, $token);
            $twilio_number = env('TWILIO_NUMBER');

        $call = $twilio->calls
            ->create($request->input('to'), // to
                "+1 480 526 5942", // from
                array("url" => "http://9d53d878.ngrok.io/api/callxml")
            );

        return redirect('/Contactos')->withSuccess('LLamada en curso');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function api()
    {
        $response = new TwiML;
        $say = $response->say('Hola, estas contactando a Visioncc, un agente se comunicara contigo');
        $dial = $response->dial('+16194897697');




        print $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function show(Call $call)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function edit(Call $call)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Call $call)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function destroy(Call $call)
    {
        //
    }
}
