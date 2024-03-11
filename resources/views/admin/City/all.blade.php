@extends("admin.layout")

@section("body")

<div class="card-body {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}} animate__animated animate__fadeInRight animate__slow">
    <h2 class="card-title text-center mb-5">{{__("words.City Table")}}</h2>
    {{-- Add Category Start --}}
    @include("errors")
    @include("success")
    <div class="mb-3 w-50">
        <button class="mb-2 btn fs-6 text-info" onclick="hide()">+{{__("words.Add City")}}</button>
        <form action="{{url('createCity')}}" method="post" id="add_form" style="display: none;" enctype="multipart/form-data">
            @csrf
            <label>{{__("words.City Name")}}:</label>
            <div class="d-flex">
                <input type="text" name="name" class="form-control bg-light text-dark rounded me-2">
                <button type="submit" class="btn btn-primary">{{__("words.Submit")}}</button>
            </div>
        </form>
    </div>
    {{-- Add Category End --}}

    <div class="table-responsive">
        @if ($cities->isEmpty())
            <div class="alert alert-danger text-center">{{__("words.Cities are empty")}}</div>
        @else
            <table class="table text-center">
                <thead class=" {{$color == "light" ? "bg-dark text-light" : "bg-light text-dark"}}">
                <tr>
                    <th>{{__("words.Num")}}</th>
                    <th>{{__("words.Name")}}</th>
                    <th>{{__("words.Edit")}}</th>
                    <th>{{__("words.Remove")}}</th>
                </tr>
                </thead>
                <tbody class=" {{$color == "light" ? "text-dark" : "text-light"}}">
                @foreach ($cities as $city)
                    <tr>
                        <td><h4>{{$num++}}</h4></td>
                        <td><h4>{{__("words.$city->name")}}</h4></td>
                        <td><a href="{{url("editCity/$city->id")}}" class="btn btn-info">{{__("words.Edit")}}</a></td>
                        <td>
                            <form action="{{url("city/delete/$city->id")}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger"><i class="mdi mdi-delete"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>


<script>
    function hide() {
        var form = document.getElementById("add_form");
        if(form.style.display == 'none'){
            form.style.display='block';
        }else{
            form.style.display='none';
        }
    }
</script>

@endsection