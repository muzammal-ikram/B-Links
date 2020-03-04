
@extends('layouts.app')

@section('content')

    <!--===========login start===========-->

    <div class="container">

        <form class="form-signin" method="POST" action="{{ route('login') }}">
            @csrf
            <a href="http://www.blinksgroup.net/" class="brand text-center">
                <img src="assets/img/b-links-logo.png" alt=""/>
            </a>
            <h2 class="form-signin-heading">Please sign in</h2>
            <div class="form-group">
                <label for="email" class="sr-only">Email address</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="checkbox mb-4 mt-4">
                {{--            <label class="custom-control custom-checkbox">--}}
                {{--                <input type="checkbox" class="custom-control-input">--}}
                {{--                <span class="custom-control-indicator"></span>--}}
                {{--                <span class="custom-control-description">--}}
                {{--                        Remember me--}}
                {{--                    </span>--}}
                {{--            </label>--}}
                @if (Route::has('password.request'))
                    <a class="float-right text-muted" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif

{{--                <a href="forgot-password.html"  class="float-right text-muted">Forgot Password ?</a>--}}
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

        </form>

    </div>
    <!--===========login end===========-->

@endsection
