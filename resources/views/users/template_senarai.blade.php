@extends('layouts.app')

@section('kotak_hijau')
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="card">
<div class="card-header">
    <a href="/users/create" class="btn btn-primary">Tambah User</a>
</div>
<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($senarai_users as $user)
            <tr>
                <td><?php echo $user->id; ?></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->status }}</td>
                <td>
                    <a href="/users/{{ $user->id }}/edit" class="btn btn-primary">EDIT</a>
                    
                    <form method="POST" action="/users/{{ $user->id }}">
                    
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">HAPUS</button>

                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $senarai_users->links() }}
</div>
</div>
</div>
</div>
</div>
@endsection