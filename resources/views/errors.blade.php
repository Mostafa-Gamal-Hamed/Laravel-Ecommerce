
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger text-center">
            <i class="mdi mdi-close"></i> {{$error}}
        </div>
    @endforeach
@endif

@if (session()->get("error"))
    <div class="alert alert-danger text-center">
        <i class="mdi mdi-close"></i> {{session()->get("error")}}
    </div>
@endif