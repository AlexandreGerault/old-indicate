@extends('layouts.min')

@section('title', __('auth.admin.login'))

@section('content')
    @if($errors->any())
        @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif

        @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    @endif

    <div class="py-5 text-center align-items-center d-flex"
        style="height: 100vh !important; background-image: url('https://static.pingendo.com/cover-bubble-dark.svg');background-size:cover;">
        <div class="container">
            <div class="row">
                <div class="mx-auto col-md-6 col-10 bg-white p-5">
                    <h1 class="mb-4">@lang('auth.admin.login')</h1>
                    <form method="POST" action="{{ route('backoffice.login') }}">
                        @csrf

                        <div class="form-group">
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                placeholder="Email" id="email" name="email" value="{{ old('email') }}" required
                                autofocus />
                        </div>

                        <div class="form-group mb-3">
                            <input type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                placeholder="Password" id="password" name="password" value="{{ old('password') }}"
                                required />
                            <small class="form-text text-muted text-right">
                                <a href="{{ route('backoffice.password.request') }}">
                                    {{ trans('auth.admin.forgot')  }}
                                </a>
                            </small>
                        </div>

                        <div class="form-group row">
                            <div class="px-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        value="{{ old('remember') ? 'checked' : '' }}" />

                                    <label class="form-check-label" for="remember">
                                        {{ trans('auth.admin.remember') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ trans('auth.submit') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
