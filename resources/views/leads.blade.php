@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <a href="/Leads/Nuevo lead">Agregar Lead</a>
        </div>
    </div>
    <div class="row">

        <div class="col-8">

            @if(count($leads) > 0)

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Servicio ofrecido</th>
                    <th scope="col">Agente</th>
                </tr>
                </thead>
                <tbody>
            @forelse($leads as $lead)
                <tr>
                    <th scope="row">{{ $lead->id }}</th>
                    <td><a href="/Leads/Ver/{{ $lead->id }}">{{ $lead->nombre }}</a></td>
                    <td>{{ $lead->direccion }}</td>
                    <td>{{ $lead->tel }}</td>
                    <td>{{ $lead->paq_ofrecido }}</td>
                    <td><a href="/Agentes/Ver/{{ $lead->user->id }}">{{ $lead->user->name }}</a></td>

                </tr>
            @empty
                <p>No hay leads registrados.</p>
            @endforelse

                <tbody/>
            </table>

                @else

                <p>No hay leads registrados.</p>

                @endif
            @if(count($leads))
                {{ $leads->links() }}
                @endif

        </div>
    </div>
</div>
@endsection
