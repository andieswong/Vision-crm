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


                @if($pre)

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#id</th>
                            <th scope="col">Prefijo</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($pre as $prefijo)
                            <tr>
                                <th scope="row">{{ $prefijo->id }}</th>
                                <td><a href="/Prefijos/Tomar/{{ $prefijo->id }}">{{ $prefijo->prefijo }}</a></td>
                            </tr>
                        @empty
                            <p>No hay prefijos registrados.</p>
                        @endforelse

                        <tbody/>
                    </table>

                @else

                    <p>No hay prefijos registrados.</p>

                @endif



            </div>
        </div>
    </div>
@endsection
