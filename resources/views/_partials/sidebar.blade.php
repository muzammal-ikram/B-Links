<div class="left-sidebar">
    <nav class="sidebar-menu">
        <ul id="nav-accordion">
            <li class="sub-menu">
                <a href="{{url('/home')}}" class="active">
                    <i class=" ti-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-title">
                <h5 class="text-uppercase">B-links</h5>
            </li>

            {{-- <li>
                <a href="{{ url('add-contractor') }}">
                    <i class="fa fa-dot-circle-o text-primary"></i>
                    <span>Add Data</span>
                </a>
            </li> --}}
              <li class="sub-menu">
                    <a href="javascript:;">
                        <span>Contract</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('allContractor') }}">All Data</a></li>
                        <li><a href="{{route('addData')}}">Add Data</a></li>
                    </ul>
                </li>
             @if(auth()->user()->is_admin == 1)
            
                <li class="sub-menu">
                    <a href="javascript:;">
                        <span>Users</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ route('allUsers') }}">All Users</a></li>
                        <li><a href="{{route('register')}}">Add Assistant</a></li>
                    </ul>
                </li>
             @endif
        </ul>
    </nav>
</div>
