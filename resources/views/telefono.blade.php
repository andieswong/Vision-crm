@extends('layouts.admin')

@section('content')
<div class="top1">
    <h1>PSTN calling</h1>
</div>

<div class="container">

    <div id="chromeFileWarning" class="frame big">
        <b style="color: red;">Warning!</b> Protocol "file" used to load page in Chrome.<br><br>
        Please avoid loading files directly from disk when developing WebRTC applications using Chrome.<br>
        Chrome disables access to microphone which prevents proper functionality.<br>
        <br>
        You can allow working with "file:", if you start Chrome with the flag <i>--allow-file-access-from-files</i>
    </div>

    <div class="clearfix"></div>

    <div class="frame small">
        <div class="inner loginBox">
            <h3 id="login">Sign in</h3>
            <form id="userForm">
                <input id="username" placeholder="USERNAME"><br>
                <input id="password" type="password" placeholder="PASSWORD"><br>
                <button id="loginUser">Login</button>
                <button id="createUser">Create</button>
            </form>
            <div id="userInfo">
                <h3><span id="username"></span></h3>
                <button id="logOut">Logout</button>
            </div>
        </div>

        <div class="inner takeaways">
            <h3>Takeaways</h3>
            <ul>
                <li>Authenticate users and act on success / failures</li>
                <li>How to create user and login automatically</li>
                <li>After page load, look for an earlier session and try to start it</li>
                <li>Place a PSTN call</li>
                <li>Wire up the incoming stream + start/stop ringback tone as needed</li>
                <li>Handle end of phone call</li>
            </ul>
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
    @endsection