@extends('layouts.admin')

@section('content')
<div class="container" style="padding-top: 100px;padding-bottom: 100px;">
    <div class="row">
        <div class="col-4">
            <div class="card-header card-header-tabs">
                <h5>Estado: Activo</h5>
            </div>
            @forelse($user->notifications->where('estado', 'activo') as $notification )

                <div class="card-body">{{ $notification->notification }}</div>
                <form method="post" action="/Notifications/Estado/{{ $notification->id }}" style="display: inline">
                    @csrf
                    <input type="hidden" name="estado" value="completado">
                    <button class="btn btn-success">Completar</button>
                </form>
                <form method="post" action="/Notifications/Estado/{{ $notification->id }}" style="display: inline">
                    @csrf
                    <input type="hidden" name="estado" value="descartado">
                    <button class="btn btn-warning">Descartar</button>
                </form>
                @empty
            no hay notificaciones activas
                @endforelse
        </div>
        <div class="col-4">
            <div class="card-header card-header-tabs">
                <h5>Estado: Completado</h5>
            </div>
            @forelse($user->notifications->where('estado', 'completado') as $notification )

                <div class="card-body">{{ $notification->notification }}</div>

                <form method="post" action="/Notifications/Estado/{{ $notification->id }}" style="display: inline">
                    @csrf
                    <input type="hidden" name="estado" value="descartado">
                    <button class="btn btn-warning">Descartar</button>
                </form>
            @empty
                no hay notificaciones completadas
            @endforelse
        </div>
        <div class="col-4">
            <div class="card-header card-header-tabs">
                <h5>Estado: Descartado</h5>
            </div>
            @forelse($user->notifications->where('estado', 'descartado') as $notification )

                <div class="card-body">{{ $notification->notification }}</div>
                <form method="post" action="/Notifications/Estado/{{ $notification->id }}" style="display: inline">
                    @csrf
                    <input type="hidden" name="estado" value="completado">
                    <button class="btn btn-success">Completar</button>
                </form>
                <form method="post" action="/Notifications/Remove/{{ $notification->id }}" style="display: inline">
                    @csrf
                    <button class="btn btn-danger">Eliminar</button>
                </form>

            @empty
                no hay notificaciones descartadas
            @endforelse
        </div>
    </div>
</div>

@endsection
