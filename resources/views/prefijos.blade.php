@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <a href="/Prefijos/Nuevo prefijo">Agregar prefijo</a>
            </div>
        </div>
        <div class="row">

            <div class="col-8">



                    @if(count($prefijos) > 0)

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#id</th>
                                <th scope="col">Prefijo</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Reportes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($prefijos as $prefijo)
                                <tr>
                                    <th scope="row">{{ $prefijo->id }}</th>
                                    <td><a href="/Prefijos/Ver/{{ $prefijo->id }}">{{ $prefijo->prefijo }}</a></td>
                                    <td>{{ $prfijo->estado }}</td>
                                    <td>{{ $prefijo->created_at }}</td>
                                    <td>0</td>
                                    <td><a href="/Agentes/Ver/{{ $prefijo->user->user }}">{{ $prefijo->user->name }}</a></td>

                                </tr>
                            @empty
                                <p>No hay prefijos registrados.</p>
                            @endforelse

                            <tbody/>
                        </table>

                    @else

                        <p>No hay prefijos registrados.</p>

                    @endif
                    @if(count($prefijos))
                        {{ $prefijos->links() }}
                    @endif


            </div>
        </div>
    </div>
@endsection
