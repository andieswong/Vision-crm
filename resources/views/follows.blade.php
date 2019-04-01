@extends('layouts.admin')

@section('content')
<div class="container" style="padding-top: 100px;padding-bottom: 100px;">
    <div class="row">
                <div class="col-4">

                    <p class="card-text">
                       Nombre: {{ $lead->nombre }}<br/>
                       id: {{ $lead->id }}<br/>
                       Direccion: {{ $lead->direccion }}<br/>
                       Telefono: {{ $lead->tel }}<br/>
                    </p>
                </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">Agentes siguiendo este lead:</div>
            @foreach($lead->followers as $follow)

                    <div class="card-header">
                        Nombre: {{ $follow->name }} Numero de empleado: {{ $follow->num_emp }}
                    </div>


                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
