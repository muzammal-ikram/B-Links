 
 @extends('layouts.app')
@section('content')
    <!--===========login start===========-->
    @include('_partials.navbar')

    <div class="app-body">

        @include('_partials.sidebar')
        <main class="main-content">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <form class="form-signin" style="margin-top: 5%; margin-bottom:5%;" method="POST" action="{{ route('registerUser') }}">
                    @csrf
                    <a href="http://www.blinksgroup.net/" class="brand text-center">
                        <img src="assets/img/b-links-logo.png" alt=""/>
                    </a>
                    <h2 class="form-signin-heading">Please sign up</h2>
                    <div class="form-group">
                        <label for="name" class="sr-only">Name</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="sr-only">Email address</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}" required>
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

                    <div class="form-group">
                        <label for="password-confirm" class="sr-only">Confirm Password</label>
                        <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                    </div>

                    <div class="form-group">  
                        <label for="user_type" class="sr-only">User Type</label>
                        <select class='form-control' id='user_type' name='user_type'>
                            <option value='0'>Assistant</option>
                            <option value='1'>Admin</option>
                        </select>  
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Register Assistant</button>
                </form>

            </div>
        </main>
    </div>
    <!--===========login end===========-->

    @include('_partials.footer')
    @endsection