@extends('layouts.admin')

@section('content')

    <div class="container" style="padding-top: 30px;padding-bottom: 30px">
        <div class="row">
            <div class="col-12">

                <div class="card-header" >
                    Agregar prefijo
                    @if(session('success'))
                        <span class="text-success">{{ session('success') }}</span>
                    @endif
                </div>
                <div class="card-body">
                    <form action="/Sms/New/Contact/Agregar" method="post" class="form-control">
                        <div class="row">
                            <div class="col-6">
                                @csrf
                                <input class="form-control" type="text" name="sms" placeholder="Texto a enviar">
                                <input class="form-control" type="hidden" name="to" value="{{ $contact->telefono }}">
                                <input class="form-control" type="hidden" name="from" value="callerid">
                                <input class="form-control" type="hidden" name="from" value="enviado">
                                <input class="form-control" type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input class="form-control" type="hidden" name="lead_id" value="null">
                                <input class="form-control" type="hidden" name="contact_id" value="{{ $contact->id }}">
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary">Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
