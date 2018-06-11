@extends('layouts.agent')

@section('content')
<div class="container" style="padding-top: 100px;padding-bottom: 100px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenido a Vision.Callcenter <br/>
                        @if($user->notifications->where('estado', 'activo')->count())
                        Tienes <a href="/Notifications"><span class="badge badge-danger">{{ $user->notifications->where('estado', 'activo')->count() }}</span> notificaciones.</a>
                        @else
                        No Tienes notificaciones activas, Buen dia.
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
