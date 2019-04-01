@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <br/><a href="/Ajustes/Equipos/Agregar" > <button class="btn btn-primary" >Agregar equipo</button> </a><br/>
                <div class="card-header">
                    Equipos
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <th>Equipo</th>
                        </thead>
                        @foreach($equipos as $equipo)
                            <tr>
                                <td>
                                    {{ $equipo->equipo }}
                                </td>
                            </tr>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection