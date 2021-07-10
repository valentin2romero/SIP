@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">

                <div class="card-header">
                    <div class="encabezado">
                        {{env('SIGLA','SIP')}}
                    </div>
                    <div class="body">
                        {{env('NOMBRE','Sistema Inteligente Previsional')}}
                    </div>
                </div>

                <div class="card-body">
                    <div class="encabezado">INICIAR SESIÓN</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="CUIT">

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="CONTRASEÑA">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        @if (Route::has('password.request'))
                        <div class="form-group row justify-content-center">
                            <div class="col-md-6 text-center">
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color: black;">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                            </div>
                        </div>
                        @endif

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6 text-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6 text-center">
                                <button type="submit" class="btn btn-md btn-block login-boton" style="margin-bottom: 0 !important;">
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                        </div>

                        @if (Route::has('register'))
                        <div class="form-group row justify-content-center">
                            <div class="col-md-6 text-center">
                                <a href="{{ route('register') }}" class="btn btn-sm login-boton" style="font-size: 14px;">
                                    {{ __('Registrarme') }}
                                </a>
                            </div>
                        </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection