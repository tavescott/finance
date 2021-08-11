<li class="nav-item dropdown">
    <small>{{auth()->user()->owner->first_name. " ". auth()->user()->owner->last_name}}</small>
</li>
<li class="nav-item nav-profile dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
        @if(auth()->user()->image)
            <img src="{{asset('images/profile_images/'.auth()->user()->image)}}" class="rounded-circle" alt="profile" height="100"/>
        @else
            <img src="{{asset('auth/images/avatar.svg')}}" alt="profile"/>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
        <a class="dropdown-item" href="{{route('owner.profile.index')}}">
            <i class="icon-head text-primary"></i>
            Akaunti Yangu
        </a>

        <a class="dropdown-item" href="{{route('owner.businesses.index')}}">
            <i class="ri-building-line text-primary"></i>
            Biashara zangu
        </a>

        <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="ti-power-off text-primary"></i>
            Kuondoka

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </a>
    </div>
</li>
