@extends('layouts.appauth')
@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-t-50 p-b-90">
            <div class="login-register-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-51">
                        ITSC
                    </span>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Correo invalido">
                        <input class="input100" type="text" @error('email') is-invalid @enderror name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Correo Electronico">
                        <span class="focus-input100"></span>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
                        <input class="input100 @error('password') is-invalid @enderror" type="password" name="password"
                            placeholder="Contraseña" required autocomplete="current-password">
                        <span class="focus-input100"></span>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="flex-sb-m w-full">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Recordar
                            </label>
                        </div>

                        
                    </div>

                    <div class="container-login100-form-btn m-t-17">
                        <button class="login100-form-btn">
                            Iniciar Sesión
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection