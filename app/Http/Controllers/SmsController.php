<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\CreatesmsRequest;
use App\Sms;
use Illuminate\Http\Request;
use Twilio;
use Twilio\Rest\Client;
use Twilio\TwiML\MessagingResponse;
use Twilio\TwiML\TwiML;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($contactid)
    {
        $contact = Contact::where('id', $contactid)->first();
        return view('sms', [
            'contact' => $contact,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(CreatesmsRequest $request)
    {
        $sms = Sms::create([
            'sms' => $request->input('sms'),
            'to' => $request->input('to'),
            'from' => $request->input('from'),
            'estado' => $request->input('estado'),
            'user_id' => $request->input('user_id'),
            'lead_id' => $request->input('lead_id'),
            'contact_id' => $request->input('contact_id'),

            $sid = env('TWILIO_ACCOUNT_SID'),
            $token = env('TWILIO_AUTH_TOKEN'),
            $client = new Client($sid, $token),
            $twilio_number = env('TWILIO_NUMBER'),
        $client->messages->create(
        // Where to send a text message (your cell phone?)
            $request->input('to'),
            array(
                'from' => $twilio_number,
                'body' => $request->input('sms')
            ))



        ]);

        return redirect('/Contactos');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function in()
    {
        $response = new MessagingResponse();
        $message = $response->message('');
        $message->body('Hola, estas contactando a Visioncc, un agente se comunicara contigo.');


        print $response;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Sms $sms
     * @return \Illuminate\Http\Response
     */
    public function show(Sms $sms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Sms $sms
     * @return \Illuminate\Http\Response
     */
    public function edit(Sms $sms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Sms $sms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sms $sms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Sms $sms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sms $sms)
    {
        //
    }
}
