@extends('layouts.app')

@section('kotak_hijau')

<div class="container">
<div class="row">
<div class="col-md-12">

<div class="card">
<div class="card-header">
    <a href="{{ route('projects.create') }}" class="btn btn-primary">Tambah Project</a>
</div>
<div class="card-body">
@include('layouts.alerts')
    <table class="table table-bordered" id="project">
        <thead>
            <tr>
                <th>ID</th>
                <th>USER</th>
                <th>NAMA PROJECT</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        
    </table>
</div>
</div>
</div>
</div>
</div>

<script>
$(function() {
    $('#project').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('projects.datatables') !!}',
        columns: [
            { data: 'id', name: 'project.id' },
            { data: 'user.name', name: 'user.name' },
            { data: 'nama', name: 'project.nama' },
            { data: 'status', name: 'status' }
        ]
    });
});
</script>
@endsection