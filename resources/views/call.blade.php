@extends('layouts.admin')

@section('content')

    <div class="container" style="padding-top: 30px;padding-bottom: 30px">
        <div class="row">
            <div class="col-12">

                <div id="caller" class="card-header" >
                    <p>En llamada con:</p>
                    <input id="callerid" class="input alert-success rounded" placeholder="{{ $contacto->telefono }}">
                </div>
                <div id="controls">
                    <div id="info">
                        <p id="ins" style="display: inline" class="instructions">Presiona el boton para comenzar a llamar</p>
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

                </div>
                <div id="tabla">

                        @if ($contacto)
                        <input type="hidden" id="phone-number" name="phone-number"
                               value="{{ $contacto->telefono }}">
                </table>
                <input id="contactid" value="{{ $contacto->id }}" type="hidden">
                <input id="estatus" value="called" type="hidden">
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="row" style="display: none">
        <div class="col-12">
        <div class="card-header"><div id="log"></div></div>
    </div>
    </div>
@endsection
