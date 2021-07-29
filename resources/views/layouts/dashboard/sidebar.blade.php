<nav class="sidebar sidebar-offcanvas " id="sidebar">

    <ul class="nav">
        @if(auth()->check())
            @if(auth()->user()->role_id == 1)
                @include('layouts.dashboard.sidebars.admin')
            @elseif(auth()->user()->role_id == 2)
                @include('layouts.dashboard.sidebars.owner')
            @elseif(auth()->user()->role_id == 3)
                @include('layouts.dashboard.sidebars.helper')
            @endif
        @endif
    </ul>
</nav>
