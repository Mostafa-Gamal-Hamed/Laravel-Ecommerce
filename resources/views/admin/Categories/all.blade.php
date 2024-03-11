@extends("admin.layout")

@section("body")
<div class="card-body {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}} animate__animated animate__fadeInRight animate__slow">
    <h2 class="card-title text-center mb-5">{{__("words.Categories Table")}}</h2>
    {{-- Add Category Start --}}
    @include("errors")
    @include("success")
    <div class="mb-3 w-50">
        <button class="mb-2 btn fs-6 text-info" onclick="hide()">+{{__("words.Add Category")}}</button>
        <form action="{{route('createCategory')}}" method="post" id="add_form" style="display: none;" enctype="multipart/form-data">
            @csrf
            <label>{{__("words.Category Name And Image:")}}</label>
            <div class="d-flex">
                <input type="text" name="name" class="form-control bg-light text-dark rounded me-2">
                <input type="file" name="image" class="form-control bg-light text-dark rounded me-2">
                <button type="submit" class="btn btn-primary">{{__("words.Submit")}}</button>
            </div>
        </form>
    </div>
    {{-- Add Category End --}}

    <div class="table-responsive">
        @if ($categories->isEmpty())
            <div class="alert alert-danger text-center">{{__("words.Categories are empty")}}</div>
        @else
            <table class="table text-center">
                <thead class=" {{$color == "light" ? "bg-dark text-light" : "bg-light text-dark"}}">
                <tr>
                    <th>{{__("words.Num")}}</th>
                    <th>{{__("words.Name")}}</th>
                    <th>{{__("words.Image")}}</th>
                    <th>{{__("words.Edit")}}</th>
                    <th>{{__("words.Remove")}}</th>
                </tr>
                </thead>
                <tbody class=" {{$color == "light" ? "text-dark" : "text-light"}}">
                @foreach ($categories as $category)
                    <tr>
                        <td><h4>{{$num++}}</h4></td>
                        <td><h4>{{__("words.$category->name")}}</h4></td>
                        @if (is_null($category->image))
                            <td>{{__("words.No Image")}}</td>
                        @else
                            <td><img src="{{asset("storage/$category->image")}}" style="height:70px; width:100px;border-radius:0;" alt=""></td>
                        @endif
                        <td><a href="{{url("adminEditCategory/$category->id")}}" class="btn btn-info">{{__("words.Edit")}}</a></td>
                        <td>
                            <form action="{{url("adminCategories/delete/$category->id")}}" method="post">
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
