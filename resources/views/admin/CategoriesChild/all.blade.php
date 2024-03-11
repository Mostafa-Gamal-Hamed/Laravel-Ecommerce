@extends("admin.layout")

@section("body")
<div class="card-body {{$color == "light" ? "bg-light text-dark" : "bg-dark text-light"}} animate__animated animate__fadeInRight animate__slow">
    <h2 class="card-title text-center mb-5">{{__("words.Categories Child Table")}}</h2>
    {{-- Add Category Start --}}
    @include("errors")
    @include("success")
    <div class="mb-3 w-75">
        <button class="mb-2 btn fs-6 text-info" onclick="hide()">+{{__("words.Add Category Child")}}</button>
        <form action="{{route('createCategoryChild')}}" method="post" id="add_form" style="display: none;" enctype="multipart/form-data">
            @csrf
            <label>{{__("words.Category Name")}}</label>
            <div class="d-flex">
                <input type="text" name="name" class="form-control bg-light text-dark rounded me-2">
                <select name="category_id" class="select-control me-2">
                    <option hidden>{{__("words.Select Category")}}</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{__("words.$category->name")}}</option>
                    @endforeach
                </select>
                <input type="file" name="image" class="form-control bg-light text-dark rounded me-2">
                <button type="submit" class="btn btn-primary">{{__("words.Submit")}}</button>
            </div>
        </form>
    </div>
    {{-- Add Category End --}}

    <div class="table-responsive">
        @if ($categoriesChild->isEmpty())
            <div class="alert alert-danger text-center">{{__("words.Categories Child are empty")}}</div>
        @else
            <table class="table text-center">
                <thead class="{{$color == "light" ? "bg-dark text-light" : "bg-light text-dark"}}">
                <tr>
                    <th>{{__("words.Num")}}</th>
                    <th>{{__("words.Name")}}</th>
                    <th>{{__("words.Image")}}</th>
                    <th>{{__("words.Category")}}</th>
                    <th>{{__("words.Edit")}}</th>
                    <th>{{__("words.Remove")}}</th>
                </tr>
                </thead>
                <tbody class="{{$color == "light" ? "text-dark" : "text-light"}}">
                @foreach ($categoriesChild as $Child)
                    <tr>
                        <td><h4>{{$num++}}</h4></td>
                        <td><h4>{{__("words.$Child->name")}}</h4></td>
                        @if (is_null($Child->image))
                            <td>{{__("words.No Image")}}</td>
                        @else
                            <td><img src="{{asset("storage/$Child->image")}}" style="height:70px; width:100px;border-radius:0;" alt=""></td>
                        @endif
                        <td><h4>{{$Child->category->name}}</h4></td>
                        <td><a href="{{url("adminEditCategoriesChild/$Child->id")}}" class="btn btn-info">{{__("words.Edit")}}</a></td>
                        <td>
                            <form action="{{url("adminCategoriesChild/delete/$Child->id")}}" method="post">
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
