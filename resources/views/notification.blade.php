@extends('layouts.admin')

@section('content')
<div class="container" style="padding-top: 100px;padding-bottom: 100px;">
    <div class="row">

        <div class="col-12">
            <div class="card-header">Do Request  @if(session('success'))
                    <span class="text-success">{{ session('success') }}</span>
                @endif
            <form method="post" action="/Notification">

                <div class="form-group row">
                    <div class="col">
                        @csrf
                        <input class="form-control" type="text" name="notification" placeholder="Notificacion">
                        <input class="form-control" type="hidden" name="estado" value="activo">
                    </div>
                    <div class="col">
                        <select class="form-control" name="user">
                            @forelse($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} Equipo: {{ $user->equipo }}</option>
                            @empty
                                No hay agentes
                            @endforelse
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">
                            Notificar
                        </button>
                    </div>
                </div>
            </form>
                <form method="post" action="/Notificationall">
                <div class="form-group row">
                    <div class="col">
                        @csrf
                        <input class="form-control" type="text" name="notification" placeholder="Notificacion">
                        <input class="form-control" type="hidden" name="estado" value="activo">
                    </div>
                    <div class="col">
                        <p>A todos</p>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">
                            Notificar
                        </button>
                    </div>
                </div>

            </form>
            </div>
        </div>
    </div>
</div>

@endsection
