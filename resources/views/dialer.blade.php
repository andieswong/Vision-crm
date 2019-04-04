@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8" style="padding-top: 20px;padding-bottom: 20px">
                <div class="card card-header">
                    <div class="form-row">Prefijo/s Activo/s: @forelse($prefijo_activo as $prefijo){{ $prefijo->prefijo }}
                    <form method="post" action="/Prefijo/Reporte">@csrf<input type="hidden" name="prefix_id" value="{{ $prefijo->id }}"><input type="hidden" name="report" value="bueno"><input type="submit" class="btn-success rounded" value="Bueno"></form>
                    <form method="post" action="/Prefijo/Reporte">@csrf<input type="hidden" name="prefix_id" value="{{ $prefijo->id }}"><input type="hidden" name="report" value="malo"><input type="submit" class="btn-danger rounded" value="Malo"></form>
                    @empty No hay prefijo activo.@endforelse</div></div>
                <div class="card card-body" style="height: 70vh">
                @if( Auth::user()->nivel->first()->id <= 3)
                    <iframe src="http://187.189.143.4/agc/vicidial-grey.php?pl=&pp=&VD_login={{ Auth::user()->num_emp }}&VD_pass=5357" style="height: 100%;width: 100%"></iframe>
                @else
                    <iframe src="http://187.189.143.4/vicidial/welcome.php" style="height: 100%;width: 100%"></iframe>
@endif
</div>
</div>
<div class="col-4" style="padding-top: 20px;padding-bottom: 20px">
<div class="card card-header">
Domain: 187.189.143.4:5060
Pass: visionphone
    User: {{ Auth::user()->num_emp }}
</div>
<div class="card card-body" style="height: 70vh">
<iframe src="https://www.webvoipphone.com/webphone_online_demo/softphone.html?isdemopage=true" style="height: 100%;width: 100%"></iframe>
</div>
</div>
</div>
</div>
@endsection
