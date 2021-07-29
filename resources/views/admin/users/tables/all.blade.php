<div class="table-responsive">
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>Email</th>
            <th>Namba ya simu</th>
            <th>Jukumu</th>
            <th>Hali</th>
            <th>Vitendo</th>
        </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->status}}</td>
                    <td>
                        <a href="{{route('admin.users.show', $user)}}" class="text-success" data-bs-toggle="tooltip" data-placement="bottom" title="Angalia">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a class="text-danger mx-3" data-bs-toggle="tooltip" data-placement="bottom" title="Futa" data-toggle="modal" data-target="#deleteBusinessModal">
                            <i class="fas fa-trash"></i>
                            <form action="{{route('admin.users.destroy', $user)}}" id="deletePlanForm" method="post">
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
