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
                    
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $user->id }}">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="modal-delete-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

  <form method="POST" action="/users/{{ $user->id }}">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @csrf
      @method('DELETE')
      Adakah anda bersetuju untuk hapus data?
                   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">CONFIRM</button>
      </div>
    </div>
    </form>
  </div>
</div>

                   

                   

                    

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