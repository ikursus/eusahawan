@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('mesej_sukses'))
<div class="alert alert-danger">
    <ul>
        {{ session('mesej_sukses')}}
    </ul>
</div>
@endif