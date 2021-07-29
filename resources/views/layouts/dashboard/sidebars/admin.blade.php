
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">
                <i class="fas fa-user-tie  menu-icon"></i>
                <span class="menu-title">Dashbodi</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.users.index')}}">
                <i class="fas fa-user-tie menu-icon"></i>
                <span class="menu-title">Watumiaji</span>
            </a>
        </li>

        <li class="nav-item" @if(request()->segment(1) == 'admin' && request()->segment(2) == 'businesses') active @endif>
            <a class="nav-link"  href="{{route('admin.businesses.index')}}">
                <i class="fas fa-building menu-icon"></i>
                <span class="menu-title">Biashara</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.plans.index')}}">
                <i class="fas fa-book menu-icon"></i>
                <span class="menu-title">Vifurushi</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="fas fa-money-check-alt"></i>
                <span class="menu-title">Shughuli</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="fas fa-newspaper"></i>
                <span class="menu-title">Jarida</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.testimonials.index')}}">
                <i class="fas fa-comment-alt"></i>
                <span class="menu-title">Shuhuda</span>
            </a>
        </li>
