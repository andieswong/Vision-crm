@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <h3>Agregar Agente</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @forelse($users as $user)
                <div class="col-6">
                    <img class="img-thumbnail" src="{{ $user->avatar }}">
                    <p class="card-text">
                        {{ $user->user }}
                        <a href="/Agentes/Ver/{{ $user->id }}">Ver mas</a>
                    </p>
                </div>
            @empty
                <p>No hay mensajes destacados.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
