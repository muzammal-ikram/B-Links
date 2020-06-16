{{--<header class="app-header navbar">--}}

{{--    <!--brand start-->--}}
{{--    <div class="navbar-brand navbar-brand-dark">--}}
{{--        <a class="" href="">--}}
{{--            <img src="{{ asset('assets/img/b-links.png') }}" alt="" height="40px" width="150px"/>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--    <!--brand end-->--}}

{{--    <!--left side nav toggle start-->--}}
{{--    <ul class="nav navbar-nav mr-auto">--}}
{{--        <li class="nav-item d-lg-none">--}}
{{--            <button class="navbar-toggler mobile-leftside-toggler" type="button"><i class="ti-align-right"></i></button>--}}
{{--        </li>--}}
{{--        <li class="nav-item d-md-down-none">--}}
{{--            <a class="nav-link navbar-toggler left-sidebar-toggler" href="#"><i class=" ti-align-right"></i></a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a href="{{url('/home')}}" class="active">--}}
{{--                Dashboard--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--            <a href="{{route('addData')}}">Add Contract</a>--}}
{{--        </li>--}}

{{--        @if(auth()->user()->is_admin == 1)--}}

{{--            <li class="nav-item">--}}
{{--                <a href="{{ route('allUsers') }}">All Users</a>--}}
{{--            </li>--}}

{{--            <li class="nav-item">--}}
{{--                <a href="{{route('register')}}">Add Assistant</a>--}}
{{--            </li>--}}

{{--            <li class="sub-menu">--}}
{{--                <a href="javascript:;">--}}
{{--                    <span>Users</span>--}}
{{--                </a>--}}
{{--                <ul class="sub">--}}
{{--                    <li><a href="{{ route('allUsers') }}">All Users</a></li>--}}
{{--                    <li><a href="{{route('register')}}">Add Assistant</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        @endif--}}

{{--        <li class="nav-item d-md-down-none-">--}}
{{--            <!--search start-->--}}
{{--             <a class="nav-link search-toggle" href="#" role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                <i class="ti-search"></i>--}}
{{--            </a> --}}
{{--            <div class="search-container">--}}
{{--                <div class="outer-close search-toggle">--}}
{{--                    <a class="close"><span></span></a>--}}
{{--                </div>--}}

{{--                <div class="container search-wrap">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col text-left">--}}
{{--                            <a class="" href="#">--}}
{{--                                <img src="{{ asset('assets/img/logo.png') }}" srcset="assets/img/logo@2x.png 2x" alt="">--}}
{{--                            </a>--}}
{{--                            <form class="mt-3">--}}
{{--                                <div class="form-row align-items-center">--}}
{{--                                    <input type="text" class="form-control custom-search" placeholder="Search">--}}
{{--                                </div>--}}
{{--                            </form>--}}

{{--                            <div class="search-list">--}}
{{--                                <h5 class="text-white mb-4">Search Results</h5>--}}
{{--                                <ul class="list-unstyled ">--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="text-white">--}}
{{--                                                <span class="bg-danger">--}}
{{--                                                    S--}}
{{--                                                </span>--}}
{{--                                            Simply dummy text of the printing--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="text-white">--}}
{{--                                                <span class="bg-success">--}}
{{--                                                    C--}}
{{--                                                </span>--}}
{{--                                            Contrary Ipsum is not simply random text--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="text-white">--}}
{{--                                                <span class="bg-info">--}}
{{--                                                    <i class="icon-basket-loaded "></i>--}}
{{--                                                </span>--}}
{{--                                            Ipsum has been industry's standard dummy--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--search end-->--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--    <!--left side nav toggle end-->--}}

{{--    <!--right side nav start-->--}}
{{--    <ul class="nav navbar-nav ml-auto">--}}

{{--        <li class="nav-item dropdown dropdown-slide" style="margin-right:30px;">--}}
{{--            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                <img src="{{ asset('assets/img/user.png') }}" alt="John Doe">--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu dropdown-menu-right dropdown-menu-accout">--}}
{{--                <div class="dropdown-header pb-3">--}}
{{--                    <div class="media d-user">--}}
{{--                        <img class="align-self-center mr-3" src="{{ asset('assets/img/user.png') }}" alt="John Doe">--}}
{{--                        <div class="media-body">--}}
{{--                            <h5 class="mt-0 mb-0">{{ auth()->user()->name }}</h5>--}}
{{--                            <span>{{ auth()->user()->email }}</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--                <a class="dropdown-item" href="{{ url('change-password') }}"><i class=" ti-lock"></i> Change Password</a>--}}

{{--                <div class="dropdown-divider"></div>--}}

{{--                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                 <i class=" ti-unlock"></i>        {{ __('Logout') }}--}}
{{--                    </a>--}}

{{--                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                        @csrf--}}
{{--                    </form>--}}


{{--            </div>--}}
{{--        </li>--}}

{{--    </ul>--}}

{{--    <!--right side nav end-->--}}
{{--</header>--}}
<!--===========header end===========-->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="{{ asset('assets/img/b-links-logo.png') }}" alt="" height="40px" width="150px"/>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active" style="padding-left: 20px">
{{--                <a href="{{url('/home')}}" class="active">--}}
                <a class="nav-link" href="{{url('/home')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('addData')}}">Add Contract</a>
            </li>

            @if(auth()->user()->is_admin == 1)
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Users
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('allUsers') }}">All Users</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('register')}}">Add User</a>
                </div>
            </li>
            @endif
        </ul>

        <ul class="nav navbar-nav ml-auto">

            <li class="nav-item dropdown dropdown-slide" style="margin-right:30px;">
                <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('assets/img/b-links.png') }}" alt="John Doe">
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-accout">
                    <div class="dropdown-header pb-3">
                        <div class="media d-user">
                            <img class="align-self-center mr-3" src="{{ asset('assets/img/b-links.png') }}" alt="John Doe" height="50px" width="50px">
                            <div class="media-body">
                                <h5 class="mt-0 mb-0">{{ auth()->user()->name }}</h5>
                                <span>{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>


                    <a class="dropdown-item" href="{{ url('change-password') }}"><i class=" ti-lock"></i> Change Password</a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class=" ti-unlock"></i>        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>


                </div>
            </li>

        </ul>
{{--        <form class="form-inline my-2 my-lg-0">--}}
{{--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--        </form>--}}
    </div>
</nav>
