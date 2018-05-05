@extends('layouts.admin')

@section('content')
    <div class="container" style="padding-bottom: 100px; padding-top: 100px">

        <div class="col-md-12">
            <div class="card">
                @if(session('success'))
                    <span class="text-success">{{ session('success') }}</span>
                    @endif
                <div class="card-header">Modificar lead {{ $lead->id }} <a href="/Leads/Ver/{{ $lead->id }}/Seguimiento"><br/>Seguimiento por <span class="badge badge-dark">{{ $lead->followers->count() }}</span></a> @if(Auth::user()->isFollowing($lead))
                            <form method="post" action="/Leads/DejardeSeguir/{{ $lead->id }}">@csrf<button class="btn btn-danger">Dejar de seguir</button></form>

                        @else
                            <form method="post" action="/Leads/Seguir/{{ $lead->id }}">@csrf<button class="btn btn-primary">Seguir cliente</button></form>

                    @endif</div>

                <div class="card-body">
                    <form method="POST" action="/Leads/Nuevo lead">
                        @csrf

                        <div class="form-group row">
                            <div class="col">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ $lead->nombre }}" placeholder="Nombre y Apellido" required autofocus>

                            </div>

                            <div class="col">
                                <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ $lead->direccion }}" placeholder="Direccion"  autofocus>
                            </div>

                            <div class="col">
                                <input id="ciudad" type="text" class="form-control{{ $errors->has('ciudad') ? ' is-invalid' : '' }}" name="ciudad" value="{{ $lead->ciudad }}" placeholder="Ciudad"  autofocus>

                            </div>

                            <div class="col">
                                <input id="estado" type="text" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" value="{{ $lead->estado }}" placeholder="Estado"   autofocus>


                            </div>
                        </div>



                        <div class="form-group row">

                            <div class="col">
                                <input id="tel" type="text" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ $lead->tel }}" placeholder="Telefono"  autofocus>

                            </div>

                            <div class="col">
                                <input id="tel_adic" type="text" class="form-control{{ $errors->has('tel_adic') ? ' is-invalid' : '' }}" name="tel_adic" value="{{ $lead->tel_adic }}" placeholder="Telefono Adicional"  autofocus>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col">
                                <input id="fecha_nac" type="text" class="form-control{{ $errors->has('fecha_nac') ? ' is-invalid' : '' }}" name="fecha_nac" value="{{ $lead->fecha_nac }}" placeholder="Fecha de nacimiento" >

                            </div>

                            <div class="col">
                                <input id="ssn" type="ssn" class="form-control{{ $errors->has('ssn') ? ' is-invalid' : '' }}" name="ssn" value="{{ $lead->ssn }}" placeholder="Social security number" >

                            </div>
                        </div>


                        <div class="form-group row">

                            <div class="col">
                                <input id="card" type="text" class="form-control{{ $errors->has('card') ? ' is-invalid' : '' }}" name="card" value="{{ $lead->card }}" placeholder="Tarjeta Credito o Debito"  autofocus>

                            </div>

                            <div class="col">
                                <input id="exp" type="exp" class="form-control{{ $errors->has('exp') ? ' is-invalid' : '' }}" name="exp" value="{{ $lead->exp }}" placeholder="Expiracion"  autofocus>

                            </div>

                            <div class="col">
                                <input id="code" type="code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ $lead->code }}" placeholder="Codigo de seguridad (3 digitos)"  autofocus>

                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col">
                                <input id="servicio_ai" type="text" class="form-control{{ $errors->has('servicio_ai') ? ' is-invalid' : '' }}" name="servicio_ai" value="{{ $lead->servicio_ai }}" placeholder="Servicio Ofrecido"  autofocus>

                            </div>

                            <div class="col">
                                <input id="paq_ofrecido" type="text" class="form-control{{ $errors->has('paq_ofrecido') ? ' is-invalid' : '' }}" name="paq_ofrecido" value="{{ $lead->paq_ofrecido }}" placeholder="Paquete ofrecido"  autofocus>

                            </div>

                            <div class="col">
                                <input id="tvs" type="text" class="form-control{{ $errors->has('tvs') ? ' is-invalid' : '' }}" name="tvs" value="{{ $lead->tvs_inst }}" placeholder="Tvs a instalar"  autofocus>

                            </div>

                            <div class="col">
                                <input id="dvr" type="text" class="form-control{{ $errors->has('dvr') ? ' is-invalid' : '' }}" name="dvr" value="{{ $lead->dvr }}" placeholder="Dvr ofrecido"  autofocus>

                            </div>

                        </div>





                        <div class="form-group row">

                            <div class="col">
                                <input id="horario_inst" type="text" class="form-control{{ $errors->has('horario_inst') ? ' is-invalid' : '' }}" name="horario_inst" value="{{ $lead->horario_inst }}" placeholder="Horario de instalacion"  autofocus>

                            </div>

                            <div class="col">
                                <input id="descuento" type="text" class="form-control{{ $errors->has('descuento') ? ' is-invalid' : '' }}" name="descuento" value="{{ $lead->descuento }}" placeholder="Descuento"  autofocus>

                            </div>

                            <div class="col">
                                <input id="servicios_adic" type="text" class="form-control{{ $errors->has('servicios_adic') ? ' is-invalid' : '' }}" name="servicios_adic" value="{{ $lead->servicios_adic }}" placeholder="Servicios extras a instalar"  autofocus>

                            </div>

                            <div class="col">
                                <input id="compania_act" type="text" class="form-control{{ $errors->has('compania_act') ? ' is-invalid' : '' }}" name="compania_act" value="{{ $lead->compania_act }}" placeholder="Servicio actual"  autofocus>

                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col">
                                <input id="cod" type="text" class="form-control{{ $errors->has('cod') ? ' is-invalid' : '' }}" name="cod" value="{{ $lead->cod }}" placeholder="Cash on Delivery"  autofocus>

                            </div>

                            <div class="col">
                                <input id="estado_lead" type="text" class="form-control{{ $errors->has('estado_lead') ? ' is-invalid' : '' }}" name="estado_lead" value="{{ $lead->estado_lead }}" placeholder="Estado del lead"  autofocus>

                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col">
                                <textarea id="notas" type="text" class="form-control{{ $errors->has('notas') ? ' is-invalid' : '' }}" name="notas" value="{{ $lead->notas }}" placeholder="notas  "  autofocus></textarea>

                            </div>
                        </div>




                        <div class="form-group row mb-0">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar    ') }}
                                </button>
                            </div>

                        </div>
                    </form>

                    {{--<div class="row>">--}}
                        {{--<div class="col ">--}}
                            {{--<a href="/Leads/Ver/Comentarios/{{ $lead->id }}" >Comentarios</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="row">

                        <div class="col" style="padding-top: 15px">
                            <div class="card">
                                <div class="card-header">
                                    Comentarios
                                </div>
                                <div class="card-body">
                            @if(count($lead->comments) > 0)


                                        @foreach($lead->comments as $comment)
                                            <div class="card" >
                                                <div class="card-header">
                                                    <p>{{ $comment->comment }} </p>

                                                </div>

                                                <p style="color: #606162">comentario por: {{ $comment->user->name }} Fecha:{{ $comment->created_at }}</p>

                                            </div>
                                            @endforeach


                            @else
                                <p>No hay comentarios registrados</p>
                            @endif

                                    <form method="post" action="" style="padding-top: 15px">
                                        @csrf
                                        <div class="form-group">
                                            <div class="col">
                                                <textarea id="comment" name="comment" class="form-control" placeholder="Comentario"></textarea><button type="submit" class="btn btn-primary">Comentar</button>
                                            </div>
                                        </div>
                                    </form>
                        </div>
                    </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
