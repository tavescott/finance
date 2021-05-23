
        <li class="nav-item @if(request()->segment(1) == 'admin' && request()->segment(2) == null) active @endif">
            <a class="nav-link" href="{{url('/admin')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashbodi</span>
            </a>
        </li>

        <li class="nav-item" @if(request()->segment(1) == 'admin' && request()->segment(2) == 'businesses') active @endif>
            <a class="nav-link"  href="{{route('businesses.index')}}">
                <i class="fas fa-building menu-icon"></i>
                <span class="menu-title">Biashara</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="fas fa-book menu-icon"></i>
                <span class="menu-title">Vifurushi</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="fas fa-user-tie menu-icon"></i>
                <span class="menu-title">Wamiliki</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="fas fa-grip-horizontal menu-icon"></i>
                <span class="menu-title">Makundi</span>
            </a>
        </li>
