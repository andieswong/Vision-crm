<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\CreatesmsRequest;
use App\Sms;
use Illuminate\Http\Request;
use Twilio;
use Twilio\Rest\Client;
use Twilio\TwiML\MessagingResponse;

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

            $sid = 'AC04c3e375bfe60b5b975d8d876a570651',
            $token = 'faa053ed68745a7574d4f21270cb151b',
            $client = new Client($sid, $token),
            $twilio_number = "+14805265942",

        $client->messages->create(
        // Where to send a text message (your cell phone?)
            '+526645019881',
            array(
                'from' => $twilio_number,
                'body' => 'I sent this message in under 10 minutes!'
            ))



        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function recive()
    {
        $response = new MessagingResponse();
        $response->message(
            "I'm using the Twilio PHP library to respond to this SMS!"
        );

        echo $response;
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
