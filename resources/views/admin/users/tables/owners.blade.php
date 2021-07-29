<div class="table-responsive">
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>Jina</th>
            <th>Biashara</th>
            <th>Kifurushi</th>
            <th>Vitendo</th>
        </tr>
        </thead>
        <tbody>
            @forelse($owners as $owner)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$owner->first_name . " " . $owner->last_name}}</td>
                    <td>
                        @forelse($owner->business()->get() as $business)
                            <li>{{$business->name}}</li>
                        @empty
                            <li> - </li>
                        @endforelse
                    </td>
                    <td>{{$owner->plan->name}}</td>
                    <td>
                        <a href="{{route('admin.users.show', $owner)}}" class="text-success" data-bs-toggle="tooltip" data-placement="bottom" title="Angalia">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a class="text-danger mx-3" data-bs-toggle="tooltip" data-placement="bottom" title="Futa" data-toggle="modal" data-target="#deleteBusinessModal">
                            <i class="fas fa-trash"></i>
                            <form action="{{route('admin.users.destroy', $owner)}}" id="deletePlanForm" method="post">
                                @method('DELETE')
                                @csrf
                            </form>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Hakuna Watumiaji Bado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
