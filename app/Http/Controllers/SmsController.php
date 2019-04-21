<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\CreatesmsRequest;
use App\Sms;
use Illuminate\Http\Request;
use Twilio;

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
            ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function show(Sms $sms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function edit(Sms $sms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sms $sms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sms $sms)
    {
        //
    }
}
