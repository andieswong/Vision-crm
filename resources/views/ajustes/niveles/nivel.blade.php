@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                {{--<br/><a href="/Ajustes/Niveles/Agregar" > <button class="btn btn-primary" >Agregar agente a este nivel</button> </a><br/>--}}
                <div class="card-header">
                       <h1> {{ $nivel->level }} </h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <th>Integrantes</th>
                        </thead>
                        @foreach($integrantes as $integrante)
                            <tr>
                                <td>
                                    <a href="/Agentes/Ver/{{ $integrante->user }}">{{ $integrante->user }}</a>
                                </td>
                            </tr>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection