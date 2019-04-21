@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <a href="/Contactos/Nuevo Contacto">Agregar contacto</a>
            </div>
        </div>
        <div class="row">

            <div class="col-8">

                @if(session('error'))
                    <span class="badge-danger">{{ session('error') }}</span>
                @endif
                    @if(session('success'))
                        <span class="badge-success">{{ session('success') }}</span>
                    @endif

                @if(auth::user()->nivel->first()->id <= 1)
                    @if(count($contactsofuser) > 0)

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#id</th>
                                <th scope="col">Numero</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Agente</th>
                                <th scope="col">Estado</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($contactsofuser as $contacto)
                                <tr>
                                    <th scope="row">{{ $contacto->id }}</th>
                                    <td><a href="/Contacto/Ver/{{ $contacto->id }}">{{ $contacto->telefono }}</a></td>
                                    <td>{{ $contacto->nombre }}</td>
                                    <td>{{ $contacto->user->name }}</td>
                                    <td><form method="post" action="/Sms/New/Contact/{{ $contacto->id }}" style="display: inline">
                                            @csrf
                                            <button class="badge badge-warning">sms</button>
                                        </form></td>
                                    <td><form method="post" action="/Contactos/Remove/Comment/{{ $contacto->id }}" style="display: inline">
                                            @csrf
                                            <button class="badge badge-danger">Eliminar</button>
                                        </form></td>
                                </tr>
                            @empty
                                <p>No hay contacctos registrados.</p>
                            @endforelse

                            <tbody/>
                        </table>

                    @else

                        <p>No hay contactos registrados.</p>

                    @endif
                    @if(count($contactos))
                        {{ $contactsofuser->links() }}
                    @endif

                @else

                    @if(count($contactos) > 0)

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#id</th>
                                <th scope="col">Numero</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Agente</th>
                                <th scope="col">Estado</th>
                                <th></th><th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($contactos as $contacto)
                                <tr>
                                    <th scope="row">{{ $contacto->id }}</th>
                                    <td><a href="/Contacto/Ver/{{ $contacto->id }}">{{ $contacto->telefono }}</a></td>
                                    <td>{{ $contacto->nombre }}</td>
                                    <td>{{ $contacto->user->name }}</td>
                                    <td>{{ $contacto->estado }}</td>
                                    <td><form method="post" action="/Sms/New/Contact/{{ $contacto->id }}" style="display: inline">
                                            @csrf
                                            <button class="badge badge-warning">sms</button>
                                        </form></td>
                                    <td><form method="post" action="/Contactos/Remove/Comment/{{ $contacto->id }}" style="display: inline">
                                            @csrf
                                            <button class="badge badge-danger">Eliminar</button>
                                        </form></td>
                                </tr>
                            @empty
                                <p>No hay prefijos registrados.</p>
                            @endforelse

                            <tbody/>
                        </table>

                    @else

                        <p>No hay contactos registrados.</p>

                    @endif
                    @if(count($contactos))
                        {{ $contactos->links() }}
                    @endif
                @endif


            </div>
        </div>
    </div>
@endsection
