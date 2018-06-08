@extends('layouts.admin')

@section('content')

    <div class="container" style="padding-top: 30px;padding-bottom: 30px">
        <div class="row">
            <div class="col-12">

                <div class="card-header" >
                    Agregar nivel de permiso a agente
                    @if(session('success'))
                        <span class="text-success">{{ session('success') }}</span>
                    @endif
                </div>
                <div class="card-body">
                    <form action="/Ajustes/Niveles/Agregar" method="post" class="form-control">
                        <div class="row">
                            <div class="col-6">
                                @csrf
                                <select class="form-control" name="nivel">
                                    @foreach($niveles as $nivel)
                                        <option value="{{ $nivel->id }}">{{ $nivel->level }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <select class="form-control" name="usuario">
                                    @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br/>
                            <div class="col-12">
                                <button class="btn btn-primary">Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection