@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <button class="btn btn-success" href="/Contactos/Nuevo Contacto">Agregar contacto</button>
            </div>

        </div>
        <div class="row">

            <div class="col-8">
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
                                    <td>{{ $contacto->estado }}</td>
                                    <td><form method="get" action="/Sms/New/Contact/{{ $contacto->id }}" style="display: inline">
                                            @csrf
                                            <button class="badge badge-warning">sms</button>
                                        </form></td>
                                    <td><form method="post" action="/Contactos/Remove/Comment/{{ $contacto->id }}" style="display: inline">
                                            @csrf
                                            <button class="badge badge-danger">Eliminar</button>
                                        </form></td>
                                    <td><form method="get" action="/Sms/New/Contact/{{ $contacto->id }}" style="display: inline">
                                            @csrf
                                            <input type="hidden" value="{{ $contacto->telefono }}" name="to">
                                            <button class="badge badge-success">call</button>
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
                                <th scope="col">Numero</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Agente</th>
                                <th scope="col">Estado</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($contactos as $contacto)
                                <tr>
                                    <td><a href="/Contacto/Ver/{{ $contacto->id }}">{{ $contacto->telefono }}</a></td>
                                    <td>{{ $contacto->nombre }}</td>
                                    <td>{{ $contacto->user->name }}</td>
                                    <td>{{ $contacto->estado }}</td>
                                    <td><form method="get" action="/Sms/New/Contact/{{ $contacto->id }}" style="display: inline">
                                            @csrf
                                            <button class="badge badge-warning">sms</button>
                                        </form></td>
                                    <td><form method="post" action="/Contactos/Remove/Comment/{{ $contacto->id }}" style="display: inline">
                                            @csrf
                                            <button class="badge badge-danger">Eliminar</button>
                                        </form></td>
                                    <td><form method="post" action="/api/call" style="display: inline">
                                            @csrf
                                            <input type="hidden" value="{{ $contacto->telefono }}" name="to">
                                            <button class="badge badge-success">call</button>
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
            <div class="col-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Prefijo</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse(Auth::user()->prefijos as $prefijo)
                        <tr>
                            <td>{{ $prefijo->prefijo }}</td>
                            <td><form method="post" action="/Contactos/Remove/Prefijo/{{ $prefijo->id }}" style="display: inline">
                                    @csrf
                                    <button class="badge badge-danger">Eliminar</button>
                                </form></td>
                        </tr>
                    @empty
                        <p>No hay prefijos registrados.</p>
                    @endforelse

                    <tbody/>
                </table>
            </div>
        </div>
    </div>
@endsection
