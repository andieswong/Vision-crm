<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNotificationRequest;
use App\Notifications;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('notification');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateNotificationRequest $request)
    {
        $notification = Notifications::create([

            'notification' => $request->input('notification'),
            'user_id' => $request->input('user'),
            'estado' => $request->input('estado'),
        ]);


        return redirect('/home');
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
     * @param  \App\Notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function show(Notifications $notifications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function edit(Notifications $notifications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function update($notificationid, Request $request, Notifications $notifications)
    {
        $notification = $notifications::where('id', $notificationid)->first();

        $notification->estado = $request->input('estado');

        $notification->save();

        return redirect('/Notifications');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notifications  $notifications
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request ,Notifications $notifications)
    {
        $notification = $notifications::where('id', $id)->first();

        $notification->delete();

        return redirect('/Notifications');
    }
    public function center(Request $request)
    {
        $user = $request->user();
        return view('notifications',[
            'user' => $user,
        ]);
    }
}
