@extends('layouts.admin')

@section('content')
    <div class="container" style="padding-top: 100px;padding-bottom: 100px;">
        <div class="row">
            <div class="col-4">
                <div class="card-header card-header-tabs">
                    <h5>Web</h5>
                </div>
                <div class="card-body">
                    <a><h3></h3></a>
                </div>

            </div>
            <div class="col-4">
                <div class="card-header card-header-tabs">
                    <h5>Administracion</h5>
                </div>
                <div class="card-body">
                    <a href="/Ajustes/Puestos"><h5>Puestos</h5></a>
                    <a href="/Ajustes/Equipos"><h5>Equipos</h5></a>
                    <a href="/Ajustes/Niveles"><h5>Niveles </h5></a>
                </div>

            </div>
            <div class="col-4">
                <div class="card-header card-header-tabs">
                    <h5>Privacidad</h5>
                </div>

            </div>
        </div>
    </div>

@endsection
