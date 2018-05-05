@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <h3>Agregar Agente</h3>
        </div>
    </div>
    <div class="row">

            @forelse($users as $user)
                <div class="col-2">
                    <img class="img-thumbnail" src="{{ $user->avatar }}">
                    <p class="card-text">
                        {{ $user->user }}
                        <a href="/Agentes/Ver/{{ $user->user }}">Ver mas</a>
                    </p>
                </div>
            @empty
                <p>No hay usuarios registrados.</p>
            @endforelse

    </div>
</div>
@endsection
