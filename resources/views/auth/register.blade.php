
 @extends('layouts.app')
@section('content')
    <!--===========login start===========-->
    @include('_partials.navbar')

    <div class="app-body">

{{--        @include('_partials.sidebar')--}}
        <main class="main-content">
            <div class="container">

                @if(isset($user))
                <form class="form-signin" style="margin-top: 5%; margin-bottom:5%;" method="POST" action="{{ route('UserUpdate', $user->id) }}">
                @method('PUT')
                @else
                <form class="form-signin" style="margin-top: 5%; margin-bottom:5%;" method="POST" action="{{ route('registerUser') }}">
                @endif
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                    @csrf
                    <a href="http://www.blinksgroup.net/" class="brand text-center">
                        <img src="assets/img/b-links-logo.png" alt=""/>
                    </a>
                    <h2 class="form-signin-heading">Please sign up</h2>
                    <div class="form-group">
                        <label for="name" class="sr-only">Name</label>
                         @if(isset($user))
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ $user ? $user->name : "" }}" required>
                        @else
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required>
                        @endif
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="sr-only">Email address</label>
                        @if(isset($user))
                        <input type="email" id="email" name="email" value="{{ $user ? $user->email: ""  }}"  class="form-control @error('email') is-invalid @enderror" placeholder="Email address" required>
                        @else
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}" required>
                        @endif
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    @if(!isset($user))
                    <div class="form-group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="sr-only">Confirm Password</label>
                        <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                    </div>
                @endif
                    <div class="form-group">
                        <label for="user_type" class="sr-only">User Type</label>
                        @if(isset($user))
                        <select class='form-control' id='user_type' name='user_type'>
                            <option value='0' {{ ($user->is_admin == 0) ? 'selected' : '' }}>Assistant</option>
                            <option value='1' {{ ($user->is_admin == 1) ? 'selected' : '' }}>Admin</option>
                        </select>
                        @else
                        <select class='form-control' id='user_type' name='user_type'>
                            <option value='0'>Assistant</option>
                            <option value='1'>Admin</option>
                        </select>
                        @endif
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Register User</button>
                </form>

            </div>
        </main>
    </div>
    <!--===========login end===========-->

    @include('_partials.footer')
    @endsection
