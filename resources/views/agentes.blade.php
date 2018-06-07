@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-8">
            <br/>
            <a  href="/Agentes/Agregar"><button class="btn btn-primary">Agregar agente</button></a>
            @if(session('success'))
                <span class="text-success">{{ session('success') }}</span>
            @endif

        </div>
    </div>
    <div class="row">

            @forelse($users as $user)
                <div class="col-2">
                    <img class="img-thumbnail" src="{{ $user->avatar }}">
                    <p class="card-text">
                        {{ $user->user }}
                        <a href="/Agentes/Ver/{{ $user->user }}"><button class="btn btn-primary">Ver mas</button></a>
                        <form action="/Agentes/Eliminar/{{ $user->id }}" method="post">
                        @csrf
                        <button class="btn btn-danger">Eliminar</button>
                    </form>

                    </p>
                </div>
            @empty
                <p>No hay usuarios registrados.</p>
            @endforelse

    </div>
</div>
@endsection
