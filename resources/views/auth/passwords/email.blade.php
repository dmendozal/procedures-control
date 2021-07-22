@extends('layouts.appauth')
@section('content')

<div class="card-header">{{ __('Reestablecer Contraseña') }}</div>

<div class="card-body card-deck">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="login-register-form col-md-12">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="row">
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 mt-10">
                    <button class="button button-primary btn-block" type="submit">
                        Reestablecer
                    </button>
                </div>
                <a class="col-6 mt-10" href="{{ route('login') }}">
                    <span class="button button-apple btn-block" style="text-align: center">
                        Atras
                    </span>
                </a>
            </div>
        </form>
    </div>
</div>

@endsection