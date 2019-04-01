@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <a href="/Leads/Nuevo lead">Comentarios</a>
        </div>
    </div>
    <div class="row">

        <div class="col-8">
            @if(count($lead->comments) > 0)
                @else
                <p>No hay comentarios registrados</p>
                @endif
        </div>
    </div>
</div>
@endsection
