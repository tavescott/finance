@if(session()->get('business')->record_type == "Total")
    @include('layouts.dashboard.sidebars.owner.totals')

@elseif(session()->get('business')->record_type == "Each")
    @include('layouts.dashboard.sidebars.owner.each')
@endif
