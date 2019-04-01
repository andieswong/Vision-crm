@extends('layouts.admin')

@section('content')
<div class="container" style="padding-bottom: 100px; padding-top: 100px">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Registrar nuevo lead') }}</div>

                <div class="card-body">
                    <form method="POST" action="/Leads/Nuevo lead">
                        @csrf

                        <div class="form-group row">
                            <div class="col">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="" placeholder="Nombre y Apellido" required autofocus>

                            </div>

                            <div class="col">
                                <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ old('direccion') }}" placeholder="Direccion"  autofocus>

                                @if ($errors->has('direccion'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col">
                                <input id="ciudad" type="text" class="form-control{{ $errors->has('ciudad') ? ' is-invalid' : '' }}" name="ciudad" value="{{ old('ciudad') }}" placeholder="Ciudad"  autofocus>

                            </div>

                            <div class="col">
                                <input id="estado" type="text" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" value="CA" placeholder="Estado"   autofocus>


                            </div>
                        </div>



                        <div class="form-group row">

                            <div class="col">
                                <input id="tel" type="text" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}" placeholder="Telefono"  autofocus>

                                @if ($errors->has('tel'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col">
                                <input id="tel_adic" type="text" class="form-control{{ $errors->has('tel_adic') ? ' is-invalid' : '' }}" name="tel_adic" value="{{ old('tel_adic') }}" placeholder="Telefono Adicional"  autofocus>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col">
                                <input id="fecha_nac" type="text" class="form-control{{ $errors->has('fecha_nac') ? ' is-invalid' : '' }}" name="fecha_nac" placeholder="Fecha de nacimiento" >

                            </div>

                            <div class="col">
                                <input id="ssn" type="ssn" class="form-control{{ $errors->has('ssn') ? ' is-invalid' : '' }}" name="ssn" placeholder="Social security number" >


                                @if ($errors->has('ssn'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('ssn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">

                            <div class="col">
                                <input id="card" type="text" class="form-control{{ $errors->has('card') ? ' is-invalid' : '' }}" name="card" value="" placeholder="Tarjeta Credito o Debito"  autofocus>

                            </div>

                            <div class="col">
                                <input id="exp" type="exp" class="form-control{{ $errors->has('exp') ? ' is-invalid' : '' }}" name="exp" value="" placeholder="Expiracion"  autofocus>

                            </div>

                            <div class="col">
                                <input id="code" type="code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="" placeholder="Codigo de seguridad (3 digitos)"  autofocus>

                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col">
                                {{--<input id="servicio_ai" type="text" class="form-control{{ $errors->has('servicio_ai') ? ' is-invalid' : '' }}" name="servicio_ai" value="" placeholder="Servicio Ofrecido"  autofocus>--}}
                                <select id="servicio_ai" class="form-control" name="servicio_ai">
                                    <option value="Dish">Dish</option>
                                    <option value="Dtv">Dtv</option>
                                </select>
                            </div>

                            <div class="col">
                                {{--<input id="paq_ofrecido" type="text" class="form-control{{ $errors->has('paq_ofrecido') ? ' is-invalid' : '' }}" name="paq_ofrecido" value="" placeholder="Paquete ofrecido"  autofocus>--}}
                                <select id="paq_ofrecido" class="form-control">
                                    <option value=""
                                </select>

                            </div>

                            <div class="col">
                                <input id="tvs" type="text" class="form-control{{ $errors->has('tvs') ? ' is-invalid' : '' }}" name="tvs" value="" placeholder="Tvs a instalar"  autofocus>

                            </div>

                            <div class="col">
                                <input id="dvr" type="text" class="form-control{{ $errors->has('dvr') ? ' is-invalid' : '' }}" name="dvr" value="" placeholder="Dvr ofrecido"  autofocus>

                            </div>

                        </div>





                        <div class="form-group row">

                            <div class="col">
                                <input id="horario_inst" type="text" class="form-control{{ $errors->has('horario_inst') ? ' is-invalid' : '' }}" name="horario_inst" value="" placeholder="Horario de instalacion"  autofocus>

                            </div>

                            <div class="col">
                                <input id="descuento" type="text" class="form-control{{ $errors->has('descuento') ? ' is-invalid' : '' }}" name="descuento" value="" placeholder="Descuento"  autofocus>

                            </div>

                            <div class="col">
                                <input id="servicios_adic" type="text" class="form-control{{ $errors->has('servicios_adic') ? ' is-invalid' : '' }}" name="servicios_adic" value="" placeholder="Servicios extras a instalar"  autofocus>

                            </div>

                            <div class="col">
                                <input id="compania_act" type="text" class="form-control{{ $errors->has('compania_act') ? ' is-invalid' : '' }}" name="compania_act" value="" placeholder="Servicio actual"  autofocus>

                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col">
                                <input id="cod" type="text" class="form-control{{ $errors->has('cod') ? ' is-invalid' : '' }}" name="cod" value="" placeholder="Cash on Delivery"  autofocus>

                            </div>

                            <div class="col">
                                <input id="estado_lead" type="text" class="form-control{{ $errors->has('estado_lead') ? ' is-invalid' : '' }}" name="estado_lead" value="" placeholder="Estado del lead"  autofocus>

                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col">
                                <textarea id="notas" type="text" class="form-control{{ $errors->has('notas') ? ' is-invalid' : '' }}" name="notas" value="" placeholder="notas  "  autofocus></textarea>

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
                </div>
            </div>
        </div>

</div>
@endsection
