@extends('layouts.app')
@section('content')
     @include('_partials.navbar')
    <div class="app-body">
{{--    @include('_partials.sidebar')--}}
        <main class="main-content">
            <div class="container-fluid">
{{--                <div class="page-title pl-0">--}}
{{--                    <h4 class="mb-0">Change Password</h4>--}}
{{--                    <ol class="breadcrumb mb-0 pl-0 pt-1 pb-0">--}}
{{--                        <li class="breadcrumb-item active">/change Password</li>--}}
{{--                    </ol>--}}
{{--                </div>--}}
            @if (session('success'))
                <div class="container-fluid">
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            @if (session('error'))
                <div class="container-fluid">
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                </div>
            @endif
            @if(count($errors))
                <div class="col-12">
                    <ul class="alert alert-danger ">
                        @foreach($errors->all() as $error)
                            <li class="ml-4">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class=" col-md-12">
                        <div class="container">

                            <form method="POST" action="{{ url('/change-password') }}">
                                @csrf

                                    <div class="row ml-3">
                                        <h5>Change Password</h5>
                                    </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-md-2 col-form-label">Current Password:</label>
                                    <div class="col-md-12">
                                        <input type="password" name="current_password" class="form-control" id="inputName" placeholder="New Password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputName" class="col-md-2 col-form-label">New Password:</label>
                                    <div class="col-md-12">
                                        <input type="password" name="password" class="form-control" id="inputName" placeholder="New Password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputName" class="col-md-2 col-form-label">Confirm Password:</label>
                                    <div class="col-md-12">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Re-Enter Password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <a href="{{ url('home') }}"
                                       class="btn btn-warning ml-3">Cancel</a>
                                    <button type="submit" class="btn btn-success ml-3">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </main>
    </div>

          @include('_partials.footer')

@endsection
