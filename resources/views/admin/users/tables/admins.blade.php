<div class="table-responsive">
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Hali</th>
            <th>Vitendo</th>
        </tr>
        </thead>
        <tbody>
            @forelse($admins as $admin)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->phone}}</td>
                    <td>{{$admin->status}}</td>
                    <td>
                        <a href="{{route('admin.users.show', $admin)}}" class="text-success" data-bs-toggle="tooltip" data-placement="bottom" title="Angalia">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a class="text-danger mx-3" data-bs-toggle="tooltip" data-placement="bottom" title="Futa" data-toggle="modal" data-target="#deleteBusinessModal">
                            <i class="fas fa-trash"></i>
                            <form action="{{route('admin.users.destroy', $admin)}}" id="deletePlanForm" method="post">
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
