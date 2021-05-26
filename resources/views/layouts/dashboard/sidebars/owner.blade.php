
    <li class="nav-item @if(request()->segment(1) == 'admin' && request()->segment(2) == null) active @endif">
        <a class="nav-link active" href="#">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Dashbodi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link"  href="{{route('purchases.index')}}" >
            <i class="fa fa-shopping-cart menu-icon"></i>
            <span class="menu-title">Manunuzi</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('sales.index')}}">
            <i class="ri-money-dollar-circle-fill menu-icon"></i>
            <span class="menu-title">Mauzo</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('expenses.index')}}">
            <i class="ri-hand-coin-fill menu-icon"></i>
            <span class="menu-title">Matumizi</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="ri-file-chart-line menu-icon"></i>
            <span class="menu-title">Ripoti</span>
        </a>
    </li>
