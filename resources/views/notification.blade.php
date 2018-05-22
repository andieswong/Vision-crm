@extends('layouts.admin')

@section('content')
<div class="container" style="padding-top: 100px;padding-bottom: 100px;">
    <div class="row">
        <div class="col-12">
            <div class="card-header">Notification test</div>
            <div class="card-body">
            <form method="post" action="/Notification">
                @csrf
                <div class="form-group row">
                    <div class="col">
                        <input class="form-control" type="text" name="notification" placeholder="Notificacion">
                        <input class="form-control" type="hidden" name="estado" value="activo">
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="user" placeholder="id del usuario">
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
