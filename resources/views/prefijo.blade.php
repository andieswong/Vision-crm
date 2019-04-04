@extends('layouts.admin')

@section('content')
    <div class="container" style="padding-top: 100px;padding-bottom: 100px;">
        <div class="row">
            <div class="col-4">

                <p class="card-text">
                    Prefijo: {{ $prefijo->prefijo }}<br/>
                    id: {{ $prefijo->id }}<br/>
                    Subido por: {{ $prefijo->usuario }}<br/>
                    Reportes: {{ $prefijo->reports->count() }} <br/>
                </p>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body text-center">Reportes para este prefijo:</div>

                    

                </div>
            </div>
        </div>
    </div>
@endsection
