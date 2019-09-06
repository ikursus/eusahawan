@extends('layouts.app')

@section('kotak_hijau')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Project</div>

                <div class="card-body">

@include('layouts.alerts')
                
                    <form method="POST" action="{{ route('projects.update', $project->id) }}">
                        @csrf
                        @method('PATCH')

                    <div class="form-group row">
                    <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                        <div class="col-md-6">
                            <select name="user_id" class="form-control">
                                @foreach( $select_users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('name') is-invalid @enderror" name="nama" value="{{ $project->nama }}"  autocomplete="nama" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                            <div class="col-md-6">
                                <select name="status" class="form-control">
                                    <option value="active" {{ $user->status == 'active' ? 'selected="selected"' : null }}>Active</option>
                                    <option value="inactive" {{ $user->status == 'inactive' ? 'selected="selected"' : null }}>Inactive</option>
                                </select>
                            </div>
                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('SAVE') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection