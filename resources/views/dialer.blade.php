@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8" style="padding-top: 20px;padding-bottom: 20px">
                <div class="card card-header">Dialer</div>
                <div class="card card-body" style="height: 70vh">
                @if( Auth::user()->nivel->first()->id <= 3)
                    <iframe src="http://187.189.143.4/agc/vicidial-grey.php?pl=&pp=&VD_login=&VD_pass=" style="height: 100%;width: 100%"></iframe>
                        {{--<a href="http://192.200.118.66/agc/vicidial-grey.php?pl=&pp=&VD_login=&VD_pass=" target="_blank" ><button class="btn btn-primary">Dialer</button></a>--}}
                @else
                    <iframe src="http://187.189.143.4/vicidial/welcome.php" style="height: 100%;width: 100%"></iframe>
    {{--<a href="http://192.200.118.66/vicidial/welcome.php" target="_blank" ><button class="btn btn-primary">Dialer admin</button></a>--}}
@endif
</div>
</div>
<div class="col-4" style="padding-top: 20px;padding-bottom: 20px">
<div class="card card-header">
Domain: 187.189.143.4:5060
Pass: visionphone
</div>
<div class="card card-body" style="height: 70vh">
<iframe src="https://www.webvoipphone.com/webphone_online_demo/softphone.html?isdemopage=true" style="height: 100%;width: 100%"></iframe>
</div>
</div>
</div>
</div>
@endsection
