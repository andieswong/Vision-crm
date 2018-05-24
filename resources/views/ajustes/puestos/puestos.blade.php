@extends('layouts.admin')

@section('content')

    <div class="container">
    <div class="row">
        <div class="col-12">
            <br/><a href="/Ajustes/Puestos/Agregar" > <button class="btn btn-primary" >Agregar puesto</button> </a><br/>
            <div class="card-header">
                Puestos
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <th>Puesto</th>
                    </thead>
                    @foreach($puestos as $puesto)
                       <tr>
                        <td>
                            {{ $puesto->puesto }}
                        </td>
                        </tr>

                        @endforeach
                </table>
            </div>
        </div>
    </div>
    </div>
    @endsection