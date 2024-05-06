<table>
    <thead>
        <tr>
            <th colspan="4">User Data List until {{ $today }}</th>
        </tr>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Nim</th>
            <th>Email</th>
            <th>Nomor Hp</th>
            <th>Status</th>
            <th>Angkatan</th>
            <th>Data Dibuat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->nim }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->status }}</td>
                <td>{{ $user->year_entry }}</td>
                <td>{{ \Carbon\Carbon::parse($user->created_at)->toDayDateTimeString() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
