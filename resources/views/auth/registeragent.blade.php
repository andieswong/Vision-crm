@extends('layouts.admin')

@section('content')
<div class="container" style="padding-top: 30px; padding-bottom: 30px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="/Agentes/Agregar">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="puesto" class="col-md-4 col-form-label text-md-right">{{ __('Puesto') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="puesto">
                                    @foreach($puestos as $puesto)
                                        <option value="{{ $puesto->id }}">{{ $puesto->puesto }}</option>
                                        @endforeach
                                </select>
                                @if ($errors->has('puesto'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('puesto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="equipo" class="col-md-4 col-form-label text-md-right">{{ __('Equipo') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="equipo">
                                    @foreach($equipos as $equipo)
                                        <option value="{{ $equipo->id }}">{{ $equipo->equipo }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('equipo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('equipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>

                            <div class="col-md-6">
                                <input id="user" type="text" class="form-control{{ $errors->has('user') ? ' is-invalid' : '' }}" name="user" value="{{ old('user') }}" required autofocus>

                                @if ($errors->has('user'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('user') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="num_emp" class="col-md-4 col-form-label text-md-right">{{ __('Numero empleado') }}</label>

                            <div class="col-md-6">
                                <input id="num_emp" type="text" class="form-control{{ $errors->has('num_emp') ? ' is-invalid' : '' }}" name="num_emp" value="{{ old('num_emp') }}" required autofocus>

                                @if ($errors->has('num_emp'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('num_emp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                            <div class="col-md-6">
                                <input id="avatar" type="text" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" value="https://api.adorable.io/avatars/285/vision@adorable.io.png" required autofocus>

                                @if ($errors->has('avatar'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('avatar   ') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
