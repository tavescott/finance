<nav class="sidebar sidebar-offcanvas " id="sidebar">

    <ul class="nav">
        @if(auth()->check())
            @if(auth()->user()->role->name == 'Admin')
                @include('layouts.dashboard.sidebars.admin')
            @elseif(auth()->user()->role->name == 'Owner')
                @include('layouts.dashboard.sidebars.owner')
            @elseif(auth()->user()->role->name == 'Helper')
                @include('layouts.dashboard.sidebars.helper')
            @endif
        @endif
    </ul>
</nav>
