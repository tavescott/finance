<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Phone</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @forelse($data as $user)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->email}}</td>
        </tr>
    @empty
        <tr><td colspan="3">No Users</td></tr>
    @endforelse
    </tbody>
</table>
