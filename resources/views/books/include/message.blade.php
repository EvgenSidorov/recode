@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="container alert alert-success mt-3">
        <div class="m-2">
            {{ session('success') }}
        </div>
    </div>
@endif
