@extends('layouts.tel1')

@section('content')
<div class="container" style="padding-top: 100px;padding-bottom: 100px;">
    <div class="row">
                <div class="col-4">

                </div>
        <div class="col-12">
            <div class="card-header">
                Telefono
            </div>
            <div class="card-body">
                <div class="container">



                    <div class="clearfix"></div>

                    <div class="frame small">
                        <div class="inner loginBox">
                            <h3 id="login"></h3>
                            <form id="userForm">
                                <input id="username" type="hidden" placeholder="USERNAME" value="vision@vision.com"><br>
                                <input id="password" type="hidden" placeholder="PASSWORD" value="pass123"><br>
                                <button id="loginUser">iniciar</button>

                            </form>
                            <div id="userInfo">
                                <h3><span>Vision</span></h3>

                            </div>
                        </div>

                        
                    </div>

                    <div class="frame">
                        <h3>PSTN Call</h3>
                        <div id="call">
                            <form id="newCall">
                                <input id="phoneNumber" placeholder="Phone Number (+46000000000)"><br>
                                <button id="call">Call</button>
                                <button id="hangup">Hangup</button>
                                <audio id="incoming" autoplay></audio>
                                <audio id="ringback" src='style/ringback.wav' loop></audio>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                        <div id="callLog">
                        </div>
                        <div class="error">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
