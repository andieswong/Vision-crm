@extends('layouts.admin')

@section('content')

    <div class="container" style="padding-top: 30px;padding-bottom: 30px">
        <div class="row">
            <div class="col-12">

                <div class="card-header">
                    Llamar
                    @if(session('success'))
                        <span class="text-success">{{ session('success') }}</span>
                    @endif
                </div>
                <div id="controls">
                    <div id="info">
                        <p class="instructions">Twilio Client</p>
                        <div id="output-selection">
                            <label>Ringtone Devices</label>
                            <select id="ringtone-devices" multiple></select>
                            <label>Speaker Devices</label>
                            <select id="speaker-devices" multiple></select><br/>
                            <a id="get-devices">Seeing unknown devices?</a>
                        </div>
                    </div>
                    <div id="call-controls">
                        <button id="button-call" class="button">Comenzar a llamar</button>
                        <button id="button-hangup">Hangup</button>
                        <form method="get" action="/Call">
                            <button id="button-stop" class="button">Detener dialer</button>
                        </form>
                        <div id="volume-indicators">
                            <label>Mic Volume</label>
                            <div id="input-volume"></div>
                            <br/><br/>
                            <label>Speaker Volume</label>
                            <div id="output-volume"></div>
                        </div>
                    </div>
                    <div id="log"></div>
                </div>
                <div id="tabla">

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Numero</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Agente</th>
                        <th scope="col">Estado</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                        @if (count($contacto) > 0)

                        <th scope="row">{{ $contacto->id }}</th>
                        <td><a href="/Contacto/Ver/{{ $contacto->id }}">{{ $contacto->telefono }}</a></td>
                        <td>{{ $contacto->nombre }}</td>
                        <td>{{ $contacto->user->name }}</td>
                        <input type="hidden" id="phone-number" name="phone-number"
                               value="{{ $contacto->telefono }}">
                        <td>
                            <button class="badge badge" id="queue">Llamada actual</button>
                        </td>
                    </tr>
                    <tbody/>
                </table>
                <input id="contactid" value="{{ $contacto->id }}" type="hidden">
                <input id="estatus" value="called" type="hidden">
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection
