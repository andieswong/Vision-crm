@extends('layouts.admin')

@section('content')

    <div class="container" style="padding-top: 30px;padding-bottom: 30px">
        <div class="row">
            <div class="col-12">

                <div class="card-header" >
                    Agregar contacto
                    @if(session('success'))
                        <span class="text-success">{{ session('success') }}</span>
                    @endif
                </div>
                <div class="card-body">
                    <form action="/Contactos/Nuevo contacto/Agregar" method="post" class="form-control">
                        <div class="row">
                            <div class="col-6">
                                @csrf
                                <input class="form-control" type="text" name="numero" placeholder="Numero a agregar">
                                <input class="form-control" type="text" name="nombre" placeholder="Nombre del contacto">
                                <input class="form-control" type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input class="form-control" type="hidden" name="estado" value="new">
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
