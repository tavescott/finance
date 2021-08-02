
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">
                <i class="ri-dashboard-2-fill menu-icon"></i>
                <span class="menu-title">Dashbodi</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.users.index')}}">
                <i class="ri-group-line menu-icon"></i>
                <span class="menu-title">Watumiaji</span>
            </a>
        </li>

        <li class="nav-item" @if(request()->segment(1) == 'admin' && request()->segment(2) == 'businesses') active @endif>
            <a class="nav-link"  href="{{route('admin.businesses.index')}}">
                <i class="ri-building-line menu-icon"></i>
                <span class="menu-title">Biashara</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.plans.index')}}">
                <i class="ri-handbag-line menu-icon"></i>
                <span class="menu-title">Vifurushi</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.testimonials.index')}}">
                <i class="ri-user-voice-line menu-icon"></i>
                <span class="menu-title">Shuhuda</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Visaidizi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.categories.index')}}">Makundi</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.common_expenses.index')}}">Matumizi</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.units.index')}}">Vipimo</a></li>
                </ul>
            </div>
        </li>
