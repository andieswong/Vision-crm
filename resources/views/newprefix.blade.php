@extends('layouts.admin')

@section('content')

    <div class="container" style="padding-top: 30px;padding-bottom: 30px">
        <div class="row">
            <div class="col-12">

                <div class="card-header" >
                    Agregar equipo
                    @if(session('success'))
                        <span class="text-success">{{ session('success') }}</span>
                    @endif
                </div>
                <div class="card-body">
                    <form action="/Prefijos/Nuevo prefijo/Agregar" method="post" class="form-control">
                        <div class="row">
                            <div class="col-6">
                                @csrf
                                <input class="form-control" type="text" name="prefijo" placeholder="Prefijo a agregar">
                                <input class="form-control" type="text" name="estado" placeholder="Estado del prefijo">
                                <input class="form-control" type="hidden" name="usuario" value="{{ Auth::user()->name }}">
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
