@extends('layouts.admin')

@section('content')
<div class="container" style="padding-top: 100px;padding-bottom: 100px;">
    <div class="row">
                <div class="col-4">
                    <img style="border-radius: 15px;" class="img-thumbnail" src="{{ $user->avatar }}">
                    <p class="card-text">
                       Nombre: {{ $user->name }}<br/>

                            Puesto: {{ $rango->puesto }}<br/>
                            Equipo:{{ $equipo->equipo }}<br/>

                       Usuario: {{ $user->user }}<br/>
                       Numero: {{ $user->num_emp }}<br/>
                       Mail: {{ $user->email }}<br/>


                    </p>
                </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">Clientes en seguimiento</div>
            @foreach($user->follows as $follow)

                    <div class="card-header">
                        {{ $follow->nombre }}
                    </div>


                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
