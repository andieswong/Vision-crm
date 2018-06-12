@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="row-8">
                @if( Auth::user()->nivel->first()->id <= 3)
                <iframe href="http://146.71.124.114/" style="height: auto;width: auto"></iframe>
                    @else
                    <iframe href="http://146.71.124.114/vicidial/welcome.php" style="height: auto;width: auto"></iframe>
                    @endif
            </div>
            <div class="row-4">

            </div>
        </div>
    </div>
    @endsection