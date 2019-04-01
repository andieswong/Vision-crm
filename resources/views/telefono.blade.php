@extends('layouts.admin')

@section('content')


<div class="container">
    <div class="row" style="padding-top: 35px">










            <form id="userForm">
                <input id="username" type="hidden" placeholder="USERNAME" value="andreswong5@gmail.com"><br>
                <input id="password" type="hidden" placeholder="PASSWORD" value="tito1212"><br>
                <button id="loginUser">Iniciar</button>

            </form>






        <div class="card card-header">Telefono</div>
        <div class="card card-body">
        <div id="call">
            <form id="newCall">
                <input id="phoneNumber" placeholder="Numero de telefono +1 714 760 9878"><br>
                <button id="call">Call</button>
                <button id="hangup">Hangup</button>
                <audio id="incoming" autoplay></audio>
                <audio id="ringback" src='style/ringback.wav' loop></audio>
            </form>
        </div>
        <div class="clearfix"></div>
        <div id="callLog">
        </div>
        <div class="error">
        </div>
        </div>

</div>

    @endsection