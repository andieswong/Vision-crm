@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <br/><a href="/Ajustes/Niveles/Agregar" > <button class="btn btn-primary" >Agregar nivel a agente</button> </a><br/>
                <div class="card-header">
                    Niveles
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <th>Nivel</th>
                        </thead>
                        @foreach($niveles as $nivel)
                            <tr>
                                <td>
                                    <a href="/Ajustes/Niveles/{{ $nivel->level }}">{{ $nivel->level }}</a>
                                </td>
                            </tr>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection