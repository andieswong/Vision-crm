@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8" style="padding-top: 20px;padding-bottom: 20px">
                <div class="card card-header">Dialer</div>
                <div class="card card-body" style="height: 70vh">
                @if( Auth::user()->nivel->first()->id <= 3)
                    <iframe src="http://146.71.124.114/" style="height: 100%;width: 100%"></iframe>
                @else
                    <iframe src="http://146.71.124.114/vicidial/welcome.php" style="height: 100%;width: 100%"></iframe>
                @endif
                </div>
            </div>
            <div class="col-4" style="padding-top: 20px;padding-bottom: 20px">
                <div class="card card-header">Sip phone</div>
                <div class="card card-body" style="height: 70vh">
                    <iframe src="https://www.webvoipphone.com/webphone_online_demo/softphone.html?isdemopage=true" style="height: 100%;width: 100%"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection